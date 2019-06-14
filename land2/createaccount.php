
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
    
    <title>Land Survey and Urban Planning</title>
    <!--  Bootstrap Style -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
     
    
        
    
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


<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('outputpix');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };</script>
  
  
   <style>
                                                     *{
	                                                              margin:0;
	                                                                 padding:0;
                                                                                  }
																				  
#outputpix{
	width:50%;
	height:130px;
	border-radius:20px;
	margin:10px;
}																				  
  </style>  
  

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

                    <li class="dropdown active">
                        <a href="createaccount.php">REGISTER<i class="fa fa-user"></i>
                            <span>Log in</span>
                        </a>
                        
                    </li>

                   
                    <li class="dropdown">
                        <a href="login.php">CHECK VERIFICATION STATUS <i class="fa fa-bars"></i>
                            <span>Login first</span>
                        </a>
                        
                    </li>
                     <li class="dropdown">
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
        <h4>Dont have an Account?. Create One Now</h4>
    </div>
    <!--./ Gereral Subhead End -->
    <section>
        <div class="container">
            <div class="row">

               
                <div class="col-lg-6 col-md-6  col-sm-12">
                    
                    <hr />
                    <form action="" method="POST" enctype="multipart/form-data">
					
					
					<div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">

								<div class="">
			<p>Select Your Profile Picture</p>
			<img src="images/faceless.png" alt="" class="img-responsive"  align="absmiddle" id="outputpix"/><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input type="file"  name="ufile1" id="ufile5" accept="image/*" onchange="loadFile(event)" required="" /><br>
			
			</div>
								
								
                                </div>
                            </div>
                            
                        </div>
					
					
					
					
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" required="required" placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="mail" class="form-control" name="email" placeholder="Email address" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pa" required="required" placeholder="Permanent Adress" />
                                </div>
								<div class="form-group">
                                    <input type="text" class="form-control" required="required" name="lga" placeholder="Local Government Area" />
                                </div>
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" required="required" placeholder="Phone Number" />
                                </div>
                            </div>
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user" onBlur="checkAvailability()" id="username" required="required" placeholder="Username" />
									<span id="user-availability-status"></span>
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" required="required" name="pass" placeholder="Password" />
                                </div>
                            </div> 
							</div>
								
								
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="create">Create Account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

				<?php
			 
				 if (isset($_POST['create'])){

$name=$_POST['name'];
$addr=$_POST['pa'];
$mail=$_POST['email'];
$phone=$_POST['phone'];
$lga=$_POST['lga'];

$user=$_POST['user'];
$pass=$_POST['pass'];

$imgname=$_FILES['ufile1']['name'];
$templocation=$_FILES['ufile1']['tmp_name'];
$realpath="userphoto/".$imgname;
$fakepath="userphoto/".$imgname;
$saveimg= move_uploaded_file($templocation,$fakepath);

$landuser="IMLSUP/USER/";
$generate=rand(0,5000000);
$userid=$landuser.$generate;





$check2=mysqli_query($con,"select * from landuser where username='$user' ");

	$row2=mysqli_num_rows($check2);
	
	if($row2 > 0 ){
		 echo"<script>alert('this user have been enrolled already,please try again')</script>";
		 
	}
	
	else{
		if($row2==0){
		$senddata2 = mysqli_query($con,"insert into landuser (name,email,permanentaddr,lga,phone,username,password,userid,picture) values
	('".mysqli_real_escape_string($con,$name)."','".mysqli_real_escape_string($con,$mail)."','".mysqli_real_escape_string($con,$addr)."',
	'".mysqli_real_escape_string($con,$lga)."','".mysqli_real_escape_string($con,$phone)."','".mysqli_real_escape_string($con,$user)."',
	'".mysqli_real_escape_string($con,$pass)."','$userid','".mysqli_real_escape_string($con,$realpath)."')")or die(mysqli_error()); 
	
		}
}
	if(@$senddata2){
		
	echo"<script>alert('$name, you enrolled succesfully')</script>";
	echo"<meta http-equiv='Refresh' content='1; url=login.php'>";
}

else{
echo"<script>alert('An error occured,please try again..')</script>";	
}
	
}
	?>
				
				
				
				
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
	
	
	