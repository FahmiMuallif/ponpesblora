 
		
<?php
 
	 
	if($_POST[kelas]!=""){ $kelas=$_POST[kelas]; } else { $kelas=""; }  
	if($_POST[tglmulai]!=""){ $tglmulai=$_POST[tglmulai]; } else { $tglmulai=""; } 
	if($_POST[tglselesai]!=""){ $tglselesai=$_POST[tglselesai]; } else { $tglselesai=""; } 
	
	
       echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Laporan Pelanggaran</h1>
                        <p class="title-description"> Lihat, Cetak Laporan Pelanggaran</p>
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
						<select name="kelas" id="pilihankelas" class='form-control required'>
							<option value="">-- Pilih Kelas --</option> 
							<option value='Semua' <?php if($kelas=="Semua") { echo "selected=selected"; } else { echo"";}?>>Semua Kelas</option>
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
	
 
	
	<div class="form-group" > 
		<div class="col-sm-2">
		<input type="text" name="tglmulai" class="datepicker-input  form-control required date-picker" id="tanggal" data-date-format="yyyy-mm-dd"  placeholder="Tanggal Awal" value="<?php echo $tglmulai; ?>">
		</div>
	</div>
	
	 <div class="form-group" > 
		<div class="col-sm-2">
		<input type="text" name="tglselesai" class="datepicker-input form-control required date-picker" id="tanggal"  data-date-format="yyyy-mm-dd"  placeholder="Tanggal Akhir" value="<?php echo $tglselesai; ?>">
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
		
		$tglAwal=  tgl_indo($_POST[tglmulai]);
		$tglAkhir=  tgl_indo($_POST[tglselesai]);
		
		$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$_POST[kelas]'");
		$k=mysql_fetch_array($carikelas);
		$tingkat=strtoupper($k[tingkat]);
		$namakelas=strtoupper($k[namakelas]);
		
	 echo "<div class='card'>
					<div class='card-block'>
						<div class='card-title-block'> 
						</div>
						<section class='example'>
					 
					<div class='row text-sm wrapper'>
						<div class='col-lg-12'>
						 <center><h5>LAPORAN PELANGGARAN SISWA</h5>";
		if($_POST[kelas]=="Semua") {
			echo "<h5>SEMUA KELAS</h5>";
		} else {
			echo "<h5>KELAS $namakelas</h5>";
		}
		echo "<h5> $tglAwal -  $tglAkhir</h5>
		</center> 
	
						   <a href='modul/mod_laporan/laporan_pelanggaran_pdf.php?kelas=$_POST[kelas]&tglAwal=$_POST[tglmulai]&tglAkhir=$_POST[tglselesai]' class='btn  btn-danger pull-right' target='_blank'>PDF </a>
					</div>
					  
				</div>
				<div class='table-responsive' style='padding:3px;'>  ";
				
     
	 
	 
	 
		  
	echo "<br/>
		  <table  class='table table-condensed'>
		   <thead>
			  <tr>
				  <th width=50>no</th> 
				  <th>tgl pelanggaran</th>
				  <th>Nama Siswa</th>
				  <th>Pelanggaran</th> 
				  <th>Catatan</th> 
			 </tr> 
           </thead> <tbody>";
    
	$tglmulai = $_POST[tglmulai];
	$tglselesai = $_POST[tglselesai]; 
	
	
	
   if($_POST[kelas]=="Semua"){
	   
	   
	   
	    $tampil = mysql_query("SELECT * FROM pelanggaransantri, siswa, jenispelanggaran
							WHERE pelanggaransantri.id_siswa=siswa.id_siswa 
							AND pelanggaransantri.id_jenispelanggaran=jenispelanggaran.id_jenispelanggaran 
							AND pelanggaransantri.tahunajaran='$_SESSION[tahunajaran]'
							AND (pelanggaransantri.tgl_pelanggaran >= '$tglmulai' AND  pelanggaransantri.tgl_pelanggaran <= '$tglselesai')");
  
   } else {
	    $tampil = mysql_query("SELECT * FROM pelanggaransantri, siswa, jenispelanggaran
							WHERE pelanggaransantri.id_siswa=siswa.id_siswa 
							AND pelanggaransantri.id_jenispelanggaran=jenispelanggaran.id_jenispelanggaran 
							AND pelanggaran.id_kelas='$_POST[kelas]' 
							AND pelanggaransantri.tahunajaran='$_SESSION[tahunajaran]'
							AND (pelanggaransantri.tgl_pelanggaran >= '$tglmulai' AND  pelanggaransantri.tgl_pelanggaran <= '$tglselesai')");
  
   }
	 
 
  
	$jumlahdata=mysql_num_rows($tampil); 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 10;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
   
    $no= ($posisi-$limit) +1; 
 
    while ($r=mysql_fetch_array($tampil)){
		 
	 
  
       echo "<tr><td align='center'>$no</td> 
				<td align='center'>$r[tgl_pelanggaran]</td>
				<td >$r[nama_lengkap]</td>
				<td >$r[nama_pelanggaran]</td>
				<td ><b>Tipe pelanggan </b>: $r[tipe_pelanggaran]<br/>
				<b>Sanksi </b>: $r[sanksi]<br/>
				<b>Pemberi sanksi </b>: $r[pemberi_sanksi]<br/>
				<b>Pembinaan atau feedback </b>: $r[catatan]</td>
				</tr>";
		 
        $no++;
    }
    echo " </tbody> 
		 
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
