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
        <title>Bid Updates</title>
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
$sql="select date,pid,seller,orgbid,status,first_img,category,brand,sellergmail,sellerc_no from bid1 where bidder=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$name);
	mysqli_stmt_bind_result($stmt,$date,$pid,$seller,$orgbid,$status,$first_img,$cat,$brand,$sgmail,$sc_no);
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
   <th>BID DATE</th><th>IMAGE</th><th>CATEGORY</th><th>BRAND</th><th>BID PRICE</th><th>SELLER</th><th>SELLER CONTACT NO</th><th>SELLER GMAIL</th><th>STATUS</th>
</tr>
<?php
while(mysqli_stmt_fetch($stmt)){
		echo "<tr>";
		echo "<td class='cell'>$date</td>";
		echo "<td class='cell'><image src='uploads/$first_img' width='200' height='150'></td>";
		echo "<td class='cell'>$cat</td>";
		echo "<td class='cell'>$brand</td>";
		echo "<td class='cell'>₹$orgbid</td>";
		echo "<td class='cell'>$seller</td>";
		echo "<td class='cell'>$sc_no</td>";
		echo "<td class='cell'>$sgmail</td>";
		echo "<td class='cell'>$status</td>";
		echo "</tr>";
}}
else{
?>
<script language="javascript" type="text/javascript">
                      alert("No bids done yet...");
                      window.location='bidder.php';
</script>
<?php
}
?>
</table><br><br>
<button id="btn" onclick="window.location='bidder.php'">BACK</button></center>
</center>
</body>
</html>