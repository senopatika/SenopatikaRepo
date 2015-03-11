<?php
// panggil berkas koneksi.php
require 'koneksi.php';

// buat koneksi ke database mysql
koneksi_buka();

?>

<table class="table table-condensed table-bordered table-hover" cellpadding="0" cellspacing="0">
<thead>
	<tr>
		<th>#</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Alamat</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	<?php 
		$i = 1;
		$query = mysql_query("SELECT id_destinasi,nama,alamat,nama_kategori FROM destinasi d, kategori k where d.kategori_id=k.id_kategori ");
		
		// tampilkan data mahasiswa selama masih ada
		while($data = mysql_fetch_array($query)) {
			
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data['nama'] ?></td>
		<td><?php echo $data['nama_kategori'] ?></td>
		<td><?php echo $data['alamat'] ?></td>
		
		<td>
			<a href="#dialog-mahasiswa" id="<?php echo $data['id_destinasi'] ?>" class="ubah" data-toggle="modal">
				<i class="icon-pencil"></i>
			</a>
			<a href="#" id="<?php echo $data['id_destinasi'] ?>" class="hapus">
				<i class="icon-trash"></i>
			</a>
		</td>
	</tr>
	<?php
		$i++;
		}
	?>
</tbody>
</table>

<?php 
// tutup koneksi ke database mysql
koneksi_tutup(); 
?>

