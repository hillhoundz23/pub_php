
<head>
<title>Profile</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>



    <div class="header_resize">
      <div class="menu_nav">
        <ul>
           <li><a href="Survey.php"><span>Survey Questionaree</span></a></li>
			<li><a href="usergrad.php"><span>Profile</span></a></li>
          <li><a href="login.php"><span>Logout</span></a></li>
        </ul>
      </div>
      <div class="logo">
		  <h2><a 
		href="usergrad.php">Graduate<span> Tracer System</span><h1><small>Romblon Campus</small></h1></a>
  </div>
<br>
		  <br>
		  <br>

		 <br>
		  <br>
		  <br>
		  <br>
	<div id="container">
		<div id="left-nav">
		<?php
include 'config.php';

if ($login == 0) {
    echo " <meta http-equiv='refresh' content='0; url=profile.php'>";
 } else {

if (isset($_POST["u-btn"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
  
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $job = $_POST["job"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $folder = "usergraduate/".$filename;
    move_uploaded_file($tempname,$folder);

    if (empty($id) || empty($name) || empty($gender) || empty($dategraduated) ||  empty($address) || empty($contact) || empty($job) || empty($username) || empty($password) || empty($filename)) {

        echo "please Complete all data!!";
    } else {
        $insert = mysqli_query($conn,"INSERT INTO `addgrad` (`id`, `name`, `gender`, `address`, `contact`, `job`, `username`, `password`,`picsource`) VALUES ('$id', '$name', '$gender', '$address', '$contact', '$job', '$username', '$password', '$folder')");
        echo "success";
    } 
}

?>




<form action="userupdate.php" method="post" enctype="multipart/form-data">

<div> 
<h4> UPDATE YOUR PROFILE</H4>
</div>
<label> UniqueID No.  </label>
<input type="text" name="id" value=""><br /><br>

<label> Name  </label>
<input type="text" name="name" value=""><br /><br>

<label> Gender  </label>
<input type="text" name="gender" value=""><br /><br>



<label> Address  </label>
<input type="text" name="address" value=""><br /><br>

<label> Contact No.  </label>
<input type="text" name="contact" value=""><br /><br>

<label> Job  </label>
<input type="text" name="job" value=""><br /><br>

<label> Username  </label>
<input type="text" name="username" value=""><br /><br>

<label> Password  </label>
<input type="password" name="password" value=""><br /><br>




<input type="submit" name="u-btn" value="SAVE UPDATE"><br /><br>
<br>
<br>


<?php } ?>

