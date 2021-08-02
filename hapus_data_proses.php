<?php
    include "koneksi.php";

    $id_barang = $_GET['id'];

    $proses = mysqli_query($koneksi, "DELETE FROM Sepatu WHERE id = $id_barang")
                or die(mysqli_error($koneksi));

                if($proses){
                    echo "<script>
                            alert('Data Berhasil Dihapus');
                            window.location.href='master_data.php';
                        </script>";
                }else echo "<script>
                            alert('Data Gagal Dihapus');
                            window.location.href='master_data.php';
                            </script>";

                            ?>
?>