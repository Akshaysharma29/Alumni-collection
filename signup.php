<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
	
</nav>

<div style="text-align: center">
  <h2>Enter your detail to get register</h2> 
</div>

<?php
         if(isset($_POST['add'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'mysql';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            if(! get_magic_quotes_gpc() ) {
               $name = addslashes ($_POST['name']);
               $email = addslashes ($_POST['email']);
            }else {
               $name = $_POST['name'];
               $email = $_POST['email'];
            }
            
            $password = $_POST['password'];
            $branch = $_POST['branch'];
            $company = $_POST['company'];
            $position = $_POST['position'];
            
            $sql = "INSERT INTO Alumni ". "(Name ,
            Email  ,
            password ,
            branch  ,
            company ,
           position ) ". "VALUES('$name','$email','$password','$branch', '$company' , '$position' )";
               
            mysql_select_db('Alumni_db');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Registered successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <div class="container-fluid">

  <div class="row">
     <div class="col-sm-5"></div>
     <div class="col-sm-2">
        <br><br><br><br>  
      <b>Name :</b> <input type="text" name="name" placeholder="Enter Name" id = "name" required><br><br>
      <b>Email :</b> <input type="text" name="email" placeholder="Enter Email" id = "email" required><br><br>
      <b>Password :</b><input type="text" name="password" placeholder="Enter password" id = "password" required><br><br>
      <b>Branch :</b><input type="text" name="branch" placeholder="Enter branch" id = "branch" required><br><br>
      <b>Company :</b><input type="text" name="company" placeholder="Job place" id = "company" required><br><br>
      <b>Position :</b><input type="text" name="position" placeholder="Enter position" id = "position"><br><br>
      <input type="submit" name="add" id="add" class="btn btn-primary" >
     </div>
    <div class="col-sm-5"></div>
  </div>
  
</div>
               </form>
            
            <?php
         }
      ?>

</body>
</html>