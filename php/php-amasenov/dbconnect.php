<?php 
//$username = "dbi251195";
//$password = "GME7PlrdGQ";
try 
{
	//$conn = new PDO('mysql:host=localhost;dbname=dbi251195', $username, $password);
	//$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// Let's connect to host
     mysql_connect('localhost', 'dbi251195', 'GME7PlrdGQ') or DIE('Connection to host is failed,        perhaps the service is down!');
     // Select the database
      mysql_select_db('dbi251195') or DIE('Database name is not available!');
} 
catch (PDOException $e) 
{
  echo "Connection failded: ". $e->getMessage();
}
?>
