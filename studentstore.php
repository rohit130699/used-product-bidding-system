<?php
//session_start();
//$name = $_SESSION['admin'];
$name = "Shyam";
if(is_null($name)){?>
	<script language="javascript" type="text/javascript">
                      alert("Your session has been expired!Please wait for few minutes!!");
                      window.location='index.html';
    </script>
<?php
}
$con=mysqli_connect('localhost','root','','snclasses');
if(!$con)
{
die('Some Fault Occured..');
}
$id  	=$_POST['stu_id'];
$fname  =$_POST['fname'];
$lname  =$_POST['lname'];
$gender =$_POST['gender'];
$std  	=$_POST['std'];
$med  	=$_POST['med'];
$feemon =$_POST['feemon'];
$actfee =$_POST['actfee'];
$doj  	=$_POST['doj'];
$add 	=$_POST['add'];
$gmail  =$_POST['gmail'];
$c_no  	=$_POST['c_no'];
$downp  =$_POST['downp'];
$dt = strtotime($doj);
$updt = date("d/m/Y",$dt);

//INSERTING DATA INTO STUDENT TABLE
if($std < 10){
$sql1="insert into student values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt1=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt1,$sql1)){
	 mysqli_stmt_bind_param($stmt1,"ssssssddssssd",$id,$fname,$lname,$gender,$std,$med,$feemon,$actfee,$updt,$add,$gmail,$c_no,$downp);
	 mysqli_stmt_execute($stmt1);
	}
	
	if(mysqli_affected_rows($con)>0){
		$sn = $fname." ".$lname;
		$e = "NULL";
		$sql2="insert into fees values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt2=mysqli_stmt_init($con);
		if(mysqli_stmt_prepare($stmt2,$sql2)){
			mysqli_stmt_bind_param($stmt2,"sssdssssssssssss",$id,$std,$sn,$actfee,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e,$e);
			mysqli_stmt_execute($stmt2);
		}
		if(mysqli_affected_rows($con)>0){
		
	   $date = strtotime($doj);
	   $mon = date("F",$date);
	   $up = date("d/m/Y",$date);
	   $upd= $up." ".$name;
	   switch($mon){
		case "June":
			$total = $actfee * 12;
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set June = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set June = ?,July = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set June = ?,July = ?,August = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set June = ?,July = ?,August = ?,September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
	   }}}
			if($n == 10){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 11){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 12){
				$sql="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			break;
		case "July":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 11;
			$sql1="update fees set June = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ss",$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set July = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set July = ?,August = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set July = ?,August = ?,September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set July = ?,August = ?,September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 10){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 11){
				$sql="update fees set July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "August":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 10;
			$sql1="update fees set June = ?,July = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sss",$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set August = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set August = ?,September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set August = ?,September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set August = ?,September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 10){
				$sql="update fees set August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "September":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 9;
			$sql1="update fees set June = ?,July = ?,August = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssss",$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set September = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set September = ?,October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set September = ?,October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set September = ?,October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 9){
				$sql="update fees set September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "October":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 8;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssss",$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set October = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set October = ?,November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set October = ?,November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set October = ?,November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 8){
				$sql="update fees set October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "November":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 7;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssss",$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set November = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set November = ?,December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set November = ?,December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set November = ?,December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 7){
				$sql="update fees set November = ?,December = ?,January = ?,February = ?,March = ?,April = ?,May = ?  where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssssss",$upd,$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "December":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 6;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssss",$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set December = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set December = ?,January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set December = ?,January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set December = ?,January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 6){
				$sql="update fees set December = ?,January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssssss",$upd,$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "January":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 5;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssss",$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set January = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set January = ?,February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set January = ?,February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set January = ?,February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 5){
				$sql="update fees set January = ?,February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssssss",$upd,$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
				?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "February":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 4;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set February = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set February = ?,March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set February = ?,March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 4){
				$sql="update fees set February = ?,March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sssss",$upd,$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "March":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 3;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set March = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set March = ?,April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 3){
				$sql="update fees set March = ?,April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssss",$upd,$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "April":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 2;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"sssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set April = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}
			if($n == 2){
				$sql="update fees set April = ?,May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"sss",$upd,$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){
					?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
		case "May":
			$p = "Not Joined";
			if($downp % $actfee != 0){
			?>
		    <script language="javascript" type="text/javascript">
		    alert("Please enter proper amount....");
            window.location='student.php';    //STUDENT PAGE FOR ENTERING DETAILS
		    </script>
			<?php	
			}
			$total = $actfee * 1;
			$sql1="update fees set June = ?,July = ?,August = ?,September = ?,October = ?,November = ?,December = ?,January = ?,February = ?,March = ?,April = ? where st_id = ?";
			$stmt1=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt1,$sql1)){
			mysqli_stmt_bind_param($stmt1,"ssssssssssss",$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$p,$id);
			mysqli_stmt_execute($stmt1);
			if(mysqli_affected_rows($con)>0){
			$n = $downp / $actfee;
			if($n == 1){
				$sql="update fees set May = ? where st_id = ?";
				$stmt=mysqli_stmt_init($con);
				if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ss",$upd,$id);
				mysqli_stmt_execute($stmt);
				if(mysqli_affected_rows($con)>0){?>
					<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
					</script>	
			<?php
			}}}}}
			break;
	   } 
	}
	mysqli_stmt_close($stmt2);}
	mysqli_stmt_close($stmt1);
	mysqli_close($con);
}
if($std == 10){
	$sql1="insert into student values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt1=mysqli_stmt_init($con);
	if(mysqli_stmt_prepare($stmt1,$sql1)){
	 mysqli_stmt_bind_param($stmt1,"ssssssddssssd",$id,$fname,$lname,$gender,$std,$med,$feemon,$actfee,$updt,$add,$gmail,$c_no,$downp);
	 mysqli_stmt_execute($stmt1);
		}
		if(mysqli_affected_rows($con)>0){
			$sn = $fname." ".$lname;
			$e = "NULL";
			$penf = $actfee - $downp;
			$sql="insert into tenthfees values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt=mysqli_stmt_init($con);
			if(mysqli_stmt_prepare($stmt,$sql)){
				mysqli_stmt_bind_param($stmt,"ssdddssssssss",$id,$sn,$actfee,$downp,$penf,$downp,$e,$e,$e,$e,$e,$e,$e);
				mysqli_stmt_execute($stmt);
				}
				if(mysqli_affected_rows($con)>0){?>
				<script language="javascript" type="text/javascript">
                      alert("Added Successfully...");
                      window.location='student.php';
				</script>
				<?php}
}
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt1);
mysqli_close($con);
}
?>