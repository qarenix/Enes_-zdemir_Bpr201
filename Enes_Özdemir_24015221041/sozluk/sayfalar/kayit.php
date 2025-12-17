<?php
if($_POST) {
    $ka = $_POST['kadi'];
    $mail = $_POST['email'];
    // sifreyi veritabaninda acik tutmamak için 
    $pass = password_hash($_POST['sifre'], PASSWORD_DEFAULT);

    $ekle = $db->prepare("INSERT INTO uyeler (kadi, email, sifre) VALUES (?, ?, ?)");
    $sonuc = $ekle->execute([$ka, $mail, $pass]);

    if($sonuc) {
        echo "<div class='alert alert-success'>kayit oldun giris yapabilirsin</div>";
    } else {
        echo "<div class='alert alert-danger'>hata oldu</div>";
    }
}
?>
<div class="col-md-6 mx-auto mt-4">
    <div class="card">
        <div class="card-header">Kayıt Ol</div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="kadi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Şifre</label>
                    <input type="password" name="sifre" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Kayıt Ol</button>
            </form>
        </div>
    </div>
</div>