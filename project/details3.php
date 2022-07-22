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
                border-radius: 20px;
				vertical-align:middle;
             }
             button:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
			#btn{
				width:20%;
				height:40px;
			}
			#btn1{
				width:20%;
				height:40px;
				background:red;
			}
            .box{
                width: 895px;
                height: 704px;
                color: white;
                top: 3%;
                left: 20.9%;
                position: absolute;
                background:rgba(0,0,0,0.5);
			    border-radius:5px;
				font-weight:bold;
                margin: auto;
                font-size: 20px;
				margin-bottom:20px;
				padding: 20px 30px;
                box-sizing: border-box;
				line-height:20px;
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
				width:53%;
				font-weight: bold;
				margin-bottom: 20px;
				text-align:center;
            }  
			.box textarea{
                border:none;
                background: transparent;
                outline: none;
                color: white;
				margin-top:10px;
				margin-bottom:20px;
                font-size: 16px;
				background-color: rgba(0,0,0,0.5);
				font-weight: bold;
				vertical-align:middle;
				text-align:center;
            }
			#tab{
				color:white;
				width:900px;
				font-weight: bold;
				font-size: 20px;
			}
			.cell{
				width:450px;
				height:40px;
			}
			#d1{
				width:250px;
				height:40px;
				background-color:yellow;
				float:right;
				margin-top:15px;
				text-align: center;
				padding-top:11px;
				font-size: 22px;
				color:black;
			}
        </style>
    </head>
	<body>
<?php
$sql="select title,category,brand,upc,mpn,first_img,description,updatedprice,start_date,end_date from product where pid=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$p1);
	mysqli_stmt_bind_result($stmt,$title,$category,$brand,$upc,$mpn,$first_img,$description,$upprice,$start_date,$end_date);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
}
?>
<div class="box">
<center>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<image src='uploads/<?php echo $first_img; ?>' width='200' height='150'><div id="d1"></div></center><br>
<script>
var countDownDate = new Date("<?php echo $end_date; ?>").getTime();
var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("d1").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("d1").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<center><a href="img_gal3.php?id=<?php echo $p1; ?>"><button>VIEW IMAGE GALLERY</button></a></center><br><br>
<table border="0" id="tab" cellspacing="10" cellpadding="2">
<tr><td class="cell">TITLE:&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $title; ?>" readonly></td>
<td class="cell">CATEGORY:&ensp;&nbsp;&nbsp;<input type="text" value="<?php echo $category; ?>" readonly></td></tr>
<tr><td class="cell">BRAND:&emsp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $brand; ?>" readonly></td>
<td class="cell">UPC:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $upc; ?>" readonly></td></tr>
<tr><td class="cell">MPN:&emsp;&emsp;&emsp;&nbsp;&ensp;&nbsp;<input type="text" value="<?php echo $mpn; ?>" readonly></td>
<td class="cell">BASE PRICE:&ensp;<input type="text" value="₹<?php echo $upprice; ?>" readonly></td></tr>
<tr><td class="cell">START DATE:<input type="text" value="<?php echo $start_date; ?>" readonly></td>
<td class="cell">END DATE:&nbsp;&nbsp;&nbsp;&nbsp;&ensp;<input type="text" value="<?php echo $end_date; ?>" readonly></td></tr>
</table>
PRODUCT DESCRIPTION:<br>
<textarea cols="40" rows="4" readonly><?php echo $description; ?></textarea>&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button id="btn" onclick="window.location='appprod.php'">BACK</button>
</div>
</body>
</html>