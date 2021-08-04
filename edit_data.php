<?php
session_start();

if( !isset($_SESSION["username"]) ) {
    header("Location: login.php");
    exit;
}
    include "master_data_proses.php";
    include "edit_data_proses.php";

    //proses mengambil data untuk di edit
    $data_edit = mysqli_fetch_assoc($proses_ambil);
?>


<!DOCTYPE html>
<html>
    
    <head>
        <title>Edit Data</title>
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
                        <li class="active">
                            <a href="edit_data.php"><i class="icon-edit"></i> Edit Data</a>
                        </li>
                        <li>
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
	                                        <a href="#">Edit Data</a> <span class="divider">/</span>	
	                                    </li>
	                                    <li>
	                                        <a href="#">Edit Master Sepatu</a> <span class="divider"></span>	
	                                    
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Form Tambah Master Sepatu</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <?php 
                                            if($_GET['id'] !=""){
                                                //proses edit data
                                            
                                        ?>
                                        <form class="form-horizontal" action="edit_data.php?id=<?php echo $data_edit['id'] ?>&proses=1" method="POST">
                                        <?php 
                                        }else{
                                        ?>
                                        
                                        <form class="form-horizontal" action="proses_simpan.php" method="POST">
                                            <?php
                                        }
                                        ?>
                                        <fieldset>
                                            <div class="control-group">
                                            <label class="control-label" for="nama_barang">Nama Sepatu </label>
                                            <div class="controls">
                                                <input type="hidden" class="input-xlarge focused" id="nama_barang"name="nama_barang"
                                                value="<?php if($data_edit['id'] !="")
                                                echo $data_edit['id']; ?>">

                                                <input type="text" class="input-xlarge focused" id="nama_barang" name="nama_barang"
                                                value="<?php if($data_edit['nama_sepatu'] !="") echo $data_edit['nama_sepatu']; ?>" required>

                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="ukuran">Ukuran</label>
                                                    <div class="controls">
                                                        <input type="text" class="input-xlarge focused" id="ukuran" value="<?php if($data_edit['ukuran'] !="")
                                                        echo $data_edit['ukuran']; ?>" name="ukuran" required>
                                                    </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="harga">Harga </label>
                                                    <div class="controls">
                                                        <input type="text" class="input-xlarge focused" id="harga" value="<?php if($data_edit['harga'] !="")
                                                        echo $data_edit['harga']; ?>" name="harga" required>
                                                    </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="jumlah">Jumlah </label>
                                                    <div class="controls">
                                                        <input type="text" class="input-xlarge focused" id="jumlah" value="<?php if($data_edit['jumlah'] !="")
                                                        echo $data_edit['jumlah']; ?>" name="jumlah" required>
                                                    </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="merk">Merk </label>
                                                    <div class="controls">
                                                        <select class="input-xlarge focused" id="merk" value="<?php if($data_edit['merk'] !="")
                                                            echo $data_edit['merk']; ?>" name="merk" required>
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
                            </form>
                                        
                                      

                                    </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                                
                        <?php
                            if(mysqli_num_rows($proses) == 0){ 
                                echo '<div class="alert alert-error alert-block">
                                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                                        <h4 class="alert-heading">Data Ini Tidak Ada!</h4>
                                    </div>';
                                }else{
                         ?>


                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tabel Master Sepatu</div>
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
                                        <th>Ukuran</th>
                                        <th>Merk</th>
                                        <th>Jenis</th>
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
                                            ?>
                                            <tr>
                                                <td><?php echo $data['id'] ?></td>
                                                <td><?php echo $data['nama_sepatu'] ?></td>
                                                <td><?php echo $data['jumlah'] ?></td>
                                                <td>Rp <?php echo $subtotal ?></td>
                                                <td><?php echo $data['ukuran'] ?></td>
                                                <td><?php echo $data['merk'] ?></td>
                                                <td><?php echo $data['jenis'] ?></td>
                                                <td>
                                                    <a href="edit_data.php?id=<?php echo $data['id']; ?>">
                                                        <button class="btn btn-success">Edit</button>
                                                    </a>
                                                    <!-- <a href="#">
                                                        <button class="btn btn-danger">Hapus</button>
                                                    </a> -->
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