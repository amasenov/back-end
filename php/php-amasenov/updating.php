<?php
session_start();
include_once 'dbconnect.php';
$uname = $_POST["uname"];
$uname = stripslashes($uname);
$uname = mysql_real_escape_string( $uname ); 
//$uname = md5( $uname);
$pass = $_POST['pass'];
$pass = stripslashes($pass);
$pass = mysql_real_escape_string( $pass ); 
//$pass = md5( $pass);
$sql = "UPDATE users SET password='$pass' WHERE username='$uname'";
        //if ( eregi ( "127.0.0.1", $_SERVER['HTTP_REFERER'] ) ){ 
try {
	mysql_query($sql);
  	header("Location: index.html");
}
catch (PDOException $e) {
	echo $e->getMessage();
	echo "Something wrong with our sever. Try to login later.";
}
//}
?>