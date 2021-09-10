<?php

include "koneksi.php";

//pagination
$jumlahDataPerhalaman = 3;
$result = mysqli_query($koneksi, "SELECT * FROM sepatu");
$jumlahData = mysqli_num_rows($result);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);

$halamanAktif = ( isset($_GET['halaman']) ) ? $_GET['halaman'] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;
    //mengambil data dari db
    $proses = mysqli_query($koneksi, "SELECT * FROM sepatu LIMIT 0, $jumlahDataPerhalaman") or die (mysqli_error($koneksi));

?>