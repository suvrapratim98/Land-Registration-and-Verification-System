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
    <title>My Portal..Registration of Land</title>
	
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       
    <link href="assets/css/custom.css" rel="stylesheet" />
    
</head>
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
                   

                    <li class="active-link">
                        <a href="registerland.php"><i class="fa fa-edit "></i>Register Land</a>
                    </li>
                    <li>
                        <a href="documentation.php"><i class="fa fa-image "></i>Document Land</a>
                    </li>


                    <li>
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
                     <h3>LAND REGISTRATION BEGINS HERE</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                   <p>Instructions: Fill the necessary details</p>
                       
                    </div>
                    </div>
					
					
					<div class="row">
                    <div class="col-lg-9 ">
                        
						<form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="sd" required="required" placeholder="Survey Date of the Land" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="clu" placeholder="Current Land use" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ala" required="required" placeholder="Address of the Land Acquired" />
                                </div>
								<div class="form-group">
                                    <input type="text" class="form-control" required="required" name="lga" placeholder="Local Government Area" />
                                </div>
								<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select name="ay" class="form-control" required>
									<option value="">--Acquisition Year--</option>
									<option value="1990">1990</option> 
									<option value="1991">1991</option> 
								   <option value="1992">1992</option> 
								   <option value="1993">1993</option> 
								   <option value="1994">1994</option> 
								   <option value="1995">1995</option> 
								   <option value="1996">1996</option> 
								   <option value="1997">1997</option> 
								   <option value="1998">1998</option> 
								   <option value="1999">1999</option> 
								   <option value="2000">2000</option> 
								   <option value="2001">2001</option> 
								   <option value="2002">2002</option>
								   <option value="2003">2003</option>
								   <option value="2004">2004</option>
								   <option value="2005">2005</option>
								   <option value="2006">2006</option>
								   <option value="2007">2007</option>
								   <option value="2008">2008</option>
								   <option value="2009">2009</option>
								   <option value="2010">2010</option>
								   <option value="2011">2011</option>
								   <option value="2012">2012</option>
								   <option value="2013">2013</option>
								   <option value="2014">2014</option>
								   <option value="2015">2015</option>
								   <option value="2016">2016</option>
								   <option value="2017">2017</option> 
								   
								   
									</select>
									
                                </div>
                            </div>
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									
									<select name="ht" class="form-control" required>
									<option value="">--Select Holding Type--</option>
									<option value="Communal">Communal</option> 
									<option value="Private">Private</option> 
								  
								   
								   
									</select>
									
									
                                </div>
                            </div> 
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<select name="sf" class="form-control" required>
									<option value="">--Select Soil Fertility--</option>
									<option value="Poor">Poor</option> 
									<option value="Fair">Fair</option> 
									<option value="Medium">Medium</option> 
									<option value="Rich">Rich</option> 
									<option value="Excellent">Excellent</option> 
								  
								   
								   
									</select>
									
                                </div>
                            </div> 
							
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<select name="en" class="form-control" required>
									<option value="">--Encumbrance--</option>
									<option value="terms of Right">Terms of Right</option> 
									<option value="Interest">Interest</option> 
									<option value="Liability">Liability/Burden</option> 
									
								  
								   
								   
									</select>
									
                                </div>
                            </div> 
							
							
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<input type="text" class="form-control" required="required" name="oe" placeholder="Other Evidence" />
									
                                </div>
								
                            </div> 
							
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<input type="text" class="form-control" required="required" name="omsn" placeholder="Orthograph map sheet No:" />
									
                                </div>
								
                            </div> 
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<input type="text" class="form-control" required="required" name="cn" placeholder="Certificate Number:" />
									
                                </div>
								
                            </div> 
							
							
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<input type="text" class="form-control"  name="soldby" placeholder="sold by who (if any)" />
									
                                </div>
								
                            </div> 
							
							
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<input type="text" class="form-control" required="required" name="gps" placeholder="Gps Coordinates Format:(41 24.2028, 2 10.4418)" />
									
                                </div>
								
                            </div> 
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    
									<textarea class="form-control" name="wnote" placeholder="Any Written Note?"></textarea>
									
                                </div>
								
                            </div> 
							
							
							</div>
								
								
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="reg">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
						
						
						<?php
			

				 if (isset($_POST['reg'])){

$survey=$_POST['sd'];
$landuse=$_POST['clu'];
$address=$_POST['ala'];
$lga=$_POST['lga'];
$acquisition=$_POST['ay'];
$holdtype=$_POST['ht'];
$soil=$_POST['sf'];
$en=$_POST['en'];
$evidence=$_POST['oe'];
$ortho=$_POST['omsn'];
$certnum=$_POST['cn'];

$soldby=$_POST['soldby'];
$cord=$_POST['gps'];
$note=$_POST['wnote'];

$stat="Pending";

$datereg=date('d/m/y');

$userid=$_SESSION['useridd'];

 $auto1=rand(0,999);
$shuffle=str_shuffle('MDIMSL');
$holdnum="IMSLU/$auto1$shuffle/HOLDER";

$auto=rand(0,999);
$format="IMSLU/2017/";
$auto=rand(0,999);
$upn=$format.$auto;


$check1=mysqli_query($con,"select * from regland where upn='$upn' ");

	$row1=mysqli_num_rows($check1);
	if($row1 > 0 ){
		 echo"<script>alert('This Land has been registered already,please try again')</script>";
		 
	}
	
	else{
		if($row1==0){
		$senddata1 = mysqli_query($con,"insert into regland (address_of_land,lga,acquisition_year,survey_date,holding_type,current_land_use,
		userid,certificate_number,holding_number,soil_fertility,other_evidence,encumbrance,orthograph_num,upn,soldby,gps_coordinates,note,date_registered,status,photo,username) values
	('".mysqli_real_escape_string($con,$address)."','".mysqli_real_escape_string($con,$lga)."','".mysqli_real_escape_string($con,$acquisition)."',
	'".mysqli_real_escape_string($con,$survey)."','".mysqli_real_escape_string($con,$holdtype)."','".mysqli_real_escape_string($con,$landuse)."',
	'$userid','".mysqli_real_escape_string($con,$certnum)."','".mysqli_real_escape_string($con,$holdnum)."',
	'".mysqli_real_escape_string($con,$soil)."','".mysqli_real_escape_string($con,$evidence)."','".mysqli_real_escape_string($con,$en)."',
	'".mysqli_real_escape_string($con,$ortho)."','".mysqli_real_escape_string($con,$upn)."','".mysqli_real_escape_string($con,$soldby)."','".mysqli_real_escape_string($con,$cord)."',
	
	'".mysqli_real_escape_string($con,$note)."','$datereg','$stat','$pic','$name')")or die(mysqli_error($con));
	 
	
		}
}
	if(@$senddata1){
		
	echo"<p style='color:green;'>Land Registered.. do documentation and upload payment details for full registration</p><br>
	<strong>Your Unique Parcel Number (UPN) is :</strong> <span style='color:brown; font-size:20px; font-weight:bold'>$upn</span>
	";
	
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
                    &copy;  2017 polynek| Design by: <a href="" style="color:#fff;" target="_blank">Nwanezide Onyedikachi And Ohanwe Kasarachi</a>
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
