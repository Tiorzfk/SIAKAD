<!--tioDelete -->
<?php
include_once "config/koneksi.php";
$idhapus=$_GET['id'];
$foto=$_GET['foto'];
$id_kelas=$_GET['id_kelas'];
$cek_idta=$_GET['idta'];
$ta=$_GET['ta'];

$target = "assets/siswa/";
$hapusfile = unlink($target.$foto);

$sql_hapus="DELETE FROM tr_siswa  WHERE id_siswa='$idhapus'";
mysql_query($sql_hapus, $konek)
or die ("Gagal perintah hapus".mysql_error());

$sql_hapus2="DELETE FROM tr_kelas  WHERE id_kelas='$id_kelas'";
mysql_query($sql_hapus2, $konek)
or die ("Gagal perintah hapus".mysql_error());

if($cek_idta=="all"){
header('Location:./All-siswa');
}else{
header('Location:./siswa-'.$ta);
}
?>