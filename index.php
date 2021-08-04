<?php
session_start();

if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}
    include "koneksi.php";
   
    //mengambil dan menghitung master sepatu
    $data_barang = mysqli_query($koneksi, "SELECT * FROM sepatu ");
    $jumlah_barang = mysqli_num_rows($data_barang);

    //mengambil dan menghitubf master transaksi
    $data_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi");
    $jumlah_transaksi = mysqli_num_rows($data_transaksi);

    // include "tampilkan_data.php";
    // include "edit_data.php";
    // include "proses_transaksi.php";

    //variabel untuk mengambil data dari edit_data
    // $data_edit = mysqli_fetch_assoc($proses_ambil);

    // if( isset($_POST["bayar"])){
    //     if ( pembayaran($_POST) > 0 ){
    //         echo "<script>
    //                 alert('data transaksi baru berhasil ditambahkan!');
    //                 window.location.href='transaksi.php';

    //                 </script>";
    //     } else {
    //         echo mysqli_error($koneksi);
            
    //     }
    // }

    
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Index</title>
        <!-- Bootstrap -->
        <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="library/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="library/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Aplikasi Kasir Toko Asep Sport</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo ucwords($_SESSION["username"]); ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- <ul class="nav">
                            <li class="active">
                                <a href="index.php">Beranda</a>
                            </li>
                            <li>
                                <a href="input_data.php">Input Data</a>
                               
                            </li>
                            <li>
                                <a href="#">Edit Data</a>
                                
                            </li>
                            <li>
                                <a href="#">Hapus Data</a>
                               
                            </li>
                            <li>
                                <a href="">Transaksi</a>
                            </li>
                            <li>
                                <a href="">Laporan</a>
                            </li>
                        </ul> -->
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
    </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="index.php"><i class="icon-home"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="input_data.php"><i class="icon-upload"></i> Input Data</a>
                        </li>
                        <li>
                            <a href="master_data.php"><i class="icon-th-list"></i> Master Data</a>
                        </li>
                        <li>
                            <a href="edit_data.php"><i class="icon-edit"></i> Edit Data</a>
                        </li>
                        <li>
                            <a href="hapus_data.php"><i class="icon-remove-sign"></i> Hapus Data </a>
                        </li>
                        <li>
                            <a href="transaksi.php"><i class="icon-briefcase"></i> Transaksi</a>
                        </li>
                        <!-- <li>
                            <a href="laporan.php"><i class="icon-chevron-right"></i> Laporan </a>
                        </li> -->
                        
                    </ul>
                </div>
                
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Selamat Datang <?php echo ucwords($_SESSION['username']); ?>!</h4>
                        	</div>
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Beranda</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li>
	                                        <a href="#">Statistik</a> <span class="divider"></span>	
	                                    
	                                </ul>
                            	</div>
                        	</div>
                    	</div>

                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistik</div>
                                <div class="pull-right"><span class="badge badge-warning">View More</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $jumlah_transaksi; ?>">
                                    <b style="font-size: 25px;"><?php echo $jumlah_transaksi; ?></b>
                                    </div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Transaksi</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $jumlah_barang; ?>">
                                        <b style="font-size: 25px;"><?php echo $jumlah_barang; ?></b>
                                    </div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Stok Sepatu</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="83">83%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Keuntungan</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="13">13%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Kerugian</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                    

                   
                    
                    
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; Asep Supriyanto 2021</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="library/vendors/jquery-1.9.1.min.js"></script>
        <script src="library/bootstrap/js/bootstrap.min.js"></script>
        <script src="library/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="library/assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>