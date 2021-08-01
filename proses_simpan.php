<?php
    include "koneksi.php";
    
    //proses pengambilan dan perhitungan master sepatu ke index
    $data_barang = mysqli_query($koneksi, "SELECT * FROM sepatu ");
    $jumlah_barang = mysqli_num_rows($data_barang);


    //mengambil data inputan
    $nama_sepatu = ucwords($_POST['nama_barang']);
    $ukuran_sepatu = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $merk = $_POST['merk'];
    $jenis = $_POST['jenis'];

    //untuk menyimpan ke dalam db
    $proses = mysqli_query ($koneksi, "INSERT INTO sepatu(nama_sepatu, ukuran, harga, jumlah, merk, jenis) VALUES ('$nama_sepatu', '$ukuran_sepatu', '$harga', '$jumlah', '$merk', '$jenis')")
    or die (mysqli_error($koneksi));

    if ($proses){
        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href='input_data.php';
                </script>";
    }else echo "<script>
                alert('Data Gagal Disimpan');
                window.location.href='input_data.php';
                </script>";

?>