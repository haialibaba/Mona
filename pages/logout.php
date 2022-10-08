<?php
session_start();
session_destroy();
header('location: ./../index.php');
setcookie("maKhachHang", "", time()-(86400 * 30),"/");
?>