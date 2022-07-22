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
$title  =$_POST['title'];
$type  =$_POST['type'];
$lap  =$_POST['LAPTOP'];
$desk  =$_POST['DESKTOP'];
$pd  =$_POST['PENDRIVE'];
$cam  =$_POST['CAMERA'];
$mob  =$_POST['MOBILE'];
$upc  =$_POST['upc'];
$mpn =$_POST['mpn'];
$descr   =$_POST['descr'];
$bsprice    =$_POST['bsprice'];
$st_time  =$_POST['start'];
$en_time  =$_POST['end'];
function random(){
	$result='';
	for($i = 0;$i < 5;$i++){
	$result .= mt_rand(0,9);	
	}
	return $result;
    }
$a='product';
$b=random();
$p_id=$a.$b;
$filecount = count($_FILES['files']['name']);
for($i=0;$i<$filecount;$i++){
	$filename=$_FILES['files']['name'][$i];
	$fn=pathinfo($filename,PATHINFO_FILENAME);
	$filen=$fn.$b.".jpg";
	if($i == 0){
		$first=$filen;
	}
	move_uploaded_file($_FILES['files']['tmp_name'][$i],'uploads/'.$filen);
	$sql="insert into image values(?,?)";
	$stmt=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt,$sql)){
	 mysqli_stmt_bind_param($stmt,"ss",$p_id,$filen);
	 mysqli_stmt_execute($stmt);
	}}
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
$sql1="insert into product values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1)){
	 mysqli_stmt_bind_param($stmt1,"sssssssssddss",$p_id,$name,$title,$type,$brand,$upc,$mpn,$first,$descr,$bsprice,$bsprice,$st_time,$en_time);
	 mysqli_stmt_execute($stmt1);
	}
	if(mysqli_affected_rows($con)>0){
?>
		   <script language="javascript" type="text/javascript">
		   alert("Product Listed Successfully....");
           window.location='add_product.html';
		   </script>
<?php	
	   mysqli_stmt_close($stmt1);
	   mysqli_stmt_close($stmt);
	   mysqli_close($con);
	}
?>