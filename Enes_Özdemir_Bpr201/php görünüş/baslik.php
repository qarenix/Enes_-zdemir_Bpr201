<?php 
    include 'header.php'; 
?>

<?php 
    include 'sidebar.php'; 
?>

<section class="col-md-9">

    <?php
        if ( isset($_GET['konu']) ) {
            $gelen_baslik = str_replace('-', ' ', $_GET['konu']);
        } else {
            $gelen_baslik = "Başlık Bulunamadı";
        }
    ?>

    <div class="card">
        <div class="card-body">

            <h1 class="h4"><a href="#" class="text-success text-decoration-none"><?php echo htmlspecialchars($gelen_baslik); ?></a></h1>
            
            <div class="entry border-bottom pb-3 mb-3">
                <p>
                    <strong><?php echo htmlspecialchars($gelen_baslik); ?></strong> Kayaç, çeşitli minerallerin veya mineral ve taş parçacıklarının bir araya gelmesinden ya da bir mineralin çok miktarda birikmesinden meydana gelen katı birikintilerdir. Kayaç terimi eski Türkçede sahre, yeni Türkçede külte ve yabancı dillerdeki rock, roche, gestein sözcükleri karşılığı kullanılmaktadır.
                </p>
                <div class="entry-footer text-muted small">
                    <strong class="text-success">Qarenix</strong>
                    <span>10.10.2025 18:00</span>
                </div>
            </div>

            <div class="entry">
                <p>
                    Gelecekte veritabanı bağlandığında, bu başlığa ait 
                    yazılar burada olacak.
                </p>
                <div class="entry-footer text-muted small">
                    <strong class="text-success">no budy</strong>
                    <span>10.10.2025 18:05</span>
                </div>
            </div>

        </div> </div> </section> <?php 
    include 'footer.php'; 
?>