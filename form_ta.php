<div class="page-content-wrapper">
 
<div class="content">
 
<div class="container-fluid container-fixed-lg bg-white">
<ul class="breadcrumb">
<li>
<p>Home</p>
</li>
<li><a href="#" class="active">Tahun Ajaran</a>
</li>
</ul>
<div class="panel panel-transparent">
<div class="panel-heading">
<div class="panel-title">Tabel Tahun Ajaran
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
<table width="50%" class="table table-hover demo-table-search" id="tableWithSearch">
<thead>
<tr>
<th>No</th>
<th>Tahun</th>
<th>Option</th>
</tr>
</thead>
<tbody>
<?php
include "config/koneksi.php";
$no=1;
$sql_news="SELECT* from tr_tahun_ajaran ORDER by id_ta";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$ta=$hsl_news['tahun_ajaran'];
$id_ta=$hsl_news['id_ta'];
?>
<tr>
<td width="10%">
<p><?php echo $no ?></p>
</td>
<td width="10%">
<p><?php echo $ta ?></p>
</td>
<td width="5%">
<button class="btn btn-green btn-sm pull-right" data-target="#ubah<?php echo $id_ta ?>" data-toggle="modal" id="btnStickUpSizeToggler">Ubah</button>
<a href="h_ta.php?id=<?php echo $id_ta ?>" class="btn btn-green btn-sm pull-right" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
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
<p class="small-text">Penambahan tahun ajaran.</p>
<form action="+ta.php" method="POST">
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Tahun Ajaran</label>
<input id="ta" name="ta" type="text" class="form-control">
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
//modal edit ta
//modal edit ta
//modal edit ta
include "config/koneksi.php";
$sql_news="SELECT *from tr_tahun_ajaran
ORDER by id_ta";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$ta=$hsl_news['tahun_ajaran'];
$id_ta=$hsl_news['id_ta'];
?>
<div class="modal fade slide-up" id="ubah<?php echo $id_ta ?>" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content-wrapper">
<div class="modal-content">
<div class="modal-header clearfix">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h5>Edit <span class="semi-bold">Tahun Ajaran</span></h5>
<p class="p-b-10">Standar Kompetensi harus sesuai dengan Jurusannya.</p>
</div>
<div class="modal-body">
<form role="form" action="+edit_ta.php" method="POST">
<div class="form-group-attached">
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<b>
<input type="hidden" name="idta" value="<?php echo $id_ta ?>"class="form-control" >
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Tahun Ajaran</label>
<input name="ta" type="text" class="form-control" value="<?php echo $ta?>">
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
 

 