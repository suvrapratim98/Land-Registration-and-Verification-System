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
					<li>
                        <a href="bankdetails.php"><i class="fa fa-image "></i>Bank Details</a>
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
                             <strong>Welcome Back Admin... There are 
							 									<?php
																$date=date('d/m/y');
	$mysqli1="select * from regland where date_updated='$date' AND status='pending' ";
	$myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error());
		$count=mysqli_num_rows($myquery1);
		echo $count;

?> land(s) that was Updated today.. Do Check. 			
							 
							 
							 </strong>

							
                        </div>
                       
                    </div>
                    </div>
					
					
					<div class="row">
                    <div class="col-lg-12 ">
                        
						
						<div class="panel panel-default">
                        <div class="panel-heading">
                             <strong>List of Lands</strong>
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
											<th>Date Registered</th>
											<th>photo</th>
											<th>Date Updated</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
	$mysqli1="select * from regland INNER JOIN documentation ON regland.upn = documentation.upn";
	$myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
		while($row2 = mysqli_fetch_object($myquery1)){

?>				
									
                                        <tr class="">
										 <td><?php echo @$row2->address_of_land;   ?></td>
                                            <td><a href="fulldetails.php?upn=<?php echo @$row2->upn; ?>"><?php echo @$row2->upn;   ?></a></td>
                                            <td><?php echo @$row2->status;   ?></td>
                                            <td><?php echo @$row2->holding_number;   ?></td>
											<td><?php echo @$row2->date_registered;   ?></td>
											<td><?php echo @$row2->img;   ?></td>
											<td><?php echo @$row2->date_updated;   ?></td>
											
                                            
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
