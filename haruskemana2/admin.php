
<?php
    session_start();
    include_once 'include/class.user.php';
    $user = new User();

    $user_data = $_SESSION['user'];
	$user_data = $_SESSION['password'];

    if (!$user->get_session()){
       header("location:login_page.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Administrator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="favicon.png"/>
	<link href="css/crud-bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>

<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="admin.php">AdminSKA</a>
             <ul class="nav navbar-right top-nav">
                <li>
                            <a href="admin.php?q=logout">Log Out</a>
                        </li>
                </ul>
		</div>
	</div>
   
</div>

<div class="container">
	<div class="row">
		<h3>Data Destinasi Wisata 
			<a href="#dialog-mahasiswa" id="0" class="btn tambah" data-toggle="modal">
				<i class="icon-plus"></i> Tambah Data
			</a>
		</h3>

		<!-- tempat untuk menampilkan data mahasiswa -->
		<div id="data-mahasiswa"></div>
	</div>
</div>

<!-- awal untuk modal dialog -->
<div id="dialog-mahasiswa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data Mahasiswa</h3>
	</div>
	<!-- tempat untuk menampilkan form mahasiswa -->
	<div class="modal-body"></div>
	<div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button id="simpan-mahasiswa" class="btn btn-success">Simpan</button>
	</div>
</div>
<!-- akhir kode modal dialog -->

<!-- memanggil berkas javascript yang dibutuhkan -->
<script src="js/crud-jquery-1.8.3.min.js"></script>
<script src="js/crud-bootstrap.min.js"></script>
<script src="js/crud-aplikasi.js"></script>

</body>
</html>
