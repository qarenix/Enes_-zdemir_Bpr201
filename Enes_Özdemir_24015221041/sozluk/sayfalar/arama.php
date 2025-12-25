<?php

$aranan = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';

if($aranan != "") {

    $sorgu = $db->prepare("SELECT * FROM basliklar WHERE baslik_adi LIKE ? ORDER BY tarih DESC");
    $sorgu->execute(["%$aranan%"]);
    $sonuclar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sonuclar = [];
}
?>

<h3>Arama Sonuçları</h3>
<p class="text-muted">"<strong><?= $aranan ?></strong>" için sonuçlar:</p>
<hr>

<?php if($aranan == ""): ?>
    <div class="alert alert-warning">Lütfen aramak için bir şeyler yazın.</div>
<?php elseif(count($sonuclar) > 0): ?>
    
    <div class="list-group">
        <?php foreach($sonuclar as $s): ?>
            <a href="index.php?sayfa=konu&id=<?= $s['id'] ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <?= htmlspecialchars($s['baslik_adi']) ?>
                <small class="text-muted"><?= $s['tarih'] ?></small>
            </a>
        <?php endforeach; ?>
    </div>

<?php else: ?>
    <div class="alert alert-danger">
        Malesef "<?= $aranan ?>" ile ilgili bir başlık bulunamadı.
    </div>
    
    <?php if(isset($_SESSION['uye_id'])): ?>
        <p>Aradığın şey yoksa sen oluşturabilirsin:</p>
        <a href="index.php?sayfa=baslik_ac" class="btn btn-success">+ Yeni Başlık Aç</a>
    <?php endif; ?>

<?php endif; ?>