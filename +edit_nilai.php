 <?php
include "config/koneksi.php";
include "config/library.php";

$cek_idta =$_POST['idta'];
$ta =$_POST['ta'];
$id_siswa=$_POST['id_siswa'];
$nama_siswa=$_POST['nama'];
$guru=$_POST['guru'];
$semester=$_POST['semester'];

 	$sql_ubah="UPDATE tr_nilai SET
  id_siswa='$nama_siswa',
  id_guru='$guru',
	semester='$semester'
  WHERE id_siswa='$id_siswa'";
  mysql_query($sql_ubah,$konek)
  or die ("Perubahan data gagal".mysql_error());

$jum=count($_POST['hitung2']);

for($i=0;$i<$jum;$i++){
$nilai =$_POST['nilai'][$i];
$id_sk=$_POST['id_sk'][$i];

 $sql_ubah="UPDATE tr_detail_nilai SET
 id_siswa='$nama_siswa',
 nilai='$nilai'
 WHERE id_siswa='$id_siswa' AND id_sk='$id_sk'";
 mysql_query($sql_ubah,$konek)
 or die ("Perubahan data gagal".mysql_error());
 }
 if($cek_idta=="all"){
header('Location:./All-nilai');
}else{
header('Location:./nilai-'.$ta);
}
?>
    		 	