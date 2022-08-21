<?php
  require('./masterinfo.php');
?>

<html>
<head>
<title>Registers</title>
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript">
</script>
</head>
<body>
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h2>Web-based Tracer System for RSU Romblon Campus</a></h2>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="Dash.php">Dashboard</a></li>
		 <li><a href="View.php">View of Survey</a></li>
        <li class="active"><a href="Registers.php">Registration</a></li>
        <li><a href="bsitalumnimasterlist.php">List of Graduate</a></li>
        <li><a href="Login.php">Log out</a></li>
        
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
	
<div class="wrapper col2">
<div id="featured_slide">
	
    <div class="featured_box"><img src="logorsu.png" alt="" width="406" /></a>
        <div> 
			<form class=create-main" action="/final/addmasterinfo.php" method ="post">
	<form action="/php-chart/create.php method = "post">
			<h6><center>Register of Graduate</center></h6>					  
<label>Fullname</label>
<input type="text" name="name" value=""><br><br>
<label>Gender</label>
<input type="text" name="gender" value=""><br><br>
<label>Course</label>
<input type="text" name="course" value=""><br><br>
<label>Year Graduate</label>
<input type="text" name="yeargraduate" value=""><br><br>
<label>Address</label>
<input type="text" name="address" value=""><br><br>
		<input type="submit" name="createinfo" value="SAVE"><br><br>
			</form>
<br>
<br>

        
      </div>

      </div>
    </div>
    <br>
	<br>
<br>
	<br>

	<br>
	<br>

	<br>
	<br>

<div class="wrapper col5">
  <div id="copyright">
    <p class="Center">Copyright &copy; Web-based Tracer System for RSU Romblon Campus - All Rights Reserved -</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>