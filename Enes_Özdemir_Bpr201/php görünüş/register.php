<?php 
    include 'header.php'; 
?>

<?php 
    include 'sidebar.php'; 
?>

<section class="col-md-9">

    <div class="card">
        <h5 class="card-header">Kayıt Ol</h5>
        <div class="card-body">
    
            <form action="" method="post">
                
                <div class="mb-3">
                    <label for="kullanici-kayit" class="form-label">Kullanıcı adı:</label>
                    <input type="text" id="kullanici-kayit" name="kullanici" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email-kayit" class="form-label">E-posta adresi:</label>
                    <input type="email" id="email-kayit" name="email" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="sifre-kayit" class="form-label">Şifre:</label>
                    <input type="password" id="sifre-kayit" name="sifre" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success">Kayıt Ol</button>
            </form>

        </div> </div> </section> <?php 
    include 'footer.php'; 
?>