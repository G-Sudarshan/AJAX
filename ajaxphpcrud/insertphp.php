<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'ajaxcrud');

extract($_POST);
if(isset($_POST['submit'])){
	$q = "INSERT INTO ajaxinsert(username,password) values('$username','$password')";

	$query = mysqli_query($con,$q);
	header('location:inserts.php');
}

?>