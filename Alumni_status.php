<!DOCTYPE html>
<html>
<head>
	<title>Alumni_status</title>
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
   
   echo "Here your Alumni_status <br><br>";

   mysql_select_db('alumni_db');
   $sql = 'SELECT id, Name, Email, password ,branch ,company ,position FROM Alumni';
   
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "ID :{$row['id']}  | ".
         "NAME : {$row['Name']} | ".
         "Branch : {$row['branch']} | ".
         "Company : {$row['company']} | ".
         "Position : {$row['position']} <br> ".
         "--------------------------------<br>";
   }
   
   mysql_close($conn);
?>

</body>
</html>