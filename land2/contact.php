
<?php
include 'connect.php';
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title>Contact Us:Land Survey and Urban Planning</title>
    <!--  Bootstrap Style -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
     
    
        
    
     <!--  Custom Style -->
    <link href="assets/css/style.css" rel="stylesheet" />
    

</head>


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

                    <li class="dropdown">
                        <a href="createaccount.php">REGISTER<i class="fa fa-user"></i>
                            <span>register with us</span>
                        </a>
                        
                    </li>

                   
                    <li class="dropdown">
                        <a href="login.php">CHECK VERIFICATION STATUS <i class="fa fa-bars"></i>
                            <span>Login first</span>
                        </a>
                        
                    </li>
                     <li class="dropdown active">
                        <a href="contact.php">CONTACT US <i class="fa fa-globe"></i>
                            <span>Any Problem?</span>
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
    <div class="div-social-top">

        <i class="fa fa-globe "></i>E-mail:  suvrapratim98@gmail.com   | <i class="fa fa-mobile "></i>Call: : +919830282284  |  <i class="fa fa-map-marker "></i>Location : Bangalore,India &nbsp;
              <a href="#">
                  <i class="fa fa-facebook-square "></i>
              </a>


    </div>
    <!--./ Social Div End -->
	
	
	<div class="general-subhead">
        <h2>CONTACT US</h2>
    </div>
    <!--./ Gereral Subhead End -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6  col-sm-12">
                    <h3>Reach Us Here</h3>
                    <hr />
                    <p>
                        303, Pavani Pearl Road, JP Nagar, Bangalore-560066, Karnataka,India
                            <br />
                        Call: +91 9830282284
                            <br />
                        e-mail:  suvrapratim98@gmail.com
                             <br />
                    </p>
                    <h3>We Are Social</h3>
                    <a href="#"><i class="fa fa-facebook-square fa-3x color-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter-square fa-3x color-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square fa-3x color-google-plus"></i></a>
                    
                </div>
                <div class="col-lg-6 col-md-6  col-sm-12">
                    <h3>Need Help ? Write Us. </h3>
                    <hr />
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" required="required" placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="mail" placeholder="Email address" />
                                </div>
                            </div>
							
							 <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" required="required" placeholder="Phone Number" />
                                </div>
                            </div>
							
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" required="required" name="message" class="form-control" rows="4" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" type="submit" class="btn btn-success" name="ok">Submit Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
					
					<?php
			 
				 if (isset($_POST['ok'])){

$name=$_POST['name'];
$mess=$_POST['message'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];



	
		$senddata2 = mysqli_query($con,"insert into message (name,email,message,phone) values
	('".mysqli_real_escape_string($con,$name)."','".mysqli_real_escape_string($con,$mail)."','".mysqli_real_escape_string($con,$mess)."',
	'".mysqli_real_escape_string($con,$phone)."')")or die(mysqli_error()); 
	
		

	if(@$senddata2){
		
	echo"<script>alert('$name, your message has been sent..do wait for our reply')</script>";
}

else{
echo"<script>alert('An error occured,please try again..')</script>";	
}
	
}
	?>
					
					
					
                </div>

            </div>
        </div>

    </section>
    <!--./ Main Contact end -->
	
	
	
	<div id="footser-end">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    2018 All Rights Reserved | by: <a href="" target="_blank" style="color:#fff" >Suvrapratim Roy</a>
                    
                </div>
            </div>

        </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	<!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
        <!--  Custom Scripts -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
	
	
	