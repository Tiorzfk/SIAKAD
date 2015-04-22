<?php
include "config/koneksi.php";
$id = $_GET['q']; 
if($id){ 
$minta = "SELECT kelas,kelas_nama,nama_kp,tr_kelas.id_kp from tr_siswa
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kelas.id_kp=tr_kp_keahlian.id_kp
where id_siswa='$id'";
$eksekusi = mysql_query($minta);
$hasil=mysql_fetch_array($eksekusi);
echo $hasil['kelas']."-".$hasil['nama_kp']."-".$hasil['kelas_nama'];
}
?>
