<!--tioDelete -->
<?php
include_once "config/koneksi.php";
$idhapus=$_GET['id'];


$sql_hapus="DELETE FROM tr_standar_kompetensi  WHERE id_sk='$idhapus'";
mysql_query($sql_hapus, $konek)
or die ("Gagal perintah hapus".mysql_error());

?>
<script language="JavaScript">
document.location=('Standar-Kompetensi')</script>a
