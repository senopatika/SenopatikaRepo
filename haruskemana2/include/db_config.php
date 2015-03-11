<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'haruskemana');

/*class DB_con {
	public $mysqli1;
    function __construct() {
       $this->mysqli1 = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
		if(mysqli_connect_errno()) {
 
			echo "Error: Could not connect to database.";
 
		exit;
 
		}
    }
   
}*/
// fungsi untuk melakukan koneksi ke database mysql
function koneksi_buka() {
	mysql_select_db(DB_NAMA,mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}

// fungsi untuk menutup koneksi ke database mysql
function koneksi_tutup() {
	mysql_close(mysql_connect(DB_HOST,DB_USER,DB_PASSWORD));
}
?>
