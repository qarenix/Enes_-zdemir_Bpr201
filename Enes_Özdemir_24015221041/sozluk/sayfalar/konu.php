<?php
$id = $_GET['id'];

// başlığın bilgisini çeker
$b_sorgu = $db->prepare("SELECT * FROM basliklar WHERE id = ?");
$b_sorgu->execute([$id]);
$baslik_veri = $b_sorgu->fetch();

// isim yazmak için join işlemi
$sql = "SELECT entryler.*, uyeler.kadi FROM entryler 
        JOIN uyeler ON entryler.yazar_id = uyeler.id 
        WHERE baslik_id = ? ORDER BY tarih ASC";
$e_sorgu = $db->prepare($sql);
$e_sorgu->execute([$id]);

// form gönderildiyse yeni yorum kaydet
if($_POST && isset($_SESSION['uye_id'])) {
    $yazi = $_POST['icerik'];
    $resim = null;


    if(isset($_FILES['resim']) && $_FILES['resim']['error'] == 0) {
        // dosya adi cakismasin diye rastgele sayi ekledim
        $yol = "uploads/" . rand(100,999) . "_" . $_FILES["resim"]["name"];
        move_uploaded_file($_FILES["resim"]["tmp_name"], $yol);
        $resim = $yol;
    }

    // veritabanina ekle
    $ekle = $db->prepare("INSERT INTO entryler (baslik_id, yazar_id, icerik, resim_yolu) VALUES (?, ?, ?, ?)");
    $ekle->execute([$id, $_SESSION['uye_id'], $yazi, $resim]);
    
    // sayfayi yenile ki yeni yorum gozuksun
    header("Refresh:0");
}
?>

<h3><?= htmlspecialchars($baslik_veri['baslik_adi']) ?></h3>
<hr>

<div class="list-group">
    <?php foreach($e_sorgu as $e): ?>
        <div class="list-group-item">
            <p><?= nl2br(htmlspecialchars($e['icerik'])) ?></p>
            
            <?php if($e['resim_yolu']): ?>
                <img src="<?= $e['resim_yolu'] ?>" width="200" class="img-thumbnail">
                <br><br>
            <?php endif; ?>

            <div class="d-flex justify-content-between">
                <?php if(isset($_SESSION['uye_id']) && ($e['yazar_id'] == $_SESSION['uye_id'] || $_SESSION['rol'] == 1)): ?>
                    <a href="sil.php?id=<?= $e['id'] ?>" class="text-danger small" onclick="return confirm('sileyim mi?')">sil</a>
                <?php else: ?>
                    <span></span>
                <?php endif; ?>
                
                <small class="text-muted">yazar: <?= $e['kadi'] ?> | <?= $e['tarih'] ?></small>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php if(isset($_SESSION['uye_id'])): ?>
    <div class="card mt-3 p-3 bg-light">
        <form method="post" enctype="multipart/form-data">
            <label>Entry gir:</label>
            <textarea name="icerik" class="form-control" rows="3" required></textarea>
            
            <label class="mt-2 small">Resim (varsa):</label>
            <input type="file" name="resim" class="form-control">
            
            <button type="submit" class="btn btn-success mt-2">Yolla</button>
        </form>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-3">yazmak icin giris yapman lazim.</div>
<?php endif; ?>