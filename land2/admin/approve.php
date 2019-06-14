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
    <title>Admin: Lis of Land Users</title>
	
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
                 


                    <li >
                        <a href="dashboard.php" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    <li>
                        <a href="approve.php"><i class="fa fa-edit "></i>Approve A Land</a>
                    </li>
                    <li class="active-link">
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
                     <h2>Approve A Land</h2>   
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
					
					
					<div class="row">
                    <div class="col-lg-12 ">
                        
						
						<div class="col-sm-6 ">
                        
				<form role="form" action="" method="POST">
				

			
            
							
							<div class="form-group">
								<input class="form-control" placeholder="Land UPN you want to approve" name="upn" type="text" required>
							</div>
							<div class="form-group">
								<select name="app" class="form-control">
								<option value="">---Select Approval---</option>
								<option value="Registered">Approve</option>
								<option value="Pending">Still Pending</option>
								</select>
							</div>
							<button class="btn btn-info" type="submit" name="submit">Approve Land</button>
							
						
				</form>		
						
                      

					  <?php
			 
				 if (isset($_POST['submit'])){


$upn=$_POST['upn'];
$app=$_POST['app'];


	$update =mysqli_query($con,"UPDATE regland SET status='".mysqli_real_escape_string($con,$app)."' 
	WHERE upn='".mysqli_real_escape_string($con,$upn)."' ");
		
		
				 

	
	if(@$update){
		
	echo"<script>alert('you set land status to $app with upn: $upn')</script>";
}

else{
echo"<script>alert('An error occured,please try again..')</script>";	
}
	
}
	?>
					  
					  
					  

					  
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
     
	
	 
	
	 <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
