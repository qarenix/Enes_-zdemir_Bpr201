<?php
// giriş yapamayanlar için
if(!isset($_SESSION['uye_id'])) {
    die("yetkin yok");
}

if($_POST) {
    $baslik = trim($_POST['baslik']);
    
    if($baslik != "") {
        // veri tabanına ekle
        $ekle = $db->prepare("INSERT INTO basliklar (baslik_adi, olusturan_id) VALUES (?, ?)");
        $ekle->execute([$baslik, $_SESSION['uye_id']]);
        
       
        $son_id = $db->lastInsertId();
        header("Location: index.php?sayfa=konu&id=" . $son_id);
    }
}
?>
<div class="col-md-8 mt-4">
    <h3>Yeni Başlık</h3>
    <form method="post">
        <input type="text" name="baslik" class="form-control mb-3" placeholder="Konu başlığı..." required>
        <button type="submit" class="btn btn-success">Oluştur</button>
    </form>
</div>