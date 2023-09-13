 
		
<?php
 
  
	if($_POST[kelas]!=""){ $kelas=$_POST[kelas]; } else { $kelas=""; } 
	if($_POST[komponenbiaya]!=""){ $komponenbiaya=$_POST[komponenbiaya]; } else { $komponenbiaya=""; } 
  
       echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Laporan Pembayaran</h1>
                        <p class="title-description"> Lihat, Cetak Laporan Pembayaran</p>
                    </div>
                    <section class="section"> ';
					
					
		echo "<div class='card'>
				<div class='card-block'> 
				<div class='card-title-block'> Parameter Pencarian </div>
					<section class='example'> ";
				
			?>
			
			
			<form id="formulir" method="post" enctype="multipart/form-data"  action='' role="form" parsley-validate>
	
    
			<div class='form-group'>
				  
			<div class='form-group'>
				
				<div class='col-sm-3'>
						<select name="kelas" id="pilihankelasbayar" class='form-control required'>
							<option value="">-- Pilih Kelas --</option> 
							<?php
							$carikelas=mysql_query("SELECT * FROM kelas where tahunajaran='$_SESSION[tahunajaran]' ORDER BY id_kelas ASC"); 
							
							while($k=mysql_fetch_array($carikelas)){
								if($kelas==$k[id_kelas]) { $ok= "selected=selected"; } else { $ok="";}
								echo "<option value='$k[id_kelas]' $ok>$k[tingkat] kelas $k[namakelas]</option>";
							}
							?> 
						</select>
				</div>
			</div>
			
			<div class='form-group'>
				
				<div class='col-sm-3'>
						<select name="komponenbiaya" id="pilihankomponenbiaya" class='form-control required'>
							<option value="">-- Pilih Biaya Pendidikan --</option>
							  
							<?php
							
							?>
						</select>
				</div>
			</div>
			
			<div class="form-group" > 
		<div class="col-sm-2">
		<input type="text" name="tglmulai" class="datepicker-input  form-control required date-picker" id="tanggal" data-date-format="yyyy-mm-dd"  placeholder="Tanggal Awal">
		</div>
	</div>
	
	 <div class="form-group" > 
		<div class="col-sm-2">
		<input type="text" name="tglselesai" class="datepicker-input form-control required date-picker" id="tanggal"  data-date-format="yyyy-mm-dd"  placeholder="Tanggal Akhir">
		</div>
	</div>
	
			
			<div class="form-group " > 
		<div class="col-sm-2">
		 <input type="submit" class="btn btn-success" name="btnFilter" value="Tampilkan"> 
		</div>
	</div>
			
			</form>
					
		<?php		
		echo "</section>
				</div>
			</div>";
	
	
	if($_POST[btnFilter]=="Tampilkan") {
		
		  
		$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$_POST[kelas]'");
		$k=mysql_fetch_array($carikelas);
		$tingkat=strtoupper($k[tingkat]);
		$namakelas=strtoupper($k[namakelas]);
		
		$query = mysql_query("SELECT * FROM biayapendidikan WHERE id_biaya='$komponenbiaya' ");
		$result = mysql_fetch_array($query);
		$namabiaya = strtoupper($result[nama_biaya]);
	
		$tglAwal = tgl_indo($_POST[tglmulai]);
		$tglAkhir = tgl_indo($_POST[tglselesai]);
		  
  echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
				 
				<div class='row text-sm wrapper'>
					<div class='col-lg-12'>
					 <center><h5>LAPORAN PEMBAYARAN $namabiaya</h5>
	<h5>KELAS $namakelas TINGKAT $tingkat </h5>
	<h5>TANGGAL $tglAwal SAMPAI DENGAN $tglAkhir</h5>
	</center> 
	
						   <a href='modul/mod_laporan/laporan_biaya_pdf.php?kelas=$_POST[kelas]&komponenbiaya=$_POST[komponenbiaya]&tglAwal=$_POST[tglmulai]&tglAkhir=$_POST[tglselesai]' class='btn  btn-danger pull-right' target='_blank'>PDF </a>
					</div>
					  
				</div>
				<div class='table-responsive' style='padding:3px;'>  ";
				
     
	 
	 
	 
		  
	echo "<br/>
		  <table  class='table table-condensed'>
		   <thead>
			  <tr>
				  <th width=50>no</th> 
				  <th>nis</th>
				  <th>Nama Siswa</th>
				  <th>Tgl Bayar</th> 
				  <th>Jumlah Bayar</th> 
			 </tr> 
           </thead> <tbody>";
    
	$tglmulai = $_POST[tglmulai];
	$tglselesai = $_POST[tglselesai]; 
    $tampil = mysql_query("SELECT * FROM pembayaransiswa WHERE id_kelas='$_POST[kelas]' AND tahunajaran='$_SESSION[tahunajaran]' AND (tgl_bayar >= '$tglmulai' AND tgl_bayar <= '$tglselesai') AND id_biaya='$_POST[komponenbiaya]'");
  
	 
  
	$jumlahdata=mysql_num_rows($tampil); 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 10;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
   
    $no= ($posisi-$limit) +1; 
	$total = 0;
    while ($r=mysql_fetch_array($tampil)){
		// id_siswa 	id_kelas 	id_mapel
		$carisiswa = mysql_query("SELECT * FROM siswa
					where id_siswa=$r[id_siswa] ");
  
		$siswa=mysql_fetch_array($carisiswa);
  
       echo "<tr><td align='center'>$no</td> 
				<td align='center'>$siswa[nis]</td>
				<td >$siswa[nama_lengkap]</td>
				<td align='center'>$r[tgl_bayar]</td>
				<td align='center'>".format_rupiah($r[jumlah_bayar])."</td>
				</tr>";
		$total = $total + $r[jumlah_bayar];
        $no++;
    }
    echo " </tbody> 
		<tfooter>
		<tr><td></td><td></td><td></td><td align='center'>TOTAL</td><td align='center'>".format_rupiah($total)."</td></tr>
		</tfooter>
    	</table>";
		
		$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
		$pagination = (new Pagination());
		$pagination->setCurrent($page);
		$pagination->setTotal($jumlahdata);
		$pagination->setRPP($limit); 
		$markup = $pagination->parse();
					
	echo "<div class='pull-right' style='margin-right:10px;'>".$markup."</div> 
		<div class='clearfix'></div>";
					
					
	echo "</div>
		 
	 	 </section>
	</div>
     
	";
	
		
		
	}

	echo " 
    </section>
	</article>
	";
	
   
?>
