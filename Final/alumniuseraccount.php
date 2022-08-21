<?php
	require ('./database.php');

	session_start();
	if (isset($_SESSION["sLname"])){
		$sLname = $_SESSION["sLname"];
		$sFname = $_SESSION["sFname"];
		$sMname = $_SESSION["sMname"];
		$sYeargraduated = $_SESSION["sYeargraduated"];
		$sgender = $_SESSION["gender"];
		$sBirthdate = $_SESSION["sBirthdate"];
		$Course=$_SESSION["course"];
	}
if (isset($_POST['login'])) {
	$Birthdate = mysqli_real_escape_string($connection,$_POST['Birthdate']);
	$Email = mysqli_real_escape_string($connection,$_POST['Email']);
	$Lname = mysqli_real_escape_string($connection,$_POST['Lname']);
	$Fname = mysqli_real_escape_string($connection,$_POST['Fname']);
	$Fbname = mysqli_real_escape_string($connection,$_POST['Fbname']);
	$Mname = mysqli_real_escape_string($connection,$_POST['Mname']);
	$Yeargraduated = mysqli_real_escape_string($connection,$_POST['Yeargraduated']);
	$Cnumber = mysqli_real_escape_string($connection,$_POST['Cnumber']);
	$username = mysqli_real_escape_string($connection,$_POST['username']);
	$password = mysqli_real_escape_string($connection,$_POST['password']);
	$retypepassword = mysqli_real_escape_string($connection,$_POST['retypepassword']);
	$civilstatus=mysqli_real_escape_string($connection,$_POST['civilstatus']);
	$sq1 = mysqli_real_escape_string($connection,$_POST['sq1']);
	$sa1=mysqli_real_escape_string($connection,$_POST['sa1']);
	$sq2 = mysqli_real_escape_string($connection,$_POST['sq2']);
	$sa2=mysqli_real_escape_string($connection,$_POST['sa2']);
	$sq3 = mysqli_real_escape_string($connection,$_POST['sq3']);
	$sa3=mysqli_real_escape_string($connection,$_POST['sa3']);
	if(empty($Birthdate) || empty($Email) || empty($Lname) || empty($Fname) || empty($Mname) || empty($Yeargraduated) || empty($Cnumber) || $password!=$retypepassword) {
		echo "Please Fill-up all Fields or Password not matched";
	} else {
		{
		 $queryCreate = "UPDATE alumni set  civilstatus='$civilstatus',fbname='$Fbname',Cnumber = '$Cnumber', username = '$username',Email = '$Email',verified='Yes' where Lname = '$sLname' and Fname = '$sFname' and Mname= '$sMname' and Yeargraduated = '$sYeargraduated' and Birthdate= '$sBirthdate'";
		
      $Caccount= "Insert into useraccount (username,password,usertype,sq1,sa1,sq2,sa2,sq3,sa3) values ('$username','$password','alumni','$sq1','$sa1','$sq2','$sa2','$sq3','$sa3')";
		$sqlCaccount= mysqli_query($connection,$Caccount);
		$sqlCreate = mysqli_query($connection, $queryCreate);
		 
		session_start();
		$_SESSION["username"]=$username;
		$_SESSION["action"]="save";
		    session_write_close();
			header("Location: survey.php ");
		}
	}}
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
              <div class="col-12">
</div>
	 <div class="col-12" id="login">
                    <div class="input_main">
						<h2 class="font-weight-bold">Log-in Account</h2>
                       <form  class="" method = "post">
		<div class="input-group"style="background-color:#072833;text-align:center">
        <input style="background-color:#072833;text-align:center" value = "<?php echo $sLname ?>"type="text" id="Lname" readonly="true" name = "Lname" class="email-bt"><br>
        <input style="background-color:#072833;text-align:center" value = "<?php echo $sFname ?>"type="text" id="Fname" readonly="true" name = "Fname" class="email-bt"><br>
        <input style="background-color:#072833;text-align:center" value = "<?php echo $sMname ?>"type="text" id="Mname" readonly="true" name = "Mname" class="email-bt"><br>
        <input style="background-color:#072833;text-align:center" value = "<?php echo $sYeargraduated ?>"type="number" id="Yeargraduated" readonly="true" name = "Yeargraduated" class="email-bt">
        <input style="background-color:#072833;text-align:center" value = "<?php echo $sBirthdate ?>" type="date" id="Birthdate" readonly="true" name = "Birthdate" class="email-bt"> <br>
        <input style="background-color:#072833;text-align:center" value = "<?php echo $sgender ?>"type="text" id="Gender" readonly="true" name = "Gender" class="email-bt"><br>
        
        <div class="col-md-12 row" style="font-size:22px;"><div class="col-md-12">CIVIL STATUS</div>
        <div class="col-md-3"><input type="radio" id="civilstatus" name = "civilstatus" class="mr-2" required value="Single"><label class="" for="civilstatus"> Single</label></div>
        <div class="col-md-3"><input type="radio" id="civilstatus" name = "civilstatus" class="mr-2" required value="Married"><label class="" for="civilstatus"> Married</label></div>
        <div class="col-md-3"><input type="radio" id="civilstatus" name = "civilstatus" class="mr-2" required value="Divorced"><label class="" for="civilstatus"> Divorced</label></div>
        <div class="col-md-3"><input type="radio" id="civilstatus" name = "civilstatus" class="mr-2" required value="Widowed"><label class="" for="civilstatus"> Widowed</label></div> 
        </div>
        
        <input style="text-align:center" type="Email" id="Email" name = "Email" class="email-bt border mt-2" placeholder="Email-Address"><br>
        <input style="text-align:center"type="Text" id="Fbname" name = "Fbname" class="email-bt border" placeholder="Facebook Name">
		<input style="text-align:center"type="number" id="Cnumber"  name = "Cnumber" class="email-bt border" placeholder="Contact Number">
        <input style="text-align:center"type="Text" id="username" name = "username" class="email-bt border" placeholder="Username" required>
        <input style="text-align:center"type="password" id = "password" name="password" class="email-bt border" placeholder="Password"required>
        <input style="text-align:center"type="password" id = "retypepassword" name="retypepassword" class="email-bt border" placeholder="Retype-Password" required>
<div class="container">
<div class="input-group row">
				<select name="sq1" id="sq1" class="col-md-12" style="background-color:#072833;text-align:center;color:white;font-size:20px;" required>
  					<Option class="col-md-12" value="Security Question No. 1"selected="selected" disabled>Security Question No. 1</option>
					  <option class="col-md-12" value="What primary school did you attend?" >What primary school did you attend?</option>
  					<option class="col-md-12" value="In what town or city was your first full time job?">In what town or city was your first full time job?</option>
					<option class="col-md-12" value="In what town or city did you meet your spouse or partner?">In what town or city did you meet your spouse or partner?</option>
  					<option class="col-md-12" value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
					<option class="col-md-12" value="What are the last five digits of your driver's license number?">What are the last five digits of your driver's license number?</option>
  					<option class="col-md-12" value="What is your grandmother's (on your mother's side) maiden name?">What is your grandmother's (on your mother's side) maiden name?</option>
  					<option class="col-md-12" value="What was the house number and street name you lived in as a child?">What was the house number and street name you lived in as a child?</option>
  					<option class="col-md-12" value="What were the last four digits of your childhood cellphone number?">What were the last four digits of your childhood cellphone number?</option>
					<option class="col-md-12" value="What is your spouse or partner's mother's maiden name?">What is your spouse or partner's mother's maiden name?</option>
  					<option class="col-md-12" value="In what town or city did your parents meet?">In what town or city did your parents meet?</option>
  					<option class="col-md-12" value="What time of the day were you born? (hh:mm)">What time of the day were you born? (hh:mm)</option>
  					<option class="col-md-12" value="What time of the day was your first child born? (hh:mm)">What time of the day was your first child born? (hh:mm)</option>
				</select>
				<input style="text-align:center"type="text" id = "sa1" name="sa1" class="email-bt border" placeholder="Answer" required>
				</div>
<div class="input-group row">
				<select class="col-md-12" name="sq2" id="sq2" class="col-md-12" style="background-color:#072833;text-align:center;color:white;font-size:20px;" required>
  					<Option class="col-md-12" value="Security Question No. 1"selected="selected" disabled>Security Question No. 2</option>
					  <option class="col-md-12" value="What primary school did you attend?" >What primary school did you attend?</option>
  					<option class="col-md-12" value="In what town or city was your first full time job?">In what town or city was your first full time job?</option>
					<option class="col-md-12" value="In what town or city did you meet your spouse or partner?">In what town or city did you meet your spouse or partner?</option>
  					<option class="col-md-12" value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
					<option class="col-md-12" value="What are the last five digits of your driver's license number?">What are the last five digits of your driver's license number?</option>
  					<option class="col-md-12" value="What is your grandmother's (on your mother's side) maiden name?">What is your grandmother's (on your mother's side) maiden name?</option>
  					<option class="col-md-12" value="What was the house number and street name you lived in as a child?">What was the house number and street name you lived in as a child?</option>
  					<option class="col-md-12" value="What were the last four digits of your childhood cellphone number?">What were the last four digits of your childhood cellphone number?</option>
					<option class="col-md-12" value="What is your spouse or partner's mother's maiden name?">What is your spouse or partner's mother's maiden name?</option>
  					<option class="col-md-12" value="In what town or city did your parents meet?">In what town or city did your parents meet?</option>
  					<option class="col-md-12" value="What time of the day were you born? (hh:mm)">What time of the day were you born? (hh:mm)</option>
  					<option class="col-md-12" value="What time of the day was your first child born? (hh:mm)">What time of the day was your first child born? (hh:mm)</option>
				</select>
				<input style="text-align:center"type="text" id = "sa2" name="sa2" class="email-bt border" placeholder="Answer" required>
				</div>
<div class="input-group row">
				<select name="sq3" id="sq3" class="col-md-12" style="background-color:#072833;text-align:center;color:white;font-size:20px;" required>
  					<Option class="col-md-12" value="Security Question No. 1"selected="selected" disabled>Security Question No. 3</option>
					  <option class="col-md-12" value="What primary school did you attend?" >What primary school did you attend?</option>
  					<option class="col-md-12" value="In what town or city was your first full time job?">In what town or city was your first full time job?</option>
					<option class="col-md-12" value="In what town or city did you meet your spouse or partner?">In what town or city did you meet your spouse or partner?</option>
  					<option class="col-md-12" value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
					<option class="col-md-12" value="What are the last five digits of your driver's license number?">What are the last five digits of your driver's license number?</option>
  					<option class="col-md-12" value="What is your grandmother's (on your mother's side) maiden name?">What is your grandmother's (on your mother's side) maiden name?</option>
  					<option class="col-md-12" value="What was the house number and street name you lived in as a child?">What was the house number and street name you lived in as a child?</option>
  					<option class="col-md-12" value="What were the last four digits of your childhood cellphone number?">What were the last four digits of your childhood cellphone number?</option>
					<option class="col-md-12" value="What is your spouse or partner's mother's maiden name?">What is your spouse or partner's mother's maiden name?</option>
  					<option class="col-md-12" value="In what town or city did your parents meet?">In what town or city did your parents meet?</option>
  					<option class="col-md-12" value="What time of the day were you born? (hh:mm)">What time of the day were you born? (hh:mm)</option>
  					<option class="col-md-12" value="What time of the day was your first child born? (hh:mm)">What time of the day was your first child born? (hh:mm)</option>
				</select>
				<input style="text-align:center"type="text" id = "sa3" name="sa3" class="email-bt border" placeholder="Answer" required>
				</div></div>
<br>
        <button type="submit" id="" name = "login" class="main_bt col-md-12">Save User Account</button>


	</form></div>
	
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