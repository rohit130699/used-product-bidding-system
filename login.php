<?php
$uname  =$_POST['uname'];
$pass   =$_POST['upass'];
$type   =$_POST['type'];
$con=mysqli_connect('localhost','root','','project');
if(!$con)
{
die('Some Fault Occured..');
}
if(strcmp($type,'bid') === 0){
	   $sql1="select * from bidder where uname=? and upass=?";
	   $stmt1=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt1,$sql1)){
	   mysqli_stmt_bind_param($stmt1,"ss",$uname,$pass);
	   mysqli_stmt_execute($stmt1);
	   mysqli_stmt_store_result($stmt1);
	   $result1=mysqli_stmt_num_rows($stmt1);
	   if($result1>0){
		   session_start();
		   $_SESSION['bidder']=$uname;
		   ?>
		   <script language="javascript" type="text/javascript">
           window.location='bidder.php';
		   </script>
       <?php		   
	   }
       else{	   
	   $sql="select * from bidder where uname=?";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
	   mysqli_stmt_bind_param($stmt,"s",$uname);
	   mysqli_stmt_execute($stmt);
	   mysqli_stmt_store_result($stmt);
	   $result=mysqli_stmt_num_rows($stmt);
	   if($result>0){
		   ?>
		   <script language="javascript" type="text/javascript">
           alert("Invalid Password..");
		   window.location='front.html';
		   </script>
       <?php	
	   }
	   else{
		 ?>
		   <script language="javascript" type="text/javascript">
           alert("Login Unsuccessful..");
		   window.location='front.html';
		   </script>
       <?php  
	   }}}}}
if(strcmp($type,'sell') === 0){
	   $sql1="select * from seller where uname=? and upass=?";
	   $stmt1=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt1,$sql1)){
	   mysqli_stmt_bind_param($stmt1,"ss",$uname,$pass);
	   mysqli_stmt_execute($stmt1);
	   mysqli_stmt_store_result($stmt1);
	   $result1=mysqli_stmt_num_rows($stmt1);
	   if($result1>0){
		   session_start();
		   $_SESSION['seller']=$uname;
		   ?>
		   <script language="javascript" type="text/javascript">
           window.location='seller.html';
		   </script>
       <?php		   
	   }
       else{	   
	   $sql="select * from seller where uname=?";
	   $stmt=mysqli_stmt_init($con);
	   if(mysqli_stmt_prepare($stmt,$sql)){
	   mysqli_stmt_bind_param($stmt,"s",$uname);
	   mysqli_stmt_execute($stmt);
	   mysqli_stmt_store_result($stmt);
	   $result=mysqli_stmt_num_rows($stmt);
	   if($result>0){
		   ?>
		   <script language="javascript" type="text/javascript">
           alert("Invalid Password..");
		   window.location='front.html';
		   </script>
       <?php	
	   }
	   else{
		 ?>
		   <script language="javascript" type="text/javascript">
           alert("Login Unsuccessful..");
		   window.location='front.html';
		   </script>
       <?php  
	   }}}}}
?>