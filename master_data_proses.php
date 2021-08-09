<?php

include "koneksi.php";

    //mengambil data dari db
    $proses = mysqli_query($koneksi, "SELECT * FROM sepatu ORDER BY id DESC ") or die (mysqli_error($koneksi));

?>