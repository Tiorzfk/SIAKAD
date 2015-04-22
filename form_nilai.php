
<div class="page-content-wrapper">
 
<div class="content">
 
<?php if($_SESSION['level']!="siswa"){?>
<div class="container-fluid container-fixed-lg bg-white">
<ul class="breadcrumb">
<li>
<p>Home</p>
</li>
<li><a href="#" class="active">Nilai</a>
</li>
</ul>
<div class="row">
<div class="col-md-3" id="tio"></div>
<div class="col-md-6">
<div class="panel panel-transparent">
<div class="panel-body">
<form id="frm" name="frm" action="+nilai.php" enctype="multipart/form-data" method="post">
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">Nama Guru</label>
<select name="guru" class="full-width" data-init-plugin="select2" required>
<option value="">-Pilih Nama Guru-</option>
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_guru ";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
echo " <option value=$hasil[id_guru]>$hasil[nama_guru] </option>";
}
?>
</select>
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">Nama Siswa</label>
<select name="siswa" class="full-width" data-init-plugin="select2" onchange="javascript: ambilyah(this.value); ambildata(this.value); ambilsk(this.value);" required>
<option value="">-Pilih Nama Siswa-</option>
<?php
include "config/koneksi.php";
$idd=$_SESSION['idta'];
if($idd=="all"){
$minta = "SELECT *from tr_siswa where status='0'";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
echo " <option value=$hasil[id_siswa]>$hasil[nama] </option>";
}
}else{
$minta = "SELECT *from tr_siswa where id_ta='$idd' AND status='0'";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
echo " <option value=$hasil[id_siswa]>$hasil[nama] </option>";
}
}
?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default required">
<label>Semester</label>
<select name="semester" class="full-width" data-init-plugin="select2">
<optgroup label="-Pilih Semester-">
<option value='1'>1 (Ganjil)</option>
<option value='2'>2 (Genap)</option>
</optgroup>
</select>
</div>
</div>
<div class="col-sm-6">
<div class='form-group form-group-default'>
<label class="">Kelas</label>
<input type='text' class='form-control' id="kelas" name="kelas" readonly>
<input type='hidden' class='form-control' name="idta" value="<?php echo $_SESSION['idta'];?>">
<input type='hidden' class='form-control' name="ta" value="<?php echo $_SESSION['ta'];?>">
</div>
</div>
</div>
<div id="sk">
</div>
<br>
<button type="submit" class="btn btn-success" type="submit">Simpan</button>
<button type="reset" class="btn btn-default"><i class="pg-close"></i> Clear</button>
</form>
</div>
</div>
</div>
</div>
<?php } ?>
<div class="row"> 
<div class="col-md-12">
<a name="a" id="a" class="btn btn-success btn-xs m-t-10"><i class="fs-14 fa fa-th"></i></a>
<div class="container-fluid container-fixed-lg bg-white">
<div class="panel panel-transparent">
<div class="panel-heading">
<div class="panel-title">Data Penilaian
</div>
<div class="pull-right">
<div class="col-xs-12">
<input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<table class="table table-hover demo-table-search" id="tableWithSearch">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Guru</th>
<th>Kelas</th>
<th>Semester</th>
<th>Aksi</th>
<?php if($_SESSION['level']!="siswa"){?>
<th></th>
<?php } ?>
</tr>
</thead>
<tbody>
<?php
include "config/koneksi.php";
$i=1;
if($_SESSION['idta']=="all"){
$sql_news="SELECT tr_kelas.id_kelas,tr_nilai.id_siswa,nama_guru,nama_kp,kelas,kelas_nama,nama,semester from tr_nilai
INNER JOIN tr_guru on tr_guru.id_guru=tr_nilai.id_guru
INNER JOIN tr_siswa on tr_siswa.id_siswa=tr_nilai.id_siswa
INNER JOIN tr_tahun_ajaran on tr_siswa.id_ta=tr_tahun_ajaran.id_ta
INNER JOIN tr_kelas on tr_siswa.id_kelas=tr_kelas.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp
INNER JOIN tr_detail_nilai on tr_detail_nilai.id_siswa=tr_nilai.id_siswa
group by tr_detail_nilai.id_siswa";
}else{
$idta=$_SESSION['idta'];
$sql_news="SELECT tr_kelas.id_kelas,tr_nilai.id_siswa,nama_guru,nama_kp,kelas,kelas_nama,nama,semester from tr_nilai
INNER JOIN tr_guru on tr_guru.id_guru=tr_nilai.id_guru
INNER JOIN tr_siswa on tr_siswa.id_siswa=tr_nilai.id_siswa
INNER JOIN tr_tahun_ajaran on tr_siswa.id_ta=tr_tahun_ajaran.id_ta
INNER JOIN tr_kelas on tr_siswa.id_kelas=tr_kelas.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp
INNER JOIN tr_detail_nilai on tr_detail_nilai.id_siswa=tr_nilai.id_siswa
where tr_siswa.id_ta='$idta' group by tr_detail_nilai.id_siswa";
}
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$nama_guru=$hsl_news['nama_guru'];
$jurusan=$hsl_news['nama_kp'];
$kelas=$hsl_news['kelas'];
$kelas_nama=$hsl_news['kelas_nama'];
$nama=$hsl_news['nama'];
$semester=$hsl_news['semester'];
$id_siswa=$hsl_news['id_siswa'];
$id_kelas=$hsl_news['id_kelas'];
?>
<tr>
<td class="v-align-middle">
<p><?php echo $i ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $nama ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $nama_guru ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $kelas ?> <?php echo $jurusan ?> <?php echo $kelas_nama ?></td>
<td class="v-align-middle">
<p><?php echo $semester ?></p></td>
<td class="v-align-middle">
<button class="btn btn-green btn-sm pull-right" data-target="#detail<?php echo $id_siswa ?>" data-toggle="modal" id="btnStickUpSizeToggler">Lihat Nilai</button>
<?php if($_SESSION['level']!="siswa"){?>
<button class="btn btn-green btn-sm pull-right" data-target="#ubah<?php echo $id_siswa ?>" data-toggle="modal" id="btnStickUpSizeToggler">Edit</button>
</td>
<td class="v-align-middle">
<p><a href="h_nilai.php?id_siswa=<?php echo $id_siswa ?>&id_kelas=<?php echo $id_kelas?>&id_siswa=<?php echo $id_siswa?>&idta=<?php echo $_SESSION['idta'];?>&ta=<?php echo $_SESSION['ta'];?>" class="btn btn-green btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></p>
</td><?php } ?>
</tr>
<?php $i++;} ?>
<div class="btn-group dropdown-default"> <a class="btn dropdown-toggle btn-success" data-toggle="dropdown" href="#"> Rekap Nilai <span class="caret"></span> </a>
<ul class="dropdown-menu ">
<li><a href="#">Per-Kelas</a>
</li>
<ul class="sub-dropdown-menu">
<li><a href="rekap_nilai/pdf_nilai_perkelas.php?id=X">X</a>
</li>
<li><a href="rekap_nilai/pdf_nilai_perkelas.php?id=XI">XI</a>
</li>
<li><a href="rekap_nilai/pdf_nilai_perkelas.php?id=XII">XII</a>
</li>
</ul>
<li><a href="#">Per-Jurusan</a>
</li>
<ul class="sub-dropdown-menu">
<?php
include "config/koneksi.php";
$sql_news="SELECT *from tr_kp_keahlian";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)){
$nama_kp=$hsl_news['nama_kp'];
$id_kp=$hsl_news['id_kp'];
?>
<li><a href="rekap_nilai/pdf_nilai_perjurusan.php?id=<?php echo $id_kp?>&nama=<?php echo $nama_kp?>"><?php echo $nama_kp ?></a>
</li>
<?php } ?>
</ul>
<li><a href="rekap_nilai/pdf_nilai.php">All</a>
</li>
</ul>
</div>
</tbody>
</table>
</div>
</div>

<?php
//modal detail nilai
//modal detail nilai
//modal detail nilai
include "config/koneksi.php";
$sql_news="SELECT id_siswa,semester from tr_nilai";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)){
$id_siswa10=$hsl_news['id_siswa'];
?>
<div class="modal fade slide-up disable-scroll" id="detail<?php echo $id_siswa10?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content-wrapper">
<div class="modal-content">
<div class="modal-header clearfix text-left">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h5>Detail <span class="semi-bold">Nilai</span></h5>
<p class="p-b-10">We need payment information inorder to process your order</p>
</div>
<div class="modal-body">
<form role="form">
<div class="form-group-attached">
<?php
$sql_news2="SELECT nama_sk,nilai from tr_detail_nilai 
INNER JOIN tr_nilai on tr_nilai.id_siswa=tr_detail_nilai.id_siswa 
INNER JOIN tr_standar_kompetensi on tr_standar_kompetensi.id_sk=tr_detail_nilai.id_sk where tr_nilai.id_siswa='$id_siswa10'";
$qry_news2=mysql_query($sql_news2,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news2=mysql_fetch_array($qry_news2)){
$nama_sk=$hsl_news2['nama_sk'];
$nilai=$hsl_news2['nilai'];
?>
<div class="row">
<div class="col-sm-8">
<div class="form-group form-group-default">
<label><?php echo $nama_sk;?></label>
<?php echo $nilai ?>
</div>
</div>
<div class="col-sm-2">
<div class="form-group form-group-default">
<label>Status</label>
<?php if($nilai>="70"){echo"Lulus";}else{echo"Remedial";}?>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</form>
</div>
</div>
</div>
 
</div>
<?php } ?>

<?php
//modal edit nilai
//modal edit nilai
//modal edit nilai
include "config/koneksi.php";
$sql_news="SELECT tr_nilai.id_siswa,tr_kelas.id_kelas,semester,
tr_kp_keahlian.id_kp,tr_nilai.id_siswa,tr_guru.id_guru,nama_guru,nama_kp,kelas,kelas_nama,nama,semester from tr_nilai
INNER JOIN tr_guru on tr_guru.id_guru=tr_nilai.id_guru
INNER JOIN tr_detail_nilai on tr_detail_nilai.id_siswa=tr_nilai.id_siswa
INNER JOIN tr_siswa on tr_siswa.id_siswa=tr_nilai.id_siswa
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)){
$nama_guru=$hsl_news['nama_guru'];
$jurusan=$hsl_news['nama_kp'];
$kelas=$hsl_news['kelas'];
$kelas_nama=$hsl_news['kelas_nama'];
$nama=$hsl_news['nama'];
$semester=$hsl_news['semester'];
$id_siswa2=$hsl_news['id_siswa'];
$id_kelas=$hsl_news['id_kelas'];
$id_guru2=$hsl_news['id_guru'];
$id_kp2=$hsl_news['id_kp'];
$semester=$hsl_news['semester'];
?>
<div class="modal fade slide-up disable-scroll" id="ubah<?php echo $hsl_news['id_siswa'];?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content-wrapper">
<div class="modal-content">
<div class="modal-header clearfix text-left">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h5>Edit <span class="semi-bold">Nilai</span></h5>
<p class="p-b-10">We need payment information inorder to process your order</p>
</div>
<div class="modal-body">
<form action="+edit_nilai.php" method="POST" enctype="multipart/form-data" role="form">
<div class="form-group-attached">
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Nama Siswa</label>
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_siswa ";
$eksekusi = mysql_query($minta);
$options="";
while($hasil=mysql_fetch_array($eksekusi))
{
    $id_siswa=$hasil['id_siswa'];
    $nama_siswa=$hasil['nama'];
    $isSel = ($id_siswa2 == $id_siswa)?"selected":'';
$options.= " <option value='$id_siswa' $isSel>$nama_siswa</option>'";
}
?>
<select name="nama" class="full-width">
<optgroup label="Tioreza">
<option value="<?php echo $id_siswa2?>"><?php echo $options;?> </option>
</optgroup>
</select>
<input type="hidden" name="id_siswa" class="form-control" value="<?php echo $id_siswa2 ?>" >
<input type="hidden" name="idta" class="form-control" value="<?php echo $_SESSION['idta']; ?>" >
<input type="hidden" name="ta" class="form-control" value="<?php echo $_SESSION['ta']; ?>" >
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">Guru</label>
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_guru ";
$eksekusi = mysql_query($minta);
$options="";
while($hasil=mysql_fetch_array($eksekusi))
{
    $id_guru=$hasil['id_guru'];
    $nama_guru=$hasil['nama_guru'];
    $isSel = ($id_guru2 == $id_guru)?"selected":'';
$options.= " <option value='$id_guru' $isSel>$nama_guru</option>'";
}
?>
<select name="guru" class="full-width">
<optgroup label="Tioreza">
<option value="<?php echo $id_guru2?>"><?php echo $options;?> </option>
</optgroup>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label>Semester</label>
<input type="text" name="semester" class="form-control" value="<?php echo $semester ?>" >
</div>
</div>
</div>
<?php
$e=0;
$sql_news3="SELECT tr_detail_nilai.id_sk,nilai,nama_sk from tr_detail_nilai
INNER JOIN tr_nilai on tr_nilai.id_siswa=tr_detail_nilai.id_siswa
INNER JOIN tr_standar_kompetensi on tr_standar_kompetensi.id_sk=tr_detail_nilai.id_sk
where tr_nilai.id_siswa='$id_siswa2'";
$qry_news3=mysql_query($sql_news3,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news3)){
$nama_sk=$hsl_news['nama_sk'];
$nilai=$hsl_news['nilai'];
$id_sk=$hsl_news['id_sk'];
?>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label><?php echo $nama_sk ?></label>
<input type="text" name="nilai[<?php echo $e ?>]" class="form-control" value="<?php echo $nilai ?>" >
<input type="hidden" name="hitung2[<?php echo $e ?>]" class="form-control" value="<?php echo $e ?>" >
<input type="hidden" name="id_sk[<?php echo $e?>]" class="form-control" value="<?php echo $id_sk ?>" >
</div>
</div>
</div>
<?php $e++;} ?>
<div>
<button type="submit" class="btn btn-primary btn-block m-t-5">Update</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
 
</div>

 
<?php } ?>
