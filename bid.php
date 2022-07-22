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
$price=$_REQUEST['price'];
$type=$_REQUEST['type'];
$lap  =$_REQUEST['LAPTOP'];
$desk  =$_REQUEST['DESKTOP'];
$pd  =$_REQUEST['PENDRIVE'];
$cam  =$_REQUEST['CAMERA'];
$mob  =$_REQUEST['MOBILE'];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Placing Bid</title>
		<style>
		body{
                margin: 0;
                padding: 0;
                background-color: bisque;
            }
		.box{
                width: 40%;
                height: 325px;
                color: white;
                top: 15%;
                left: 30%;
                position: absolute;
                background: rgba(0,0,0,0.8);;
			    border-radius:5px;
				font-weight:bold;
                margin: auto;
				text-align:center;
                font-size: 20px;
				margin-bottom:20px;
            }
		.box input[type="text"]{
                border:none;
                border-bottom:1px solid white;
                outline: none;
                height: 40px;
                color: black;
                font-size: 16px;
				background-color:white; 
				width:35%;
				border-radius: 5px;
				font-weight: bold;
				margin-bottom: 20px;
				text-align:center;
            }
			 .box input[type="submit"]{
                border: none;
                outline: none;
                height: 40px;
                background: green;
                color: white;
                font-weight: bold;
                font-size: 20px;
                border-radius: 5px;
                width:20%;
                margin-bottom: 20px;
            }
            .box input[type="submit"]:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
			button{
                border: none;
                outline: none;
                height: 40px;
                background: red;
                color: white;
                font-weight: bold;
                font-size: 20px;
                width: 20%;
                border-radius: 5%;
             }
             button:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
			::placeholder{
			color:black;
			}
			:-ms-input-placeholder{
			color:black;
			}
			::-ms-input-placeholder{
			color:black;
			}
		</style>
		<script>
			function test(){
				var bsprice = <?php echo $price; ?>;
				var price=document.forms["f1"]["amt"];
				var price1=document.forms["f1"]["amt1"];
				var rg=/^[0-9]+(\.[0-9]{1,2})?$/;
				if(!price.value.match(rg)){
                alert("Enter valid Bid");
                price.value="";
				return false;
				}
				if(!price1.value.match(rg)){
                alert("Enter valid Confirm Bid");
                price1.value="";
				return false;
				}
				if( price.value < bsprice){
				alert("Please enter more amount than base price");
                price.value="";
				return false;
				}
				if( price.value != price1.value){
				alert("Maximum Bid does not matches with Confirm Bid..");
                price.value="";
				price1.value="";
				return false;
				}
				return true;
			}
		</script>
	</head>
	<body>
<br><br>
<form name="f1" action="placing.php" method="post" onsubmit="return test()">
<div class="box"><br>
ENTER BID AMOUNT<br><br><br>
<input type="text" name="amt" placeholder="ENTER MAXIMUM BID IN ₹" autocomplete="off" required><br><br>
<input type="text" name="amt1" placeholder="ENTER CONFIRM BID" autocomplete="off" required><br><br>
<input type="hidden" name="pid" value="<?php echo $p1; ?>">
<input type="hidden" name="type" value="<?php echo $type; ?>">
<input type="hidden" name="lap" value="<?php echo $lap; ?>">
<input type="hidden" name="desk" value="<?php echo $desk; ?>">
<input type="hidden" name="pd" value="<?php echo $pd; ?>">
<input type="hidden" name="cam" value="<?php echo $cam; ?>">
<input type="hidden" name="mob" value="<?php echo $mob; ?>">
<center><input type="submit" value="PLACE BID" onclick="submit">&emsp;&emsp;
<a href='details2.php?id=<?php echo $p1; ?>&type=<?php echo $type; ?>&LAPTOP=<?php echo $lap; ?>&DESKTOP=<?php echo $desk; ?>&PENDRIVE=<?php echo $pd; ?>&CAMERA=<?php echo $cam; ?>&MOBILE=<?php echo $mob; ?>'><button type="button">BACK</button></a></center>
</div></form>
</body>
</html>
