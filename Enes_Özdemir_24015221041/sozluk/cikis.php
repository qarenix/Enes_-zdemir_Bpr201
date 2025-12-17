<?php
session_start();
session_destroy(); // oturumu tamamen kapatiyoruz
header("Location: index.php"); // anasayfaya don
?>