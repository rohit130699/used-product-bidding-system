<?php
$con=mysqli_connect('localhost','root','','project');
if(!$con)
{
die('Some Fault Occured..');
}?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Image Gallery</title>
		<style>
		.imag{
			width:300px;
			height:250px;
		}
		.box{
                width: 50%;
                height: 580px;
                color: white;
                top: 10%;
                left: 25%;
                position: absolute;
                background: rgba(0,0,0,0.8);;
			    border-radius:5px;
				font-weight:bold;
                margin: auto;
                font-size: 20px;
				margin-bottom:20px;
            }
		button{
                border: none;
                outline: none;
                height: 40px;
                background: green;
                color: white;
                font-weight: bold;
                font-size: 20px;
                width: 10%;
                border-radius: 5%;
             }
		button:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
		</style>
	</head>
	<body>
<?php
$product  = $_REQUEST['id'];
$type=$_REQUEST['type'];
$lap  =$_REQUEST['LAPTOP'];
$desk  =$_REQUEST['DESKTOP'];
$pd  =$_REQUEST['PENDRIVE'];
$cam  =$_REQUEST['CAMERA'];
$mob  =$_REQUEST['MOBILE'];
$sql="select path from image where prod_id=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$product);
	mysqli_stmt_bind_result($stmt,$path);
	mysqli_stmt_execute($stmt);
}
?>
<center>
<h1>DISPLAYING IMAGE GALLERY</h1><br><br>
<div class="box"><br>
<table cellspacing=10px>
<?php
$i=0;
while(mysqli_stmt_fetch($stmt)){
		if($i%2 == 0){
			echo "<tr>";
		}
		echo"<td><img src='uploads/$path' class='imag'></td>";
		if($i%2 == 1){
			echo "</tr>";
		}
		$i++;
}
?>
</table></div>
</center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<center><a href="details2.php?id=<?php echo $product; ?>&type=<?php echo $type; ?>&LAPTOP=<?php echo $lap; ?>&DESKTOP=<?php echo $desk; ?>&PENDRIVE=<?php echo $pd; ?>&CAMERA=<?php echo $cam; ?>&MOBILE=<?php echo $mob; ?>"><button>BACK</button></a></center>
</body>
</html>
