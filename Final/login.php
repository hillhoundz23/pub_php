<?php
	require ('./.database.php');

//	session_start();
	
if (isset($_POST['login'])) {
	
	$user = mysqli_real_escape_string($connection,$_POST['username']);
	$password = mysqli_real_escape_string($connection,$_POST['password']);
	//$apassword = mysqli_real_escape_string($connection,$_POST['password']);
	//$usertype  = mysqli_real_escape_string($connection,$_POST['usertype']);
	$query="Select usertype from useraccount where username='$user' and password='$password'";
	$result=mysqli_query($connection,$query);
	if($row=mysqli_fetch_assoc($result))
	{$db_type=$row['usertype'];
		if ($db_type=='osa'){
			 session_start();
		  	$_SESSION["ausername"]=$user;
		    session_write_close();
			header("Location: ./dash.php ");}

	  else if ($db_type=='alumni'){
		    session_start();
		  	$_SESSION["ausername"]=$user;
		    session_write_close();
	 		header("Location: myprofile.php");
 	} else if ($db_type=='bsit'){
		    session_start();
			$_SESSION["ausername"]=$user;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
		} else if ($db_type=='bsba'){
			session_start();
			$_SESSION["ausername"]=$user;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
		} else if ($db_type=='beed'){
			session_start();
			$_SESSION["ausername"]=$user;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
		} else if ($db_type=='bsed'){
			session_start();
			$_SESSION["ausername"]=$user;
		    $_SESSION["Type"] = $db_type;
		    session_write_close();
			header("Location: ./coursedash.php");
	}
		 else { }} else {  ?><script> alert("No User Account Found/Username Password Not Matched"); </script> <?php } 


}if (isset($_POST['verifying'])) {
	$Birthdate =mysqli_real_escape_string($connection,$_POST['Birthdate']);
	$Lname = mysqli_real_escape_string($connection,$_POST['Lname']);
	$Fname =mysqli_real_escape_string($connection,$_POST['Fname']);
	$Mname = mysqli_real_escape_string($connection,$_POST['Mname']);
	$Yeargraduate= mysqli_real_escape_string($connection,$_POST['Yeargraduate']);

	if (empty($Birthdate) || empty($Lname) || empty($Fname) || empty($Mname) || empty($Yeargraduate)) {
	 ?><script> alert("Please Fill-up all Fields"); </script> <?php
	}else {
		$queryValidate = "SELECT gender,course,verified FROM alumni WHERE Lname = '$Lname' AND Fname = '$Fname' AND Mname = '$Mname' AND Yeargraduated = '$Yeargraduate' AND Birthdate = '$Birthdate'";
		//$sqlValidate = mysqli_query($connection, $queryValidate);
		$result=mysqli_query($connection,$queryValidate);
		if($rows=mysqli_fetch_assoc($result))
		{
        if($rows['verified']=='Yes')  {
            ?><script> alert("Account has been Verified"); </script> <?php
         } else {
              session_start();
			$_SESSION["sLname"]=$Lname;
			$_SESSION["sFname"]=$Fname;
			$_SESSION["sMname"]=$Mname;
			$_SESSION["sYeargraduated"]=$Yeargraduate;
			$_SESSION["sBirthdate"]=$Birthdate;
			$_SESSION["gender"]=$rows['gender'];
			$_SESSION["course"]=$rows['course'];
			session_write_close();
			header("Location: alumniuseraccount.php");
         }
           
		}
         else { ?><script> alert("Account do not Exist"); </script> <?php }}}



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
<title>Log in</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="./cron/css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="./cron/css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="./cron/css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="./cron/images/fevicon.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="./cron/css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="./cron/css/owl.carousel.min.css">
<link rel="stylesheet" href="./cron/css/owl.theme.default.min.css">
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
           				 <div class="carousel-inner">
              			     <div class="carousel-item active">
    		    				<div class="titlepage-h1">
    	        				<h1 class="bnner_title">Welcome To<br>
    	        				<span style="color: #10b5fa">Online Memento: An Alumni E. Profile</span></h1>
    		   			      </div>
    		   			  <div class="btn_main">
            </div>
          </div>
   
  </div> 
       
    </div>
    </div>
    </div></div>
  <div class="services_main">
    	<div class="container">
    		<div class="creative_taital">
    			<h1 class="creative_text">Online Memento: An Alumni E. Profile is now activated to login</h1>
    		   		<div class="lets_touch_main row">
              <div class="col-12">
                    <div class="input_main" id="verifiers" style="display:none">
	<h2 class="font-weight-bold">Verify Alumni Account</h2>
	<div >
          <form id="verify" class="input-group" method = "post">
		<input type="text" id="Lname" name = "Lname" class="email-bt" placeholder ="Enter Last Name Here" required><br>
		<input type="text" id="Fname" name = "Fname" class="email-bt" placeholder ="Enter First Name Here" required><br>
		<input type="text" id="Mname" name = "Mname" class="email-bt" placeholder ="Enter Middle Name Here" required><br>
		<input type="number" id="Yeargraduate" name = "Yeargraduate" class="email-bt" placeholder ="Enter Year Graduated Here" required><br>
		<input type="date" id="Birthdate" name = "Birthdate" class="email-bt" placeholder ="Enter Birthdate Here" required><br>
		<div class="col-md-12"><button type="submit" name = "verifying" class="col-md-12 btn border"style="border-radius:.25rem;background-color:#9a1724;color:white;font-size:1.2rem">Verify</button></form><br> 
	<br>
	<br>
	
    </form>    </div>    

		</div></div> </div> 
	 <div class="col-12" id="login">
                    <div class="input_main">
						<h2 class="font-weight-bold">Log-in Account</h2>
<form  class="" method = "post" >
		<input type="text" name = "username" class="email-bt" placeholder ="Enter Username Here" required><br>
		<input type="password" name = "password" class="email-bt" placeholder ="Enter Password Here" required>
<div class="row m-2">
    <button class="col-md-12 mb-1" type="submit" name = "login" class="btn border" style="border-radius:.25rem;background-color:#ce4109;color:white;font-size:1.2rem">Log in</button><br>

	</div>
       </form>
	   <div class="row-md-12">
 <button class="row-md-6 btn border" style="border-radius:.25rem;background-color:#9a1724;color:white;font-size:1.2rem" onclick="verifyHide()" >Verify/Register Alumni Account</button>
 <button class="row-md-6 btn border" style="border-radius:.25rem;background-color:hsl(195, 78%, 36%);color:white;font-size:1.2rem" ><a href="forgotpassword.php">Forgot Password?</a></button>      
			</div>
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
                                 </div>
            </div>
        </div>
    </div>        </div>
    </div>
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
      <script src="vendor/cron/js/jquery.min.js"></script>
      <script src="vendor/cron/js/popper.min.js"></script>
      <script src="vendor/cron/js/bootstrap.bundle.min.js"></script>
</body>
                    
</html>
<script>
       function verifyHide() {
         var x = document.getElementById("verifiers");
         if (x.style.display === "none") {
         x.style.display = "block";
         x.focus();
          } else {
          x.style.display = "none";}
}
</script>