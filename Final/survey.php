<?php
	require ('./.database.php');
	
session_start();
	if (isset($_SESSION["username"])){
		$username = $_SESSION["username"];
        $action=$_SESSION["action"];
          if($action=="save"){
                 
    $homepage="./";
  }else {$homepage="./myprofile.php";
  
  }
  $sqlresult= mysqli_query($connection, "select * from alumni where username='$username'");
   
   if($row=mysqli_fetch_assoc($sqlresult)){
            $lname=$row['Lname'];
            $fname=$row['Fname'];
            $mname=$row['Mname'];
      $civilstatus=$row['civilstatus'];
           $course=$row['course'];
    $yeargraduated=$row['Yeargraduated'];
          $cnumber=$row['Cnumber'];
           $fbname=$row['fbname'];
            $email=$row['Email'];
	}}else{header("Location:./");}
if (isset($_POST["submitsurvey"])) {
$employmentstatus=$_POST["employment"];
$employedspecify=$_POST["employed"];
$aftergraduated=$_POST["aftergraduated"];
$unemployedspecify=$_POST["unemployed"];
if ($_POST["related"]==""){$related="No";}else{$related=$_POST["related"];}
$relatedspecify=$_POST["specificareas"];
$notrelatedreason=$_POST["notrelatedreason1"]."/".$_POST["notrelatedreason2"]."/".$_POST["notrelatedreason3"];
$jobtitlespecific=$_POST["jobtitle"];
$companyname=$_POST["companyname"];
$companyaddress=$_POST["companyaddress"];
$agree=$_POST["agree"];

  if ($action=="save"){ 
  $querysurvey= "insert into survey (username,lname,fname,mname,civilstatus,course,yeargraduated,cnumber,fbname,email,employmentstatus,aftergraduated,relatedspecify,unemployedspecify,related,notrelatedreason,jobtitlespecific,companyname,companyaddress,agree,employedspecify) values ('$username','$lname','$fname','$mname','$civilstatus','$course','$yeargraduated','$cnumber','$fbname','$email','$employmentstatus','$aftergraduated','$relatedspecify','$unemployedspecify','$related','$notrelatedreason','$jobtitlespecific','$companyname','$companyaddress','$agree','$employedspecify')";
      $sqlsurvey= mysqli_query($connection,$querysurvey);} else {

        $querysurvey= "update survey set employmentstatus='$employmentstatus',aftergraduated='$aftergraduated',relatedspecify='$relatedspecify',unemployedspecify='$unemployedspecify',related='$related',notrelatedreason='$notrelatedreason',jobtitlespecific='$jobtitlespecific',companyname='$companyname',companyaddress='$companyaddress',agree='$agree',employedspecify='$employedspecify' where username='$username'";
      $sqlsurvey= mysqli_query($connection,$querysurvey);
      }

       {$jobdetail = "Update alumni set Job='$jobtitlespecific', Employment='$employmentstatus',Related='$related' where username='$username'";
		$result = mysqli_query($connection,$jobdetail);}

    $YearofDate=date("Y");
         if($employmentstatus=="Employed"){
        $jobquery = "insert into job (username,position,year,company) values ('$username','$jobtitlespecific','$YearofDate','$companyname')";
		$job_result = mysqli_query($connection,$jobquery);} 
    	

    {session_start();
			$_SESSION["ausername"]=$username;
			session_write_close();
			header("Location: myprofile.php");}
		
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="initial-scale=1, maximum-scale=1">
     <title>RSU Alumni Information Survey</title>
     <meta name="keywords" content="">
     <meta name="description" content="">
     <meta name="author" content="">	
     <link rel="stylesheet" type="text/css" href="./cron/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="./cron/css/style.css">
     <link rel="stylesheet" href="./cron/css/responsive.css">
     <link rel="icon" href="./cron/images/fevicon.png" type="image/gif" />
     <link rel="stylesheet" href="./cron/css/jquery.mCustomScrollbar.min.css">
     <link rel="stylesheet" href="./cron/css/font-awesome.css">
     <link rel="stylesheet" href="./cron/css/owl.carousel.min.css">
     <link rel="stylesheet" href="./cron/css/owl.theme.default.min.css">
     <link rel="stylesheet" href="./cron/css/jquery.fancybox.min.css" media="screen">

     </head>
<body>
	<div class="header_main">
		<div class="container">
		  <div class="logo col-md-12"><a href="./" class="col-md-4"><img src="./cron/logorsu.png" alt="RSU" width="150" height="140" style="margin-left:01;margin-top:2;width:150px;height:150px;"/><img class="col-md-8" src="./cron/images/logo.png"/></a>
		  </div></div></div>
    <div class="banner-main">
    	<div class="container">
           <div id="main_slider" class="carousel slide" data-ride="carousel">  
           <!-- The slideshow -->
           				 <div class="carousel-inner">
              			     <div class="carousel-item active">
    		    				<div class="titlepage-h1">
    	        				<h1 class="bnner_title"><br>
    	        				<span style="color: white">Online Memento: An Alumni E. Profile</span></h1>
    		   			      </div>
    		   			  <div class="btn_main">
            </div>
          </div>
   
        
    </div>
    </div>
    </div></div>
  <div class="services_main">
    	<div class="container">
            	<div class="container"><div class="row" ><button class="form-check-inline"><a href="<?php echo $homepage; ?>"style="color:Black;" ><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 48 48"><g><path id="path1" transform="rotate(0,24,24) translate(0,0.330748558044434) scale(1.5,1.5)  " fill="#072833" d="M16.017856,7.9149963L27.038898,17.733009 27.038898,30.457012C27.038898,30.958004 26.737896,31.258007 26.436891,31.358013 26.136896,31.559002 25.835892,31.559002 25.535887,31.559002L19.62487,31.559002C19.423866,31.559002 19.223869,31.459011 19.123869,31.358013 19.02387,31.258007 18.922865,31.05801 18.922865,30.857006L18.922865,24.746011 13.011848,24.746011 13.011848,30.857006C13.011848,31.05801 12.91185,31.258007 12.811843,31.358013 12.711844,31.459011 12.510847,31.559002 12.310841,31.559002L6.3998249,31.559002C6.0998209,31.559002 5.7988175,31.459011 5.4978211,31.358013 5.2978161,31.258007 4.9968203,30.958004 4.9968203,30.457012L4.9968203,17.833z M16.017856,0C16.518858,1.4456054E-07,17.019857,0.19999716,17.42086,0.50099231L31.346912,13.024007C32.147919,13.826009 32.247917,15.028005 31.446913,15.929998 30.644907,16.731008 29.342909,16.830999 28.540903,16.030004L16.017856,4.8089925 3.4948159,15.929998C3.0938135,16.330007 2.5928121,16.431005 2.0918112,16.431005 1.4908033,16.431005 0.989802,16.230001 0.58879947,15.729009 -0.21219814,15.028005 -0.21219814,13.726003 0.68879842,13.024007L14.614851,0.50099231C15.015853,0.19999716,15.516854,1.4456054E-07,16.017856,0z" /></g></svg>
Back to Home</a></button></div>
    		<div class="creative_taital">
    			<h1 class="creative_text">Online Memento: An Alumni E. Profile</h1>
    		   		<div class="lets_touch_main row">
              <div class="col-12">    
<form style="font-size:16px" id="" method="post" >                       
               <h4 style="text-align:center;color:white;"class="creative_text">RSU-Romblon Campus Alumni Information</h4>
                 <div class="container-fluid">



<div class="col-md-12 mb-2 input-group">Present Employment Status (Checked if Employed)
<div class="col-md-12 form-check ml-4">
  <input class="form-check-input" type="Checkbox" id="employment" name="employment" value="Employed" onclick="shown()">
<label class="form-check-label" for="employment">Employed</label>
</div>

<div class="row col-md-12" id="em" style="display:none;">If Employed, pls. Specify
<input class="form-check-input" type="hidden" id="employed" name="employed" value="">
<div class="col-md-12 form-check ml-4">
  <input class="form-check-input" type="radio" id="employed" name="employed" value="Government">
  <label class="form-check-label" for="employed">Employed locally (Government)</label>
</div>
<div class="col-md-12 form-check ml-4">
  <input class="form-check-input" type="radio" id="employed" name="employed" value="Private">
  <label class="form-check-label" for="employed">Employed locally (Private)</label>
</div>
<div class="col-md-12 form-check ml-4">
  <input class="form-check-input" type="radio" id="employed" name="employed" value="Employed in a Foreign Country">
  <label class="form-check-label" for="employed">Employed in a Foreign Country</label>
</div>
<div class="col-md-12 form-check ml-4 mb-2">
  <input class="form-check-input" type="radio" id="employed" name="employed" value="Self-Employed">
  <label class="form-check-label" for="employed">Self-Employed</label>
</div></div>

<div class="row col-md-12"id="em1" style="display:none;">(If Currently employed) How long did it take you to land your first job after graduating from college?
<div class="col-md-12 form-check ml-4">
<input class="form-check-input" type="hidden" id="aftergraduated" name="aftergraduated" value="">
  <input class="form-check-input" type="radio" id="aftergraduated" name="aftergraduated" value="Less Than 6 Months">
  <label class="form-check-label" for="aftergraduated">Less Than 6 Months</label>
</div>
<div class="col-md-12 form-check ml-4">
  <input class="form-check-input" type="radio" id="aftergraduated" name="aftergraduated" value="6 Months to 1 Year">
  <label class="form-check-label" for="aftergraduated">6 Months to 1 Year</label>
</div>
<div class="col-md-12 form-check ml-4">
  <input class="form-check-input" type="radio" id="aftergraduated" name="aftergraduated" value="1 Year to 2 Years">
  <label class="form-check-label" for="aftergraduated">1 Year to 2 Years</label>
</div>

<div class="col-md-12 form-check ml-4 mb-2"id="em2" style="display:none;">
  <input class="form-check-input" type="radio" id="aftergraduated" name="aftergraduated" value="More Than 2 Years">
  <label class="form-check-label" for="aftergraduated">More Than 2 Years</label>
</div></div>

<div class="row ml-1" id="unem1" style="display:block;">If Unemployed pls. checked and Specify



<div class="col-12 ml-4">
<input class="form-check-input" type="hidden" id="unemployed" name="unemployed" value="">
  <input class="form-check-input" type="radio" id="unemployed" name="unemployed" value="1">
  <label class="form-check-label" for="unemployed">Never been Employed Before</label>
</div>
<div class="col-md-12 ml-4 mb-2" >
  <input class="form-check-input" type="radio" id="unemployed" name="unemployed" value="2">
  <label class="form-check-label" for="unemployed">Resigned/Laid Off/Separated from Previous Employment</label>
</div></div>

<div class="col-md-12 mb-2" id="em3" style="display:none;">
 
  <input class="form-check-input" type="checkbox" id="related" name="related"value="Yes" onclick="notrel()">
  <label class="form-check-label" for="related">Course Related (Check if Related)</label>
  
</div>

<div class="col-md-12 mb-2" id="em4" style="display:none;">
<div style="text-align:center">
   <input class="form-control email-bt" style="background-color:white;color:black;" name="specificareas"type="text"id="specificareas"placeholder="Course Related Specific Areas"/>
  <label style="text-align:center;">Course Related Specific Areas</label></div></div>

<div class="col-md-12 mb-2 row" id="em8" style="display:none;">If No, what are the reasons behind your taking a job that is not related to your field of training in college?
  <div class="ml-5" >
  <input class="form-check-input" type="hidden" id="notrelatedreason1" name="notrelatedreason1"value="No">
  <input class="form-check-input" type="checkbox" id="notrelatedreason1" name="notrelatedreason1"value="Yes">
  <label class="form-check-label" for="notrelatedreason1">I could not get a satisfactory job in my field of training; either the pay is low or I do not like the job available.</label></div>
  <div class="ml-5">
  <input class="form-check-input" type="hidden" id="notrelatedreason2" name="notrelatedreason2"value="No">
  <input class="form-check-input" type="checkbox" id="notrelatedreason2" name="notrelatedreason2"value="Yes">
  <label class="form-check-label" for="notrelatedreason2">My Training is inadequate; I could not compete with other graduates from other universities in the same field.</label></div>
  <div class="ml-5">
  <input class="form-check-input" type="hidden" id="notrelatedreason3" name="notrelatedreason3"value="No">
  <input class="form-check-input" type="checkbox" id="notrelatedreason3" name="notrelatedreason3" value="Yes">
  <label class="form-check-label" for="notrelatedreason3">There was an opening in this field which I immediately applied for.</label></div>
</div>

<div class="row col-md-12"id="em5" style="display:none;">
  <div class="col-md-12"style="text-align:center">
  <input class="form-control email-bt" style="background-color:white;color:black;"name="jobtitle"type="text"id="jobtitle"placeholder="Specific Job Title/Job Description"/>
  <label >Specific Job Title/Job Description</label>
  </div>

  <div class="col-md-12"style="text-align:center">
  <input style="background-color:white;color:black;"type="text"class="email-bt form-control"id="companyname" name="companyname"placeholder="Company Name"/>
  <label style="text-align:center">Company Name</label></div>
  <div class="col-md-12"style="text-align:center">
  <input style="background-color:white;color:black;"type="text"class="email-bt form-control"id="companyaddress" name="companyaddress"placeholder="Company Address"/>
  <label style="text-align:center">Company Address</label></div>
</div>
<div class="col-md-12 mb-2 border">
  <input class="form-check-input ml-1" type="checkbox" id="agree" name="agree" value="Yes"required=""><label class="form-check-label ml-4" for="agree">
I certify that the information I supplied above is true and accurate. I provide this information voluntarily and in my own interest.</label>
</div>
<script type="text/javascript">
       function shown() {

  var checkBox = document.getElementById("employment");
  
  var text1 = document.getElementById("unem1");

    var texte = document.getElementById("em");
  var texte1 = document.getElementById("em1");
      var texte2 = document.getElementById("em2");
  var texte3 = document.getElementById("em3");
      var texte5 = document.getElementById("em5");
  var texte8 = document.getElementById("em8");
  
  if (checkBox.checked == true){
   
    text1.style.display = "none";
  } else {
  
    text1.style.display = "block";
  }
  if (checkBox.checked == true){
    texte.style.display = "block";
    texte1.style.display = "block";
    texte2.style.display = "block";
    texte3.style.display = "block";
    texte5.style.display = "block";
    texte8.style.display = "block";
  } else {
    texte.style.display = "none";
    texte1.style.display = "none";
    texte2.style.display = "none";
    texte3.style.display = "none";
    texte5.style.display = "none";
    texte8.style.display = "none";
  }
          }

</script>
<script type="text/javascript">
function notrel(){
var rel = document.getElementById("related");
var specificarea = document.getElementById("em4");
var reasonnot = document.getElementById("em8");

if (rel.checked == true){
    reasonnot.style.display = "none";
  specificarea.style.display = "block";
  } else {
    reasonnot.style.display = "block";
     specificarea.style.display = "none";
    }

if (rel.checked == true){

   
  } else {
  
    
  }
}
</script>
 <center><button class="button btn" style="background-color:#9a1724;color:white;"name="submitsurvey" type="submit">Submit</button></center>
                     <hr>
                </form>
		</div></div>
		
	 <div class="col-12" id="login">
                    <div class="input_main">


	
			 <h2><span>Please reach out to us if you are having technical difficulties or you need a question answered.<br> <br>You can contact our Admin 0946-672-4368.</span></h2>
    </div></div><br><br>
			
   <div class="container">
                            <div class="form-group">
								  <div class="input_main">
									  <hr>
								  
            <h1 class="touch_text">Alumni Information</h1>
       
						<br><h1>
<center>
The main purpose of this is to track the graduate of Romblon State University-Romblon Campus. (We will not, in any circumstances, share your personal informationwith other individuals or organizations without your pemission, including public organizations, corporations or individuals, except when applicable by law. We do not sell, communicate or divulge your information to any mailing lists.)
</center></h1> </div></div></div>	
								<br></div></div></div></div>
                   
    <div class="copyright">
        <div class="container" id="cot">
            <div class="row">
                <div class="col-sm-12">
                   <p class="copyright_text">© 2021 All Rights Reserved. Web-based Tracer System for RSU Romblon Campus
                </div>
            </div>
        </div>
    </div>
      <!-- Javascript files-->
      <script src="./cron/js/jquery.min.js"></script>
      <script src="./cron/js/popper.min.js"></script>
      <script src="./cron/js/bootstrap.bundle.min.js"></script>
</body>
                    
</html>
<script>
       function verifyHide() {
         var x = document.getElementById("verifiers");
         if (x.style.display === "none") {
         x.style.display = "block";
          } else {
          x.style.display = "none";}
}
</script>