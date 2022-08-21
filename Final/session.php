<?php
include("database.php");
session_start();
if (!isset($_SESSION['id'])){
header('location:login.php');
}

$id = $_SESSION['id'];

$query=mysql_query ("SELECT * FROM user WHERE user_id ='$id'") or die(mysql_error());
$row=mysql_fetch_array($query);
$lastname=$row['username'];
$username=$row['password'];
?>