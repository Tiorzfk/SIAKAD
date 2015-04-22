 <?php
include "config/koneksi.php";
$id_sk =$_POST['idsk'];
$sk =$_POST['sk'];
$jurusan =$_POST['jurusan'];


 	$sql_ubah="UPDATE tr_standar_kompetensi SET
  id_kp='$jurusan',
  nama_sk='$sk'
  WHERE id_sk='$id_sk'";
  mysql_query($sql_ubah,$konek)
  or die ("Perubahan data gagal".mysql_error());
  ?> <script language="JavaScript">document.location=('Standar-Kompetensi')</script>
      		 	