<?php
session_start();

if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}
    include "master_data_proses.php";
?>


<!DOCTYPE html>
<html>
    
    <head>
        <title>Hapus Data</title>
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
                        <!-- <ul class="nav">
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
                        <li>
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
                        <li  class="active">
                            <a href="hapus_data.php"><i class="icon-remove-sign"></i> Hapus Data</a>
                        </li>
                        <li>
                            <a href="transaksi.php"><i class="icon-briefcase"></i> Transaksi</a>
                        </li>
                        <!-- <li>
                            <a href="laporan.php"><i class="icon-chevron-right"></i> Laporan</a>
                        </li> -->
                       
                    </ul>
                    </div>

                <div class="span9" id="content">
                    <div class="row-fluid">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Hapus Data</a> <span class="divider"></span>	
	                                    </li>
	                                   
	                                    
	                                </ul>
                            	</div>
                        	</div>
                    	</div>

                        <?php
                            if(mysqli_num_rows($proses) == 0){ 
                                echo '<div class="alert alert-error alert-block">
                                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                                        <h4 class="alert-heading">Data Ini Tidak Ada</h4>
                                    </div>';
                                }else{
                         ?>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Hapus Data Sepatu</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table table-striped">
						              <thead>
                                          <tr>
						                <th>ID Sepatu</th>
                                        <th>Nama Sepatu</th>
                                        <th>Satuan</th>
                                        <th>Subtotal</th>
                                        <!-- <th>Ukuran</th>
                                        <th>Merk</th>
                                        <th>Jenis</th> -->
                                        <th>Aksi</th>
                                        
                                          </tr>
						              </thead>
						              <tbody>
						                <?php
                                            $subtotal = 0;

                                            //menampilkan data
                                            while($data = mysqli_fetch_assoc($proses)){

                                                //perhitungan subtotal
                                                $subtotal = $data['harga']*$data['jumlah'];

                                                $rupiah=number_format($subtotal,2,',','.');
                                            ?>
                                            <tr>
                                                <td><?php echo $data['id'] ?></td>
                                                <td><?php echo $data['nama_sepatu'] ?></td>
                                                <td><?php echo $data['jumlah'] ?></td>
                                                <td><?php echo 'Rp'.$rupiah ?></td>
                                                <!-- <td><?php echo $data['ukuran'] ?></td>
                                                <td><?php echo $data['merk'] ?></td>
                                                <td><?php echo $data['jenis'] ?></td> -->
                                                <td>
                                                    <!-- <a href="#">
                                                        <button class="btn btn-success">Edit</button>
                                                    </a> -->
                                                    <a href="hapus_data_proses.php?id=<?php echo $data['id']; ?>">
                                                        <button class="btn btn-danger">Hapus</button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                    <?php
                                }
                     ?>
						              </tbody>
						            </table>
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