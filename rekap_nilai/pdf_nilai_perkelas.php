<?php
$id=$_GET['id'];
include "../config/koneksi.php";
?>
<html>
<body>
<head>
  <link type="text/css" href="table.css" rel="stylesheet" media="screen"/>
</head>
<center><h3> Rekap Nilai Per-kelas "<?php echo $id ?>"</h3></center>
<div class="CSSTableGenerator" >
  <table>
  <tr>
  <td>No</td>
  <td>Nama</td>
  <td>Guru</td>
  <td>Kelas</td>
  <td>Semester</td>
  <td>Standar Kompetensi</td>
  </tr>
  <?php
  $id=$_GET['id'];
  $i=1;
  include "../config/koneksi.php";
$sql_news2="SELECT tr_siswa.id_siswa,tr_kelas.id_kp,semester,nama,nama_guru,kelas,kelas_nama,nama_kp from tr_nilai
INNER JOIN tr_siswa on tr_siswa.id_siswa=tr_nilai.id_siswa
INNER JOIN tr_guru on tr_guru.id_guru=tr_nilai.id_guru
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp
INNER JOIN tr_detail_nilai on tr_detail_nilai.id_siswa=tr_nilai.id_siswa
where tr_kelas.kelas='$id'
group by tr_detail_nilai.id_siswa";
$qry_news2=mysql_query($sql_news2,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news2)) {
$id_kp=$hsl_news['id_kp'];
$id_siswa=$hsl_news['id_siswa'];?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<?php
$sql_news="SELECT tr_detail_nilai.id_sk,nama_sk from tr_detail_nilai
INNER JOIN tr_standar_kompetensi on tr_standar_kompetensi.id_sk=tr_detail_nilai.id_sk where tr_detail_nilai.id_siswa='$id_siswa'";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news2=mysql_fetch_array($qry_news)) {
$nama_sk=$hsl_news2['nama_sk'];
?>
<td><?php echo $hsl_news2['nama_sk']; ?> </td>
<?php } ?>
</tr>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $hsl_news['nama'] ?> </td>
<td><?php echo $hsl_news['nama_guru']?></td>
<td width="11%"> <?php echo $hsl_news['kelas'].'-'.$hsl_news['nama_kp'].'-'.$hsl_news['kelas_nama']?></td>
<td><?php echo $hsl_news['semester']?></td>
<?php
$sql_news3="SELECT tr_detail_nilai.id_sk,nilai from tr_detail_nilai 
INNER JOIN tr_nilai on tr_nilai.id_siswa=tr_detail_nilai.id_siswa where tr_detail_nilai.id_siswa='$id_siswa'";
$qry_news3=mysql_query($sql_news3,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news3)) {?>
<td><?php echo $hsl_news['nilai']?></td>
<?php } ?>
</tr>
<?php $i++;} ?></table></div></body></html>

<?php
require_once("../dompdf/dompdf_config.inc.php");


$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean()); 
$dompdf->render();
$dompdf->stream('laporan_nilai_perkelas.pdf');
?>