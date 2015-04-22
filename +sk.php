<?php
include"config/koneksi.php";
$sk =$_POST['sk'];
$jurusan =$_POST['jurusan'];

$sql_simpan="INSERT INTO tr_standar_kompetensi
(id_sk,id_kp,nama_sk)
VALUES ('','$jurusan','$sk')"; 

mysql_query($sql_simpan,$konek)
or die ("Memasukan data produk gagal".mysql_error());

header('Location:Standar-Kompetensi');
?>