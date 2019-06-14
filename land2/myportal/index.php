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
    <title>My Portal's Dashboard</title>
	
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
                        <img src="../<?php echo $pic;?>" style="height:340%; width:200%; border-radius:50%;" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;font-size:12px">LOGOUT, <?php echo $name;?></a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    <li>
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
					<li>
                        <a href="update.php"><i class="fa fa-bar-chart-o"></i>Update A Land</a>
                    </li>

                   
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
		
		
		 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>MY DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome Back <?php echo $name;?> ! </strong> You Have 
									<?php
	$mysqli1="select * from regland where userid='$userid' AND status='Pending' ";
	$myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error());
		$count=mysqli_num_rows($myquery1);
		echo $count;

?>				

							 pending Status...User ID: <?php echo $userid;?>
                        </div>
                       
                    </div>
                    </div>
					
					
					<div class="row">
                    <div class="col-lg-12 ">
                        
						
						<div class="panel panel-default">
                        <div class="panel-heading">
                             <strong>List of registered Land</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										<th>Address Of Land</th>
                                            <th>Unique parcel number</th>
                                            <th>Status</th>
                                            <th>Holding Number</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
	$mysqli1="select * from regland where userid='$userid' ";
	$myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error());
		while($row2 = mysqli_fetch_object($myquery1)){

?>				
									
                                        <tr class="">
										 <td><?php echo @$row2->address_of_land;   ?></td>
                                            <td><?php echo @$row2->upn;   ?></td>
                                            <td><?php echo @$row2->status;   ?></td>
                                            <td><?php echo @$row2->holding_number;   ?></td>
                                            
		</tr> <?php  }  ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
						
						
						
                       
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
