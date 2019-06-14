<?php

session_start();
include"connect.php";



?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
	
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       
    <link href="assets/css/custom.css" rel="stylesheet" />
    
</head>
<body>
     
           
          
    <div id="wrapper">
	<div class="row">
	
	<div class="col-md-4">
	
	</div>
	
	<div class="col-md-4">
	<h4>Admin Authentication</h4>
	<form action="" method="POST">
	
	<input class="form-control" name="user" type="text" placeholder="Username" required><br>
	<input class="form-control" name="pass" type="password" placeholder="password" required><br>
	
	<button class="btn btn-info" name="submit">LOGIN</button>
	
	</form>
	
	
						<?php
      if (isset($_POST['submit'])){
								
								
								$user = $_POST['user']or die('please enter a valid username');
								$password = $_POST['pass']or die('please enter a valid password');
								$query = "select * from admin where  password='".mysqli_real_escape_string($con,$password)."' AND username='".mysqli_real_escape_string($con,$user)."' ";
								$result = mysqli_query($con,$query)or die(mysqli_error());
                                $row = mysqli_fetch_array($result);
								$num_row = mysqli_num_rows($result);
									
									if( $num_row > 0 ) {
										
										$_SESSION['passi']=$row['password'];								
																		

										echo "<meta http-equiv='Refresh' content='1; url=dashboard.php'>";
										
									}
									else{ 
								echo "<script>alert('Invalid Username or Password! ')</script>";
								echo "<p style='color:red;'>You are not an admin!</p>";
								}
								}
								
?>
	
	
	
	</div>
	
	</div>
	
	
         </div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		 
     
	
	
    
   
</body>
</html>
