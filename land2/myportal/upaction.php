<?php
session_start();
include "session.php";
include"connect.php";


if (!isset($_SESSION['pass'])){
	header("location:../login.php");
	exit();
} 

?>


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