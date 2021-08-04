<?php
    include "koneksi.php";
    $id_transaksi = $_GET['id'];

    $proses = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id = $id_transaksi")
                or die(mysqli_error($koneksi));

                if ($proses){
                    echo "<script>
                            alert('Data transaksi berhasil dihapus');
                            window.location.href='transaksi.php';
                            </script>";
                }else {
                    echo "<script>
                    alert('Data transaksi gagal dihapus');
                    window.location.href='transaksi.php';
                        </script>";
                }
?>