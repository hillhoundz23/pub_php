<?php
require ('./.database.php');
session_start();
if (isset($_SESSION["ausername"])){
	$username=$_SESSION["ausername"];
	session_write_close();}
    
if(isset($_POST['updatepass'])){
$password = mysqli_real_escape_string($connection,$_POST['password']);
$retypepassword = mysqli_real_escape_string($connection,$_POST['retypepassword']);
if($password!=$retypepassword) {
		?><script> alert("Password Not Matched"); </script> <?php }
else { 
    
    {$queryCreate = "update useraccount set password='$password' where username='$username'";
    $sqlCreate = mysqli_query($connection, $queryCreate);}

    {$query="Select usertype from useraccount where username='$username' and password='$password'";
	$result=mysqli_query($connection,$query);
       if($row=mysqli_fetch_assoc($result))
	        {$db_type=$row['usertype'];
		if ($db_type=='osa'){
			 session_start();
		  	$_SESSION["ausername"]=$username;
		    session_write_close();
			header("Location: ./dash.php ");}

	  else if ($db_type=='alumni'){
		    session_start();
		  	$_SESSION["ausername"]=$username;
		    session_write_close();
	 		header("Location: myprofile.php");
 	    } else if ($db_type=='bsit'){
		    session_start();
			$_SESSION["ausername"]=$username;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
		} else if ($db_type=='bsba'){
			session_start();
			$_SESSION["ausername"]=$username;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
		} else if ($db_type=='beed'){
			session_start();
			$_SESSION["ausername"]=$username;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
		} else if ($db_type=='bsed'){
			session_start();
			$_SESSION["ausername"]=$username;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
	}
		 else {
			?><script> alert("No User"); </script> <?php
			
	}}
     }}}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>New Password</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="./vendor/cron/css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="./vendor/cron/css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="./vendor/cron/css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="./vendor/cron/images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="./vendor/cron/css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="./vendor/cron/css/owl.carousel.min.css">
<link rel="stylesheet" href="./vendor/cron/css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<!-- body -->
<body>
	<div class="header_main">
		<div class="container">
		  <div class="logo col-md-12"><a href="./" class="col-md-4"><img src="./cron/logorsu.png" alt="RSU" width="150" height="140" style="margin-left:01;margin-top:2;width:150px;height:150px;"/><img class="col-md-8" src="./cron/images/logo.png"/></a>
		  </div></div></div>
    <div class="banner-main">
    	<div class="container">
           <div id="main_slider" class="carousel slide" data-ride="carousel">  
           <!-- The slideshow -->

    <div class="carousel-item">
    		<div class="titlepage-h1">
    	       <h1 class="bnner_title">Welcome To<br>
    	       <span style="color: #10b5fa"> Online Memento: An Alumni E. Profile</span></h1>
    		 </div>
    		<div class="btn_main">
    		 </div>
     </div>
  </div> 
        
    </div>
    </div>
    </div></div>
  <div class="services_main">
    	<div class="container"><div class="row" ><button class="form-check-inline"><a href="./"style="color:Black;" ><svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 48 48"><g><path id="path1" transform="rotate(0,24,24) translate(0,0.330748558044434) scale(1.5,1.5)  " fill="#072833" d="M16.017856,7.9149963L27.038898,17.733009 27.038898,30.457012C27.038898,30.958004 26.737896,31.258007 26.436891,31.358013 26.136896,31.559002 25.835892,31.559002 25.535887,31.559002L19.62487,31.559002C19.423866,31.559002 19.223869,31.459011 19.123869,31.358013 19.02387,31.258007 18.922865,31.05801 18.922865,30.857006L18.922865,24.746011 13.011848,24.746011 13.011848,30.857006C13.011848,31.05801 12.91185,31.258007 12.811843,31.358013 12.711844,31.459011 12.510847,31.559002 12.310841,31.559002L6.3998249,31.559002C6.0998209,31.559002 5.7988175,31.459011 5.4978211,31.358013 5.2978161,31.258007 4.9968203,30.958004 4.9968203,30.457012L4.9968203,17.833z M16.017856,0C16.518858,1.4456054E-07,17.019857,0.19999716,17.42086,0.50099231L31.346912,13.024007C32.147919,13.826009 32.247917,15.028005 31.446913,15.929998 30.644907,16.731008 29.342909,16.830999 28.540903,16.030004L16.017856,4.8089925 3.4948159,15.929998C3.0938135,16.330007 2.5928121,16.431005 2.0918112,16.431005 1.4908033,16.431005 0.989802,16.230001 0.58879947,15.729009 -0.21219814,15.028005 -0.21219814,13.726003 0.68879842,13.024007L14.614851,0.50099231C15.015853,0.19999716,15.516854,1.4456054E-07,16.017856,0z" /></g></svg>
Back to Home</a></button></div>
    		<div class="creative_taital">
    			<h1 class="creative_text">Online Memento: An Alumni E. Profile is now activated to login</h1>
    		   		<div class="lets_touch_main row">
             
	 <div class="col-12" id="login">
                    <div class="input_main">
						<h2 class="font-weight-bold">Update User Account Password</h2>
                       <form  class="" method = "post">
		<input style="text-align:center"type="password" id = "password" name="password" class="email-bt border" placeholder="Password"required>
        <input style="text-align:center"type="password" id = "retypepassword" name="retypepassword" class="email-bt border" placeholder="Retype-Password" required>
<br>
        
<div class="row m-2">
   <button type="submit" id="" name = "updatepass" class="btn border col-md-12" style="border-radius:.25rem;background-color:#ce4109;color:white;font-size:1.2rem">Update</button>

	</div>
<h2><span>Please reach out to us if you are having technical difficulties or you need a question answered.<br> <br>You can contact our Admin 0946-672-4368.</span></h2>
	</form></div></div>
	
			 
    </div></div>
    <br><br>
			
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
      <script src="./vendor/cron/js/jquery.min.js"></script>
      <script src="./vendor/cron/js/popper.min.js"></script>
      <script src="./vendor/cron/js/bootstrap.bundle.min.js"></script>
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