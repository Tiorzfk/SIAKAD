 <?php
include "config/koneksi.php";
$id_guru =$_POST['id'];
$nip =$_POST['nip'];
$nama=$_POST['nama'];
$jurusan =$_POST['jurusan'];
$alamat=$_POST['alamat'];
$telepon =$_POST['telepon'];

 	$sql_ubah="UPDATE tr_guru SET
  id_kp='$jurusan',
  nip_guru='$nip',
	nama_guru='$nama',
	alamat_guru='$alamat',
  telepon_guru='$telepon'
  WHERE id_guru='$id_guru'";
  mysql_query($sql_ubah,$konek)
  or die ("Perubahan data gagal".mysql_error());
  ?> <script language="JavaScript">document.location=('guru')</script>
      		 	