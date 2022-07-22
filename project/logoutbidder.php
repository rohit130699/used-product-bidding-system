<?php
session_start();
unset($_SESSION['bidder']);
header("Location:front.html");
exit;
?>