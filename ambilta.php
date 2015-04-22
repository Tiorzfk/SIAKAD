<?php
include "config/koneksi.php";
$id = $_GET['idd']; 
if($id){ 
$minta = "SELECT *from tr_tahun_ajaran
where id_ta='$id'";
$eksekusi = mysql_query($minta);
$hasil=mysql_fetch_array($eksekusi);
echo $hasil['tahun_ajaran'];
}
?>
