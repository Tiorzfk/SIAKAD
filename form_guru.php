<div class="page-content-wrapper">
 
<div class="content">
 
<div class="container-fluid container-fixed-lg bg-white">
<ul class="breadcrumb">
<li>
<p>Home</p>
</li>
<li><a href="#" class="active">Guru</a>
</li>
</ul>
<div class="panel panel-transparent">
<div class="panel-heading">
<div class="panel-title">Tabel Guru
</div>
<div class="pull-right">
<div class="col-xs-12">
<input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
</div>
</div>
<?php if($_SESSION['level']!="siswa" AND $_SESSION['level']!="guru"){?>
<div class="pull-right">
<div class="col-xs-12">
<button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add </button>
</div>
</div>
<?php } ?>
<div class="clearfix"></div>
</div>
<div class="panel-body">
<table class="table table-hover demo-table-search" id="tableWithSearch">
<thead>
<tr>
<th>No</th>
<th>NIP</th>
<th>Nama</th>
<th>Jurusan</th>
<th>Alamat</th>
<th>Telepon</th>
<?php if($_SESSION['level']!="siswa"){?>
<th>Option</th>
<?php } ?>
</tr>
</thead>
<tbody>
<?php
include "config/koneksi.php";
$no=1;
$sql_news="SELECT id_guru,nama_kp,nip_guru,nama_guru,alamat_guru,telepon_guru from tr_guru
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_guru.id_kp
ORDER by id_guru";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$id_guru=$hsl_news['id_guru'];
$jurusan=$hsl_news['nama_kp'];
$nip=$hsl_news['nip_guru'];
$nama=$hsl_news['nama_guru'];
$alamat=$hsl_news['alamat_guru'];
$telepon=$hsl_news['telepon_guru'];
?>
<tr>
<td width="10%">
<p><?php echo $no ?></p>
</td>
<td width="10%">
<p><?php echo $nip ?></p>
</td>
<td width="20%">
<p><?php echo $nama ?></p>
</td>
<td width="20%">
<p><?php echo $jurusan ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $alamat ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $telepon ?></p>
</td>
<?php if($_SESSION['level']!="siswa"){?>
<td class="v-align-middle">
<p><button class="btn btn-green btn-sm pull-right" data-target="#ubah<?php echo $id_guru ?>" data-toggle="modal" id="btnStickUpSizeToggler">Ubah</button>
<a href="h_guru.php?id=<?php echo $id_guru ?>" class="btn btn-green btn-sm pull-right" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</button></p>
</td>
<?php } ?>
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
<p class="small-text">Create a new app using this form, make sure you fill them all</p>
<form action="+guru.php" method="POST">
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label>NIP</label>
<input id="tin" name="nip" type="text" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label>Nama</label>
<input type="text" name="nama" class="form-control" placeholder="Nama Guru">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">Jurusan</label>
<select name="jurusan" class="full-width" data-init-plugin="select">
<optgroup label="-Tioreza-">
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
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Telepon</label>
<input id="phone" name="telepon" type="text" class="form-control" placeholder="Telepon">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" placeholder="Alamat">
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
//modal edit Guru
//modal edit Guru
//modal edit Guru
include "config/koneksi.php";
$sql_news="SELECT tr_guru.id_kp,id_guru,nama_kp,nip_guru,nama_guru,alamat_guru,telepon_guru from tr_guru
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_guru.id_kp
ORDER by id_guru";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$id_kp2=$hsl_news['id_kp'];
$id_guru2=$hsl_news['id_guru'];
$jurusan=$hsl_news['nama_kp'];
$nip=$hsl_news['nip_guru'];
$nama=$hsl_news['nama_guru'];
$alamat=$hsl_news['alamat_guru'];
$telepon=$hsl_news['telepon_guru'];
?>
<div class="modal fade slide-up" id="ubah<?php echo $id_guru2 ?>" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content-wrapper">
<div class="modal-content">
<div class="modal-header clearfix">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h5>Edit <span class="semi-bold">Guru</span></h5>
<p class="p-b-10">We need payment information inorder to process your order</p>
</div>
<div class="modal-body">
<form role="form" action="+edit_guru.php" method="POST">
<div class="form-group-attached">
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<b>
<input type="hidden" name="id" value="<?php echo $id_guru2 ?>"class="form-control" >
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>NIP</label>
<input type="text" name="nip" class="form-control" value="<?php echo $nip ?>" >
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
<optgroup label="-Tioreza-">
<option value="<?php echo $id_kp2?>"><?php echo $options;?> </option>
</optgroup>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="<?php echo $nama ?>" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" value="<?php echo $alamat ?>" >
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default required">
<label>Telepon</label>
<input type="text" name="telepon" class="form-control" value="<?php echo $telepon ?>" >
</div>
</div>
<div class="col-sm-4 m-t-10 sm-m-t-10">
<button id="phone" type="submit" class="btn btn-primary btn-block m-t-5">Update</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
 
</div>
</div><?php } ?>
 

 