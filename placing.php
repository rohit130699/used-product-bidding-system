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
$pid  =$_POST['pid'];
$price  =$_POST['amt'];
$type=$_POST['type'];
$lap  =$_POST['lap'];
$desk  =$_POST['desk'];
$pd  =$_POST['pd'];
$cam  =$_POST['cam'];
$mob  =$_POST['mob'];
$result=0;
$h="HIGHEST BIDDER";
$l="OUTBIDDED";
function random(){
	$result='';
	for($i = 0;$i < 5;$i++){
	$result .= mt_rand(0,9);	
	}
	return $result;
    }
$today=date("d-m-y");
$c='bid';
$d=random();
$bidi=$c.$d;
$sql="select seller,category,brand,first_img,updatedprice from product where pid=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$pid);
	mysqli_stmt_bind_result($stmt,$seller,$cat,$brand,$first_img,$updprice);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	mysqli_stmt_fetch($stmt);
}
$sql20="select gmail,c_no from bidder where uname=?";
$stmt20=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt20,$sql20)){
	mysqli_stmt_bind_param($stmt20,"s",$name);
	mysqli_stmt_bind_result($stmt20,$bgmail,$bc_no);
	mysqli_stmt_execute($stmt20);
	mysqli_stmt_store_result($stmt20);
	mysqli_stmt_fetch($stmt20);
}
$sql21="select gmail,c_no from seller where uname=?";
$stmt21=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt21,$sql21)){
	mysqli_stmt_bind_param($stmt21,"s",$seller);
	mysqli_stmt_bind_result($stmt21,$sgmail,$sc_no);
	mysqli_stmt_execute($stmt21);
	mysqli_stmt_store_result($stmt21);
	mysqli_stmt_fetch($stmt21);
}
$sql2="select bidid,pid,bidder,orgbid from bid where pid=?";
$stmt2=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt2,$sql2)){
	mysqli_stmt_bind_param($stmt2,"s",$pid);
	mysqli_stmt_bind_result($stmt2,$bidid,$pid,$bidder,$orgbid);
	mysqli_stmt_execute($stmt2);
	mysqli_stmt_store_result($stmt2);
    $result=mysqli_stmt_num_rows($stmt2);
	if($result){
	mysqli_stmt_fetch($stmt2);
	}
	else{
	mysqli_stmt_error($con);
	}
}
if($result > 0){
		if($price > $orgbid){
			$a=$price*0.0005;
			$c=$a+$updprice;
			$b=round($c,2);
			if($price > $b){	
				$sql4="update product set updatedprice = ? where pid = ?";
				$stmt4=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt4,$sql4)){
					mysqli_stmt_bind_param($stmt4,"ds",$b,$pid);
					mysqli_stmt_execute($stmt4);
					if(mysqli_affected_rows($con)>0){			
					  $sql9="update bid1 set status = ? where bidid = ?";
					  $stmt9=mysqli_stmt_init($con);
					  if(mysqli_stmt_prepare($stmt9,$sql9)){
						mysqli_stmt_bind_param($stmt9,"ss",$l,$bidid);
						mysqli_stmt_execute($stmt9);
						if(mysqli_affected_rows($con)>0){	
							$sql5="delete from bid where bidid = ?";
							$stmt5=mysqli_stmt_init($con);
							if(mysqli_stmt_prepare($stmt5,$sql5)){
								mysqli_stmt_bind_param($stmt5,"s",$bidid);
								mysqli_stmt_execute($stmt5);
									if(mysqli_affected_rows($con)>0){	
										$sql6="insert into bid values(?,?,?,?)";
										$stmt6=mysqli_stmt_init($con);
											if(mysqli_stmt_prepare($stmt6,$sql6)){
												mysqli_stmt_bind_param($stmt6,"sssd",$bidi,$pid,$name,$price);
												mysqli_stmt_execute($stmt6);
												if(mysqli_affected_rows($con)>0){
													$sql10="insert into bid1 values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
													$stmt10=mysqli_stmt_init($con);
													if(mysqli_stmt_prepare($stmt10,$sql10)){
														mysqli_stmt_bind_param($stmt10,"sssssdssssssss",$today,$bidi,$pid,$name,$seller,$price,$h,$first_img,$cat,$brand,$sgmail,$sc_no,$bgmail,$bc_no);
														mysqli_stmt_execute($stmt10);	
														if(mysqli_affected_rows($con)>0){														
								?>
								<script language="javascript" type="text/javascript">
								alert("You are the highest bidder now...");
								window.location.replace("details2.php?id=<?php echo $pid; ?>&type=<?php echo $type; ?>&LAPTOP=<?php echo $lap; ?>&DESKTOP=<?php echo $desk; ?>&PENDRIVE=<?php echo $pd; ?>&CAMERA=<?php echo $cam; ?>&MOBILE=<?php echo $mob; ?>");
								</script>
			<?php		}}}}}}}}}}}
		  else{
			$sql12="update bid1 set status = ? where bidid = ?";
			$stmt12=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt12,$sql12)){
			mysqli_stmt_bind_param($stmt12,"ss",$l,$bidid);
			mysqli_stmt_execute($stmt12);
			if(mysqli_affected_rows($con)>0){	
				$sql13="delete from bid where bidid = ?";
				$stmt13=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt13,$sql13)){
					mysqli_stmt_bind_param($stmt13,"s",$bidid);
					mysqli_stmt_execute($stmt13);
			}}}
			$a=$updprice*0.0001;
			$c=$a+$updprice;
			$b=round($c,2);
			$sql16="update product set updatedprice = ? where pid = ?";
			$stmt16=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt16,$sql16)){
			mysqli_stmt_bind_param($stmt16,"ds",$b,$pid);			
			mysqli_stmt_execute($stmt16);			
			?>
			<script language="javascript" type="text/javascript">
							alert("You got outbidded...");
							window.location.replace("details2.php?id=<?php echo $pid; ?>&type=<?php echo $type; ?>&LAPTOP=<?php echo $lap; ?>&DESKTOP=<?php echo $desk; ?>&PENDRIVE=<?php echo $pd; ?>&CAMERA=<?php echo $cam; ?>&MOBILE=<?php echo $mob; ?>");
			</script>
		<?php	}}}
		else{
		  $a=$updprice*0.0001;
		  $c=$a+$updprice;
		  $b=round($c,2);
			if($b > $orgbid){
				$sql11="update bid1 set status = ? where bidid = ?";
				$stmt11=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt11,$sql11)){
					mysqli_stmt_bind_param($stmt11,"ss",$l,$bidid);
					mysqli_stmt_execute($stmt11);
					if(mysqli_affected_rows($con)>0){				
						$sql7="delete from bid where bidid = ?";
						$stmt7=mysqli_stmt_init($con);
						if(mysqli_stmt_prepare($stmt7,$sql7)){
							mysqli_stmt_bind_param($stmt7,"s",$bidid);
							mysqli_stmt_execute($stmt7);
		}}}}
			$sql17="update product set updatedprice = ? where pid = ?";
			$stmt17=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt17,$sql17)){
			mysqli_stmt_bind_param($stmt17,"ds",$b,$pid);
			mysqli_stmt_execute($stmt17);			
			?>
			<script language="javascript" type="text/javascript">
							alert("You got outbidded...");
							window.location.replace("details2.php?id=<?php echo $pid; ?>&type=<?php echo $type; ?>&LAPTOP=<?php echo $lap; ?>&DESKTOP=<?php echo $desk; ?>&PENDRIVE=<?php echo $pd; ?>&CAMERA=<?php echo $cam; ?>&MOBILE=<?php echo $mob; ?>");
			</script>
<?php		
	}}}
else{
	$a=$price*0.0005;
	$c=$a+$updprice;
	$b=round($c,2);
	if($price > $b){
		$sql18="update product set updatedprice = ? where pid = ?";
		$stmt18=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt18,$sql18)){
			mysqli_stmt_bind_param($stmt18,"ds",$b,$pid);
			mysqli_stmt_execute($stmt18);
			if(mysqli_affected_rows($con)>0){	
				$sql3="insert into bid values(?,?,?,?)";
				$stmt3=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt3,$sql3)){
					mysqli_stmt_bind_param($stmt3,"sssd",$bidi,$pid,$name,$price);
					mysqli_stmt_execute($stmt3);
						if(mysqli_affected_rows($con)>0){
							$sql8="insert into bid1 values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
							$stmt8=mysqli_stmt_init($con);
							if(mysqli_stmt_prepare($stmt8,$sql8)){
								mysqli_stmt_bind_param($stmt8,"sssssdssssssss",$today,$bidi,$pid,$name,$seller,$price,$h,$first_img,$cat,$brand,$sgmail,$sc_no,$bgmail,$bc_no);
								mysqli_stmt_execute($stmt8);
								if(mysqli_affected_rows($con)>0){			
				?>
					<script language="javascript" type="text/javascript">
                      alert("You are the highest bidder now...");
                      window.location.replace("details2.php?id=<?php echo $pid; ?>&type=<?php echo $type; ?>&LAPTOP=<?php echo $lap; ?>&DESKTOP=<?php echo $desk; ?>&PENDRIVE=<?php echo $pd; ?>&CAMERA=<?php echo $cam; ?>&MOBILE=<?php echo $mob; ?>");
					</script>
<?php		}}
	}}}}}
else{
	$a=$updprice*0.0001;
	$c=$a+$updprice;
	$b=round($c,2);
	$sql19="update product set updatedprice = ? where pid = ?";
	$stmt19=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt19,$sql19)){
		mysqli_stmt_bind_param($stmt19,"ds",$b,$pid);
		mysqli_stmt_execute($stmt19);
	?>
			<script language="javascript" type="text/javascript">
							alert("You got outbidded...");
							window.location.replace("details2.php?id=<?php echo $pid; ?>&type=<?php echo $type; ?>&LAPTOP=<?php echo $lap; ?>&DESKTOP=<?php echo $desk; ?>&PENDRIVE=<?php echo $pd; ?>&CAMERA=<?php echo $cam; ?>&MOBILE=<?php echo $mob; ?>");
			</script>
<?php		
}}}
?>