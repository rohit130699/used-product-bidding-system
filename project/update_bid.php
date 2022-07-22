<?php
session_start();
$name = $_SESSION['bidder'];
if(is_null($name)){?>
	<script language="javascript" type="text/javascript">
                      alert("Your session has been expired!Please wait for few minutes!!");
                      window.location='front.html';
    </script>
<?php
}
$con=mysqli_connect('localhost','root','','project');
if(!$con)
{
die('Some Fault Occured..');
}
$fname  =$_POST['fname'];
$lname  =$_POST['lname'];
$gmail  =$_POST['gmail'];
$gender =$_POST['s1'];
$c_no   =$_POST['c_no'];
$age    =$_POST['age'];
$pass   =$_POST['pass'];
$cpass  =$_POST['cpass'];

$sql="update bidder set fname = ?,lname = ?,gmail =?,gender = ?,c_no = ?,age = ?,upass = ? where uname = ?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
mysqli_stmt_bind_param($stmt,"sssssiss",$fname,$lname,$gmail,$gender,$c_no,$age,$pass,$name);
mysqli_stmt_execute($stmt);
if(mysqli_affected_rows($con)>0){?>
	<script language="javascript" type="text/javascript">
                      alert("Updated Successfully...");
                      window.location='updatebidder.php';
    </script>	
<?php
}}
?>