<?php
session_start();
unset($_SESSION['seller']);
header("Location:front.html");
exit;
?>