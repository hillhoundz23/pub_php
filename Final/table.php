<?php
require ('./database.php');
$profile_result=mysqli_query($connection,"Select CONCAT(Fname,' ',Mname,' ',Lname) as Fullname, Birthdate, Gender, Yeargraduated, Address, Cnumber, Job,Employment,Related, Email,Profile, Gallery from alumni where Username = '$ausername'");
if($rows=mysqli_fetch_assoc($profile_result));
{
$Fullname=$rows['Fullname'];
$Age=$rows['Birthdate'];
$Gender=$rows['Gender'];
$Yeargraduated=$rows['Yeargraduated'];
$Address=$rows['Address'];
$Cnumber=$rows['Cnumber'];

$Jobs=$rows['Job'];
$employment=$rows['Employment'];
$related=$rows['Related'];
$Email=$rows['Email'];
$Profile=$rows['Profile'];
$Gallery=$rows['Gallery'];	
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
if(isset($_POST["jobdetail"])) {
      $latestjob = $_POST["currentjob"];
      $employment=$_POST["employment"];
     if ($employment=="Unemployed"){$related="";}else{ $related=$_POST["related"];}
     
    	$jobdetail = "Update alumni set job='$latestjob',employment='$employment',related='$related' where username='$ausername'";
		$result = mysqli_query($connection,$jobdetail);
    header("Location: myprofile.php");
    }
?>
<section class="section my-services" data-section="section2">
        <div class="container">
          <div class="section-heading">
            <h2>Job Preferences</h2>
            <div class="line-dec"></div>
          <div class="row col-md-12">
            <div class="right-content">
              <div class="container">
               <h4>Current Job</h4>
                  <div class="row ">
                   <div class="col-md-6 middle-center">
                      <fieldset>
                        <label
                          type="text"
                          class="form-control"
                          id="currentjob"
                        ><?php echo $Jobs;?></label>
                      </fieldset>
                  </div>
                   
                    <div class="middle-center <?php if($employment=="Employed"){echo "col-md-3";} else { echo "col-md-6";} ?>" >
                    <fieldset>
                     <label
                          type="text"
                          class="form-control"><?php echo $employment;?></label>
                     </fieldset>
                    </div>
                    
                    <div class="middle-center col-md-3">
                    <fieldset>
                     <label
                          type="text"
                          class="form-control"><?php if($related=="Yes"){ echo "Related";} else { echo "Not Related";}?></label>
                     </fieldset>
                     
                  </div>
                  
                   <fieldset>
<div>
                       <button id="form-submit"  class="button" onclick="shown()">Show Update Pane</button>
                       </div></fieldset>
                    <div class="col-md-12">
            <br>
                      <fieldset>

          <div class="cr1" >
          <div class="ct2" id="uJob" style="visibility:hidden;">
          <div class="row">
            <div class="right-content">
              <div class="container  col-md-12">
                <form id="contact" method="post" >
               <h4>Current Job</h4>
                  <div class="row">
                   <div class="col-md-4 middle-center">
                      <fieldset>
                      <label class="col-md-12">Position
                        <input
                          name="currentjob"
                          type="text"
                          class="form-control col-md-12"
                          id="currentjob"
                          placeholder="Current Job"
                          required=""
                          Value="<?php echo $Jobs;?>"
                        /></label>
                      </fieldset>
                  </div>
                  <div class="col-md-2 middle-center">
                      <fieldset>
                      <label>Year
                        <input
                          name="currentjobyear"
                          type="text"
                          class="form-control"
                          id="currentjobyear"
                          placeholder="Year"
                          required=""
                          Value=""
                        /></label>
                      </fieldset>
                  </div>
                  <div class="col-md-6 middle-center">
                      <fieldset>
                      <label class="col-md-12">Company
                        <input
                          name="currentjobcompany"
                          type="text"
                          class="form-control"
                          id="currentjobcompany"
                          placeholder="Company"
                          required=""
                          Value=""
                        /></label>
                      </fieldset>
                  </div></div>

                   <div class="row col-md-12">
                    <div class="col-md-3 middle-center" >
                    <fieldset>
                     <select type="text" name ="employment" class="form-control" style="background-color: rgba(250,250,250,0.1);border: 1px solid rgba(250,250,250,1);border-radius: 0px;color: #fff;font-size: 14px;width: 100%;padding-left: 15px;" required="">
                        <option disabled selected class="form-control" style="color:grey;">Employment Status</option>
                      
                       <?php if($employment=='Employed'){$Emps = 'Selected="True"'; $Umps='';} else {
                         $Emps =''; $Umps='Selected="True"';} ?>

                        <option value="Employed" <?php echo $Emps; ?> class="form-control">Employed</option>
                        <option value="Unemployed" <?php echo $Umps; ?> class="form-control">Unemployed</option></select>
                     </fieldset>
                    </div>
                    <div class="col-md-3 middle-center" >
                    <fieldset>
                     <select type="text" name ="related" class="form-control" style="background-color: rgba(250,250,250,0.1);border: 1px solid rgba(250,250,250,1);border-radius: 0px;color: #fff;font-size: 14px;width: 100%;padding-left: 15px;" required="">
                        <option disabled selected class="form-control" style="color:grey;">BSIT Related?</option>
                       <?php if($related=='Yes'){$Ry = 'Selected="True"'; $Rn='';} else {
                         $Ry =''; $Rn='Selected="True"';} ?>  
                        <option value="Yes" <?php echo $Ry;?> class="form-control">Yes</option>
                        <option value="No"  <?php echo $Rn;?> class="form-control">No</option></select>
                     </fieldset>
                    </div></div>
                   <div class="row col-md-12">
                    <div class="col-md-12 mt-4">
                     <h4>Earlier Jobs</h4></div>
                    <div class="col-md-4">
                      <fieldset>
                        <input
                          name="otherjob1"
                          type="text"
                          class="form-control"
                        
                          placeholder="Earlier Job"
                         Value="<?php if(empty($Jobs)){} else echo $Jobs;?>"
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-2">
                      <fieldset>
                        <input
                          name="otherjobYear"
                          type="text"
                          class="form-control"
                        
                          placeholder="Year"
                         Value=""
                          required=""
                        />
                      </fieldset>
                    </div>
                      <div class="col-md-6">
                      <fieldset>
                        <input
                          name="otherjobCompany"
                          type="text"
                          class="form-control"
                        
                          placeholder="Company"
                         Value=""
                          required=""
                        />
                      </fieldset>
                    </div>
                    </div>
                   <div class="row col-md-12">
                    <div class="col-md-12">
                      <fieldset>
                        <input
                          name="otherjob2"
                          type="text"
                          class="form-control"
                          id="otherjob2"
                          placeholder="Earlier Job"
                          required=""
                          Value="<?php if(empty($Jobs)){} else echo $Jobs;?>"/>
                      </fieldset>
                    </div>
                     <div class="col-md-12">
                      <fieldset>
                        <input
                          name="otherjob2"
                          type="text"
                          class="form-control"
                          id="otherjob2"
                          placeholder="Earlier Job"
                          required=""
                          Value="<?php if(empty($Jobs)){} else echo $Jobs;?>"/>
                      </fieldset>
                    </div>
                 <div class="col-md-12">
                      <fieldset>
                        <input
                          name="otherjob3"
                          type="text"
                          class="form-control"
                          id="otherjob3"
                          placeholder="Earlier Job"
                          required=""
                          Value="<?php if(empty($Jobs)){} else echo $Jobs;?>"
                        />
                      </fieldset>
                    </div>
                     <div class="col-md-12">
                      <fieldset>
                        <input
                          name="otherjob4"
                          type="text"
                          class="form-control"
                          id="otherjob4"
                          placeholder="Earlier Job"
                          required=""
                          Value="<?php if(empty($Jobs)){} else echo $Jobs;?>"
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
            <br>
                      <fieldset>
                        <button id="form-submit"  class="button"
                        type="submit" name="jobdetail">
                          Update Jobs Details
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
<script>
       function shown() {
         var x = document.getElementById("uJob");
         if (x.style.visibility === "hidden") {
         x.style.visibility = "visible";
          } else {
          x.style.visibility = "hidden";}
}
</script>
</div></div>

        </div>
        </div>
        
      </section>