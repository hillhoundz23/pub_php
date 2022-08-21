<?php
require ('./.database.php');
session_start();
if (isset($_SESSION["ausername"])){
	$ausername=$_SESSION["ausername"];
	session_write_close();
  }
  else{
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
        exit;}}
     
if ($result=mysqli_query($connection,"select(select count(id) from alumni where course='bsit') as bsitta,
(select count(id) from alumni where course='bsit' and employment='') as bsittu,
(select count(id) from alumni where course='bsit' and employment='employed') as bsitte,
(select count(id) from alumni where course='bsba') as bsbata,
(select count(id) from alumni where course='bsba' and employment='') as bsbatu,
(select count(id) from alumni where course='bsba' and employment='employed') as bsbate,
(select count(id) from alumni where course='bsed') as bsedta,
(select count(id) from alumni where course='bsed' and employment='') as bsedtu,
(select count(id) from alumni where course='bsed' and employment='employed') as bsedte,
(select count(id) from alumni where course='beed') as beedta,
(select count(id) from alumni where course='beed' and employment='') as beedtu,
(select count(id) from alumni where course='beed' and employment='employed') as beedte")){
  if($row=mysqli_fetch_assoc($result)){
    $bsitta= $row["bsitta"];
    $bsitte= $row["bsitte"];
    
    

    $bsbata= $row["bsbata"];
    $bsbate= $row["bsbate"];
    

	  $bsedta= $row["bsedta"];
    $bsedte= $row["bsedte"];
    

    $beedta= $row["beedta"];
    $beedte= $row["beedte"];
   } else {  }
if($searchverified=mysqli_query($connection,"select (select count(verified) from alumni  where verified='Yes' and course='bsit') as verifiedbsit,(select count(verified) from alumni  where verified='' and course='bsit') as nonverifiedbsit,(select count(verified) from alumni  where verified='Yes' and course='bsba') as verifiedbsba,(select count(verified) from alumni  where verified='' and course='bsba') as nonverifiedbsba,(select count(verified) from alumni  where verified='Yes' and course='bsed') as verifiedbsed,(select count(verified) from alumni  where verified='' and course='bsed') as nonverifiedbsed,(select count(verified) from alumni  where verified='Yes' and course='beed') as verifiedbeed,(select count(verified) from alumni  where verified='' and course='beed') as nonverifiedbeed"))
  $vrow=mysqli_fetch_assoc($searchverified);{
    
    $nonregsbsit=$vrow["nonverifiedbsit"];
    
    $nonregsbsba=$vrow["nonverifiedbsba"];
    
    $nonregsbsed=$vrow["nonverifiedbsed"];
    
    $nonregsbeed=$vrow["nonverifiedbeed"];
  }
if($surveyResult=mysqli_query($connection, "select (select count(civilstatus) from survey where civilstatus='Single' and course='bsit') as bsitsingle,
(select count(civilstatus) from survey where civilstatus='Married' and course='bsit') as bsitmarried,
(select count(civilstatus) from survey where civilstatus='Widowed' and course='bsit') as bsitwidowed,
(select count(civilstatus) from survey where civilstatus='Divorced' and course='bsit') as bsitdivorced,
(select count(employedspecify) from survey where employedspecify='Government' and course='bsit') as bsitgovernment,
(select count(employedspecify) from survey where employedspecify='Private' and course='bsit') as bsitprivate,
(select count(employedspecify) from survey where employedspecify='Employed in a Foreign Country' and course='bsit') as bsitemployedforeign,
(select count(employedspecify) from survey where employedspecify='Self-Employed' and course='bsit') as bsitselfemployed,
(select count(aftergraduated) from survey where aftergraduated='Less Than 6 Months' and course='bsit') as bsit6months,
(select count(aftergraduated) from survey where aftergraduated='6 Months to 1 Year' and course='bsit') as bsit61months ,
(select count(aftergraduated) from survey where aftergraduated='1 Year to 2 Years' and course='bsit') as bsit12months,
(select count(aftergraduated) from survey where aftergraduated='More Than 2 Years' and course='bsit') as bsit2years,
(select count(unemployedspecify) from survey where unemployedspecify='1' and  course='bsit') as bsitneveremployed,
(select count(unemployedspecify) from survey where unemployedspecify ='2' and course='bsit') as bsitresigned,
(select count(related) from survey where course='bsit' and employedspecify<>'' and related='yes') as bsittr,
(select count(related) from survey where course='bsit' and employedspecify<>'' and related='') as bsittn,
(select count(agree) from survey  where agree='Yes' and course='bsit') as agreebsit,
(select count(agree) from survey  where agree='' and course='bsit') as disagreebsit,
(select count(employmentstatus) from survey where course='bsit' and employmentstatus='') as bsittu,
(select count(employmentstatus) from survey where course='bsit' and employmentstatus='employed') as bsitte,

(select count(civilstatus) from survey where civilstatus='Single' and course='bsba') as bsbasingle,
(select count(civilstatus) from survey where civilstatus='Married' and course='bsba') as bsbamarried,
(select count(civilstatus) from survey where civilstatus='Widowed' and course='bsba') as bsbawidowed,
(select count(civilstatus) from survey where civilstatus='Divorced' and course='bsba') as bsbadivorced,
(select count(employedspecify) from survey where employedspecify='Government' and course='bsba') as bsbagovernment,
(select count(employedspecify) from survey where employedspecify='Private' and course='bsba') as bsbaprivate,
(select count(employedspecify) from survey where employedspecify='Employed in a Foreign Country' and course='bsba') as bsbaemployedforeign,
(select count(employedspecify) from survey where employedspecify='Self-Employed' and course='bsba') as bsbaselfemployed,
(select count(aftergraduated) from survey where aftergraduated='Less Than 6 Months' and course='bsba') as bsba6months,
(select count(aftergraduated) from survey where aftergraduated='6 Months to 1 Year' and course='bsba') as bsba61months ,
(select count(aftergraduated) from survey where aftergraduated='1 Year to 2 Years' and course='bsba') as bsba12months,
(select count(aftergraduated) from survey where aftergraduated='More Than 2 Years' and course='bsba') as bsba2years,
(select count(unemployedspecify) from survey where unemployedspecify='1' and  course='bsba') as bsbaneveremployed,
(select count(unemployedspecify) from survey where unemployedspecify='2' and course='bsba') as bsbaresigned,
(select count(related) from survey where course='bsba' and employedspecify<>'' and related='Yes') as bsbatr,
(select count(related) from survey where course='bsba' and employedspecify<>'' and related='') as bsbatn,
(select count(agree) from survey  where agree='Yes' and course='bsba') as agreebsba,
(select count(agree) from survey  where agree='' and course='bsba') as disagreebsba,
(select count(employmentstatus) from survey where course='bsba' and employmentstatus='') as bsbatu,
(select count(employmentstatus) from survey where course='bsba' and employmentstatus='employed') as bsbate,

(select count(civilstatus) from survey where civilstatus='Single' and course='bsed') as bsedsingle,
(select count(civilstatus) from survey where civilstatus='Married' and course='bsed') as bsedmarried,
(select count(civilstatus) from survey where civilstatus='Widowed' and course='bsed') as bsedwidowed,
(select count(civilstatus) from survey where civilstatus='Divorced' and course='bsed') as bseddivorced,
(select count(employedspecify) from survey where employedspecify='Government' and course='bsed') as bsedgovernment,
(select count(employedspecify) from survey where employedspecify='Private' and course='bsed') as bsedprivate,
(select count(employedspecify) from survey where employedspecify='Employed in a Foreign Country' and course='bsed') as bsedemployedforeign,
(select count(employedspecify) from survey where employedspecify='Self-Employed' and course='bsed') as bsedselfemployed,
(select count(aftergraduated) from survey where aftergraduated='Less Than 6 Months' and course='bsed') as bsed6months,
(select count(aftergraduated) from survey where aftergraduated='6 Months to 1 Year' and course='bsed') as bsed61months ,
(select count(aftergraduated) from survey where aftergraduated='1 Year to 2 Years' and course='bsed') as bsed12months,
(select count(aftergraduated) from survey where aftergraduated='More Than 2 Years' and course='bsed') as bsed2years,
(select count(unemployedspecify) from survey where unemployedspecify='1' and  course='bsed') as bsedneveremployed,
(select count(unemployedspecify) from survey where unemployedspecify='2' and course='bsed') as bsedresigned,
(select count(related) from survey where course='bsed' and employedspecify<>'' and related='Yes') as bsedtr,
(select count(related) from survey where course='bsed' and employedspecify<>'' and related='') as bsedtn,
(select count(agree) from survey  where agree='Yes' and course='bsed') as agreebsed,
(select count(agree) from survey  where agree='' and course='bsed') as disagreebsed,
(select count(employmentstatus) from survey where course='bsed' and employmentstatus='') as bsedtu,
(select count(employmentstatus) from survey where course='bsed' and employmentstatus='employed') as bsedte,

(select count(civilstatus) from survey where civilstatus='Single' and course='beed') as beedsingle,
(select count(civilstatus) from survey where civilstatus='Married' and course='beed') as beedmarried,
(select count(civilstatus) from survey where civilstatus='Widowed' and course='beed') as beedwidowed,
(select count(civilstatus) from survey where civilstatus='Divorced' and course='beed') as beeddivorced,
(select count(employedspecify) from survey where employedspecify='Government' and course='beed') as beedgovernment,
(select count(employedspecify) from survey where employedspecify='Private' and course='beed') as beedprivate,
(select count(employedspecify) from survey where employedspecify='Employed in a Foreign Country' and course='beed') as beedemployedforeign,
(select count(employedspecify) from survey where employedspecify='Self-Employed' and course='beed') as beedselfemployed,
(select count(aftergraduated) from survey where aftergraduated='Less Than 6 Months' and course='beed') as beed6months,
(select count(aftergraduated) from survey where aftergraduated='6 Months to 1 Year' and course='beed') as beed61months ,
(select count(aftergraduated) from survey where aftergraduated='1 Year to 2 Years' and course='beed') as beed12months,
(select count(aftergraduated) from survey where aftergraduated='More Than 2 Years' and course='beed') as beed2years,
(select count(unemployedspecify) from survey where unemployedspecify='1' and  course='beed') as beedneveremployed,
(select count(unemployedspecify) from survey where unemployedspecify='2' and course='beed') as beedresigned,
(select count(related) from survey where course='beed' and employedspecify<>'' and related='Yes') as beedtr,
(select count(related) from survey where course='beed' and employedspecify<>'' and related='') as beedtn,
(select count(agree) from survey  where agree='Yes' and course='beed') as agreebeed,
(select count(agree) from survey  where agree='' and course='bsed') as disagreebsed,
(select count(employmentstatus) from survey where course='beed' and employmentstatus='') as beedtu,
(select count(employmentstatus) from survey where course='beed' and employmentstatus='employed') as beedte,

(SELECT count(notrelatedreason) from survey where substring_index(notrelatedreason,'/',1)='Yes' and course='bsit') as bsitreason1,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-2),'/',1)='Yes' and course='bsit') as bsitreason2,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-1),'/',1)='Yes' and course='bsit') as bsitreason3,

(SELECT count(notrelatedreason) from survey where substring_index(notrelatedreason,'/',1)='Yes' and course='bsba') as bsbareason1,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-2),'/',1)='Yes' and course='bsba') as bsbareason2,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-1),'/',1)='Yes' and course='bsba') as bsbareason3,

(SELECT count(notrelatedreason) from survey where substring_index(notrelatedreason,'/',1)='Yes' and course='bsed') as bsedreason1,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-2),'/',1)='Yes' and course='bsed') as bsedreason2,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-1),'/',1)='Yes' and course='bsed') as bsedreason3,

(SELECT count(notrelatedreason) from survey where substring_index(notrelatedreason,'/',1)='Yes' and course='beed') as beedreason1,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-2),'/',1)='Yes' and course='beed') as beedreason2,
(SELECT count(notrelatedreason) from survey where substring_index(substring_index(notrelatedreason,'/',-1),'/',1)='Yes' and course='beed') as beedreason3"))
     
      $grow= mysqli_fetch_assoc($surveyResult);{
        $bsitsingle=$grow["bsitsingle"];
        $bsitmarried=$grow["bsitmarried"];
                $bsitwidowed=$grow["bsitwidowed"];
        $bsitdivorced=$grow["bsitdivorced"];
        $bsitgovernment=$grow["bsitgovernment"];
        $bsitprivate=$grow["bsitprivate"];
        $bsitemployedforeign=$grow["bsitemployedforeign"];
        $bsitselfemployed=$grow["bsitselfemployed"];
        $bsit6months=$grow["bsit6months"];
        $bsit61months=$grow["bsit61months"];
        $bsit12months=$grow["bsit12months"];
        $bsit2years=$grow["bsit2years"];
         $bsitneveremployed=$grow["bsitneveremployed"];
         $bsitresigned=$grow["bsitresigned"];
         $bsitreason1=$grow["bsitreason1"];
        $bsitreason2=$grow["bsitreason2"];
        $bsitreason3=$grow["bsitreason3"];
        $bsittr= $grow["bsittr"];
    $bsittn= $grow["bsittn"];
    $regsbsit=$grow["agreebsit"];
    $nonregsbsit=$grow["disagreebsit"];
    $bsittu= $grow["bsittu"];
        $bsitte= $grow["bsitte"];

$bsbasingle=$grow["bsbasingle"];
        $bsbamarried=$grow["bsbamarried"];
                $bsbawidowed=$grow["bsbawidowed"];
        $bsbadivorced=$grow["bsbadivorced"];
        $bsbagovernment=$grow["bsbagovernment"];
        $bsbaprivate=$grow["bsbaprivate"];
        $bsbaemployedforeign=$grow["bsbaemployedforeign"];
        $bsbaselfemployed=$grow["bsbaselfemployed"];
        $bsba6months=$grow["bsba6months"];
        $bsba61months=$grow["bsba61months"];
        $bsba12months=$grow["bsba12months"];
        $bsba2years=$grow["bsba2years"];
         $bsbaneveremployed=$grow["bsbaneveremployed"];
         $bsbaresigned=$grow["bsbaresigned"];
         $bsbareason1=$grow["bsbareason1"];
        $bsbareason2=$grow["bsbareason2"];
        $bsbareason3=$grow["bsbareason3"];
                $bsbatr= $grow["bsbatr"];
    $bsbatn= $grow["bsbatn"];
    $regsbsba=$grow["agreebsba"];
    $nonregsbsba=$grow["disagreebsba"];
    $bsbatu= $row["bsbatu"];
    $bsbate= $grow["bsbate"];

$bsedsingle=$grow["bsedsingle"];
        $bsedmarried=$grow["bsedmarried"];
                $bsedwidowed=$grow["bsedwidowed"];
        $bseddivorced=$grow["bseddivorced"];
        $bsedgovernment=$grow["bsedgovernment"];
        $bsedprivate=$grow["bsedprivate"];
        $bsedemployedforeign=$grow["bsedemployedforeign"];
        $bsedselfemployed=$grow["bsedselfemployed"];
        $bsed6months=$grow["bsed6months"];
        $bsed61months=$grow["bsed61months"];
        $bsed12months=$grow["bsed12months"];
        $bsed2years=$grow["bsed2years"];
         $bsedneveremployed=$grow["bsedneveremployed"];
         $bsedresigned=$grow["bsedresigned"];
        $bsedreason1=$grow["bsedreason1"];
        $bsedreason2=$grow["bsedreason2"];
        $bsedreason3=$grow["bsedreason3"];
                $bsedtr= $grow["bsedtr"];
    $bsedtn= $grow["bsedtn"];
    $regsbsed=$grow["agreebsed"];
    $nonregsbsed=$grow["disagreebsed"];
    $bsedtu= $row["bsedtu"];
    $bsedte= $grow["bsedte"];

$beedsingle=$grow["beedsingle"];
        $beedmarried=$grow["beedmarried"];
                $beedwidowed=$grow["beedwidowed"];
        $beeddivorced=$grow["beeddivorced"];
        $beedgovernment=$grow["beedgovernment"];
        $beedprivate=$grow["beedprivate"];
        $beedemployedforeign=$grow["beedemployedforeign"];
        $beedselfemployed=$grow["beedselfemployed"];
        $beed6months=$grow["beed6months"];
        $beed61months=$grow["beed61months"];
        $beed12months=$grow["beed12months"];
        $beed2years=$grow["beed2years"];
        $beedneveremployed=$grow["beedneveremployed"];
        $beedresigned=$grow["beedresigned"];
        $beedreason1=$grow["beedreason1"];
        $beedreason2=$grow["beedreason2"];
        $beedreason3=$grow["beedreason3"];
                $beedtr= $grow["beedtr"];
    $beedtn= $grow["beedtn"];
    $regsbeed=$grow["agreebeed"];
    $nonregsbeed=$grow["disagreebeed"];
    $beedtu= $row["beedtu"];
    $beedte= $grow["beedte"];}
     mysqli_free_result($result);}
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
 <link rel="stylesheet" href="./assets/css/templatemo-style.css" />
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="assets/dist/js/bootstrap.min.js"></script>
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap-dropdownhover.min.js"></script>
<link href="./assets/dist/css/animate.min.css" rel="stylesheet">
    <link href="./assets/dist/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
  <style>
    body{min-height:100vh;}
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
    <link href="./vendor/bootstrap/css/offcanvas.css" rel="stylesheet">
    <nav style="height:100px;" class="navbar navbar-expand-lg fixed-top navbar-dark">
      <!-- <img class="mr-3" src="onhan 3.png" alt="" width="48" height="48"> -->
      
      <a href="./Dash.php" class="Titles" style="Color:white;font-size:140%;"><img class="mr-3" src="logo.png" alt="" width="332" height="51"></a>
      <button  class="navbar-toggler p-0 md-4 border-0"  type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  
   <div style="margin-top:23px" class="navbar-collapse offcanvas-collapse justify-content-md-center"id="navbarCollapse"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      
      <ul class="navbar-nav dropdown">
         <a  class="nav-link active font-weight-bold" href="#"style="text-decoration: underline;color:#b3fbad" >ALUMNI DASHBOARD</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="./bsitalumnimasterlist.php"style="color: white">BSIT Alumni</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="./bsbaalumnimasterlist.php"style="color: white">BSBA Alumni</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="./bsedalumnimasterlist.php"style="color: white">BSED Alumni</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="./beedalumnimasterlist.php"style="color: white">BEED Alumni</a></ul>
         
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

<body class="bg" id="page-wraper">


<div class="container py mt-5">
<div class="row">
  <button class="btn btn1 btn-outline-primary" style="border-radius:4px;border:1px solid #000;text-align:center;">Print BSIT Survey</button>
<div class="col-md-12 mr-1 mb-1" style="text-align:center;border:3px solid #000">
 <table class="table" id="table1" style="border:1px solid #000;"><label style="color:white;font-size:1.4rem;">Bachelor of Science in Information Technology</label>
 <thead><tr style="color:black;font-size:1.4rem;text-align:center;">
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3" class="md-12"> <?php echo $bsitta;?><p style="color:black;font-size:1.2rem;">Graduates</p><hr>
                                                                                <?php echo $regsbsit;?><p style="color:black;font-size:1.2rem;">Registered</p><hr>
                                                                                <?php echo $bsitta-$regsbsit;?><p style="color:black;font-size:1.2rem;">Non-Registered</p><hr>
                                                                                <?php echo $bsitsingle;?><p style="color:black;font-size:1.2rem;">Single</p><hr>
                                                                                <?php echo $bsitmarried;?><p style="color:black;font-size:1.2rem;">Married</p><hr>
                                                                                <?php echo $bsitdivorced;?><p style="color:black;font-size:1.2rem;">Divorced</p><hr>
                                                                                <?php echo $bsitwidowed;?><p style="color:black;font-size:1.2rem;">Widowed</p><hr>
                                                                                </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsitte;?><p style="color:black;font-size:1.2rem;">Total Employed</p><hr>
                                                                                 <?php echo $bsitgovernment;?><p style="color:black;font-size:1.2rem;">Employed Locally (Government)</p><hr>
                                                                                 <?php echo $bsitprivate;?><p style="color:black;font-size:1.2rem;">Employed Locally (Private)</p><hr>
                                                                                 <?php echo $bsitemployedforeign;?><p style="color:black;font-size:1.2rem;">Employed in foreign Country</p><hr>
                                                                                 <?php echo $bsitselfemployed;?><p style="color:black;font-size:1.2rem;">Self-Employed</p><hr>
                                                                                 <?php echo $bsit6months;?><p style="color:black;font-size:1.2rem;">Employed Less Than 6 Months</p><hr>
                                                                                 <?php echo $bsit61months;?><p style="color:black;font-size:1.2rem;">6 Months to 1 Year</p><hr>
                                                                                 <?php echo $bsit12months;?><p style="color:black;font-size:1.2rem;">Employed 1 Year to 2 Years</p><hr>
                                                                                 <?php echo $bsit2years;?><p style="color:black;font-size:1.2rem;">More Than 2 Years</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3"  class="md-12"><?php echo $bsittu;?><p style="color:black;font-size:1.2rem;">Unemployed</p><hr>
                                                                                <?php echo $bsitneveremployed;?><p style="color:black;font-size:1.2rem;">Never Been Employed</p><hr>
                                                                                <?php echo $bsitresigned;?><p style="color:black;font-size:1.2rem;">Resigned/Laid Off/Separated</p><hr>
                                                                                  </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsittr;?><p style="color:black;font-size:1.2rem;">BSIT Related Job</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsittn;?><p style="color:black;font-size:1.2rem;">BSIT Not Related Job</p><hr>
                                                                                 <?php echo $bsitreason1;?><p style="color:black;font-size:1.2rem;">Couldn't satisfied job in <br> field of training; <br>either the pay is low <br>or don't like the job available.</p><hr>
                                                                                  <?php echo $bsitreason2;?><p style="color:black;font-size:1.2rem;">Training is inadequate;<br>couldn't compete with<br>other graduates from other<br>universities in the<br>same field.</p><hr>
                                                                                 <?php echo $bsitreason3;?><p style="color:black;font-size:1.2rem;">There was an opening in<br>this field which I <br>immediately applied for.</p><hr>
                                                                                  </td>
 
 </tr></thead></table></div>
<script src="\vendor\jquery\jquery.min.js"></script>
<script>
$('.btn1').click(function(){
var printme = document.getElementById('table1');
var wme = window.open("");
wme.document.write(printme.outerHTML);
wme.document.close();
wme.focus();
wme.print();
wme.close();
})
</script>
<button class="btn btn2 btn-outline-primary" style="border-radius:4px;border:1px solid #000;text-align:center;">Print BSBA Survey</button>
<div class="col-md-12 mr-1 mb-1" style="text-align:center;border:3px solid #000">

 <table class="table" id="table2"style="border:1px solid #000"><label style="color:white;font-size:1.4rem;">Bachelor of Science in Business Administration</label>
<thead><tr style="color:black;font-size:1.4rem;text-align:center;">
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3" class="md-12"><?php echo $bsbata;?><p style="color:black;font-size:1.2rem;">Graduates</p><hr>
                                                                                <?php echo $regsbsba;?><p style="color:black;font-size:1.2rem;">Registered</p><hr>
                                                                                <?php echo $bsbata-$regsbsba;?><p style="color:black;font-size:1.2rem;">Non-Registered</p><hr> 
                                                                                <?php echo $bsbasingle;?><p style="color:black;font-size:1.2rem;">Single</p><hr>
                                                                                <?php echo $bsbamarried;?><p style="color:black;font-size:1.2rem;">Married</p><hr>
                                                                                <?php echo $bsbadivorced;?><p style="color:black;font-size:1.2rem;">Divorced</p><hr>
                                                                                <?php echo $bsbawidowed;?><p style="color:black;font-size:1.2rem;">Widowed</p><hr>
                                                                                </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsbate;?><p style="color:black;font-size:1.2rem;">Total Employed</p><hr>
                                                                                 <?php echo $bsbagovernment;?><p style="color:black;font-size:1.2rem;">Employed Locally (Government)</p><hr>
                                                                                 <?php echo $bsbaprivate;?><p style="color:black;font-size:1.2rem;">Employed Locally (Private)</p><hr>
                                                                                 <?php echo $bsbaemployedforeign;?><p style="color:black;font-size:1.2rem;">Employed in foreign Country</p><hr>
                                                                                 <?php echo $bsbaselfemployed;?><p style="color:black;font-size:1.2rem;">Self-Employed</p><hr>
                                                                                 <?php echo $bsba6months;?><p style="color:black;font-size:1.2rem;">Employed Less Than 6 Months</p><hr>
                                                                                 <?php echo $bsba61months;?><p style="color:black;font-size:1.2rem;">6 Months to 1 Year</p><hr>
                                                                                 <?php echo $bsba12months;?><p style="color:black;font-size:1.2rem;">Employed 1 Year to 2 Years</p><hr>
                                                                                 <?php echo $bsba2years;?><p style="color:black;font-size:1.2rem;">More Than 2 Years</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3"  class="md-12"><?php echo $bsbatu;?><p style="color:black;font-size:1.2rem;">Unemployed</p><hr>
                                                                                <?php echo $bsbaneveremployed;?><p style="color:black;font-size:1.2rem;">Never Been Employed</p><hr>
                                                                                <?php echo $bsbaresigned;?><p style="color:black;font-size:1.2rem;">Resigned/Laid Off/Separated</p><hr>
                                                                                  </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsbatr;?><p style="color:black;font-size:1.2rem;">BSBA Related Job</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsbatn;?><p style="color:black;font-size:1.2rem;">BSBA Not Related Job</p><hr>
                                                                                 <?php echo $bsbareason1;?><p style="color:black;font-size:1.2rem;">Couldn't satisfied job in <br> field of training; <br>either the pay is low <br>or don't like the job available.</p><hr>
                                                                                  <?php echo $bsbareason2;?><p style="color:black;font-size:1.2rem;">Training is inadequate;<br>couldn't compete with<br>other graduates from other<br>universities in the<br>same field.</p><hr>
                                                                                 <?php echo $bsbareason3;?><p style="color:black;font-size:1.2rem;">There was an opening in<br>this field which I <br>immediately applied for.</p><hr>
                                                                                  </td>

 </tr></thead></table></div>
<script src="\vendor\jquery\jquery.min.js"></script>
<script>
$('.btn2').click(function(){
var printme = document.getElementById('table2');
var wme = window.open("");
wme.document.write(printme.outerHTML);
wme.document.close();
wme.focus();
wme.print();
wme.close();
})
</script>

 <button class="btn btn3 btn-outline-primary" style="border-radius:4px;border:1px solid #000;text-align:center;">Print BSED Survey</button>
<div class="col-md-12 mr-1 mb-1"style="text-align:center;border:3px solid #000">

 <table class="table" id="table3"style="border:1px solid #000"><label style="color:white;font-size:1.4rem;">Bachelor of Secondary Education</label>
 <thead><tr style="color:black;font-size:1.4rem;text-align:center;">
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3" class="md-12"> <?php echo $bsedta;?><p style="color:black;font-size:1.2rem;">Graduates</p><hr>
                                                                                 <?php echo $regsbsed;?><p style="color:black;font-size:1.2rem;">Registered</p><hr>
                                                                                <?php echo $bsedta-$regsbsed;?><p style="color:black;font-size:1.2rem;">Non-Registered</p><hr>
                                                                                <?php echo $bsedmarried;?><p style="color:black;font-size:1.2rem;">Married</p><hr>
                                                                                <?php echo $bsedsingle;?><p style="color:black;font-size:1.2rem;">Single</p><hr>
                                                                                <?php echo $bseddivorced;?><p style="color:black;font-size:1.2rem;">Divorced</p><hr>
                                                                                <?php echo $bsedwidowed;?><p style="color:black;font-size:1.2rem;">Widowed</p><hr>
                                                                                </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsedte;?><p style="color:black;font-size:1.2rem;">Total Employed</p><hr>
                                                                                 <?php echo $bsedgovernment;?><p style="color:black;font-size:1.2rem;">Employed Locally (Government)</p><hr>
                                                                                 <?php echo $bsedprivate;?><p style="color:black;font-size:1.2rem;">Employed Locally (Private)</p><hr>
                                                                                 <?php echo $bsedemployedforeign;?><p style="color:black;font-size:1.2rem;">Employed in foreign Country</p><hr>
                                                                                 <?php echo $bsedselfemployed;?><p style="color:black;font-size:1.2rem;">Self-Employed</p><hr>
                                                                                 <?php echo $bsed6months;?><p style="color:black;font-size:1.2rem;">Employed Less Than 6 Months</p><hr>
                                                                                 <?php echo $bsed61months;?><p style="color:black;font-size:1.2rem;">6 Months to 1 Year</p><hr>
                                                                                 <?php echo $bsed12months;?><p style="color:black;font-size:1.2rem;">Employed 1 Year to 2 Years</p><hr>
                                                                                 <?php echo $bsed2years;?><p style="color:black;font-size:1.2rem;">More Than 2 Years</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3"  class="md-12"><?php echo $bsedtu;?><p style="color:black;font-size:1.2rem;">Unemployed</p><hr>
                                                                                <?php echo $bsedneveremployed;?><p style="color:black;font-size:1.2rem;">Never Been Employed</p><hr>
                                                                                <?php echo $bsedresigned;?><p style="color:black;font-size:1.2rem;">Resigned/Laid Off/Separated</p><hr>
                                                                                  </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsedtr;?><p style="color:black;font-size:1.2rem;">BSED Related Job</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $bsedtn;?><p style="color:black;font-size:1.2rem;">BSED Not Related Job</p><hr>
                                                                                 <?php echo $bsedreason1;?><p style="color:black;font-size:1.2rem;">Couldn't satisfied job in <br> field of training; <br>either the pay is low <br>or don't like the job available.</p><hr>
                                                                                  <?php echo $bsedreason2;?><p style="color:black;font-size:1.2rem;">Training is inadequate;<br>couldn't compete with<br>other graduates from other<br>universities in the<br>same field.</p><hr>
                                                                                 <?php echo $bsedreason3;?><p style="color:black;font-size:1.2rem;">There was an opening in<br>this field which I <br>immediately applied for.</p><hr>
                                                                                  </td>

 </tr></thead></table></div>
<script src="\vendor\jquery\jquery.min.js"></script>
<script>
$('.btn3').click(function(){
var printme = document.getElementById('table3');
var wme = window.open("");
wme.document.write(printme.outerHTML);
wme.document.close();
wme.focus();
wme.print();
wme.close();
})
</script>
<button class="btn btn4 btn-outline-primary" style="border-radius:4px;border:1px solid #000;text-align:center;">Print BEED Survey</button>
<div class="col-md-12 mr-1 mb-1" style="text-align:center;border:3px solid #000">

 <table class="table" style="border:1px solid #000"><label style="color:white;font-size:1.4rem;">Bachelor of Elementary Education</label>
<thead><tr style="color:black;font-size:1.4rem;text-align:center;">
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3" class="md-12"> <?php echo $beedta;?><p style="color:black;font-size:1.2rem;">Graduates</p><hr>
                                                                                 <?php echo $regsbeed;?><p style="color:black;font-size:1.2rem;">Registered</p><hr>
                                                                                <?php echo $beedta-$regsbeed;?><p style="color:black;font-size:1.2rem;">Non-Registered</p><hr>
                                                                                <?php echo $beedsingle;?><p style="color:black;font-size:1.2rem;">Single</p><hr>
                                                                                <?php echo $beedmarried;?><p style="color:black;font-size:1.2rem;">Married</p><hr>
                                                                                <?php echo $beeddivorced;?><p style="color:black;font-size:1.2rem;">Divorced</p><hr>
                                                                                <?php echo $beedwidowed;?><p style="color:black;font-size:1.2rem;">Widowed</p><hr>
                                                                                </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $beedte;?><p style="color:black;font-size:1.2rem;">Total Employed</p><hr>
                                                                                 <?php echo $beedgovernment;?><p style="color:black;font-size:1.2rem;">Employed Locally (Government)</p><hr>
                                                                                 <?php echo $beedprivate;?><p style="color:black;font-size:1.2rem;">Employed Locally (Private)</p><hr>
                                                                                 <?php echo $beedemployedforeign;?><p style="color:black;font-size:1.2rem;">Employed in foreign Country</p><hr>
                                                                                 <?php echo $beedselfemployed;?><p style="color:black;font-size:1.2rem;">Self-Employed</p><hr>
                                                                                 <?php echo $beed6months;?><p style="color:black;font-size:1.2rem;">Employed Less Than 6 Months</p><hr>
                                                                                 <?php echo $beed61months;?><p style="color:black;font-size:1.2rem;">6 Months to 1 Year</p><hr>
                                                                                 <?php echo $beed12months;?><p style="color:black;font-size:1.2rem;">Employed 1 Year to 2 Years</p><hr>
                                                                                 <?php echo $beed2years;?><p style="color:black;font-size:1.2rem;">More Than 2 Years</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="#b9e4e3"  class="md-12"><?php echo $beedtu;?><p style="color:black;font-size:1.2rem;">Unemployed</p><hr>
                                                                                <?php echo $beedneveremployed;?><p style="color:black;font-size:1.2rem;">Never Been Employed</p><hr>
                                                                                <?php echo $beedresigned;?><p style="color:black;font-size:1.2rem;">Resigned/Laid Off/Separated</p><hr>
                                                                                  </td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $beedtr;?><p style="color:black;font-size:1.2rem;">BEED Related Job</p><hr></td>
 <td style="align:center;border:1px solid #000" bgcolor="aqua"  class="md-12">   <?php echo $beedtn;?><p style="color:black;font-size:1.2rem;">BEED Not Related Job</p><hr>
                                                                                 <?php echo $beedreason1;?><p style="color:black;font-size:1.2rem;">Couldn't satisfied job in <br> field of training; <br>either the pay is low <br>or don't like the job available.</p><hr>
                                                                                  <?php echo $beedreason2;?><p style="color:black;font-size:1.2rem;">Training is inadequate;<br>couldn't compete with<br>other graduates from other<br>universities in the<br>same field.</p><hr>
                                                                                 <?php echo $beedreason3;?><p style="color:black;font-size:1.2rem;">There was an opening in<br>this field which I <br>immediately applied for.</p><hr>
                                                                                  </td>

 </tr></thead></table></div>
<script src="\vendor\jquery\jquery.min.js"></script>
<script>
$('.btn4').click(function(){
var printme = document.getElementById('table4');
var wme = window.open("");
wme.document.write(printme.outerHTML);
wme.document.close();
wme.focus();
wme.print();
wme.close();
})
</script>
</div></div>
<footer class="sticky-footer">
  <style>.sticky-footer{position:sticky;top:100%;background-color: #076787;padding-top: 10px;padding-bottom: 10px;width: 100%;color: #fbfdfd;text-align: center;margin: 0px;}}</style> 
  <p class="">© 2021 All Rights Reserved. Web-based Tracer System for RSU Romblon Campus</p>
</footer>
</body>


</html>