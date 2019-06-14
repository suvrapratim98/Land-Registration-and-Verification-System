<?php
session_start();
include "session.php";
include"connect.php";


if (!isset($_SESSION['pass'])){
	header("location:../login.php");
	exit();
} 

?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Portal..Evidence of Payment</title>
	
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       
    <link href="assets/css/custom.css" rel="stylesheet" />
    
</head>
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
	width:70%;
	height:230px;
	border-radius:20px;
	margin:10px;
}																				  
  </style>  
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff; font-size:12px;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li >
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    <li >
                        <a href="registerland.php"><i class="fa fa-edit "></i>Register Land</a>
                    </li>
                    <li>
                        <a href="documentation.php"><i class="fa fa-image "></i>Document Land</a>
                    </li>


                    <li class="active-link">
                        <a href="payment.php"><i class="fa fa-qrcode "></i>Upload Payment Details</a>
                    </li>
                    <li>
                        <a href="printslip.php"><i class="fa fa-bar-chart-o"></i>Print Slip</a>
                    </li>

                   
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
		
		
		
		
		
		<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h3>Payment Upload BEGINS HERE</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                   <p>Instructions: Fill Payment Details</p>
                       
                    </div>
                    </div>
					
					
					<div class="row">
                    <div class="col-lg-9 ">
                        
						<form action="" method="POST" enctype="multipart/form-data">
						
						<p>click "Browse" to upload a picture as evidence of payment</p>
			<img src="" alt="" class="img-responsive"  align="absmiddle" id="outputpix"/><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input type="file"  name="ufile2" id="ufile5" accept="image/*" onchange="loadFile(event)" required="" /><br>
				
				
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tn" required="required" placeholder="Teller Number" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pd" placeholder="Payment Date" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="upn" required="required" placeholder="UPN (Unique Parcel Number)" />
                                </div>
								<div class="form-group">
                                    
									
									<div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="upload">Upload Payment Evidence</button>
                                </div>
                                </div>
								<div class="row">
								
								
								
                                
                            </div>
                        </div>
                    </form>
						
						
						<?php
			

				 if (isset($_POST['upload'])){

$teller=$_POST['tn'];
$datepay=$_POST['pd'];
$upn=$_POST['upn'];

$imgname=$_FILES['ufile2']['name'];
$templocation=$_FILES['ufile2']['tmp_name'];
$realpath="paymentphoto/".$imgname;
$fakepath="paymentphoto/".$imgname;
$saveimg= move_uploaded_file($templocation,$fakepath);


$dateup=date('d/m/y');




$check1=mysqli_query($con,"select * from payment where tellerno='$teller' ");

	$row1=mysqli_num_rows($check1);
	if($row1 > 0 ){
		 echo"<script>alert('this teller has been uploaded already..')</script>";
		 
	}
	
	else{
		
		$senddata1 = mysqli_query($con,"insert into payment (tellerno,date_uploaded,payment_date,upn,photo) values
	('".mysqli_real_escape_string($con,$teller)."','".$dateup."','".mysqli_real_escape_string($con,$datepay)."','".mysqli_real_escape_string($con,$upn)."',
	'$realpath')")or die(mysqli_error($con));
	 
	
		}

	if(@$senddata1){
		
	echo"<script>alert('$name, Your Payment Has Been Uploaded!');</script>";
	
}

else{
echo"<script>alert('An error occured,please try again)</script>";	
}
				 }

	?>

						
						
				
                       
                    </div>
                    </div>
		
		
		
		</div>
		</div></div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 polynek| Design by: <a href="" style="color:#fff;" target="_blank">Ikechukwu Sunday</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
     
	
	
	
	 <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
