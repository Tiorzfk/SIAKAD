<div class="page-content-wrapper">
 
<div class="content">
 
<div class="container-fluid container-fixed-lg bg-white">
<ul class="breadcrumb">
<li>
<p>Home</p>
</li>
<li><a href="#" class="active">Standar Kompetensi</a>
</li>
</ul>
<div class="panel panel-transparent">
<div class="panel-heading">
<div class="panel-title">Tabel Standar Kompetensi
</div>
<div class="pull-right">
<div class="col-xs-12">
<input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
</div>
</div>
<?php if($_SESSION['level']!="siswa"){?>
<div class="pull-right">
<div class="col-xs-12">
<button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add </button>
</div>
</div>
<?php } ?>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<table width="70%" class="table table-hover demo-table-search" id="tableWithSearch">
<thead>
<tr>
<th>No</th>
<th>Jurusan</th>
<th>Nama Standar Kompetensi</th>
<th>Option</th>
</tr>
</thead>
<tbody>
<?php
include "config/koneksi.php";
$no=1;
$sql_news="SELECT id_sk,nama_kp,nama_sk from tr_standar_kompetensi
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_standar_kompetensi.id_kp
ORDER by id_sk";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$nama_kp=$hsl_news['nama_kp'];
$nama_sk=$hsl_news['nama_sk'];
$id_sk=$hsl_news['id_sk'];
?>
<tr>
<td width="10%">
<p><?php echo $no ?></p>
</td>
<td width="10%">
<p><?php echo $nama_kp ?></p>
</td>
<td>
<p><?php echo $nama_sk ?></p>
</td>
<td width="20%">
<button class="btn btn-green btn-sm pull-right" data-target="#ubah<?php echo $id_sk ?>" data-toggle="modal" id="btnStickUpSizeToggler">Ubah</button>
<a href="h_sk.php?id=<?php echo $id_sk ?>" class="btn btn-green btn-sm pull-right" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
</td>
</tr><?php $no++;} ?>
</tbody>
</table>
</div>
</div>
 
</div>



<div class="page-content-wrapper">
<div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header clearfix ">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h4 class="p-b-5"><span class="semi-bold">Form</span> Input</h4>
</div>
<div class="modal-body">
<p class="small-text">Standar Kompetensi harus sesuai dengan Jurusannya.</p>
<form action="+sk.php" method="POST">
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Nama Standar Kompetensi</label>
<input name="sk" type="text" class="form-control">
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">Jurusan</label>
<select name="jurusan" class="full-width" data-init-plugin="select">
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_kp_keahlian ";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
echo " <option value=$hasil[id_kp]>$hasil[nama_kp] </option>";
}
?>
</select>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary btn-cons">Add</button>
<button type="button" class="btn btn-cons">Close</button>
</div>
</div>
 </form>
</div>
 
</div>


<?php
//modal edit sk
//modal edit sk
//modal edit sk
include "config/koneksi.php";
$sql_news="SELECT tr_kp_keahlian.id_kp,id_sk,nama_kp,nama_sk from tr_standar_kompetensi
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_standar_kompetensi.id_kp
ORDER by id_sk";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$nama_kp=$hsl_news['nama_kp'];
$nama_sk=$hsl_news['nama_sk'];
$id_sk=$hsl_news['id_sk'];
$id_kp2=$hsl_news['id_kp'];
?>
<div class="modal fade slide-up" id="ubah<?php echo $id_sk ?>" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content-wrapper">
<div class="modal-content">
<div class="modal-header clearfix">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h5>Edit <span class="semi-bold">Standar Kompetensi</span></h5>
<p class="p-b-10">Standar Kompetensi harus sesuai dengan Jurusannya.</p>
</div>
<div class="modal-body">
<form role="form" action="+edit_sk.php" method="POST">
<div class="form-group-attached">
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<b>
<input type="hidden" name="idsk" value="<?php echo $id_sk ?>"class="form-control" >
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Standar Kompetensi</label>
<input type="text" name="sk" class="form-control" value="<?php echo $nama_sk ?>">
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">Jurusan</label>
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_kp_keahlian ";
$eksekusi = mysql_query($minta);
$options="";
while($hasil=mysql_fetch_array($eksekusi))
{

	$id_kp=$hasil['id_kp'];
	$kp=$hasil['nama_kp'];
	$isSel = ($id_kp2 == $id_kp)?"selected":'';
$options.= " <option value='$id_kp' $isSel>$kp</option>'";
}
?>
<select name="jurusan" class="full-width" data-init-plugin="select3">
<option value="<?php echo $id_kp2?>"><?php echo $options;?> </option>
</select>
</div>
</div>
<div class="col-sm-4 m-t-10 sm-m-t-10">
<button type="submit" class="btn btn-primary btn-block m-t-5">Update</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
 
</div>
</div><?php } ?>
 

 