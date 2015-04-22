<?php
include"config/koneksi.php";

$cek_idta =$_POST['idta'];
$ta =$_POST['ta'];
$id_kelas =$_POST['id_kelas'];
$siswa =$_POST['siswa'];
$guru =$_POST['guru'];
$jurusan=$_POST['jurusan'];
$semester =$_POST['semester'];
$kelas =$_POST['kelas'];
$nama_kelas=$_POST['nama_kelas'];

$jum=count($_POST['hitung']);

for($i=0;$i<$jum;$i++){
$id_sk =$_POST['id_sk'][$i];
$nilai =$_POST['nilai'][$i];

$sql_simpan3="INSERT INTO tr_detail_nilai
(id_siswa,id_sk,nilai)
VALUES ('$siswa','$id_sk','$nilai')"; 
mysql_query($sql_simpan3,$konek)
or die ("Memasukan data produk gagal".mysql_error());
}
$sql_simpan1="INSERT INTO tr_nilai
(id_siswa,id_guru,semester)
VALUES ('$siswa','$guru','$semester')"; 
mysql_query($sql_simpan1,$konek)
or die ("Memasukan data produk gagal".mysql_error());

$sql_ubah="UPDATE tr_siswa SET
status='1'
WHERE id_siswa='$siswa'";
mysql_query($sql_ubah,$konek)
or die ("Memasukan data produk gagal".mysql_error());

if($cek_idta=="all"){
header('Location:./All-nilai');
}else{
header('Location:./nilai-'.$ta);
}
?>