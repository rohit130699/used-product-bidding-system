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
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Remove Product</title>
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
$sql="select pid,category,brand,first_img,bsprice,start_date,end_date from product where seller=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$name);
	mysqli_stmt_bind_result($stmt,$pid,$cat,$brand,$img,$price,$st,$end);
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
   <th>IMAGE</th><th>CATEGORY</th><th>BRAND</th><th>BASE PRICE</th><th>START DATE</th><th>END DATE</th><th></th>
</tr>
<?php

while(mysqli_stmt_fetch($stmt)){
	$sql1="select status from bid1 where pid=?";
	$stmt1=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt1,$sql1)){
		mysqli_stmt_bind_param($stmt1,"s",$pid);
		mysqli_stmt_bind_result($stmt1,$status);
		mysqli_stmt_execute($stmt1);
		mysqli_stmt_store_result($stmt1);
		$result1=mysqli_stmt_num_rows($stmt1);
	}
	if($result1 == 0){
		echo "<tr>";
		echo "<td class='cell'><image src='uploads/$img' width='200' height='150'></td>";
		echo "<td class='cell'>$cat</td>";
		echo "<td class='cell'>$brand</td>";
		echo "<td class='cell'>₹$price</td>";
		echo "<td class='cell'>$st</td>";
		echo "<td class='cell'>$end</td>";
		echo "<td class='cell'>";?>
		<a href="removal.php?id=<?php echo "$pid";?>" onclick="if(!confirm('Are you sure you want to remove the item?')){return false;}"><button>REMOVE</button></a>
       <?php
		echo "</td>";
		echo "</tr>";
		}
	else{
		echo "<tr>";
		echo "<td class='cell'><image src='uploads/$img' width='200' height='150'></td>";
		echo "<td class='cell'>$cat</td>";
		echo "<td class='cell'>$brand</td>";
		echo "<td class='cell'>₹$price</td>";
		echo "<td class='cell'>$st</td>";
		echo "<td class='cell'>$end</td>";
		echo "<td class='cell'>";?>
		<a href="removal.php?id=<?php echo "$pid";?>" onclick="if(!confirm('Bidding has started on product..Are you sure you want to remove the item?..This can lead to some actions on you..')){return false;}"><button>REMOVE</button></a>
       <?php
		echo "</td>";
		echo "</tr>";
	}
}}
else{
?>
<script language="javascript" type="text/javascript">
                      alert("No Products listed yet...");
                      window.location='seller.html';
</script>
<?php
}
?>
</table><br><br>
<button id="btn" onclick="window.location='seller.html'">BACK</button></center>
</center>
</body>
</html>