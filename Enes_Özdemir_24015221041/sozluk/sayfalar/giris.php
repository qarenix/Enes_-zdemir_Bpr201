<?php
if($_POST) {
    $ka = $_POST['kadi'];
    $sifre = $_POST['sifre'];

    // kullanici adini veritabaninda ara
    $sor = $db->prepare("SELECT * FROM uyeler WHERE kadi = ?");
    $sor->execute([$ka]);
    $kullanici = $sor->fetch();

    // kullanici bulunduysa ve sifre dogruysa (hash kontrolu)
    if($kullanici && password_verify($sifre, $kullanici['sifre'])) {
        // oturum degiskenlerini ata
        $_SESSION['uye_id'] = $kullanici['id'];
        $_SESSION['kadi'] = $kullanici['kadi'];
        $_SESSION['rol'] = $kullanici['rol'];
        header("Location: index.php"); // anasayfaya git
    } else {
        echo "<div class='alert alert-danger'>yanlis girdin</div>";
    }
}
?>
<div class="col-md-6 mx-auto mt-4">
    <div class="card">
        <div class="card-header">Giriş</div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="kadi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Şifre</label>
                    <input type="password" name="sifre" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Giriş Yap</button>
            </form>
        </div>
    </div>
</div>