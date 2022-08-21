<?php
require ('./database.php');
session_start();
if (isset($_SESSION["ausername"])){
	$ausername=$_SESSION["ausername"];
	session_write_close();
   $queryJ = "select distinct position,year,company from job where username='$ausername' order by ID DESC";
  $sqlJob = mysqli_query($connection, $queryJ);
  }	else{
      if(ini_get("session.use_cookies")){
          $params = session_get_cookie_params();
          setcookie(session_name(),'',time()-4200,
          $params["path"],
          $params["domain"],
          $params["secure"],
          $params["httponly"]);
           $ausername='';
          session_destroy();
    $url = "/";
        header("Location: $url");
        exit;}}

$profile_result=mysqli_query($connection,"Select CONCAT(Fname,' ',Mname,' ',Lname) as Fullname, Birthdate, Gender, course, Yeargraduated, Address, Cnumber, Job,Employment,Related, Email,Profile, Certificates from alumni where Username = '$ausername'");
if($rows=mysqli_fetch_assoc($profile_result));
{
$Fullname=$rows['Fullname'];
$Age=$rows['Birthdate'];
$Gender=$rows['Gender'];
$Yeargraduated=$rows['Yeargraduated'];
$Address=$rows['Address'];
$Cnumber=$rows['Cnumber'];
if($rows['course']=="bsit"){$course="Bachelor of Science in Information Technology";}elseif($rows['course']=="bsba"){$course="Bachelor of Science in Business Administration";}elseif($rows['course']=="bsed"){$course="Bachelor of Secondary Education";}elseif($rows['course']=="beed"){$course="Bachelor of Elementary Education";}else{}
$courseN=$rows['course'];
$Jobs=$rows['Job'];
$employment=$rows['Employment'];
$related=$rows['Related'];
$Email=$rows['Email'];
$Profile=$rows['Profile'];	
}

if(isset($_POST["upload"])) {
$imgName = uniqid();
$target_dir = "uploads/".  $ausername ."/";
$target_file = $target_dir . $imgName.".png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (!file_exists($target_dir)){
  mkdir($target_dir,0755,true);
}
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
  //  echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
  //  echo "File is not an image.";
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
//  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
 // echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

  //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
   
  }}
  
	if(empty($target_file)){
    

	}
	else
	{
  
		$profilePic = "Update alumni set Profile='$target_file' where username='$ausername'";
		$result = mysqli_query($connection,$profilePic);
     header("Location: myprofile.php");
	}
}
if(isset($_POST["ContactDetail"])) {
      $Cnumber = $_POST["cnumber"];
    $Email = $_POST["email"];
    $Address = $_POST["address"];
    
    	$ContactDetail = "Update alumni set cnumber='$Cnumber',Email='$Email',Address='$Address' where username='$ausername'";
		$result = mysqli_query($connection,$ContactDetail);
    }

if(isset($_POST["addjob"])) {
 session_start();
			$_SESSION["username"]=$ausername;
      $_SESSION["action"]="update";
			session_write_close();
    header("Location: survey.php");
    
    }
    if(isset($_POST["logout"])) {
        if(ini_get("session.use_cookies")){
          $params = session_get_cookie_params();
          setcookie(session_name(),'',time()-4200,
          $params["path"],
          $params["domain"],
          $params["secure"],
          $params["httponly"]);
           $ausername='';
          session_destroy();
           $url = "./";
        header("Location: $url");
        exit;
          }      
}

if(isset($_POST["certificates"])) {
$imgName = uniqid();
$target_dir = "uploads/".  $ausername ."/";
$target_file = $target_dir . $imgName.".png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (!file_exists($target_dir)){
  mkdir($target_dir,0755,true);
}
  $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
  if($check !== false) {
  //  echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
  //  echo "File is not an image.";
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
//  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["imageToUpload"]["size"] > 500000) {
 // echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

  //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
   echo "The file ". htmlspecialchars( basename( $_FILES["imageToUpload"]["name"])). " has been uploaded.";
  } else {
   
  }}
  
	if(empty($target_file)){
    

	}
	else
	{
  
   $queryCreate = "insert into certificate (username,images) VALUES ('$ausername','$target_file')";
      
		$sqlCreate = mysqli_query($connection, $queryCreate);
	}
}



?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

    <title>RSU Alumni Profile</title>
<!--
Reflux Template
https://templatemo.com/tm-531-reflux
-->
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    
    <link rel="stylesheet" href="assets/css/templatemo-style.css" />
    
   
     
<script src="assets/dist/js/bootstrap.min.js"></script>
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap-dropdownhover.min.js"></script>
<link href="assets/dist/css/animate.min.css" rel="stylesheet">
    <link href="assets/dist/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
      //according to loftblog tut
      $(".main-menu li:first").addClass("active");

      var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
          reqSection = $(".section").filter(
            '[data-section="' + direction + '"]'
          ),
          reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
          $("body, html").animate(
            {
              scrollTop: reqSectionPos
            },
            800
          );
        } else {
          $("body, html").scrollTop(reqSectionPos);
        }
      };

      var checkSection = function checkSection() {
        $(".section").each(function() {
          var $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
          if (topEdge < wScroll && bottomEdge > wScroll) {
            var currentId = $this.data("section"),
              reqLink = $("a").filter("[href*=\\#" + currentId + "]");
            reqLink
              .closest("li")
              .addClass("active")
              .siblings()
              .removeClass("active");
          }
        });
      };

      $(".main-menu").on("click", "a", function(e) {
        e.preventDefault();
        showSection($(this).attr("href"), true);
      });

      $(window).scroll(function() {
        checkSection();
      });
    </script>
    <style>
  .cr1 {display: block;z-index: 1;position: relative;}.ct2 {position: absolute;padding: 10px;min-width: 400px;background-color: #0a4352;color:white;border: 1px solid #ccc;border-radius: 10px;  opacity: 0;transform: translateY(-10px);margin:4.5%;}.ct2 .header {display: flex;align-items: center;}.ct2 .header img {grid-column: 1/2;width: 80px;height: 80px;border-radius: 50%;}.ct2 .header .cm3 {margin-left: 1em;}.ct2 .header .cm3 .name {font-size: 1.25em;color: #333;letter-spacing: 1px;font-size: 20;}.ct2 .header .cm3 .title {font-size: 0.9em;color: #969696;font-weight: 500; }.ct2 .body {padding: 1em;}.ct2 .body p {font-size: 0.95em;color: #272727;}.ct2{opacity: 100;margin-left: auto;margin-right: auto;}
  .switch3 {position: relative;display: inline-block;width: 60px;height: 34px;}.switch3 input { opacity: 0;width: 0;height: 0;}.slider3 {position: absolute;cursor: pointer;top: 0;left: 0;right: 0;bottom: 0;background-color: #ccc;-webkit-transition: .4s;transition: .4s;}.slider3:before {position: absolute;content: "";height: 26px;width: 26px;left: 4px;bottom: 4px;background-color: white;-webkit-transition: .4s;transition: .4s;}input:checked + .slider3 {background-color: #2196F3;}input:focus + .slider3 {box-shadow: 0 0 1px #2196F3;}input:checked + .slider3:before {-webkit-transform: translateX(26px);-ms-transform: translateX(26px);transform: translateX(26px);}.slider3.round3 {border-radius: 34px;}.slider3.round3:before {border-radius: 50%;}
    </style>
  </head>
  <body id="page-wraper">
    <div >
      <!-- Sidebar Menu -->
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
        <div class="container">
        <div class="image"><a href="#"><img src="<?php echo $Profile ?>" alt="" /></a></div>
       
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="#section1">Profile</a></li>
                <li><a href="#section2">Certificate/s</a></li>
                <li><a href="#section3">Job Preferences</a></li>
                <li><a href="#section4">Contact Me</a></li>
				
              </ul>
            </nav>
          <form method="post">
          <ul><li><button type="submit" name="logout">Sign out</button></li></ul>
          </form>  
            <div class="copyright-text">
              <p>Copyright 2019 Reflux Design</p>
            </div>
          </div>
        </div>
   </div>
        </div>
        
         <section class="section about-me" data-section="section1">
           
        <div class="container">
          <div class="section-heading">
            <h2><?php echo strtoupper($Fullname); ?></h2>
            <div class="line-dec"></div>
            <span
              ><h3><?php echo $course; ?></h3></span
            >
          </div>
          <div class="left-image-post">
             
            <div class="row">
              <div class="col-md-6 border" >
                <div class="left-image" >
                  <img src="<?php echo $Profile ?> " alt="" />
                </div>
              <form method="post" enctype="multipart/form-data" >
                <fieldset>
                        <input type="file" name="fileToUpload" id="fileToUpload" multiple>
                        <div class="white-button">
                    <button type="submit" value="Update Profile Photo" name="upload">Update Profile Photo</button>
                  </div>
                  </fieldset>
                  </form>
                  <br>
              </div>
              <div class="col-md-6">
                <div class="right-text ">
                  <h4>Alumni/Graduate, BATCH <?php echo $Yeargraduated; ?>.</h4>
                  <p>
                    
                  </p>

                </div>
              </div>
              
            </div>
          </div>
          
          
      </section>
      <section class="section about-me" data-section="section2">
        <div class="container">
          <div class="section-heading">
            <h2>Certificates</h2>
            <div class="line-dec"></div>
            <span
              ><h3></h3></span
            >
          </div>
           <fieldset> <form method="post" enctype="multipart/form-data">  
                        <input type="file" name="imageToUpload" id="imageToUpload">
                        <div class="white-button">
                       
                    <button type="submit" value="Update Certificate Image" name="certificates">Upload Certificate Image</button>
                  </form>
                  </div>
            
           
                  </fieldset>
          <div class="col-md-12 row">
             <?php
             $queryCertificate = "Select images from certificate where username='$ausername'";
            $sqlCertificate = mysqli_query($connection, $queryCertificate);
              while($Certificate = mysqli_fetch_array($sqlCertificate)) { ?>
            
                <div class="col-md-6 mt-2" ><img src="<?php echo $Certificate['images']; ?>" /></div>
               <?php } ?> 
                  <br>
          </div>
          
          
      </section>


      <section class="section my-work" data-section="section3">

     <div class="right-content">
       
          <div class="section-heading">
            
            <h2>Job Preferences</h2>
            <div class="line-dec"></div>
       <br><br>
          <div class="row">
              <label class="col-md-6"><H3 type="text" class="middle-center"><?php if($Jobs==""){echo "Unemployed";}else{ echo $Jobs;}?></H3>Current Job</label>
              <label class="col-md-3"><H3 type="text" class="middle-center"><?php if($employment==""){echo "N/A";}else{echo $employment;}?> </H3>Present Employment Status</label>
              <label class="col-md-3"><H3 type="text"class="middle-center"><?php if($related=="Yes"){ echo "Related";} else { echo "Not Related";}?></H3>Course Related</label>
                <div class="col-md-12">
            <br>
                      <fieldset>
                <button onclick="shown()">Show Job Pane</button>
                 <div class="cr1" >
          <div class="ct2" id="uJob" style="visibility:hidden;">
                <form style="font-size:16px" id="" method="post" >                       
                 <div class="container-fluid">
          <h4 style="text-align:center;" class="col-md-12">Recent Jobs</h4>
            <div class="row">
                     <button id="form-submit" class="button" name="addjob" type="submit">Update Employment Preferences</button>
                     <hr>
                </form>
                <table class="table" style="border:1px solid #000">
               <thead> <tr style="color:black;font-size:.9rem;text-align:center;">
               <th style="align:center;border:1px solid #000" bgcolor="aqua" class="md-12">POSITION</th>
               <th style="align:center;border:1px solid #000" bgcolor="#b9e4e3" class="md-12">YEAR</th>
               <th style="align:center;border:1px solid #000" bgcolor="aqua" class="md-12">COMPANY</th>
                </tr>
                <tr>
                <?php while($result = mysqli_fetch_array($sqlJob)) { ?>
               <td style="align:center;color:black;border:1px solid #000" bgcolor="aqua" class="md-12"><?php echo $result['position'];?></td>
               <td style="align:center;color:black;border:1px solid #000" bgcolor="#b9e4e3" class="md-12"><?php echo $result['year'];?></td>
               <td style="align:center;color:black;border:1px solid #000" bgcolor="aqua" class="md-12"><?php echo $result['company'];?></td>
                </tr>
                  <?php } ?> 
                </table>
               </div></div>

        </div>
                </fieldset></div>
          </div></div>
         
      </section>
<script>
       function shown() {
         var x = document.getElementById("uJob");
         if (x.style.visibility === "hidden") {
         x.style.visibility = "visible";
          } else {
          x.style.visibility = "hidden";}
}
</script>
    

      <section class="section contact-me" data-section="section4">
        <div class="container">
          <div class="section-heading">
            <h2>Contact Details</h2>
            <div class="line-dec"></div>
          </div>
          <div class="row">
            <div class="right-content">
              <div class="container">
                <form id="contact" method="post">
                  <div class="row">
                   <div class="col-md-6">
                      <fieldset>
                        <input
                          name="cnumber"
                          type="number"
                          class="form-control"
                          id="cnumber"
                          placeholder="Contact Number"
                          required=""
                          Value="<?php echo $Cnumber;?>"
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input
                          name="email"
                          type="text"
                          class="form-control"
                          id="email"
                          placeholder="Email Address"
                         Value="<?php echo $Email;?>"
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input
                          name="address"
                          type="text"
                          class="form-control"
                          id="subject"
                          placeholder="Address"
                          required=""
                          Value="<?php echo $Address;?>"
                        />
                      </fieldset>
                    </div>
                
                    <div class="col-md-12">
            <br>
                      <fieldset>
                        <button id="form-submit" class="button"
                        type="submit" name="ContactDetail">
                          Update Contact Details
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

       <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
      //according to loftblog tut
      $(".main-menu li:first").addClass("active");

      var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
          reqSection = $(".section").filter(
            '[data-section="' + direction + '"]'
          ),
          reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
          $("body, html").animate(
            {
              scrollTop: reqSectionPos
            },
            800
          );
        } else {
          $("body, html").scrollTop(reqSectionPos);
        }
      };

      var checkSection = function checkSection() {
        $(".section").each(function() {
          var $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
          if (topEdge < wScroll && bottomEdge > wScroll) {
            var currentId = $this.data("section"),
              reqLink = $("a").filter("[href*=\\#" + currentId + "]");
            reqLink
              .closest("li")
              .addClass("active")
              .siblings()
              .removeClass("active");
          }
        });
      };

      $(".main-menu").on("click", "a", function(e) {
        e.preventDefault();
        showSection($(this).attr("href"), true);
      });

      $(window).scroll(function() {
        checkSection();
      });
    </script>
   
  </body>
</html>
