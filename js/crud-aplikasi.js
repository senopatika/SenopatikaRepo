(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {
		
		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "mahasiswa.data.php";
		
		// tampilkan data mahasiswa dari berkas mahasiswa.data.php 
		// ke dalam <div id="data-mahasiswa"></div>
		$("#data-mahasiswa").load(main);
		
		// ketika tombol ubah/tambah di tekan
		$('.ubah, .tambah').live("click", function(){
			
			var url = "mahasiswa.form.php";
			// ambil nilai id dari tombol ubah
			kd_mhs = this.id;
			
			if(kd_mhs != 0) {
				// ubah judul modal dialog
				$("#myModalLabel").html("Ubah Data Mahasiswa");
			} else {
				// saran dari mas hangs 
				$("#myModalLabel").html("Tambah Data Mahasiswa");
			}

			$.post(url, {id: kd_mhs} ,function(data) {
				// tampilkan mahasiswa.form.php ke dalam <div class="modal-body"></div>
				$(".modal-body").html(data).show();
			});
		});
		
		// ketika tombol hapus ditekan
		$('.hapus').live("click", function(){
			var url = "mahasiswa.input.php";
			// ambil nilai id dari tombol hapus
			kd_mhs = this.id;
			
			// tampilkan dialog konfirmasi
			var answer = confirm("Apakah anda ingin mengghapus data ini?");
			
			// ketika ditekan tombol ok
			if (answer) {
				// mengirimkan perintah penghapusan ke berkas transaksi.input.php
				$.post(url, {hapus: kd_mhs} ,function() {
					// tampilkan data mahasiswa yang sudah di perbaharui
					// ke dalam <div id="data-mahasiswa"></div>
					$("#data-mahasiswa").load(main);
				});
			}
		});
		
		// ketika tombol simpan ditekan
		$("#simpan-mahasiswa").bind("click", function(event) {
			var url = "mahasiswa.input.php";

			// mengambil nilai dari inputbox, textbox dan select
			var v_nama = $('input:text[name=nama]').val();
			var v_alamat = $('textarea[name=alamat]').val();
			var v_longitude = $('textarea[name=longitude]').val();
			var v_latitude = $('textarea[name=latitude]').val();
			var v_fasilitas = $('textarea[name=fasilitas]').val();
			var v_jalur = $('textarea[name=jalur]').val();
			var v_transport = $('textarea[name=transport]').val();
			var v_ulasan = $('textarea[name=ulasan]').val();
			var v_kategori = $('select[name=kategori]').val();
			
			var v_gambarsatu = $('file[name=gambar1]').val();
			var v_gambardua = $('file[name=gambar2]').val();
			var v_gambartiga = $('file[name=gambar3]').val();
			var v_gambarempat = $('file[name=gambar4]').val();

			// mengirimkan data ke berkas transaksi.input.php untuk di proses
			$.post(url, {nama: v_nama, alamat: v_alamat, longitude: v_longitude, latitude: v_latitude, fasilitas: v_fasilitas, jalur: v_jalur, transport: v_transport, ulasan: v_ulasan, kategori: v_kategori, gambar1: v_gambarsatu, gambar2: v_gambardua, gambar3: v_gambartiga, gambar4: v_gambarempat, id_destinasi: kd_mhs} ,function() {
				// tampilkan data mahasiswa yang sudah di perbaharui
				// ke dalam <div id="data-mahasiswa"></div>
				$("#data-mahasiswa").load(main);

				// sembunyikan modal dialog
				$('#dialog-mahasiswa').modal('hide');
				
				// kembalikan judul modal dialog
				$("#myModalLabel").html("Tambah Data Mahasiswa");
			});
		});
	});
}) (jQuery);
