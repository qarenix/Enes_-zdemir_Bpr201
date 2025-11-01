<?php 
    include 'header.php'; 
?>

<?php 
    include 'sidebar.php'; 
?>

<section class="col-md-9">

    <div class="card">
        <h5 class="card-header">Giriş Yap</h5>
        <div class="card-body">

            <form action="" method="post">
                
                <div class="mb-3">
                    <label for="kullanici" class="form-label">Kullanıcı adı ya da e-posta:</label>
                    <input type="text" id="kullanici" name="kullanici" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="sifre" class="form-label">Şifre:</label>
                    <input type="password" id="sifre" name="sifre" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success">Giriş</button>
            </form>

        </div> </div> </section> <?php 
    include 'footer.php'; 
?>