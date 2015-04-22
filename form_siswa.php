<div class="page-content-wrapper">
 
<div class="content">
<div class="container-fluid container-fixed-lg bg-white">
<ul class="breadcrumb">
<li>
<p>Home</p>
</li>
<li><a href="#" class="active">Siswa</a>
</li>
</ul>
<?php if($_SESSION['level']!="siswa"){?>
<?php
include "config/koneksi.php";
$sql_news="SELECT id_kelas from tr_kelas order by id_kelas desc limit 1";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
$hsl_news=mysql_fetch_array($qry_news);
$id_kelas=$hsl_news['id_kelas'];
?>
<div class="row">
<div class="col-md-3">
<div class="panel panel-transparent">
<div class="panel-body">
<form action="+siswa.php" method="POST" enctype="multipart/form-data">
<div class="row clearfix">
<div class="col-sm-12">
<input type="hidden" class="form-control" name="ta" value="<?php echo $_SESSION['ta']; ?>">
<div class="form-group form-group-default required">
<label>NISN</label>
<input type="hidden" class="form-control" name="idta" value="<?php echo $_SESSION['idta']; ?>">
<input type="text" id="tin" class="form-control" name="nisn" required>
<input type="hidden" class="form-control" value="<?php $id_kelas+=1; echo $id_kelas ?>" name="id_kelas" id="id_kelas">
</div>
</div>
</div>
<?php if($_SESSION['idta']=="all"){?>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label>Tahun Ajaran</label>
<select name="idta2" class="full-width" data-init-plugin="select2">
<optgroup label="-Pilih-">
<option value="">-Pilih Tahun Ajaran-</option>
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_tahun_ajaran ";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
echo " <option value=$hasil[id_ta]>$hasil[tahun_ajaran] </option>";
}
?>
</optgroup>
</select>
</div>
</div>
</div>
<?php } ?>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label>Nama</label>
<input type="text" class="form-control" name="nama" placeholder="siswa nama" id="nama" required>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label class="">Jurusan</label>
<select name="jurusan" id="jurusan" class="full-width" data-init-plugin="select2">
<optgroup label="-Pilih Jurusan-">
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_kp_keahlian ";
$eksekusi = mysql_query($minta);
while($hasil=mysql_fetch_array($eksekusi))
{
echo " <option value=$hasil[id_kp]>$hasil[nama_kp] </option>";
}
?>
</optgroup>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label class="">kelas</label>
<select name="kelas" id="kelas" class="full-width" data-init-plugin="select2">
<optgroup label="-Pilih kelas-">
<option value='X'>X</option>
<option value='XI'>XI</option>
<option value='XII'>XII</option>
</optgroup>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default required">
<label>Nama Kelas</label>
<select name="nama_kelas" id="nama_kelas" class="full-width" data-init-plugin="select2">
<optgroup label="-Pilih-">
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</optgroup>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label for="name" class="col-sm-3 control-label">Alamat</label>
<div class="col-sm-9">
<textarea class="form-control" id="alamat" placeholder="Alamat Siswa" name="alamat" required></textarea>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
 <label><b>Image Upload </label>
 
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        
                                                 
                                                    <input type="file" name='foto' id="foto" class='default' required/>
                                                   </span>
                                           
                                        
</div>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default input-group">
<label>Tanggal Lahir</label>
<input type="text" id="date" class="form-control" name="tgl">
<input type="hidden" name="actionfunction" value="savedata" />
<span class="input-group-addon">
<i class="fa fa-calendar"></i>
</span>
</div>
</div>
</div>
<br>
<button type="submit" id='formsubmit' class="btn btn-success" type="submit">Simpan</button>
<button type="reset" class="btn btn-default"><i class="pg-close"></i> Clear</button>
</form>
</div>
</div>
</div>
<?php }else{?>
 <div class="row">
 <div class="col-md-1"></div>
 <?php } ?>
 <div class="col-md-9">
<div class="container-fluid container-fixed-lg bg-white">
<div class="panel panel-transparent">
<div class="panel-heading">
<div class="panel-title">Data Siswa
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
<th>NISN</th>
<th>Kelas</th>
<th>Nama</th>
<th>Tanggal Lahir</th>
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
$sql_news="SELECT tr_siswa.id_kelas,kelas,kelas_nama,nama_kp,id_siswa,NISN,nama,alamat,tgl_lahir,foto from tr_siswa
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp";
}else{
$idta=$_SESSION['idta'];
$sql_news="SELECT tr_siswa.id_kelas,kelas,kelas_nama,nama_kp,id_siswa,NISN,nama,alamat,tgl_lahir,foto from tr_siswa
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp
where id_ta='$idta'";
}
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)) {
$jurusan=$hsl_news['nama_kp'];
$kelas=$hsl_news['kelas'];
$kelas_nama=$hsl_news['kelas_nama'];
$nama=$hsl_news['nama'];
$id=$hsl_news['id_siswa'];
$id_kelas=$hsl_news['id_kelas'];
$nisn=$hsl_news['NISN'];
$nama=$hsl_news['nama'];
$alamat=substr($hsl_news['alamat'],0,20);
$tgl_lahir=$hsl_news['tgl_lahir'];
$foto=$hsl_news['foto'];
?>
<tr>
<td class="v-align-middle">
<p><?php echo $i ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $nisn ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $kelas ?> <?php echo $jurusan ?> <?php echo $kelas_nama ?></p>
</td>
<td class="v-align-middle">
<p><?php echo $nama ?></td>
<td class="v-align-middle">
<p><?php echo $tgl_lahir ?></p></td>
<td class="v-align-middle">
<button class="btn btn-green btn-sm pull-right" data-target="#detail<?php echo $id ?>" data-toggle="modal" id="btnStickUpSizeToggler">Detail Siswa</button>
<?php if($_SESSION['level']!="siswa"){?>
<button class="btn btn-green btn-sm pull-right" data-target="#ubah<?php echo $id ?>" data-toggle="modal" id="btnStickUpSizeToggler">Ubah</button>
<td class="v-align-middle">
<p><a href="h_siswa.php?id=<?php echo $id ?>&foto=<?php echo $foto ?>&id_kelas=<?php echo $id_kelas ?>&idta=<?php echo $_SESSION['idta'];?>&ta=<?php echo $_SESSION['ta'];?>" class="btn btn-green btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></p></td></p></td>
<?php } ?>
</tr>
<?php $i++;} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<?php
// modal detail siswa
// modal detail siswa
// modal detail siswa
include "config/koneksi.php";
$sql_news="SELECT tahun_ajaran,kelas,kelas_nama,nama_kp,id_siswa,NISN,nama,alamat,tgl_lahir,foto from tr_siswa
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp
INNER JOIN tr_tahun_ajaran on tr_tahun_ajaran.id_ta=tr_siswa.id_ta";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)){
$jurusan=$hsl_news['nama_kp'];
$kelas=$hsl_news['kelas'];
$kelas_nama=$hsl_news['kelas_nama'];
$id=$hsl_news['id_siswa'];
$nisn=$hsl_news['NISN'];
$nama=$hsl_news['nama'];
$alamat=substr($hsl_news['alamat'],0,20);
$tgl_lahir=$hsl_news['tgl_lahir'];
$foto=$hsl_news['foto'];
$ta=$hsl_news['tahun_ajaran'];
?>
<div class="modal fade slide-up disable-scroll" id="detail<?php echo $hsl_news['id_siswa']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content-wrapper">
<div class="modal-content">
<div class="modal-header clearfix text-left">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h5>Detail <span class="semi-bold">Siswa</span></h5>
<p class="p-b-10">We need payment information inorder to process your order</p>
</div>
<div class="modal-body">
<form role="form">
<div class="form-group-attached">
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<b>
<label>Id</label>
<?php echo $id ?>
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default">
<b>
<label>Tahun Ajaran</label>
<?php echo $ta ?>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-8">
<div class="form-group form-group-default">
<label>NISN</label>
<?php echo $nisn ?>
</div>
</div>
<div class="col-sm-4">
<div class="form-group form-group-default">
<label>Jurusan</label>
<?php echo $jurusan ?>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label>Nama</label>
<?php echo $nama ?>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label>Alamat</label>
<?php echo $alamat ?>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-8">
<div class="form-group form-group-default">
<label>Tanggal Lahir</label>
<?php echo $tgl_lahir ?>
</div>
</div>
<div class="col-sm-4">
<div class="form-group form-group-default">
<label>Kelas</label>
<?php echo $kelas ?> <?php echo $jurusan ?> <?php echo $kelas_nama ?>
</div>
</div>

</div>
<center>
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<label>Foto Siswa</label>
<img src="assets/siswa/<?php echo $foto ?>" width="200px" height="200px">
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
 
</div>
</div><?php } ?>
 
 

<?php
//modal edit siswa
//modal edit siswa
//modal edit siswa
include "config/koneksi.php";
$sql_news="SELECT tr_tahun_ajaran.id_ta,kelas,kelas_nama,tr_kelas.id_kp,tr_siswa.id_kelas,nama_kp,id_siswa,NISN,nama,alamat,tgl_lahir,foto from tr_siswa
INNER JOIN tr_kelas on tr_kelas.id_kelas=tr_siswa.id_kelas
INNER JOIN tr_kp_keahlian on tr_kp_keahlian.id_kp=tr_kelas.id_kp
INNER JOIN tr_tahun_ajaran on tr_tahun_ajaran.id_ta=tr_siswa.id_ta";
$qry_news=mysql_query($sql_news,$konek)
or die ("gagal menampilkan".mysql_error());
while($hsl_news=mysql_fetch_array($qry_news)){
$jurusan=$hsl_news['nama_kp'];
$id3=$hsl_news['id_siswa'];
$id_kp2=$hsl_news['id_kp'];
$nisn=$hsl_news['NISN'];
$nama=$hsl_news['nama'];
$alamat=substr($hsl_news['alamat'],0,20);
$tgl_lahir=$hsl_news['tgl_lahir'];
$foto=$hsl_news['foto'];
$id_kelas=$hsl_news['id_kelas'];
$kelas=$hsl_news['kelas'];
$kelas_nama=$hsl_news['kelas_nama'];
$id_ta2=$hsl_news['id_ta'];
?>
<div class="modal fade slide-up disable-scroll" id="ubah<?php echo $id3 ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content-wrapper">
<div class="modal-content">
<div class="modal-header clearfix text-left">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
</button>
<h5>Edit <span class="semi-bold">Siswa</span></h5>
<p class="p-b-10">We need payment information inorder to process your order</p>
</div>
<div class="modal-body">
<form role="form" action="+edit_siswa.php" method="POST" enctype="multipart/form-data">
<div class="form-group-attached">
<div class="row">
<div class="col-sm-12">
<div class="form-group form-group-default">
<b>
<input type="hidden" name="id" class="form-control" value="<?php echo $id3 ?>" >
<input type="hidden" name="id_kelas" class="form-control" value="<?php echo $id_kelas ?>" >
</div>
</div>
</div>
<div class="row clearfix">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>NISN</label>
<input type="text" name="nisn" class="form-control" value="<?php echo $nisn ?>" >
<input type="hidden" name="oldfoto" class="form-control" value="<?php echo $foto ?>" >
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
<optgroup label="-Pilih jurusan-">
<option value="<?php echo $id_kp2?>"><?php echo $options;?> </option>
</optgroup>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Nama</label>
<input type="text" name="nama" class="form-control" value="<?php echo $nama ?>" >
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">kelas</label>
<input type="text" name="kelas" class="form-control" value="<?php echo $kelas ?>" >
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
<label>Nama Kelas</label>
<input type="text" name="kelas_nama" class="form-control" value="<?php echo $kelas_nama ?>" >
<input type="hidden" name="idta" class="form-control" value="<?php echo $_SESSION['idta']; ?>" >
<input type="hidden" name="cek_ta" class="form-control" value="<?php echo $_SESSION['ta']; ?>" >
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group form-group-default">
<label>Tanggal Lahir</label>
<input type="text" name="tgl_lahir" class="form-control" value="<?php echo $tgl_lahir ?>" >
</div>
</div>
<div class="col-sm-6">
<div class="form-group form-group-default">
<label class="">Tahun Ajaran</label>
<?php
include "config/koneksi.php";
$minta = "SELECT * FROM tr_tahun_ajaran ";
$eksekusi = mysql_query($minta);
$options="";
while($hasil=mysql_fetch_array($eksekusi))
{

    $id_ta=$hasil['id_ta'];
    $ta=$hasil['tahun_ajaran'];
    $isSel = ($id_ta2 == $id_ta)?"selected":'';
$options.= " <option value='$id_ta' $isSel>$ta</option>'";
}
?>
<select name="ta" class="full-width" data-init-plugin="select3">
<optgroup label="-Tahun Ajaran-">
<option value="<?php echo $id_ta2?>"><?php echo $options;?> </option>
</optgroup>
</select>
</div>
</div>
<div class="row">
<div class="col-sm-12">
 <label><b>Image Upload </label>
 
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="assets/siswa/<?php echo $foto ?>" alt="" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        
                                                 
                                                    <input type="file" name='foto' class='default' />
                                                   </span>
                                           
                                        
</div>
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
 
 

