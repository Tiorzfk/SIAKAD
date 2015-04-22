 <?php
include "config/koneksi.php";
$id_ta =$_POST['idta'];
$ta =$_POST['ta'];


 	$sql_ubah="UPDATE tr_tahun_ajaran SET
  tahun_ajaran='$ta'
  WHERE id_ta='$id_ta'";
  mysql_query($sql_ubah,$konek)
  or die ("Perubahan data gagal".mysql_error());
  ?> <script language="JavaScript">document.location=('Tahun-Ajaran')</script>
      		 	