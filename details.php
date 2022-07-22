<?php
$p1=$_REQUEST['id'];
$con=mysqli_connect('localhost','root','','project');
if(!$con)
{
die('Some Fault Occured..');
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Product Details</title>
        <style type="text/css">
            body{
                margin: 0;
                padding: 0;
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
                border-radius: 5%;
             }
             button:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
			#btn{
				width:30%;
				height:40px;
			}
            .box{
                width: 435px;
                height: 944px;
                color: white;
                top: 4%;
                left: 36%;
                position: absolute;
                background:rgba(0,0,0,0.5);
			    border-radius:5px;
				font-weight:bold;
                margin: auto;
                font-size: 20px;
				margin-bottom:33px;
				padding: 20px 30px;
                box-sizing: border-box;
				text-align:center;
            }
            .box input[type="text"]{
                border:none;
                border-bottom:1px solid white;
                background: transparent;
                outline: none;
                height: 40px;
                color: white;
                font-size: 16px;
				background-color: rgba(0,0,0,0.5);
				width:60%;
				font-weight: bold;
				margin-bottom: 20px;
				text-align:center;
            }  
			.box textarea{
                border:none;
                background: transparent;
                outline: none;
                color: white;
				margin-bottom:20px;
                font-size: 16px;
				background-color: rgba(0,0,0,0.5);
				font-weight: bold;
				text-align:center;
            }
        </style>
    </head>
	<body>
<?php
$sql="select title,category,brand,upc,mpn,first_img,description,bsprice,start_date,end_date from product where pid=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$p1);
	mysqli_stmt_bind_result($stmt,$title,$category,$brand,$upc,$mpn,$first_img,$description,$bsprice,$start_date,$end_date);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
}
?>
<div class="box">
TITLE:&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $title; ?>" readonly><br>
CATEGORY:&ensp;<input type="text" value="<?php echo $category; ?>" readonly><br>
BRAND:&emsp;&ensp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $brand; ?>" readonly><br>
UPC:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $upc; ?>" readonly><br>
MPN:&emsp;&emsp;&emsp;&nbsp;&ensp;<input type="text" value="<?php echo $mpn; ?>" readonly><br>
<center><image src='uploads/<?php echo $first_img; ?>' width='200' height='150'></center><br>
<a href="img_gallery.php?id=<?php echo $p1; ?>"><button>VIEW IMAGE GALLERY</button></a><br><br>
<center>PRODUCT DESCRIPTION</center><br>
<textarea cols="40" rows="4" readonly><?php echo $description; ?></textarea><br>
BASE PRICE:<input type="text" value="₹<?php echo $bsprice; ?>" readonly><br>
START DATE:<input type="text" value="<?php echo $start_date; ?>" readonly><br>
END DATE:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $end_date; ?>" readonly><br>
<center><button id="btn" onclick="window.location='view.php'">BACK</button></center>
</div>
</body>
</html>