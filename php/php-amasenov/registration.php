<?php
session_start();
include_once 'dbconnect.php';
$uname = $_POST["uname"];
$uname = stripslashes($uname);
$uname = mysql_real_escape_string( $uname ); 
//$uname = md5( $uname);
$email = $_POST["email"];
$email = stripslashes($email);
$email = mysql_real_escape_string( $email ); 
//$email = md5( $email);
$pass = $_POST['pass'];
$pass = stripslashes($pass);
$pass = mysql_real_escape_string( $pass ); 
//$pass = md5( $pass);
$aboutme = $_POST['aboutme'];
$aboutme = stripslashes($aboutme);
$aboutme = mysql_real_escape_string( $aboutme ); 
//$aboutme = md5( $aboutme);
$gender = $_POST['gender'];
$sql = "INSERT INTO users(username, email, password, aboutme, gender) VALUES ('$uname','$email', '$pass', '$aboutme', '$gender');";
try {
	//$conn->query($sql);
	mysql_query($sql);
	$sqlselect = "SELECT user_id FROM users WHERE email = '$email';";
	
	// Let's connect to host
     //mysql_connect('localhost', 'dbi251195', 'GME7PlrdGQ') or DIE('Connection to host is failed,        perhaps the service is down!');
     // Select the database
      //mysql_select_db('dbi251195') or DIE('Database name is not available!');
	
	$res = mysql_query($sqlselect);
	$rows = mysql_num_rows($res);
  $userRow=mysql_fetch_array($res);
  $_SESSION['user'] = $userRow['user_id'];
  header("Location: home.php");
}
catch (PDOException $e) {
	echo $e->getMessage();
	echo "Something wrong with our sever. Try to register later.";
}
?>