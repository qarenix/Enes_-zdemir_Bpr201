<?php
include 'baglan.php';

// id gelmis mi ve giris yapilmis mi kontrol
if(isset($_GET['id']) && isset($_SESSION['uye_id'])) {
    $silinecek_id = $_GET['id'];
    $kim = $_SESSION['uye_id'];
    $yetki = $_SESSION['rol'];

    $tip = isset($_GET['tur']) ? $_GET['tur'] : 'entry'; 

    // BAŞLIK SİLME (Sadece Yönetici) 
    if($tip == 'baslik' && $yetki == 1) {
        // veritabanı bozulmasın diye önce içindeki yorumları siliyoruz
        $q1 = $db->prepare("DELETE FROM entryler WHERE baslik_id = ?");
        $q1->execute([$silinecek_id]);

        // sonra başliğin kendisini siliyoruz
        $q2 = $db->prepare("DELETE FROM basliklar WHERE id = ?");
        $q2->execute([$silinecek_id]);
        
        header("Location: index.php");
        exit;
    }
    
    //YORUM SİLME
    if($tip == 'entry') {
        if($yetki == 1) {
            // adminse sorgusuz sualsiz siler
            $sql = "DELETE FROM entryler WHERE id = ?";
            $sorgu = $db->prepare($sql);
            $sorgu->execute([$silinecek_id]);
        } else {
            // normal uyeyse 'bu yazi senin mi' diye bakiyoruz
            $sql = "DELETE FROM entryler WHERE id = ? AND yazar_id = ?";
            $sorgu = $db->prepare($sql);
            $sorgu->execute([$silinecek_id, $kim]);
        }
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
?>