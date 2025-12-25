<?php
//  hata varsa ekrana bassin
error_reporting(E_ALL);
ini_set('display_errors', 1);

// xampp ayarları
$host = 'localhost';
$db_adi = 'sozluk_projesi'; //php ismi
$kullanici = 'root';
$sifre = '';

try {
    // pdo 
    $db = new PDO("mysql:host=$host;dbname=$db_adi;charset=utf8", $kullanici, $sifre);
} catch (PDOException $hata) {
    // bağlanmazsa hata versin
    die("Veritabani hatasi: " . $hata->getMessage());
}

// oturum
session_start();
?>