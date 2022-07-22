<?php
session_start();
$name = $_SESSION['seller'];
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
$pid=$_REQUEST['id'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Delete Bid</title>
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
$sql="select status from bid1 where pid=? and status != 'CANCELLED BY SELLER'";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$pid);
	mysqli_stmt_bind_result($stmt,$status);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
    $result=mysqli_stmt_num_rows($stmt);
}
if($result >= 1){
	$stat=0;
	while(mysqli_stmt_fetch($stmt)){
		if($status == "HIGHEST BIDDER"){
			$stat=$stat+1;
		}}
	if($stat >= 1){
?>
<body>
<center>
<table border="5" id="tab" cellspacing="8" cellpadding="8">
<tr>
   <th>BID DATE</th><th>BIDDER</th><th>BID PRICE</th><th>BIDDER GMAIL</th><th>BIDDER CONTACT NO</th><th>STATUS</th><th></th>
</tr>
<?php
	}
else{?>
<body>
<center>
<table border="5" id="tab" cellspacing="8" cellpadding="8">
<tr>
   <th>BID DATE</th><th>BIDDER</th><th>BID PRICE</th><th>BIDDER GMAIL</th><th>BIDDER CONTACT NO</th><th>STATUS</th>
</tr>
<?php
	}
$sql1="select date,bidid,bidder,orgbid,status,biddergmail,bidderc_no from bid1 where pid=?";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1)){
	mysqli_stmt_bind_param($stmt1,"s",$pid);
	mysqli_stmt_bind_result($stmt1,$date,$bidid,$bidder,$orgbid,$status1,$bgmail,$bc_no);
	mysqli_stmt_execute($stmt1);
	mysqli_stmt_store_result($stmt1);
	while(mysqli_stmt_fetch($stmt1)){
				if($status1=="HIGHEST BIDDER"){
				echo "<tr>";
				echo "<td class='cell'>$date</td>";
				echo "<td class='cell'>$bidder</td>";
				echo "<td class='cell'>₹$orgbid</td>";
				echo "<td class='cell'>$bgmail</td>";
				echo "<td class='cell'>$bc_no</td>";
				echo "<td class='cell'>$status1</td>";
				echo "<td class='cell'><a href='delete.php?id=".$bidid."&pid=".$pid."'><button>CANCEL</button></a></td>";
				echo "</tr>";}
				else if($status1=="OUTBIDDED"){
				echo "<tr>";
				echo "<td class='cell'>$date</td>";
				echo "<td class='cell'>$bidder</td>";
				echo "<td class='cell'>₹$orgbid</td>";
				echo "<td class='cell'>$bgmail</td>";
				echo "<td class='cell'>$bc_no</td>";
				echo "<td class='cell'>$status1</td>";
				echo "</tr>";}
				else if($status1=="WON"){
				echo "<tr>";
				echo "<td class='cell'>$date</td>";
				echo "<td class='cell'>$bidder</td>";
				echo "<td class='cell'>₹$orgbid</td>";
				echo "<td class='cell'>$bgmail</td>";
				echo "<td class='cell'>$bc_no</td>";
				echo "<td class='cell'>$status1</td>";
				echo "</tr>";			
			}
}}}
else{
?>
<script language="javascript" type="text/javascript">
                      alert("No bids found...");
                      window.location='sellerbid.php';
</script>
<?php
}
?>
</table><br><br>
<button id="btn" onclick="window.location='sellerbid.php'">BACK</button></center>
</center>
</body>
</html>