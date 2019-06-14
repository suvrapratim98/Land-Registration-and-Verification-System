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
    <title>Land Documentation..My Portal's Dashboard</title>
	
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
                    <li class="active-link">
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
                     <h3>LAND DOCUMENTATION</h3>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                
					
					
					<div class="row">
                    <div class="col-lg-12 ">
                        
						
						<div class="panel panel-default">
                        <div class="panel-heading">
                             <strong>Upload document of land here(2) document</strong>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									
									
									<form action="" method="POST" enctype="multipart/form-data">
	
                
               
									
                                        <tr>
										<th>File Name</th>
										
                                            <th>Path</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<tr>
									<td>Survey Plan</td>
									
									<td><input type="hidden" name="MAX_FILE_SIZE" value="2000000">
									<input type="file"  name="ufile1" id="ufile5" accept="image/*" onchange="loadFile(event)" required /></td>
									
									</tr>
									
									<tr>
									<td>Certificate/Receipt(if any)</td>
									
									<td><input type="hidden" name="MAX_FILE_SIZE" value="2000000">
									<input type="file"  name="ufile2" id="ufile5" accept="image/*" onchange="loadFile(event)" /></td>
									
									</tr>
									
									<tr>
									<td>Updating/New</td>
									
									<td>
									<input type="radio" name="updatenew" value="New">&nbsp;<strong>NEW</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="updatenew" value="Updated">&nbsp;<strong>UPDATING</strong>
									
									</td>
									
									</tr>
									
									<tr>
									<td>Unique Parcel Number</td>
									
									<td>
									<input type="text" class="form-control" name="upn" placeholder="Unique parcel number" required></td>
									
									</tr>
									
									
                                        
                                    </tbody>
                                </table>
								<button class="btn btn-info pull-right" type="submit" name="document">Submit Documentation</button>
								</form>
                            </div>
							
							
							<?php
  
  if (isset($_POST['document'])&& $_FILES['ufile1']['size'] && $_FILES['ufile2']['size'] > 0){



$upn=$_POST['upn'];
$oldnew=$_POST['updatenew'];
$date=date('d/m/y');
$userid=$_SESSION['useridd'];

$imgname=$_FILES['ufile1']['name'];
$templocation=$_FILES['ufile1']['tmp_name'];
$realpath="document/".$imgname;
$fakepath="document/".$imgname;
$saveimg= move_uploaded_file($templocation,$fakepath);

$imgname1=$_FILES['ufile2']['name'];
$templocation1=$_FILES['ufile2']['tmp_name'];
$realpath1="document/".$imgname1;
$fakepath1="document/".$imgname1;
$saveimg1= move_uploaded_file($templocation1,$fakepath1);
	
	$check1=mysqli_query($con,"select * from documentation where upn='$upn' ");

	$row1=mysqli_num_rows($check1);
	if($row1 > 0 ){
		 echo"<script>alert('This Land has been documented already,please try to contact the admin for updating')</script>";
		 
	}
	else{
	
		$send=mysqli_query($con,"INSERT into documentation(upn,img1,img,userid,what_action,date_uploaded) VALUES ('".mysqli_real_escape_string($con,$upn)."',
		'$realpath','$realpath1','$userid','$oldnew','$date')");
	}
	
	if(@$send){
			 echo"<p style='color:green;'>Documentation added..Please proceed to any bank and pay the sum of #1000 only</p>";	
	}

else{
echo"<script>alert('An error Occured')</script>";		
}
  }
?>				
							
							
							
                            
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
     
	
	
	
	 <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
