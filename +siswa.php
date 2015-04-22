 <?php
include"config/koneksi.php";
$cek_idta =$_POST['idta'];
if($cek_idta=="all"){
$idta =$_POST['idta2'];
}else{
$idta =$_POST['idta'];	
}

$ta =$_POST['ta'];
$nisn =$_POST['nisn'];
$nama=$_POST['nama'];
$jurusan =$_POST['jurusan'];
$tgl =$_POST['tgl'];
$alamat=$_POST['alamat'];
$id_kelas =$_POST['id_kelas'];
$kelas =$_POST['kelas'];
$nama_kelas=$_POST['nama_kelas'];

$jenis_gambar=$_FILES['foto']['type'];
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
{
$direktori= "assets/siswa/";

$foto = $_FILES['foto']['name'];
$Images=$direktori.basename($_FILES['foto']['name']);
$move = move_uploaded_file($_FILES['foto']['tmp_name'],$Images);

$sql_simpan="INSERT INTO tr_siswa
(id_siswa,NISN,id_kelas,id_ta,nama,alamat,tgl_lahir,foto)
VALUES ('','$nisn','$id_kelas','$idta','$nama','$alamat','$tgl','$foto')"; 

mysql_query($sql_simpan,$konek)
or die ("Memasukan data produk gagal".mysql_error());

$sql_simpan2="INSERT INTO tr_kelas
(id_kelas,id_kp,kelas,kelas_nama)
VALUES ('$id_kelas','$jurusan','$kelas','$nama_kelas')"; 
mysql_query($sql_simpan2,$konek)
or die ("Memasukan data produk gagal".mysql_error());

if($cek_idta=="all"){
header('Location:./All-siswa');
}else{
header('Location:./siswa-'.$ta);
}
}else{
	echo "Type Foto yang anda masukan salah!";
}
?>