<?php
// panggil file koneksi.php
require 'koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();

// tangkap variabel kd_mhs
$kd = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan kd_mhs
$data = mysql_fetch_array(mysql_query("SELECT * FROM destinasi d, kategori k where d.kategori_id=k.id_kategori and id_destinasi='".$kd."'"));

// jika kd_mhs > 0 / form ubah data
if($kd> 0) { 
	
	$nama =$data['nama'];
	$alamat =$data['alamat'];
	$longitude =$data['longitude'];
	$latitude =$data['latitude'];
	$fasilitas =$data['fasilitas'];
	$jalur =$data['jalur'];
	$alat_transport=$data['alat_transportasi'];
	$ulasan=$data['ulasan'];

//form tambah data
} else {
	$nama ="";
	$alamat ="";
	$longitude ="";
	$latitude ="";
	$fasilitas = "";
	$jalur = "";
	$alat_transport= "";
	$ulasan= "";
}

?>
<form class="form-horizontal" id="form-mahasiswa">
	<div class="control-group">
		<label class="control-label" for="nama">Nama</label>
		<div class="controls">
			<input type="text" id="nama" class="input-xlarge" name="nama" value="<?php echo $nama ?>">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="alamat">Alamat</label>
		<div class="controls">
			<textarea id="alamat" name="alamat" ><?php echo $alamat ?></textarea>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="longitude">Longitude</label>
		<div class="controls">
			<input type="text" id="longitude" class="input-medium" name="longitude" value="<?php echo $longitude ?>">
		</div>
	</div>
    <div class="control-group">
		<label class="control-label" for="latitude">Latitude</label>
		<div class="controls">
			<input type="text" id="latitude" class="input-medium" name="latitude" value="<?php echo $latitude ?>">
		</div>
	</div>
    <div class="control-group">
		<label class="control-label" for="fasilitas">Fasilitas</label>
		<div class="controls">
			<textarea id="fasilitas" name="fasilitas"><?php echo $fasilitas ?></textarea>
		</div>
	</div>
    <div class="control-group">
		<label class="control-label" for="jalur">Jalur</label>
		<div class="controls">
			<textarea id="jalur" name="jalur"><?php echo $jalur ?></textarea>
		</div>
	</div>
    <div class="control-group">
		<label class="control-label" for="transport">Alat Transportasi</label>
		<div class="controls">
			<textarea id="transport" name="transport"><?php echo $alat_transport ?></textarea>
		</div>
	</div>
    <div class="control-group">
		<label class="control-label" for="ulasan">Ulasan</label>
		<div class="controls">
			<textarea id="ulasan" name="ulasan"><?php echo $ulasan ?></textarea>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="kategori">Kategori</label>
		<div class="controls">
			<select class="input-medium" name="kategori">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($kd > 0) { ?>
					<option value="<?php echo $data['kategori_id'] ?>"><?php echo $data['nama_kategori'] ?></option>
				<?php } ?>
				<option value="1">Wisata Alam</option>
				<option value="2">Wisata Bermain</option>
				<option value="3">Wisata Sejarah</option>
				<option value="4">Wisata Belanja</option>
			</select>
		</div>
		<div class="control-group">
		<label class="control-label" for="gambar">Upload Gambar</label>
		<div class="controls">
			<input name="gambar1" type="file" id="gambar1" size="30" /></br>
			<input name="gambar2" type="file" id="gambar2" size="30" /></br>
			<input name="gambar3" type="file" id="gambar3" size="30" /></br>
			<input name="gambar4" type="file" id="gambar4" size="30" /></br>
		</div>
	</div>
	
</form>

<?php
// tutup koneksi ke database mysql
koneksi_tutup();
?>
