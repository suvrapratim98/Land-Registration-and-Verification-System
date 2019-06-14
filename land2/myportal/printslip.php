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
    <title>Print slip..My Portal's Dashboard</title>
	
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
                     <h3>PRINT REGISTERED LAND SLIP</h3>   
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
  <input type="text" name="upn" class="form-control" placeholder="Enter Unique parcel Number to print registration slip" required><br>
 
</div>
 <br><button class="btn btn-info pull-right" type="submit" name="fetch">Fetch Slip</button>
</div>
					</form>	
						
                       
                    </div>
                    </div>
		
		<?php
				


if(isset($_POST['fetch'])){
	$upn= $_POST['upn'];
	$userid=$_SESSION['useridd'];
	$name=$_SESSION['name'];
	
	$mysqli="select * from regland where upn='$upn' AND status='registered'";
	$myquery=mysqli_query($con,$mysqli) or die(mysqli_error($con));
	
	$checking=mysqli_num_rows($myquery);
	
	if ($checking > 0){
		$row = mysqli_fetch_object($myquery);
		echo"<style>.hider{display:none;}</style>";
		
		
		echo @"
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
								<p class='bold'>Owner's Name</p>
								</td>
								
								<td class='width1'>
								<p> $row->username</p>
								</td>
								
								
								
								
								
								</tr>
								
								<tr>
								
								<td class='width'>
								<p class='bold'>Address of Land</p>
								</td>
								
								<td class='width1'>
								<p> $row->address_of_land</p>
								</td>
								</tr>
								
								<tr>
								
								<td class='width'>
								<p class='bold'>LGA</p>
								</td>
								
								<td class='width1'>
								<p> $row->lga</p>
								</td>
								</tr>
								
								
								
								
								<tr>
								
								<td class='width'>
								<p class='bold'>Acquisition Year</p>
								</td>
								
								<td class='width1'>
								<p> $row->acquisition_year</p>
								</td>
								</tr>
								
								<tr>
								
								<td class='width'>
								<p class='bold'>Survey Date</p>
								</td>
								
								<td class='width1'>
								<p> $row->survey_date</p>
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
								<p class='bold'>Certificate Number</p>
								</td>
								
								<td class=''>
								<p> $row->certificate_number</p>
								</td>
								</tr>
								
								</table>
								
								</div>
								
								<!----------------------------------second column right------------------------>
								<div class='col-md-5'>
								
								<table class='table table-striped table-bordered table-hover'>
								<tr>
								
								<td class=''>
								<p class='bold'>Holding Number</p>
								</td>
								
								<td class=''>
								<p> $row->holding_number</p>
								</td>
								</tr>
								
								</table>
								
								</div>
								</div>
								
								
								</div>
								
								
                            </div>
							
		
		
		";

		
	}
	else{
	echo "<script>alert('sorry, your land hasnt been approved yet or does not exist')</script>";	
	}
}

?>				
		
		
		
		
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
