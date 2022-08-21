<?php
include 'config.php';

if ($login == 1) {
    echo " <meta http-equiv='refresh' content='0; url=profile.php'>";
 } else {

if (isset($_POST["u-btn"])) {

    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $dategraduated = $_POST["dategraduated"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $filename = $_FILES["uploadfile"] ["name"];
    $tempname = $_FILES["uploadfile"] ["tmp_name"];
    $folder = "usergraduate/".$filename;
    move_uploaded_file($tempname,$folder);

    if (empty($name) || empty($gender) || empty($dategraduated) || empty($address) || empty($username) || empty($username) || empty($password) || empty($filename)) {

        echo "please Complete all data!!";
    } else {
        $insert = mysqli_query($conn,"INSERT INTO `addgrad` (`name`, `gender`, `dategraduated`, `address`, `username`, `password`,`picsource`) VALUES ('$name', '$gender', '$dategraduated', '$address', '$username', '$password', '$folder')");
        echo "success";
    }
}

?>




<form action="register.php" method="post" enctype="multipart/form-data">
<div> 
<h1>We need your information to check if you are listed to the system</H1>
</div>

<label>Name </label>
<input type="text" name="name" value=""><br /><br>

<label> Gender  </label>
<input type="text" name="gender" value=""><br /><br>

<label> Year Graduated  </label>
<input type="text" name="Year Graduated" value=""><br /><br>

<label> Email Address  </label>
<input type="text" name="address" value=""><br /><br>

<label> Contact Number  </label>
<input type="text" name="username" value=""><br /><br>

<label> Address  </label>
<input type="password" name="password" value=""><br /><br>
<button type="submit" name = "Submit" class="main_bt">Submit</button><br>

<label> <H2> PROFILE HERE</H2>  </label>
<input type="file" name="uploadfile" value=""><br /> <br><br>


<input type="submit" name="u-btn" value="ADD GRADUATE"><br /><br>
<br>
<br>

<a href="login.php">Sign in</a>
<?php } ?>

