<?php
session_start();

if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
    
    <head>
        <title>Tambah Data</title>
        <!-- Bootstrap -->
        <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="library/assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
                        <ul class="nav">
                            <li>
                                <a href="index.php">Beranda</a>
                            </li>
                            <li class="active">
                                <a href="#">Input Data</a>
                               
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
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li>
                            <a href="index.php"icon-chevron-right"></i> Beranda</a>
                        </li>
                        <li class="active">
                            <a href="#"><i class="icon-chevron-right"></i>Input Data</a>
                        </li>
                        <li>
                            <a href=""><i class="icon-chevron-right"></i> Edit Data</a>
                        </li>
                        <li>
                            <a href=""><i class="icon-chevron-right"></i> Hapus Data</a>
                        </li>
                        <li>
                            <a href=""><i class="icon-chevron-right"></i> Transaksi</a>
                        </li>
                        <li>
                            <a href=""><i class="icon-chevron-right"></i> Laporan</a>
                        </li>
                       
                    </ul>
                </div>
                <!--/span-->
                    <div class="span9" id="content">
                        <!-- morris stacked chart -->
                        <div class="row-fluid">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Form Tambah Master Sepatu</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <form class="form-horizontal" action="proses_simpan.php" method="POST">
                                        <fieldset>
                                            <div class="control-group">
                                            <label class="control-label" for="nama_barang">Nama Sepatu </label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge focused" id="nama_barang" value="" name="nama_barang" required>
                                            </div>
                                            </div>

                                            <div class="control-group">
                                            <label class="control-label" for="ukuran">Ukuran</label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge focused" id="ukuran" value="" name="ukuran" required>
                                            </div>
                                            </div>

                                            <div class="control-group">
                                            <label class="control-label" for="harga">Harga </label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge focused" id="harga" value="" name="harga" required>
                                            </div>
                                            </div>

                                            <div class="control-group">
                                            <label class="control-label" for="jumlah">Jumlah </label>
                                            <div class="controls">
                                                <input type="text" class="input-xlarge focused" id="jumlah" value="" name="jumlah" required>
                                            </div>
                                            </div>

                                            <div class="control-group">
                                            <label class="control-label" for="merk">Merk </label>
                                            <div class="controls">
                                                <select class="input-xlarge focused" id="merk" value="" name="merk" required>
                                                <option value="">Pilih...</option>
                                                    <option value="Ortus">Ortuseight</option>
                                                    <option value="Specs">Specs</option>
                                                    <option value="Mizuno">Mizuno</option>
                                                    <option value="Nike">Nike</option>
                                                    <option value="Adidas">Adidas</option>
                                                </select>
                                            </div>
                                            </div>
                                            
                                            <div class="control-group">
                                            <label class="control-label" for="jenis">Jenis</label>
                                            <div class="controls">
                                                <select class="input-xlarge focused" name="jenis" id="jenis" value="<?php if($data_edit['jenis'] != "") 
                                                echo $data_edit['jenis']; ?>" required>
                                                    <option value="">Pilih...</option>
                                                    <option value="Running">Running</option>
                                                    <option value="Sepakbola">Sepakbola</option>
                                                    <option value="Futsal">Futsal</option>
                                                    <option value="Voli">Voli</option>
                                                    <option value="Basket">Basket</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Kirim Data</button>
                                          <button type="reset" class="btn btn-danger">Cancel</button>
                                        </div>
                                            
                                        </fieldset>
                                        </form>

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
        <link href="library/vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="library/vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="library/vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="library/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="library/vendors/jquery-1.9.1.js"></script>
        <script src="library/bootstrap/js/bootstrap.min.js"></script>
        <script src="library/vendors/jquery.uniform.min.js"></script>
        <script src="library/vendors/chosen.jquery.min.js"></script>
        <script src="library/vendors/bootstrap-datepicker.js"></script>

        <script src="library/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="library/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="library/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="library/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="library/assets/form-validation.js"></script>
        
	<script src="library/assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>