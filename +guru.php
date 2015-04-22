<?php
include"config/koneksi.php";
$nip =$_POST['nip'];
$nama=$_POST['nama'];
$jurusan =$_POST['jurusan'];
$alamat=$_POST['alamat'];
$telepon =$_POST['telepon'];

$sql_simpan="INSERT INTO tr_guru
(id_kp,nip_guru,nama_guru,alamat_guru,telepon_guru)
VALUES ('$jurusan','$nip','$nama','$alamat','$telepon')"; 

mysql_query($sql_simpan,$konek)
or die ("Memasukan data produk gagal".mysql_error());

header('Location:guru');
?>