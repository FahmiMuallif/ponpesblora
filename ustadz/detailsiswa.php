<?php
session_start();
error_reporting(0);

include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_thumb.php";
include "../config/Pagination.class.php";
include "../config/library.php";
include "../config/fungsi_rupiah.php";

?>
	
	 
			 	 <?php
					$carisiswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
					$siswa=mysql_fetch_array($carisiswa);
					if($siswa[foto]!=""){
						$siswa[foto]=$siswa[foto];
					} else {
						$siswa[foto]="noimage.jpg";
					}
				 ?>
				 <center><img src="../upload/foto_siswa/<?php echo $siswa[foto]; ?>" class="img-responsive" width="200px"></center>
				 
			 	 
				 
				<table class="table table-condensed">
				<tr><td width=200>Nama Lengkap</td><td><?php echo $siswa[nama_lengkap]; ?></td></tr>
				<tr><td>Jenis Kelamin</td><td><?php echo strtoupper($siswa[jenis_kelamin]); ?></td></tr>
				<tr><td>Tempat Lahir</td><td><?php echo $siswa[tempat_lahir]; ?></td></tr>
				<tr><td>Tanggal Lahir</td><td><?php echo tgl_indo($siswa[tgl_lahir]); ?></td></tr> 
				<tr><td>Umur</td><td><?php echo floor((time() - strtotime($siswa[tgl_lahir])) / 31556926); ?> tahun </td></tr> 
				  
				</table>
				<br/><br/>
				<table class="table table-condensed">
				<tr><td width=200>Nama Bapak</td><td><?php echo $siswa[nama_bapak]; ?></td></tr>
				<tr><td>Pekerjaan Bapak</td><td><?php echo $siswa[pekerjaan_bapak]; ?></td></tr>
				<tr><td>Nama Ibu</td><td><?php echo $siswa[nama_ibu]; ?></td></tr> 
				<tr><td>Pekerjaan Ibu</td><td><?php echo $siswa[pekerjaan_ibu]; ?></td></tr> 
				<tr><td>Alamat</td><td><?php echo $siswa[alamat]; ?></td></tr> 
				<tr><td>No. Telp.</td><td><?php echo $siswa[notelp_ortu]; ?></td></tr>
				</table>
				 
			 	<div class="clearfix"> </div>
			  