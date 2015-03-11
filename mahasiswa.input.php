<?php
require 'koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();

// proses menghapus data mahasiswa
if(isset($_POST['hapus'])) {
	mysql_query("DELETE FROM destinasi WHERE id_destinasi=".$_POST['hapus']);
} else {
	// deklarasikan variabel
	/*$nama =$data['nama'];
	$alamat =$data['alamat'];
	$longitude =$data['longitude'];
	$latitude =$data['latitude'];
	$fasilitas =$data['fasilitas'];
	$jalur =$data['jalur'];
	$alat_transport=$data['transport'];
	$ulasan=$data['ulasan'];
	$kategori=$data['kategori'];*/
	$kd_mhs	= $_POST['id_destinasi'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];
	$fasilitas = $_POST['fasilitas'];
	$jalur = $_POST['jalur'];
	$alat_transport= $_POST['transport'];
	$ulasan= $_POST['ulasan'];
	$kategori= $_POST['kategori'];
	
			$gambar1 = $namafolder . basename($_FILES['gambar1']['name']);  
			$gambar2 = $namafolder . basename($_FILES['gambar2']['name']);  
			$gambar3 = $namafolder . basename($_FILES['gambar3']['name']);  
			$gambar4 = $namafolder . basename($_FILES['gambar4']['name']);  
	
	// validasi agar tidak ada data yang kosong
	//if($nim!="" && $nama!="" && $alamat!="") {
		// proses tambah data mahasiswa
		if($kd_mhs == 0) {
			mysql_query("INSERT INTO destinasi VALUES('','$nama','$alamat','$longitude','$latitude','$fasilitas','$jalur','$alat_transport','$ulasan','$kategori')");
			$foldergambar="gambar/";

			move_uploaded_file($_FILES['gambar1']['tmp_name'], $gambar1); 
			move_uploaded_file($_FILES['gambar2']['tmp_name'], $gambar2); 
			move_uploaded_file($_FILES['gambar3']['tmp_name'], $gambar3); 
			move_uploaded_file($_FILES['gambar4']['tmp_name'], $gambar4);
			
			$destination = "SELECT id_destinasi FROM destinasi WHERE nama='$nama'";
			$no_dest = mysql_query ($destination);
			while ($datatampil=mysql_fetch_array($no_dest)){
					$kueri=$datatampil['id_destinasi'];
					$sql="insert into gambar values ('','$gambar1','$kueri')";
					$sqla="insert into gambar values ('','$gambar2','$kueri')";
					$sqlb="insert into gambar values ('','$gambar3','$kueri')";
					$sqlc="insert into gambar values ('','$gambar4','$kueri')";
					mysql_query($sql);
					mysql_query($sqla);
					mysql_query($sqlb);
					mysql_query($sqlc);
					}
		// proses ubah data mahasiswa
		} else {
			mysql_query("UPDATE destinasi SET 
			nama = '$nama',
			alamat = '$alamat',
			longitude= '$longitude'
			latitude= '$latitude'
			fasilitas='$fasilitas'
			jalur='$jalur'
			alat_transportasi='$alat_transport'
			ulasan='$ulasan'
			kategori_id='$kategori'
			
			WHERE id_destinasi = '$kd'
			");
		}
	//}
}

// tutup koneksi ke database mysql
koneksi_tutup();

?>
