<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      	<li><a href="http://127.0.0.1/firstphp/Alumni_status.php">Alumni Status</a></li>
      </ul>
    </div>
</div>

	
</div>

<h1><p>TO know your ID visit alumni status above</p></h1>

<?php
         if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'mysql';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $id = $_POST['id'];
            $password = $_POST['password'];
            $company = $_POST['company'];
            $position = $_POST['position'];
            
            $sql = "UPDATE alumni SET company = '".$company."' , position = '".$position."'  WHERE password = '".$password."' AND id = '".$id."' ";
            mysql_select_db('alumni_db');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                     	<td width="100">ID</td>
                     	<td>
                     		<input type="text" name="id" id="id">
                     	</td>
                     </tr>

                     <tr>
                        <td width = "100">Password</td>
                        <td><input name = "password" type = "text" 
                           id = "password"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Company</td>
                        <td><input name = "company" type = "text" 
                           id = "company"></td>
                     </tr>

                     <tr>
                        <td width = "100">Position</td>
                        <td><input name = "position" type = "text" 
                           id = "position"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>

</body>
</html>