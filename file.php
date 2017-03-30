<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
</head>
<body>

<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'mysql';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   echo 'Connected successfully';
   
   $sql = 'CREATE Database Alumni_db';
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create database: ' . mysql_error());
   }
   
   echo "Database Alumni_db created successfully\n";
   
   $sql = 'CREATE TABLE Alumni( '.
      'id INT NOT NULL AUTO_INCREMENT, '.
      'Name VARCHAR(20) NOT NULL, '.
      'Email  VARCHAR(20) NOT NULL, '.
      'password   VARCHAR(20) NOT NULL, '.
      'branch  VARCHAR(20) NOT NULL, '.
      'company VARCHAR(20) NOT NULL, '.
      'position   VARCHAR(20) NOT NULL, '.
      'primary key ( id ))';
   mysql_select_db('Alumni_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not create table: ' . mysql_error());
   }
   
   echo "Table Alumni created successfully\n";

   mysql_close($conn);
?>


</body>
</html>