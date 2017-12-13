<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user']))
{
  $sql = "SELECT * FROM users WHERE user_id=".$_SESSION['user'];
$res = mysql_query($sql);
$userRow=mysql_fetch_array($res);
}
if(!isset($_SESSION['user']))
{
header("Location: index.html");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
              <script type="text/javascript">
            function loadLogout(){
              window.location.assign("logout.php")
            }
      </script>
</head>
<body>
<div id="header">
	<div id="left">
    <label>User profile</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['username']; ?>&nbsp;
        	<a href="#" onclick="loadLogout()">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">
	<p>User name: <?php echo $userRow['username']; ?></p>
    <p>Email address: <?php echo $userRow['email']; ?></p>
</div>

</body>
</html>