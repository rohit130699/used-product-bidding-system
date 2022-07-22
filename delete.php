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
$bidid=$_REQUEST['id'];
$pid=$_REQUEST['pid'];
$c="CANCELLED BY SELLER";
$sql="update bid1 set status = ? where bidid = ?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"ss",$c,$bidid);
	mysqli_stmt_execute($stmt);
	if(mysqli_affected_rows($con)>0){
		$sql5="delete from bid where bidid = ?";
		$stmt5=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt5,$sql5)){
			mysqli_stmt_bind_param($stmt5,"s",$bidid);
			mysqli_stmt_execute($stmt5);
			if(mysqli_affected_rows($con)>0){?>
	<script language="javascript" type="text/javascript">
                      alert("Cancelled...");
                      window.location.replace("deletebids.php?id=<?php echo $pid; ?>");
	</script>
<?php	
}}}}		
?>