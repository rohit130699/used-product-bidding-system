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
}?>
<html>
<head>
<title>Bidder</title>
</head>
<body>
<div class="sidenav">
<a href="appprod.php">AVAILABLE STUFF FOR BIDDING</a>
<a href="searchbid.html">BID PRODUCT</a>
<a href="bidupdate.php">VIEW BID UPDATES</a>
<a href="updatebidder.php">UPDATE PROFILE</a>
<a href="contact1.html">CONTACT US</a>
<a href="logoutbidder.php">LOGOUT</a>
</div>
<div class="main">

</div>
<style>
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 250px; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 40px; /* Place content 60px from the top */
}

/* The navigation menu links */
.sidenav a {
  padding: 25px 25px 15px 40px;
  text-decoration: none;
  font-size: 20px;
  color: #f1f1f1;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #818181;
}
.main{
height:100%;
width:1286px;
position: fixed; /* Stay in place */
z-index: 1; /* Stay on top */
top: 0; /* Stay at the top */
right: 0;
background-image: url(image/img3.jpg);
background-repeat:no-repeat;
background-size: cover;
background-position:center;
overflow-x: hidden; /* Disable horizontal scroll */
}
</style>
<?php
date_default_timezone_set('Asia/Kolkata');
$sql="select pid,start_date,end_date from product";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_result($stmt,$pid,$start_date,$end_date);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$result=mysqli_stmt_num_rows($stmt);
}
$w="WON";
if($result >= 1){
	$today = time();
	while(mysqli_stmt_fetch($stmt)){
		$st_d=strtotime($start_date);
		$en_d=strtotime($end_date);
		if($en_d < $today){
			$sql1="select status from bid1 where pid=?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
				mysqli_stmt_bind_param($stmt1,"s",$pid);
				mysqli_stmt_bind_result($stmt1,$status);
				mysqli_stmt_execute($stmt1);
				mysqli_stmt_store_result($stmt1);
				$result1=mysqli_stmt_num_rows($stmt1);
			}
			if($result1 >= 1){
				while(mysqli_stmt_fetch($stmt1)){
				if($status == "HIGHEST BIDDER"){
					$sql9="update bid1 set status = ? where pid = ? and status ='HIGHEST BIDDER'";
					$stmt9=mysqli_stmt_init($con);
					  if(mysqli_stmt_prepare($stmt9,$sql9)){
						mysqli_stmt_bind_param($stmt9,"ss",$w,$pid);
						mysqli_stmt_execute($stmt9);
				}
				}}
}}}}
?>
</body>
</html>