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
$p1=$_REQUEST['id'];
$sql="select status from bid1 where pid=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$p1);
	mysqli_stmt_bind_result($stmt,$status);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
    $result=mysqli_stmt_num_rows($stmt);
}
if($result == 0){
	$sql2="select path from image where prod_id=?";
	$stmt2=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt2,$sql2)){
		mysqli_stmt_bind_param($stmt2,"s",$p1);
		mysqli_stmt_bind_result($stmt2,$path);
		mysqli_stmt_execute($stmt2);
		while(mysqli_stmt_fetch($stmt2)){
			$file="uploads/$path";
			unlink($file);	
		}
		$sql1="delete from image where prod_id = ?";
		$stmt1=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"s",$p1);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){	
				$sql3="delete from product where pid = ?";
				$stmt3=mysqli_stmt_init($con);
					if(mysqli_stmt_prepare($stmt3,$sql3)){
					mysqli_stmt_bind_param($stmt3,"s",$p1);
					mysqli_stmt_execute($stmt3);
					if(mysqli_affected_rows($con)>0){?>
							<script language="javascript" type="text/javascript">
								alert("Deleted..");
								window.location="remove.php";
							</script>		
<?php
}}}}}}
else {
	$l="HIGHEST BIDDER";
	$c="PRODUCT REMOVED BY SELLER";
	$stat=0;
	while(mysqli_stmt_fetch($stmt)){
		if($status == "HIGHEST BIDDER"){
			$stat=$stat+1;
	}}
	$sql1="delete from image where prod_id = ?";
	$stmt1=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt1,$sql1)){
		mysqli_stmt_bind_param($stmt1,"s",$p1);
		mysqli_stmt_execute($stmt1);
		if(mysqli_affected_rows($con)>0){	
			$sql3="delete from product where pid = ?";
			$stmt3=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt3,$sql3)){
					mysqli_stmt_bind_param($stmt3,"s",$p1);
					mysqli_stmt_execute($stmt3);
					if(mysqli_affected_rows($con)>0){
						if($stat == 1){
							$sql4="update bid1 set status = ? where pid = ? and status = ?";
							$stmt4=mysqli_stmt_init($con);
							if(mysqli_stmt_prepare($stmt4,$sql4)){
								mysqli_stmt_bind_param($stmt4,"sss",$c,$p1,$l);
								mysqli_stmt_execute($stmt4);
								if(mysqli_affected_rows($con)>0){
									$sql5="delete from bid where pid = ?";
									$stmt5=mysqli_stmt_init($con);
									if(mysqli_stmt_prepare($stmt5,$sql5)){
										mysqli_stmt_bind_param($stmt5,"s",$p1);
										mysqli_stmt_execute($stmt5);
						}}}}?>
							<script language="javascript" type="text/javascript">
								alert("Deleted..");
								window.location="remove.php";
							</script>		
<?php
}}}}}
?>