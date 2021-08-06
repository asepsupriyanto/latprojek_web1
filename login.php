<?php
include "koneksi.php";
session_start();

if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($koneksi, "SELECT username from user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  if( $key === hash('sha256', $row['username']) ){
    $_SESSION['username'] = $row['username'];
  }
}

if( isset($_SESSION["username"]) ){
    header("Location: index.php");
    exit;
}

require 'koneksi.php';
  //kondisi ketika tombol login di klik
    if( isset($_POST["login"]) ) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
        
        //cek username
        if( mysqli_num_rows($result) === 1 ) {

            //cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row['password']) ) {
                
                //set session
                $_SESSION['username'] = $username;

                // cek remember me
                if( isset($_POST['remember'])){
                  //buat cookie
                  
                  setcookie('id', $row['id'], time() + 60);
                  setcookie('key', hash('sha256', $row['username']),
                  time()+60);
                }
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
   
   
    }


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman log in</title>
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
    <?php if( isset($error) ) : ?>
      <!-- <div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						<strong>Username/Password anda salah</strong> 
			</div> -->
      <div class="alert alert-error alert-block">
										<a class="close" data-dismiss="alert" href="#">&times;</a>
										<h4 class="alert-heading">Error!</h4>
      Username/Password anda salah!
                  </div>
    <?php endif; ?>

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading" align="center">Asep Sports</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="username" id="username" required>
        <input type="password" class="input-block-level" placeholder="Password" name="password" id="password" required>

        <div class="form-group inline-block">
          <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="remember" id="remember">
          <label for="remember" class="label">Remember me</label>
        </div>
        </div>
      
        <button class="btn btn-block btn-primary" type="submit" name="login">Log in</button>
      </form>

    </div> <!-- /container -->
    <script src="library/vendors/jquery-1.9.1.min.js"></script>
    <script src="library/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>