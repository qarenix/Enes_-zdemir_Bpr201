<?php
ob_start();
include 'baglan.php'; // veritabani bağlantisini cagir

// linkten gelen sayfa bilgisini aliyoruz
$sayfa = isset($_GET['sayfa']) ? $_GET['sayfa'] : 'anasayfa';


// en son yazilan en ustte dursun
$konular = $db->query("SELECT * FROM basliklar ORDER BY tarih DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qarenix Sözlük</title>
    <link rel="icon" href="logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        
        body { background-color: #f0f2f5; min-height: 100vh; display: flex; flex-direction: column; }
        .sol-kisim { background: white; min-height: 100vh; padding: 15px; border-right: 1px solid #ccc; }
            .linkler { text-decoration: none; color: #333; display: block; padding: 5px 0; }
        .linkler:hover { color: green; font-weight: bold; }
        .ana-kutu { flex: 1;}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="logo.png" style="height: 35px; margin-right: 10px; background:white; border-radius:50%; padding:2px;">
        <strong>Qarenix Sözlük</strong>
    </a>
    
    <form class="d-flex mx-auto" action="index.php" method="get" style="width: 40%;">
        <input type="hidden" name="sayfa" value="arama">
        <input class="form-control me-2" type="search" name="q" placeholder="Başlık ara..." required>
        <button class="btn btn-outline-light" type="submit">Ara</button>
    </form>
    
    <div>
        <?php if(isset($_SESSION['uye_id'])): ?>
            <span class="text-white me-3">
                Selam, <?= $_SESSION['kadi'] ?> 
                <?php if($_SESSION['rol'] == 1) echo "(Yonetici)"; ?>
            </span>
            <a href="cikis.php" class="btn btn-sm btn-danger">Çıkış</a>
        <?php else: ?>
            <a href="index.php?sayfa=giris" class="btn btn-sm btn-light">Giriş</a>
            <a href="index.php?sayfa=kayit" class="btn btn-sm btn-outline-light">Kayıt</a>
        <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container-fluid ana-kutu">
    <div class="row">
        <div class="col-md-3 sol-kisim">
            <h5 class="text-success">Gündem</h5>
            <hr>
            <?php foreach($konular as $k): ?>
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <a href="index.php?sayfa=konu&id=<?= $k['id'] ?>" class="linkler text-truncate" style="width: 80%;">
                        <?= htmlspecialchars($k['baslik_adi']) ?>
                    </a>
                    
                    <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1): ?>
                        <a href="sil.php?id=<?= $k['id'] ?>&tur=baslik" 
                           class="text-danger fw-bold text-decoration-none" 
                           onclick="return confirm('bunu sileyim mi?')">x</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            
            <br>
            <?php if(isset($_SESSION['uye_id'])): ?>
                <a href="index.php?sayfa=baslik_ac" class="btn btn-success btn-sm w-100">+ Başlık Aç</a>
            <?php endif; ?>
        </div>

        <div class="col-md-9 p-4">
            <?php
           
            if($sayfa == 'anasayfa') {
                echo "<div class='alert alert-light border'><h3>Hoşgeldin Qarenix sözlük hizmetinde</h3><p>Soldan bi konu seç ve bak keyfine.</p></div>";
            }
            elseif($sayfa == 'giris') { include 'sayfalar/giris.php'; }
            elseif($sayfa == 'kayit') { include 'sayfalar/kayit.php'; }
            elseif($sayfa == 'konu') { include 'sayfalar/konu.php'; } 
            elseif($sayfa == 'baslik_ac') { include 'sayfalar/baslik_ac.php'; }
            elseif($sayfa == 'arama') { include 'sayfalar/arama.php'; }
            ?>
        </div>
    </div>
</div>

<footer class="text-center py-3 bg-white border-top mt-auto">
    <small>2025 - Üniversite Ödevi - Tüm hakları saklıdır.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
ob_end_flush(); 
?>