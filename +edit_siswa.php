 <?php
include "config/koneksi.php";
include "config/library.php";

$cek_idta=$_POST['idta'];
$cek_ta=$_POST['cek_ta'];

$id=$_POST['id'];
$id_kelas=$_POST['id_kelas'];
$nama=$_POST['nama'];
$tgl_lahir=$_POST['tgl_lahir'];
$jurusan = $_POST['jurusan'];
$nisn = $_POST['nisn'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$kelas_nama = $_POST['kelas_nama'];
$ta = $_POST['ta'];
$oldfoto = $_POST['oldfoto'];
if(empty($_FILES['foto']['name'])) {
  				$sql_ubah="UPDATE tr_siswa SET
  				id_ta='$ta',
  				NISN='$nisn',
				nama='$nama',
				alamat='$alamat',
				tgl_lahir='$tgl_lahir'

				WHERE id_siswa='$id'";
      		 	mysql_query($sql_ubah,$konek)
      		 	or die ("Perubahan data gagal".mysql_error());

      		 	$sql_ubah="UPDATE tr_kelas SET
				id_kp='$jurusan',
				kelas='$kelas',
				kelas_nama='$kelas_nama'

				WHERE id_kelas='$id_kelas'";
      		 	mysql_query($sql_ubah,$konek)
      		 	or die ("Perubahan data gagal".mysql_error());
      		 	if($cek_idta=="all"){
				header('Location:./All-siswa');
				}else{
				header('Location:./siswa-'.$cek_ta);
				}
 }else{
 $target = "assets/siswa/";
 $hapusfile = unlink($target.$oldfoto);

$direktori= "assets/siswa/";
$foto = $_FILES['foto']['name'];
$Images=$direktori.basename($_FILES['foto']['name']);
$move = move_uploaded_file($_FILES['foto']['tmp_name'],$Images); 

 	$sql_ubah="UPDATE tr_siswa SET
  				NISN='$nisn',
				nama='$nama',
				alamat='$alamat',
				tgl_lahir='$tgl_lahir',
				foto='$foto'

				WHERE id_siswa='$id'";
      		 	mysql_query($sql_ubah,$konek)
      		 	or die ("Perubahan data gagal".mysql_error());

      		 	$sql_ubah="UPDATE tr_kelas SET
				id_kp='$jurusan',
				kelas='$kelas',
				kelas_nama='$kelas_nama'

				WHERE id_kelas='$id_kelas'";
      		 	mysql_query($sql_ubah,$konek)
      		 	or die ("Perubahan data gagal".mysql_error());

      		 	if($cek_idta=="all"){
				header('Location:./All-siswa');
				}else{
				header('Location:./siswa-'.$cek_ta);
				}
				} ?>