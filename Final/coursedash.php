<?php 
session_start();
if (isset($_SESSION["Type"])){
	$course=$_SESSION["Type"];
  $ausername=$_SESSION["ausername"];
	session_write_close();}	
  if($course=="bsit"){
    $FullCourse = "Bachelor of Science in Information Technology";
  } else if($course=="bsba") {
    $FullCourse="Bachelor of Science in Business Administration";
  }else if($course=="bsed") {
    $FullCourse="Bachelor of Secondary Education";
  }else if($course=="beed") {
    $FullCourse="Bachelor of Education in Elementary Education";
  } else {
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
        exit;}
  }
require ('./.database.php');

if ($result=mysqli_query($connection,"select(select count(id) from alumni where course='$course') as ta")){
  if($row=mysqli_fetch_assoc($result)){
    $ta= $row["ta"];
   } 
if($searchverified=mysqli_query($connection,"select (select count(verified) from alumni  where verified='Yes' and course='$course') as verified,(select count(verified) from alumni  where verified='' and course='$course') as nonverified"))
  $vrow=mysqli_fetch_assoc($searchverified);{
    
    $nonregs=$vrow["nonverified"];
   
  }
if($surveyResult=mysqli_query($connection, "select (select count(civilstatus) from survey where civilstatus='Single' and course='$course') as single,
(select count(civilstatus) from survey where civilstatus='Married' and course='$course') as married,
(select count(civilstatus) from survey where civilstatus='Widowed' and course='$course') as widowed,
(select count(civilstatus) from survey where civilstatus='Divorced' and course='$course') as divorced,
(select count(employedspecify) from survey where employedspecify='Government' and course='$course') as government,
(select count(employedspecify) from survey where employedspecify='Private' and course='$course') as private,
(select count(employedspecify) from survey where employedspecify='Employed in a Foreign Country' and course='$course') as employedforeign,
(select count(employedspecify) from survey where employedspecify='Self-Employed' and course='$course') as selfemployed,
(select count(aftergraduated) from survey where aftergraduated='Less Than 6 Months' and course='$course') as 6months,
(select count(aftergraduated) from survey where aftergraduated='6 Months to 1 Year' and course='$course') as 61months ,
(select count(aftergraduated) from survey where aftergraduated='1 Year to 2 Years' and course='$course') as 12months,
(select count(aftergraduated) from survey where aftergraduated='More Than 2 Years' and course='$course') as 2years,
(select count(unemployedspecify) from survey where unemployedspecify='1' and  course='$course') as neveremployed,
(select count(unemployedspecify) from survey where unemployedspecify ='2' and course='$course') as resigned,
(select count(related) from survey where course='$course' and employedspecify<>'' and related='yes') as tr,
(select count(related) from survey where course='$course' and employedspecify<>'' and related='') as tn,
(select count(agree) from survey  where agree='Yes' and course='$course') as agree,
(select count(agree) from survey  where agree='' and course='$course') as disagree,
(select count(employmentstatus) from survey where course='$course' and employmentstatus='') as tu,
(select count(employmentstatus) from survey where course='$course' and employmentstatus='employed') as te,


(SELECT count(notrelatedreason) from survey where substring_index(notrelatedreason,'/',1)='Yes' and course='$course') as reason1,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-2),'/',1)='Yes' and course='$course') as reason2,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-1),'/',1)='Yes' and course='$course') as reason3"))
     
      $grow= mysqli_fetch_assoc($surveyResult);{
        $single=$grow["single"];
        $married=$grow["married"];
                $widowed=$grow["widowed"];
        $divorced=$grow["divorced"];
        $government=$grow["government"];
        $private=$grow["private"];
        $employedforeign=$grow["employedforeign"];
        $selfemployed=$grow["selfemployed"];
        $months6=$grow["6months"];
        $months61=$grow["61months"];
        $months12=$grow["12months"];
        $years2=$grow["2years"];
         $neveremployed=$grow["neveremployed"];
         $resigned=$grow["resigned"];
         $reason1=$grow["reason1"];
        $reason2=$grow["reason2"];
        $reason3=$grow["reason3"];
        $tr= $grow["tr"];
    $tn= $grow["tn"];
    $regs=$grow["agree"];
    $nonregs=$grow["disagree"];
    $tu= $grow["tu"];
        $te= $grow["te"];}

     mysqli_free_result($result);}
     mysqli_close($connection);

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

if(isset($_POST["upass"])) { 
         
         $cpassword=$_POST["cpassword"]; 
         $npassword=$_POST["npassword"];
         $rpassword=$_POST["rpassword"];
         $queryp="select password from useraccount where username='$ausername'";
        $resultsp=mysqli_query($connection,$queryp);
	      if($row=mysqli_fetch_assoc($resultsp)){
          $cpass=$row['password'];
          if($cpass==$cpassword){
            if($npassword==$rpassword){
            $passup = "Update useraccount set password='$rpassword' where username='$ausername'";
		        $result = mysqli_query($connection,$passup);
            $url = "./";
        header("Location: $url");
        exit;
            }
            else {echo 'Password Not Matched!';}
          }else {echo 'Current Passwords Not Matched';}
        }else {echo 'No Data Entry';}
        
        }

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Dashboard</title>

      <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/offcanvas/">
      <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-bottom/">
    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="assets/css/templatemo-style.css" />
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="assets/dist/js/bootstrap.min.js"></script>
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap-dropdownhover.min.js"></script>
<link href="assets/dist/css/animate.min.css" rel="stylesheet">
    <link href="assets/dist/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
  <style>

}
       ul {color: white;padding: 4px;font-size: 16px;border: none;border-radius:3px; display:inline-block;position: inline;}
ul:hover a:hover { background-color:#17a2b8;; color:white;border-radius:3px;}      
.bd-placeholder-img { 
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }.navbar{background-color:#212529}
    </style>
    <!-- Custom styles for this template -->
    <link href="vendor/bootstrap/css/offcanvas.css" rel="stylesheet">
    <nav style="height:100px;" class="navbar navbar-expand-lg fixed-top navbar-dark">
      <!-- <img class="mr-3" src="onhan 3.png" alt="" width="48" height="48"> -->
      
      <a href="./coursedash.php" class="Titles" style="Color:white;font-size:140%;"><img class="mr-3" src="logo.png" alt="" width="332" height="51"></a>
      <button  class="navbar-toggler p-0 md-4 border-0"  type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  
   <div style="margin-top:23px" class="navbar-collapse offcanvas-collapse justify-content-md-center"id="navbarCollapse"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      
      <ul class="navbar-nav dropdown">
         <a  class="nav-link font-weight-bold active" href="#"style="text-decoration: underline;color: #b3fbad" ><?php echo strtoupper($course); ?> ALUMNI DASHBOARD</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="alumniprofilemanagement.php"style="color:white">Alumni Registration</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="masterlist.php"style="color: white">Master List</a></ul>
         <ul class="navbar-nav dropdown">
         <a class="nav-link dropdown-toggle active" href="#"style="color: white">Account</a>
         <div class="dropdown-menu" aria-labelledby="dropdown01" style="width:200px;background-color:#212529">
       <form method="Post">
          <label class="btn-secondary container-fluid d-flex justify-content-md-center" for="rpassword">Update Password</label>
        <div class="dropdown-item" > 
        <Input type="password" name="cpassword" placeholder="Current Password" class="dropdown-item" style="border-radius:3px;border:1px solid Black;color:black" >
        <Input type="password" name="npassword" placeholder="Set New Password" class="dropdown-item" style="border-radius:3px;border:1px solid Black;color:black" >
        <Input type="password" name="rpassword" placeholder="Re-Type Password" class="dropdown-item" style="border-radius:3px;border:1px solid Black;color:black" >
        </div>
        <button type="submit" name="upass" class="btn-info container-fluid d-flex justify-content-md-center">Update Now</button>
        </form>
        <form method="Post"><li>
        <button  type="submit" name="logout" class="btn-danger container-fluid d-flex justify-content-md-center"> Logout</button></li>
        </form>
        </div>
        </ul>
</div>

   
   </nav>
   <style>
    .dropdown:hover .dropdown-menu{
        display: block;
    }
    .dropdown-menu{
        margin-top: 0;
    }
</style>
<script>
$(document).ready(function(){
    $(".dropdown").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("open");
        }
    });
});     
</script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/bootstrap/js/offcanvas.js"></script>
  </head>

<body class="bg justify-content-md-center" id="page-wraper">
 <div class="py-5 col">
<div class="col"id="table" >	

<table class="table" style="border:3px solid #000;text-align:center">

<thead><label class="col-12 strong font-weight-bolder" style="color:white;font-size:1.9rem;text-align:center;"><?php echo strtoupper($course); ?> Alumni Status</label></thead>
		<tr style="color:black;font-size:1.4rem;text-align:center;">
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3" class="md-12"> <?php echo $ta;?><p style="color:black;font-size:1.2rem;">Graduates</p><hr>
                                                                                <?php echo $regs;?><p style="color:black;font-size:1.2rem;">Registered</p><hr>
                                                                                <?php echo $ta-$regs;?><p style="color:black;font-size:1.2rem;">Non-Registered</p><hr>
                                                                                <?php echo $single;?><p style="color:black;font-size:1.2rem;">Single</p><hr>
                                                                                <?php echo $married;?><p style="color:black;font-size:1.2rem;">Married</p><hr>
                                                                                <?php echo $divorced;?><p style="color:black;font-size:1.2rem;">Divorced</p><hr>
                                                                                <?php echo $widowed;?><p style="color:black;font-size:1.2rem;">Widowed</p><hr>
                                                                                </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $te;?><p style="color:black;font-size:1.2rem;">Total Employed</p><hr>
                                                                                 <?php echo $government;?><p style="color:black;font-size:1.2rem;">Employed Locally (Government)</p><hr>
                                                                                 <?php echo $private;?><p style="color:black;font-size:1.2rem;">Employed Locally (Private)</p><hr>
                                                                                 <?php echo $employedforeign;?><p style="color:black;font-size:1.2rem;">Employed in foreign Country</p><hr>
                                                                                 <?php echo $selfemployed;?><p style="color:black;font-size:1.2rem;">Self-Employed</p><hr>
                                                                                 <?php echo $months6;?><p style="color:black;font-size:1.2rem;">Employed Less Than 6 Months</p><hr>
                                                                                 <?php echo $months61;?><p style="color:black;font-size:1.2rem;">6 Months to 1 Year</p><hr>
                                                                                 <?php echo $months12;?><p style="color:black;font-size:1.2rem;">Employed 1 Year to 2 Years</p><hr>
                                                                                 <?php echo $years2;?><p style="color:black;font-size:1.2rem;">More Than 2 Years</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3"  class="md-12"><?php echo $tu;?><p style="color:black;font-size:1.2rem;">Unemployed</p><hr>
                                                                                <?php echo $neveremployed;?><p style="color:black;font-size:1.2rem;">Never Been Employed</p><hr>
                                                                                <?php echo $resigned;?><p style="color:black;font-size:1.2rem;">Resigned/Laid Off/Separated</p><hr>
                                                                                  </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $tr;?><p style="color:black;font-size:1.2rem;"> Related Job</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $tn;?><p style="color:black;font-size:1.2rem;"> Not Related Job</p><hr>
                                                                                 <?php echo $reason1;?><p style="color:black;font-size:1.2rem;">Couldn't satisfied job in <br> field of training; <br>either the pay is low <br>or don't like the job available.</p><hr>
                                                                                  <?php echo $reason2;?><p style="color:black;font-size:1.2rem;">Training is inadequate;<br>couldn't compete with<br>other graduates from other<br>universities in the<br>same field.</p><hr>
                                                                                 <?php echo $reason3;?><p style="color:black;font-size:1.2rem;">There was an opening in<br>this field which I <br>immediately applied for.</p><hr>
                                                                                  </td>
 
 </tr>
  
		</table>
        </div>
      </div>
<footer class="sticky-footer">
  <style>.sticky-footer{position:sticky;top:100%;background-color: #076787;padding-top: 10px;padding-bottom: 10px;width: 100%;color: #fbfdfd;text-align: center;margin: 0px;}}</style> 
  <p class="">© 2021 All Rights Reserved. Web-based Tracer System for RSU Romblon Campus</p>
</footer>
</body>
</html>