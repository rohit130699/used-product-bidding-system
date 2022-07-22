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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Bids</title>
        <style type="text/css">
           body{
                margin: 0;
                padding: 25px 25px;
                background-color: bisque;
                font-family: sans-serif;
            }
             button{
                border: none;
                outline: none;
                height: 40px;
                background: green;
                color: white;
                font-weight: bold;
                font-size: 20px;
                border-radius: 5px;
             }
             button:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
			#btn{
				width:10%;
				height:40px;
				float:right;
			}
            .box{
                width: 200px;
                height: 291px;
                color: white;
                top: 3%;
                position: relative;
                background:rgba(0,0,0,0.5);
			    border-radius:5px;
				font-weight:bold;
                margin: auto;
				display:inline-block;
                font-size: 17px;
				line-height:15px;
				margin-right:10px;
				margin-bottom:20px;
				text-align:center;
                box-sizing: border-box;
            }
        </style>
	</head>
<?php
date_default_timezone_set('Asia/Kolkata');
$type  =$_REQUEST['type'];
$lap  =$_REQUEST['LAPTOP'];
$desk  =$_REQUEST['DESKTOP'];
$pd  =$_REQUEST['PENDRIVE'];
$cam  =$_REQUEST['CAMERA'];
$mob  =$_REQUEST['MOBILE'];
if($desk === "" and $pd === "" and $cam === "" and $mob === ""){
	$brand = $lap;}
else if($lap === "" and $pd === "" and $cam === "" and $mob === ""){
	$brand = $desk;}
else if($lap === "" and $desk === "" and $cam === "" and $mob === ""){
	$brand = $pd;}
else if($lap === "" and $desk === "" and $pd === "" and $mob === ""){
	$brand = $cam;}
else if($lap === "" and $desk === "" and $pd === "" and $cam === ""){
	$brand = $mob;}
$sql="select start_date,end_date from product where category=? and brand=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"ss",$type,$brand);
	mysqli_stmt_bind_result($stmt,$start_date,$end_date);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
    $result=mysqli_stmt_num_rows($stmt);
}
if($result >= 1){
	$stat=0;
	$to = time();
	while(mysqli_stmt_fetch($stmt)){
		$st_d=strtotime($start_date);
		$en_d=strtotime($end_date);
		if($to >= $st_d and $to <= $en_d){
				$stat=$stat+1;
		}}
if($stat >= 1){	?>
<body>
<button id="btn" onclick="window.location='searchbid.html'">BACK</button><br><br><br>
<div style="text-align:center;">
<?php 
$sql1="select pid,category,brand,first_img,updatedprice,start_date,end_date from product where category=? and brand=?";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1)){	
	mysqli_stmt_bind_param($stmt1,"ss",$type,$brand);
	mysqli_stmt_bind_result($stmt1,$pid,$cat,$brand,$first_img,$upprice,$start_date,$end_date);
	mysqli_stmt_execute($stmt1);
}
$today = time();
while(mysqli_stmt_fetch($stmt1)){
	$st_d=strtotime($start_date);
	$en_d=strtotime($end_date);
	if($st_d <= $today and $en_d >= $today){
		echo "<div class='box'>";
		echo "<br>";
		echo "<image src='uploads/$first_img' width='140' height='120'><br><br>";
		echo "CATEGORY: $cat<br><br>";
		echo "BRAND:$brand<br><br>";
		echo "BASE PRICE: ₹$upprice<br><br>";
		echo "<a href='details2.php?id=".$pid."&type=".$type."&LAPTOP=".$lap."&DESKTOP=".$desk."&PENDRIVE=".$pd."&CAMERA=".$cam."&MOBILE=".$mob."'><button>VIEW DETAILS</button></a>";
		echo "</div>";
	}
}}
else{
?>
<script language="javascript" type="text/javascript">
                      alert("No Products found...");
                      window.location='searchbid.html';
</script>
<?php
}}
else{
?>
<script language="javascript" type="text/javascript">
                      alert("No such products found...");
                      window.location='searchbid.html';
</script>
<?php
}
?>
</div></body>
</html>