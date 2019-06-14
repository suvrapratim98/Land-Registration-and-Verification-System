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
    

	
	
	<style type="text/css">
            @media print {
                body * {
                    visibility:hidden;
                } 
                #printable, #printable * {
                    visibility:visible;
                }
                #printable { /* aligning the printable area */
                    position:absolute;
                    left:40;
                    top:40;
                }
				.badge{
					background-color:gray;
				}
            }




            </style>
<style type="text/css" media="print">
    @page { 
        size: potriat;
    }
    
</style>
	
	
	
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

                    <li class="dropdown ">
                        <a href="createaccount.php">REGISTER<i class="fa fa-image"></i>
                            <span>register with us</span>
                        </a>
                        
                    </li>

                   
                    <li class="dropdown active">
                        <a href="login.php">CHECK VERIFICATION STATUS <i class="fa fa-bars"></i>
                            <span>Login first</span>
                        </a>
                        
                    </li>
                     <li class="dropdown">
                        <a href="contact.php">CONTACT US <i class="fa fa-globe"></i>
                            <span>Any Problem?</span>
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
	
	<div class="row hider"><hr>
	<div class="col-md-4">
	<h4>CHECK VERIFICATION STATUS?</h4>
	<p>Put in the Unique Parcel Number (UPN)</p>
	<p>Please do not share your parcel number to anybody unless the person buying the land</p>
	</div>
	
	
	
	<div class="col-md-4">
	<form action="" method="POST">
	<input type="text" name="upn" class="form-control" placeholder="Unique Parcel Number" required><br>
											
											
											
                                            	
                                        
										<button class="btn btn-info" name="check"><b>CHECK</b></button> 
										</form></div></div>
										<hr>
										<!---------------php part-------->
										
								<?php		
										
										if(isset($_POST['check'])){
	$upn= $_POST['upn'];
	//$userid=$_SESSION['userid'];
	//$name=$_SESSION['name'];
	
	$mysqli="select * from regland where upn='$upn' AND status='registered' ";
	$myquery=mysqli_query($con,$mysqli) or die(mysqli_error($con));
	
	$checking=mysqli_num_rows($myquery);
	
	if ($checking > 0){
		$row = mysqli_fetch_object($myquery);
		echo"<style>.hider{display:none;}</style>";
		
		
		echo @"
		<div id='printable'>
		
		<div class='row'>
		<div class='col-md-8'>	
		<center><h4 >Land Location:<span style='color:red;'>$row->address_of_land</span></h4></center>
		</div></div>
		<div class='row'>
		
<div class='col-md-5'>		
	<span class='badge' style='background-color:green;'>UNIQUE PARCEL NUMBER : $row->upn</span>
		</div>
		<div class='col-md-5'>		
	<span class='badge' >HOLDING NUMBER : $row->holding_number</span>
		</div>
		</div>
		
		<div class='row'>
		<div class='col-md-5'>		
	<p>CERTIFICATE NUMBER: $row->certificate_number </p>
		</div>
		<div class='col-md-5'>		
	<p>CURRENT LAND USE: $row->current_land_use </p>
		</div>
		</div>
		
		<div class='row'>
		<div class='col-md-5'>		
	<p>SOIL FERTILITY: $row->soil_fertility </p>
		</div>
		<div class='col-md-5'>		
	<p>OTHER EVIDENCE: $row->other_evidence </p>
		</div>
		</div>
		
		<div class='row'>
		<div class='col-md-5'>		
	<p>HOLDING TYPE: $row->holding_type</p>
		</div>
		<div class='col-md-5'>		
	<p>ACQUISITION YEAR: $row->acquisition_year </p>
		</div>
		</div>
		
		<div class='row'>
		<div class='col-md-5'>		
	<p>ENCUMBRANCE: $row->encumbrance</p>
		</div>
		<div class='col-md-5'>		
	<p>ORTHOGRAPH MAP SHEET No: $row->orthograph_num </p>
		</div>
		</div>
		
		<div class='row'>
		<div class='col-md-5'>		
	<p>SURVEY DATE: $row->survey_date</p>
		</div>
		<div class='col-md-5'>		
	<p>Date Registered: $row->date_registered </p>
		</div>
		</div>
		
		
		<div class='row'>
		<div class='col-md-5'>		
	<p>USER ID: $userid</p>
		</div>
		<div class='col-md-5'>		
	<p>REGISTERED TO:<span style='color:green;'>$name</span> </p>
		</div>
		</div>
		
		</div>
		
		
		";

		
	}
	else{
	echo "<script>alert('Sorry, the land is not registered ')</script>";	
	}
}

?>				
										
										
										
	
	
	
	<br>
	
	 
	
	
	
	
	<hr>
	</div></section>
	
	
	
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	
	<!-- /. WRAPPER  -->
    
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
     
	
	 <!-- DATA TABLE SCRIPTS -->
    <script src="asset/js/dataTables/jquery.dataTables.js"></script>
    <script src="asset/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
				
                $('#dataTables-example').dataTable();
            });
    </script>
	
	 <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
	