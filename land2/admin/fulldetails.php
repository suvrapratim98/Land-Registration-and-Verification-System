<?php
session_start();

include"connect.php";


if (!isset($_SESSION['passi'])){
	header("location:index.php");
	exit();
} 

?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
	
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       
    <link href="assets/css/custom.css" rel="stylesheet" />
    
</head>

<style>

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
                  <a href="logout.php" style="color:#fff;font-size:12px">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="dashboard.php" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    <li>
                        <a href="approve.php"><i class="fa fa-edit "></i>Approve A Land</a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fa fa-image "></i>Users</a>
                    </li>


                   

                   
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
		
		
		 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome Back Admin</strong>

							
                        </div>
                       
                    </div>
                    </div>
					
					
					
                        <?php
	$mysqli1="select * from regland INNER JOIN documentation ON regland.upn = documentation.upn where regland.upn='" . $_GET["upn"] . "' ";
	$myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
	$fetch=mysqli_fetch_object($myquery1);
	
	
	?>
						
						<div class="panel panel-default">
                        <div class="panel-heading">
                             <strong>Full Details of <?php echo $fetch->username; ?></strong>
                        </div>
                        <div class="panel-body">
						
						
						<!-----------------------------1st row---------------------------------------->
						<div class="row">
						
						<div class="col-md-8">
                            
                                
								
	
								<table class="table table-striped table-bordered table-hover">
								<tr>
								
								<td class="width">
								<p class="bold">Owner's Name</p>
								</td>
								
								<td class="width1">
								<p><?php echo $fetch->username; ?></p>
								</td>
								
								
								
								
								
								</tr>
								
								<tr>
								
								<td class="width">
								<p class="bold">Address of Land</p>
								</td>
								
								<td class="width1">
								<p><?php echo $fetch->address_of_land; ?></p>
								</td>
								</tr>
								
								<tr>
								
								<td class="width">
								<p class="bold">LGA</p>
								</td>
								
								<td class="width1">
								<p><?php echo $fetch->lga; ?></p>
								</td>
								</tr>
								
								<tr>
								
								<td class="width">
								<p class="bold">Full Name</p>
								</td>
								
								<td class="width1">
								<p><?php echo $fetch->username; ?></p>
								</td>
								</tr>
								
								
								<tr>
								
								<td class="width">
								<p class="bold">Acquisition Year</p>
								</td>
								
								<td class="width1">
								<p><?php echo $fetch->acquisition_year; ?></p>
								</td>
								</tr>
								
								<tr>
								
								<td class="width">
								<p class="bold">Survey Date</p>
								</td>
								
								<td class="width1">
								<p><?php echo $fetch->survey_date; ?></p>
								</td>
								</tr>
								
								
								
								</table>
								
				
								</div>
								
								<div class="col-md-3">
								<img src="../<?php echo $fetch->photo; ?>" alt="" class="img-responsive"  align="absmiddle" id="outputpix"/><br />
								</div>
								
								
								
								
								</div>
								
								
								<!-------------------------2nd row---------------------------------------------------------->
								<div class="row">
								
								<!-------------------------first column left------------------------>
								<div class="col-md-5">
								
								<table class="table table-striped table-bordered table-hover">
								<tr>
								
								<td class="">
								<p class="bold">Certificate Number</p>
								</td>
								
								<td class="">
								<p><?php echo $fetch->certificate_number; ?></p>
								</td>
								</tr>
								
								</table>
								
								</div>
								
								<!----------------------------------second column right------------------------>
								<div class="col-md-5">
								
								<table class="table table-striped table-bordered table-hover">
								<tr>
								
								<td class="">
								<p class="bold">Holding Number</p>
								</td>
								
								<td class="">
								<p><?php echo $fetch->holding_number; ?></p>
								</td>
								</tr>
								
								</table>
								
								</div>
								</div>
								
								<!---------------------------- 3rd row--------------------------------->
								<div class="row">
								<div class="col-md-5">
								<p>Uploaded Documents (<span style="color:brown;">Click on the picture to see a full view.</span>)</p>
								<a href="../myportal/<?php echo $fetch->img; ?>"><img src="../myportal/<?php echo $fetch->img; ?>" style="width:30%; height:30%; cursor:pointer; border-radius:10%;"></a>
								<a href="../myportal/<?php echo $fetch->img1; ?>"><img src="../myportal/<?php echo $fetch->img1; ?>" style="width:30%; height:30%; cursor:pointer;border-radius:10%;"></a>
								</div>
								
								</div>
								
								
								</div>
								
								
                            </div>
                            
                        </div>
                    </div>
						
						
						
                       
                    </div>
                    
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
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
     
	
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
	
	 <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
