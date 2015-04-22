<?php
include"config/koneksi.php";
$ta =$_POST['ta'];

$sql_simpan="INSERT INTO tr_tahun_ajaran
(tahun_ajaran)
VALUES ('$ta')"; 

mysql_query($sql_simpan,$konek)
or die ("Memasukan data produk gagal".mysql_error());

header('Location:Tahun-Ajaran');
?>