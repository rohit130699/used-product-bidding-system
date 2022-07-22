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
        <title>UpdateSeller</title>
        <style type="text/css">
            body{
                margin: 0;
                padding: 0;
                background-color: paleturquoise;
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
                width: 40%;
                border-radius: 5%;
             }
             button:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
            .box{
                width: 390px;
                height: 580px;
                background: rgba(0,0,0,0.5);
                color: white;
                top: 50%;
                left: 50%;
                position: absolute;
                transform: translate(-50%,-50%);
                box-sizing: border-box;
                padding: 20px 30px;
                margin: auto;
                font-size: 20px;
            }
            h1{
                color: white;
                margin: 0;
                padding: 0 0 20px;
                text-align: center;
                font-size: 22px;
                
            }
            .box p{
                margin: 0;
                padding: 0;
                color: white;
                font-weight: bold;
                margin-bottom: 30px;
            }
            .box input[type="text"],input[type="password"],input[type="email"]{
                width: 60%;
                float: right;
                margin-bottom: 30px;
            }
            .box input[type="text"],input[type="password"],input[type="email"]{
                border:none;
                border-bottom:1px solid white;
                background: transparent;
                outline: none;
                height: 17px;
                color: white;
                font-size: 16px;
                text-align: center;
            }
            .box input[type="radio"]{
             margin-bottom: 30px;   
            }
            .box select{
                border:none;
                border-bottom:1px solid white;
                background: transparent;
                outline: none;
                height: 20px;
                color: white;
                font-size: 16px;
                width: 60%;
                background-color: rgba(0,0,0,0.5);
                font-weight: bold;
                text-align: center;
                float: right;
            }
            .box input[type="submit"]{
                border: none;
                outline: none;
                height: 40px;
                background: red;
                color: white;
                font-weight: bold;
                font-size: 20px;
                border-radius: 5%;
                width:40%;
                margin-bottom: 30px;
            }
            .box input[type="submit"]:hover{
                cursor: pointer;
                background: gray;
                color: black;
            }
        </style>
    </head>
<body>
<?php			 
$sql="select fname,lname,gmail,gender,c_no,age,upass from seller where uname=?";
$stmt=mysqli_stmt_init($con);
if(mysqli_stmt_prepare($stmt,$sql)){
	mysqli_stmt_bind_param($stmt,"s",$name);
	mysqli_stmt_bind_result($stmt,$fname,$lname,$gmail,$gender,$c_no,$age,$upass);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
}?>
<div class="box">
            <h1>UPDATE HERE</h1>
            <form action="update_se.php" name="f1" onsubmit="return update_test()" method="post">
                <p>FIRSTNAME  :
                    <input type="text" name="fname" value="<?php echo $fname; ?>" required></p>
                <p>LASTNAME   :
                    <input type="text" name="lname" value="<?php echo $lname; ?>" required></p>
                </p>
                <p>G-MAIL   :
                    <input type="email" name="gmail" value="<?php echo $gmail; ?>" required></p>
                <b>GENDER   :
                    &nbsp;&nbsp;&nbsp;
                 <?php
                     if($gender == "male"){
                     ?>
                <input type="radio" name="s1" value="male" checked required>MALE&nbsp;
                <input type="radio" name="s1" value="female" required>FEMALE
                <?php
                    }
                     else{
                 ?>
                <input type="radio" name="s1" value="male" required>MALE&nbsp;
                <input type="radio" name="s1" value="female" checked required>FEMALE
                </b>
                 <?php
                     } ?>
                <p>CONTACT-NO   :
                 <input type="text" name="c_no" value="<?php echo $c_no; ?>" required></p>
                <p>AGE   :
                 <input type="text" name="age" value="<?php echo $age; ?>" required></p>
                 <p>PASSWORD   :
                 <input type="password" name="pass" value="<?php echo $upass; ?>" required></p>
                 <p>CONFIRM PASSWORD   :
                 <input type="password" name="cpass" value="<?php echo $upass; ?>" required></p>
                 <script type="text/javascript">
            function update_test(){
            var phn=document.forms["f1"]["c_no"];
            var age=document.forms["f1"]["age"];
            var psw=document.forms["f1"]["pass"];
            var cpsw=document.forms["f1"]["cpass"];
            var fname=document.forms["f1"]["fname"];
            var lname=document.forms["f1"]["lname"];
            var gmail=document.forms["f1"]["gmail"];
            var s1=document.forms["f1"]["s1"];
            var rm = /^((?!(0))[0-9]{10})$/;
            var rg=/^[a-zA-Z]{3,}$/;
             if(!fname.value.match(rg)){
                alert("Enter Proper Firstname");
                fname.value="";
               return false;
            }
            if(!lname.value.match(rg)){
                alert("Enter Proper Lastname");
                lname.value="";
               return false;
            }
            if(!phn.value.match(rm)){
                alert("Enter valid phone number");
                phn.value="";
               return false;
            }
            var ag = /^\d{2,}$/;
            if(!age.value.match(ag)){
                alert("Enter valid age");
                age.value="";
               return false;
            }
            if(age.value < 25 || age.value > 99){
               alert("Enter age between 25 and 99");
               age.value="";
               return false; 
            }
            if(psw.value !== cpsw.value){
               alert("Confirm password does not matches with Password");
               psw.value="";
               cpsw.value="";
               return false; 
            }
            for(i=0;i<s1.length;i++){
            if(s1[i].checked)
                if(s1[i].value === "<?php echo $gender; ?>" && fname.value === "<?php echo $fname; ?>" && lname.value === "<?php echo $lname; ?>" && gmail.value === "<?php echo $gmail; ?>" && phn.value === "<?php echo $c_no; ?>" && age.value === "<?php echo $age; ?>" && psw.value === "<?php echo $upass; ?>" && cpsw.value === "<?php echo $upass; ?>"){
                 alert("No updation performed yet..."); 
                 return false;
          }
            }
           return true;
        }
        </script>
                 <center><input type="submit" value="UPDATE" onclick="submit">&nbsp;&nbsp;
                     <button  type="button" onclick="window.location='seller.html'">BACK</button></center>
            </form>
        </div>
    </body>
</html>