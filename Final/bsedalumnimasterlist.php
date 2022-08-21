<?php
  require('./database.php');
  session_start();
if (isset($_SESSION["ausername"])){
	session_write_close();
   $course="BSED";
   $queryStudentinfor = "select * from alumni where course='$course'";
  $sqlStudentinfor = mysqli_query($connection, $queryStudentinfor);
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
<link rel="stylesheet" href="assets/css/templatemo-style.css" />
      <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/offcanvas/">
      <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbar-bottom/">
    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="assets/dist/js/bootstrap.min.js"></script>
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap-dropdownhover.min.js"></script>
<link href="assets/dist/css/animate.min.css" rel="stylesheet">
    <link href="assets/dist/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
  <style>
    
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
      
      <a href="./Dash.php" class="Titles" style="Color:white;font-size:140%;"><img class="mr-3" src="logo.png" alt="" width="332" height="51"></a>
      <button  class="navbar-toggler p-0 md-4 border-0"  type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  
   <div style="margin-top:23px" class="navbar-collapse offcanvas-collapse justify-content-md-center"id="navbarCollapse"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      
      <ul class="navbar-nav dropdown">
         <a  class="nav-link" href="dash.php"style="color:white" >ALUMNI DASHBOARD</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="bsitalumnimasterlist.php"style="color: white">BSIT Alumni</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="bsbaalumnimasterlist.php"style="color: white">BSBA Alumni</a></ul>
         <ul class="navbar-nav dropdown font-weight-bold active"><a class="nav-link" href="#"style="text-decoration: underline;color: #b3fbad">BSED Alumni</a></ul>
         <ul class="navbar-nav dropdown"><a class="nav-link" href="beedalumnimasterlist.php"style="color: white">BEED Alumni</a></ul>
         
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
<div class="py-5 col">

<button class="btn btn-outline-primary" style="border-radius:4px;border:1px solid #000;text-align:center;">Print <?php echo $course;?> Master List</button>
<div class="row"id="table" >	
<label class="col-12 strong font-weight-bolder" style="font-size:1.9rem;text-align:center;color:white;"><?php echo $course;?> MASTER LIST</label>
<table class="table-sm" style="border:3px solid #000;text-align:center">


			<tr style="border:1px solid #000">
				<th scope="col" class="font-weight-bolder"style="border:3px solid #000;background-color:aqua">Fullname</th>
				<th scope="col" style="border:3px solid #000;align:center;background-color:#b9e4e3">Gender</th>
				<th scope="col" style="border:3px solid #000;background-color:aqua">Birthdate</th>
				<th scope="col" style="border:3px solid #000;align:center;background-color:#b9e4e3">Year Graduated</th>
				<th scope="col" style="border:3px solid #000;background-color:aqua">Address</th>
				<th scope="col" style="border:3px solid #000;background-color:#b9e4e3">Contact Number</th>
				<th scope="col" style="border:3px solid #000;background-color:aqua">Job</th>
				<th scope="col" style="border:3px solid #000;background-color:#b9e4e3">Email Address</th>
			</tr>
      <?php while($result = mysqli_fetch_array($sqlStudentinfor)) { ?>
      <tr style="border:1px solid #000;background-color:#b9e4e3">
       <td scope="row" style="border:1px solid #000;background-color:aqua"><?php echo $result['Lname'].", ".$result['Fname']." ".$result['Mname'];?></td>
       <td scope="row" style="border:1px solid #000;background-color:#b9e4e3"><?php echo $result['Gender'];?></td>
		   <td scope="row" style="border:1px solid #000;background-color:aqua"><?php echo $result['Birthdate'];?></td>
       <td scope="row" style="border:1px solid #000;background-color:#b9e4e3"><?php echo $result['Yeargraduated'];?></td>
       <td scope="row" style="border:1px solid #000;background-color:aqua"><?php echo $result['Address'];?></td>
    	  <td scope="row" style="border:1px solid #000;background-color:#b9e4e3"><?php echo $result['Cnumber'];?></td>
		  <td scope="row" style="border:1px solid #000;background-color:aqua"><?php $Jobs=explode("*",$result['Job']); echo $jobs['0'];?></td>
		  <td scope="row" style="border:1px solid #000;background-color:#b9e4e3"><?php echo $result['Email'];?></td>
			</tr>
      <?php } ?> 
		</table>
        </div>
      </div>
    </div>
</div>
<script src="\vendor\jquery\jquery.min.js"></script>
<script>
$('.btn').click(function(){
var printme = document.getElementById('table');
var wme = window.open("";
wme.document.write(printme.outerHTML);
wme.document.close();
wme.focus();
wme.print();
wme.close();
})
</script>
</div>
<footer class="sticky-footer">
  <style>.sticky-footer{position:sticky;top:100%;background-color: #076787;padding-top: 10px;padding-bottom: 10px;width: 100%;color: #fbfdfd;text-align: center;margin: 0px;}}</style> 
  <p class="">© 2021 All Rights Reserved. Web-based Tracer System for RSU Romblon Campus</p>
</footer>
</body>
</html>