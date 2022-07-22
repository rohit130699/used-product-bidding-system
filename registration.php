<?php
$fname  =$_POST['fname'];
$lname  =$_POST['lname'];
$type   =$_POST['type'];
$gmail  =$_POST['gmail'];
$gender =$_POST['s1'];
$c_no   =$_POST['c_no'];
$age    =$_POST['age'];
$uname  =$_POST['uname'];
$pass   =$_POST['pass'];
$cpass  =$_POST['cpass'];

$con=mysqli_connect('localhost','root','','project');
if(!$con)
{
die('Some Fault Occured..');
}
if(strcmp($type,'bid') === 0){
	   $sql1="select * from bidder where uname=?";
	   $stmt1=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt1,$sql1)){
	   mysqli_stmt_bind_param($stmt1,"s",$uname);
	   mysqli_stmt_execute($stmt1);
	   mysqli_stmt_store_result($stmt1);
	   $result1=mysqli_stmt_num_rows($stmt1);
	   if($result1>0){
		   ?>
		   <script language="javascript" type="text/javascript">
		   alert("UserName already exists...");
           window.location='register.html';
		   </script>
       <?php		   
	   }
       else{	   
	   $sql="insert into bidder values(?,?,?,?,?,?,?,?)";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
	   mysqli_stmt_bind_param($stmt,"sssssiss",$fname,$lname,$gmail,$gender,$c_no,$age,$uname,$pass);
	   mysqli_stmt_execute($stmt);
	   if(mysqli_affected_rows($con)>0){
		   session_start();
		   $_SESSION['bidder']=$uname;
		   ?>
		   <script language="javascript" type="text/javascript">
           window.location='bidder.php';
		   </script>
       <?php	
	   mysqli_stmt_close($stmt);
	   mysqli_close($con);
}}}}}
if(strcmp($type,'sell') === 0){
	   $sql1="select * from seller where uname=?";
	   $stmt1=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt1,$sql1)){
	   mysqli_stmt_bind_param($stmt1,"s",$uname);
	   mysqli_stmt_execute($stmt1);
	   mysqli_stmt_store_result($stmt1);
	   $result1=mysqli_stmt_num_rows($stmt1);
	   if($result1>0){
		   ?>
		   <script language="javascript" type="text/javascript">
		   alert("UserName already exists...");
           window.location='register.html';
		   </script>
       <?php		   
	   }
       else{	   
	   $sql="insert into seller values(?,?,?,?,?,?,?,?)";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
	   mysqli_stmt_bind_param($stmt,"sssssiss",$fname,$lname,$gmail,$gender,$c_no,$age,$uname,$pass);
	   mysqli_stmt_execute($stmt);
	   if(mysqli_affected_rows($con)>0){
		   session_start();
		   $_SESSION['seller']=$uname;
		   ?>
		   <script language="javascript" type="text/javascript">
           window.location='seller.html';
		   </script>
       <?php	
	   mysqli_stmt_close($stmt);
	   mysqli_close($con);
}}}}}
?>