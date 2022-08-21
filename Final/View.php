<?php
  require('./readstudentinfo.php');
?>


<html>
<head>
<title>View of Survey</title>
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
		 <li class="active"><a href="View.php">View of Survey</a></li>
        <li><a href="Registers.php">Registration</a></li>
        <li><a href="bsitalumnimasterlist.php">List of Graduate</a></li>
        <li><a href="Login.php">Log out</a></li>
        
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col2">
<div id="featured_slide">
        <div> 
			<h6><center>View of Survey</center></h6>
	<div class="article">
          <table border="1" width="660" class="read-main">

  
			<tr>
				<th bgcolor="aqua">Student Name</th>
				<th bgcolor="aqua" >Gender</th>
				<th bgcolor="aqua" >Civil Status</th>
				<th bgcolor="aqua" >Course</th>
				<th bgcolor="aqua" >Major</th>
				<th bgcolor="aqua" >Year Graduate</th>
				<th bgcolor="aqua" >Current Job</th>
			</tr>

      <?php while($result = mysqli_fetch_array($sqlStudentinfor)) { ?>

      <tr>
        <td ><?php echo $result['name']?></td>
        <td><?php echo $result['gender']?></td>
		<td><?php echo $result['civil']?></td>
		<td><?php echo $result['course']?></td>
		<td><?php echo $result['major']?></td>
        <td><?php echo $result['yeargraduated']?></td>
 		<td><?php echo $result['currentjob']?></td>
      

			</tr>
      <?php } ?> 
		</table>
        </div>

      </div>
    </div>
    
</div>
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