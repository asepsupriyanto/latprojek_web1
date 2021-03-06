<?php
session_start();

if( isset($_SESSION["username"]) ){
    header("Location: index.php");
    exit;
}
    require 'registrasi_proses.php';
    require 'koneksi.php';

    //untuk pengaturan kondisi klik pada register
    if( isset($_POST["register"])){
        if ( registrasi($_POST) > 0 ){
            echo "<script>
                    alert('user baru berhasil ditambahkan!');
                    </script>";
        } else {
            echo mysqli_error($koneksi);
        }
    }

    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman registrasi</title>
    <!-- Bootstrap -->
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="library/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Silakan registrasi</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="username" id="username" required>
        <input type="password" class="input-block-level" placeholder="Password" name="password" id="password" required>
        <input type="password" class="input-block-level" placeholder="Konfirmasi password" name="password2" id="password2" required>
        <button class="btn btn-success btn-large" type="submit" name="register">Register!</button>
        
        <div class="text-left forget">
            <h5>Back To <a href="login.php">Login</a></h5>
        </div>
      </form>
      

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>