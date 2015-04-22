
<!--tioDelete -->
<?php
include_once "config/koneksi.php";
$id_siswa=$_GET['id_siswa'];
$id_kelas=$_GET['id_kelas'];
$cek_idta=$_GET['idta'];
$ta=$_GET['ta'];

$sql_hapus="DELETE FROM tr_nilai  WHERE id_siswa='$id_siswa'";
mysql_query($sql_hapus, $konek)
or die ("Gagal perintah hapus".mysql_error());

$sql_hapus3="DELETE FROM tr_detail_nilai  WHERE id_siswa='$id_siswa'";
mysql_query($sql_hapus3, $konek)
or die ("Gagal perintah hapus".mysql_error());

$sql_ubah="UPDATE tr_siswa SET
status='0'
WHERE id_siswa='$id_siswa'";
mysql_query($sql_ubah,$konek)
or die ("Memasukan data produk gagal".mysql_error());
if($cek_idta=="all"){
header('Location:./All-nilai');
}else{
header('Location:./nilai-'.$ta);
}
?>