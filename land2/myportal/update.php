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
<style type="text/css" media="print">
            @media print {
                body * {
					
                    visibility:hidden;
                } 
                #printable, #printable * {
					
                    visibility:visible;
					width:100%;
                }
                #printable { /* aligning the printable area */
                    position:absolute;
                    left:0;
                    top:0;
                }
				.badge{
					background-color:gray;
				}
				
				
				.bold{
	font-weight:bold;
}

.width{
	width:20%;
}

#outputpix{
width:30%;
	
	border-radius:20px;
	margin:10px;
}					
				
				
				
				
            }


		


            </style>
<style type="text/css" media="print">
    @page { 
        size: potriat;
    }
    
	body *{
	padding:0;
	margin:0;
}
</style>

<style>
*{
	padding:0;
	margin:0;
}

.bold{
	font-weight:bold;
}

.width{
	width:20%;
}

#outputpix{
	width:50%;
	height:130px;
	border-radius:20px;
	margin:10px;
}					


</style>



      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update..My Portal's Dashboard</title>
	
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
                  <a href="logout.php" style="color:#fff;font-size:12px;">LOGOUT</a>  

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
                   

                    <li>
                        <a href="registerland.php"><i class="fa fa-edit "></i>Register Land</a>
                    </li>
                    <li >
                        <a href="documentation.php"><i class="fa fa-image "></i>Document Land</a>
                    </li>


                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode "></i>Upload Payment Details</a>
                    </li>
                    <li class="active-link">
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
                     <h3>UPDATE REGISTERED LAND </h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                
					
					
					<div class="row ">
                    <div class="col-lg-12 ">
                       <form action="" method="POST"> 
					   
					   <div class="col-md-7 hider">
					   <div class="input-group">
  <span class="input-group-addon">upn</span>
  <input type="text" name="upn" class="form-control" placeholder="Enter Unique parcel Number for the land you wish to update" required><br>
 
</div>
 <br><button class="btn btn-info pull-right" type="submit" name="fetch">Fetch Details</button>
</div>
					</form>	
						
                       
                    </div>
                    </div>
		
		<?php
				


if(isset($_POST['fetch'])){
	$upn= $_POST['upn'];
	$userid=$_SESSION['useridd'];
	$name=$_SESSION['name'];
	
	$mysqli="select * from regland where upn='$upn' AND userid='$userid'";
	$myquery=mysqli_query($con,$mysqli) or die(mysqli_error($con));
	
	$checking=mysqli_num_rows($myquery);
	
	if ($checking > 0){
		$row = mysqli_fetch_object($myquery);
		echo"<style>.hider{display:none;}</style>";
		
		
		echo @"
		
		<form action='' method='POST'>
		<div class='panel panel-default' id='printable'>
                        <div class='panel-heading'>
                             <strong>Full Details of $row->username</strong>
                        </div>
                        <div class='panel-body'>
						
						
						<!-----------------------------1st row---------------------------------------->
						<div class='row'>
						
						<div class='col-md-8'>
                            
                                
								
	
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class='width'>
								<strong>Owner's Name</strong>
								</td>
								
								<td class='width1'>
								 $row->username
								</td>
								
								
								
								
								
								</tr>
								
								<tr>
								
								<td class='width'>
								<strong>Address of Land</strong>
								</td>
								
								<td class='width1'>
								 <input type='text' class='form-control' name='ala' required='required' placeholder='ADDRESS OF Land' value='$row->address_of_land' />
								</td>
								</tr>
								
								<tr>
								
								<td class='width'>
								<strong>LGA</strong>
								</td>
								
								<td class='width1'>
								<input type='text' class='form-control' name='lga' required='required' placeholder='Local Government' value='$row->lga' />
								</td>
								</tr>
								
								
								
								
								<tr>
								
								<td class='width'>
								<strong>Holding Number</strong>
								</td>
								
								<td class='width1'>
								 $row->holding_number
								</td>
								</tr>
								
								<tr>
								
								<td class='width'>
								<strong>Unique Parcel No</strong>
								</td>
								
								<td class='width1'>
								<input type='text' class='form-control' name='upni' required='required' placeholder='' value='$row->upn' style='display:none;'/>
								</td>
								</tr>
								
								
								
								</table>
								
				
								</div>
								
								<div class='col-md-3'>
								<img src='../images/faceless.png' alt='' class='img-responsive'  align='absmiddle' id='outputpix'/><br />
								</div>
								
								
								
								
								</div>
								
								
								<!-------------------------2nd row---------------------------------------------------------->
								<div class='row'>
								
								<!-------------------------first column left------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Certificate Number</strong>
								</td>
								
								<td class=''>
								 <input type='text' class='form-control' value='$row->certificate_number' required='required' name='cn' placeholder='Certificate Number:' />
								</td>
								</tr>
								
								</table>
								
								</div>
								
								<!----------------------------------second column right------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Gps Co-ordinates</strong>
								</td>
								
								<td class=''>
								<input type='text' class='form-control' required='required' value='$row->gps_coordinates' name='gps' placeholder='Gps Coordinates Format:(41 24.2028, 2 10.4418)' />
								</td>
								</tr>
								
								</table>
								
								</div>
								</div>
								
								
								<!-------------------------3rd row---------------------------------------------------------->
								<div class='row'>
								
								<!-------------------------first column left------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Acquisition Year</strong>
								</td>
								
								<td class=''>
								<select name='ay' class='form-control' required>
									<option value='$row->acquisition_year'>$row->acquisition_year</option>
									<option value='1990'>1990</option> 
									<option value='1991'>1991</option> 
								   <option value='1992'>1992</option> 
								   <option value='1993'>1993</option> 
								   <option value='1994'>1994</option> 
								   <option value='1995'>1995</option> 
								   <option value='1996'>1996</option> 
								   <option value='1997'>1997</option> 
								   <option value='1998'>1998</option> 
								   <option value='1999'>1999</option> 
								   <option value='2000'>2000</option> 
								   <option value='2001'>2001</option> 
								   <option value='2002'>2002</option>
								   <option value='2003'>2003</option>
								   <option value='2004'>2004</option>
								   <option value='2005'>2005</option>
								   <option value='2006'>2006</option>
								   <option value='2007'>2007</option>
								   <option value='2008'>2008</option>
								   <option value='2009'>2009</option>
								   <option value='2010'>2010</option>
								   <option value='2011'>2011</option>
								   <option value='2012'>2012</option>
								   <option value='2013'>2013</option>
								   <option value='2014'>2014</option>
								   <option value='2015'>2015</option>
								   <option value='2016'>2016</option>
								   <option value='2017'>2017</option> 
								   <option value='2018'>2018</option> 
								   
								   
									</select>
								</td>
								</tr>
								
								</table>
								
								</div>
								
								<!----------------------------------second column right------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Survey Date</strong>
								</td>
								
								<td class=''>
								 <input type='text' class='form-control' value='$row->survey_date' name='sd' required='required' placeholder='Survey Date of the Land' /> 
								</td>
								</tr>
								
								</table>
								
								</div>
								</div>
								
								
								
								
								<!-------------------------4th row---------------------------------------------------------->
								<div class='row'>
								
								<!-------------------------first column left------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Holding Type</strong>
								</td>
								
								<td class=''>
								 <select name='ht' class='form-control' required>
									<option value='$row->holding_type'>$row->holding_type</option>
									<option value='Communal'>Communal</option> 
									<option value='Private'>Private</option> 
								  
								   
								   
									</select>
								</td>
								</tr>
								
								</table>
								
								</div>
								
								<!----------------------------------second column right------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Sold By Who</strong>
								</td>
								
								<td class=''>
								<input type='text' class='form-control' required='required' value='$row->soldby' name='soldby' placeholder='who sold it to You?' />
								</td>
								</tr>
								
								</table>
								
								</div>
								</div>
								
								
								
								<!-------------------------5th row---------------------------------------------------------->
								<div class='row'>
								
								<!-------------------------first column left------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Encumbrace</strong>
								</td>
								
								<td class=''>
								 <select name='en' class='form-control' required>
									<option value='$row->encumbrance'>$row->encumbrance</option>
									<option value='terms of Right'>Terms of Right</option> 
									<option value='Interest'>Interest</option> 
									<option value='Liability'>Liability/Burden</option> 
									
								  
								   
								   
									</select>
								</td>
								</tr>
								
								</table>
								
								</div>
								
								<!----------------------------------second column right------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<strong>Other Evidence</strong>
								</td>
								
								<td class=''>
								<input type='text' class='form-control' required='required' value='$row->other_evidence' name='oe' placeholder='Any Evidence?' />
								</td>
								</tr>
								
								</table>
								
								</div>
								</div>
								
								 <button type='submit' class='btn btn-warning' name='update'><strong>Update</strong></button>
								
								</form>
								
								</div>
								
								
                            </div>
							
		
		
		";

		
	}
	else{
	echo "<script>alert('sorry, your land does not exist')</script>";	
	}
}




?>				
		
	
		
		
		</div>
		
		
		<?php

if (isset($_POST['update'])){


$survey=$_POST['sd'];

$address=$_POST['ala'];
$lga=$_POST['lga'];
$acquisition=$_POST['ay'];
$holdtype=$_POST['ht'];


$upno=$_POST['upni'];

$en=$_POST['en'];
$evidence=$_POST['oe'];

$certnum=$_POST['cn'];

$soldby=$_POST['soldby'];
$cord=$_POST['gps'];

$updatedate=date('d/m/y');

$up=mysqli_query($con,"UPDATE regland set address_of_land='".mysqli_real_escape_string($con,$address)."',
lga='".mysqli_real_escape_string($con,$lga)."',certificate_number='".mysqli_real_escape_string($con,$certnum)."',  
gps_coordinates='".mysqli_real_escape_string($con,$cord)."',acquisition_year='".mysqli_real_escape_string($con,$acquisition)."',
survey_date='".mysqli_real_escape_string($con,$survey)."',holding_type='".mysqli_real_escape_string($con,$holdtype)."',
soldby='".mysqli_real_escape_string($con,$soldby)."',encumbrance='".mysqli_real_escape_string($con,$en)."',
other_evidence='".mysqli_real_escape_string($con,$evidence)."',date_updated='$updatedate' WHERE upn='".$upno."' ") or die(mysqli_error($con));

if(@$up){
echo"<script>alert('Land Details Updated... If you are also Documenting,click the updating button')</script>";	
}
else{
echo"<script>alert('An error occured,please try again')</script>";	
}
	
}


?>



		
		
		</div></div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 polynek| Design by: <a href="" style="color:#fff;" target="_blank">Sunday Ikechukwu</a>
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
