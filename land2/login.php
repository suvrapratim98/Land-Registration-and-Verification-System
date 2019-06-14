<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title>Land Survey and Urban Planning</title>
    <!--  Bootstrap Style -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!--  Font-Awesome Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!--  Font-Awesome Animation Style -->
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
     <!--  Pretty Photo Style -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
        <!--  Google Font Style -->
    
     <!--  Custom Style -->
    <link href="assets/css/style.css" rel="stylesheet" />
    

</head>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'user='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

<body>

   <div class="navbar navbar-default navbar-fixed-top menu-back">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">
                    <img src="logo1.png" class="navbar-brand-logo " alt="" />
                </a>
            </div>
            <div class="navbar-collapse collapse" >
                <ul class="nav navbar-nav navbar-right">
                   
                    <li class="dropdown">
                        <a href="index.php">HOME PAGE<i class="fa fa-folder-open-o"></i>
                            <span>Home</span>

                        </a>
                       
                    </li>
                    <li class="dropdown">
                        <a href="aboutus.php">ABOUT US<i class="fa fa-folder-open-o"></i>
                            <span>Know Us</span>

                        </a>
                        
                    </li>

                    <li class="dropdown ">
                        <a href="createaccount.php">REGISTER<i class="fa fa-image"></i>
                            <span>register with us</span>
                        </a>
                        
                    </li>

                   
                    <li class="dropdown active">
                        <a href="login.php">CHECK REGISTERATION STATUS <i class="fa fa-bars"></i>
                            <span>Login first</span>
                        </a>
                        
                    </li>
                     <li class="dropdown">
                        <a href="contact.php">CONTACT US <i class="fa fa-globe"></i>
                            <span>Any Problem?</span>
                        </a>

                    </li>
					<li class="dropdown">
                        <a href="searchver.php">CHECK VERIFICATION STATUS <i class="fa fa-bars"></i>
                            <span>Login first</span>
                        </a>
                        
                    </li>
					<li class="dropdown">
                        <a href="admin/index.php">Admin LOG IN <i class="fa fa-globe"></i>
                            <span>Account</span>
                        </a>

                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!--./ Top Menu End -->
	
	<section>
	<div class="container">
	<br><br><br><br><br><br><br>
	<div class="row"><hr>
	<div class="col-md-4">
	<h4>CHECK REGISTRATION STATUS?</h4>
	<p>You need to login first for security purpose</p>
	<p>Please do not share your username or password to any individual</p>
	</div>
	
	
	
	<div class="col-md-4">
	<form action="" method="POST">
	<input type="text" name="user" class="form-control" placeholder="Username" required><br>
											
											
											
                                            <input type="password" name="pass" class="form-control" placeholder="Password" required><br>	
                                        
										<button class="btn btn-info" name="login"><b>LOGIN</b></button> 
										</form>
										
										<?php
      if (isset($_POST['login'])){
								
								$user = $_POST['user'] or die('please enter a valid username');
								
								$password = $_POST['pass']or die('please enter a valid password');
								$query = "select * from landuser where username='".mysqli_real_escape_string($con,$user)."' AND password='".mysqli_real_escape_string($con,$password)."'";
								$result = mysqli_query($con,$query)or die(mysql_error());
								$row = mysqli_fetch_array($result);
								$num_row = mysqli_num_rows($result);
									
									if( $num_row > 0 ) {
										$_SESSION['user']=$row['username'];
										$_SESSION['pass']=$row['password'];
																		$_SESSION['name']=$row['name'];
																		$_SESSION['permanentaddress']=$row['permanentaddr'];
																		$_SESSION['lga']=$row['lga'];
																		$_SESSION['phonenum']=$row['phone'];
																		$_SESSION['useridd']=$row['userid'];
																		$_SESSION['pic']=$row['picture'];
																		
																		

										echo "<meta http-equiv='Refresh' content='1; url=myportal/index.php'>";
										
									}
									else{ 
								echo "<script>alert('Incorrect Password or Username! ')</script>";
								}
								}
								
?>
										
	</div>
	
	
	</div>
	
	
	<hr>
	</div></section>
	
	
	
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	
	<!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
        <!--  Custom Scripts -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
	