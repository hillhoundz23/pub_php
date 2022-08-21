<?php
    require('./database.php');

    if (isset($_POST['createinfo'])){
     $Fname = $_POST['Fname'];
	$Mname = $_POST['Mname'];
 	$Lname = $_POST['Lname'];
        $Gender = $_POST['Gender'];
        $EmailAddress = $_POST['Address'];
      	$YearGraduate = $_POST['Yeargraduate'];
        

        $queryCreate = "INSERT INTO registration VALUES (null,'$Fname','$Mname','$Lname','$Gender','$Address','$Yeargraduate')";
        $sqlCreate = mysqli_query($connection, $queryCreate);

        echo '<script>alert("Student Information Successfully Created")</script>';
        echo '<script>window.location.href = "/tracerSystem/Registration.php"</script>';
    }else {
        echo '<script>window.localtion.href = "/tracerSystem/Registration.php"</script>';
    }

?>