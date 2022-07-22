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
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Retract Bid</title>
		<style>
		body{
			    background:black;
		}
		button{
                border: none;
                outline: none;
                background: red;
                color: white;
                font-weight: bold;
                font-size: 20px;
                height:40px;
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
				background:green;
			}
	    #tab{
                background-color: bisque;
                color: black;
                font-weight: bold;
                border-color: red;
            }
		.cell{
               width: 120px; 
               text-align: center;
            }
		</style>
	</head>
<?php
$h="HIGHEST BIDDER";
$sql="select date,bidid,pid,orgbid,status from bid1 where bidder=? and status=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"ss",$name,$h);
	mysqli_stmt_bind_result($stmt,$date,$bidid,$pid,$orgbid,$status);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
    $result=mysqli_stmt_num_rows($stmt);
}
if($result >= 1){
?>
<body>
<center>
<table border="5" id="tab" cellspacing="8" cellpadding="8">
<tr>
   <th>BID DATE</th><th>IMAGE</th><th>CATEGORY</th><th>BRAND</th><th>BID PRICE</th><th></th>
</tr>
<?php
while(mysqli_stmt_fetch($stmt)){
		$sql1="select category,brand,first_img from product where pid=?";
		$stmt1=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"s",$pid);
			mysqli_stmt_bind_result($stmt1,$cat,$brand,$first_img);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			$result1=mysqli_stmt_num_rows($stmt1);
			if($result1 == 1){
					mysqli_stmt_fetch($stmt1);
					echo "<tr>";
					echo "<td class='cell'>$date</td>";
					echo "<td class='cell'><image src='uploads/$first_img' width='200' height='150'></td>";
					echo "<td class='cell'>$cat</td>";
					echo "<td class='cell'>$brand</td>";
					echo "<td class='cell'>₹$orgbid</td>";
					echo "<td class='cell'><a href='retraction.php?id=".$pid."&bidid=".$bidid."'><button>RETRACT</button></a></td>";
					echo "</tr>";
}}}}
else{
?>
<script language="javascript" type="text/javascript">
                      alert("You are not highest bidder on any product...");
                      window.location='bidder.html';
</script>
<?php
}
?>
</table><br><br>
<button id="btn" onclick="window.location='bidder.html'">BACK</button></center>
</center>
</body>
</html>