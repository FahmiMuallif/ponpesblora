 
		
<?php
 
	if($_POST[semester]!=""){ $semester=$_POST[semester]; } else { $semester=""; }  
	if($_POST[kelas]!=""){ $kelas=$_POST[kelas]; } else { $kelas=""; } 
	if($_POST[mapel]!=""){ $mapel=$_POST[mapel]; } else { $mapel=""; } 
  
       echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Laporan Nilai</h1>
                        <p class="title-description"> Lihat, Cetak Laporan Nilai</p>
                    </div>
                    <section class="section"> ';
					
					
		echo "<div class='card'>
				<div class='card-block'> 
				<div class='card-title-block'> Parameter Pencarian </div>
					<section class='example'> ";
				
			?>
			
			<form id="formulir" method="post" enctype="multipart/form-data"  action='' role="form" parsley-validate>
	
   
			
			<div class='form-group'>
				 
				<div class='col-sm-3'>
						<select name="semester"  id="pilihanSemester" class='form-control required'>
							<option value="">-- Pilih Semester --</option>
							<option value="1" <?php if($semester=="1") { echo "selected=selected"; } else { echo ""; } ?>>Semester 1</option>
							<option value="2" <?php if($semester=="2") { echo "selected=selected"; } else { echo ""; } ?>>Semester 2</option>
						</select>
				</div>
			</div>
			
						
			<div class='form-group'>
				
				<div class='col-sm-3'>
						<select name="kelas" id="pilihanKelas" class='form-control required' >
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
			
			<?php
			if($_POST[btnFilter]=="Tampilkan"){
			?>	
				<div class='form-group'>
				
				<div class='col-sm-3'>
						<select name="mapel" id="pilihanMapel" class='form-control required'>
							<option value="">-- Pilih Mapel --</option>
							<!-- <option value='Semua' <?php // if($mapel=="Semua") { echo "selected=selected"; } else { echo"";}?>> Semua Mapel </option> -->
							
							
							<?php
							$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$_POST[kelas]'");
							$k=mysql_fetch_array($carikelas);
							$tingkat=$k[tingkat];
							
							$carimapel= mysql_query("SELECT * FROM mapel WHERE tahunajaran='$_SESSION[tahunajaran]' 
											AND tingkat='$tingkat' 
											AND semester='$_POST[semester]'");
					 
							while($mapel=mysql_fetch_array($carimapel)){
								if($mapel[id_mapel]==$_POST[mapel]) { $ok= "selected=selected"; } else { $ok="";}
								echo "<option value='$mapel[id_mapel]' $ok>$mapel[nama_mapel]</option>";
							}
							?>
						</select>
				</div>
			</div>
			
			<?php } else { ?>
				
				<div class='form-group'>
				
				<div class='col-sm-3'>
						<select name="mapel" id="pilihanMapel" class='form-control required'>
							<option value="">-- Pilih Mapel --</option>
							<option value='Semua' <?php if($mapel=="Semua") { echo "selected=selected"; } else { echo"";}?>> Semua Mapel </option>
							
							
							<?php
							
							?>
						</select>
				</div>
			</div>
			
				
			<?php } ?>
			
			<div class="form-group " > 
		<div class="col-sm-3">
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
		
		$carimapel= mysql_query("SELECT * FROM mapel WHERE 
						id_mapel='$_POST[mapel]'");
 
		$mapel=mysql_fetch_array($carimapel);
		$namamapel=strtoupper($mapel[nama_mapel]); 
			 
		 
		
	
  echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
				 
				<div class='row text-sm wrapper'>
					<div class='col-lg-12'>
					 <center><h5>LAPORAN NILAI</h5>
	<h5>TINGKAT $tingkat KELAS $namakelas MATA PELAJARAN $namamapel</h5>
	<h5>TAHUN AJARAN $_SESSION[tahunajaran] SEMESTER $_POST[semester]</h5>
	</center> 
	
						   <a href='modul/mod_laporan/laporan_nilai_pdf.php?kelas=$_POST[kelas]&mapel=$_POST[mapel]&smt=$_POST[semester]' class='btn  btn-danger pull-right' target='_blank'>PDF </a>
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
				  <th>Nilai</th> 
			 </tr> 
           </thead> <tbody>";
        
    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
					where siswa.id_siswa=riwayatkelas.id_siswa 
					AND riwayatkelas.id_kelas=kelas.id_kelas
					AND kelas.id_kelas='$_POST[kelas]' 
					ORDER BY siswa.nis ASC");
  
  
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 10;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
   
	
    $no= ($posisi-$limit) +1; 
    while ($r=mysql_fetch_array($tampil)){
		// id_siswa 	id_kelas 	id_mapel
		$carinilai = mysql_query("SELECT * FROM nilai
					where id_siswa=$r[id_siswa] 
					AND id_kelas='$_POST[kelas]' 
					AND id_mapel='$_POST[mapel]' ");
  
		$nilai=mysql_fetch_array($carinilai);
  
       echo "<tr><td align='center'>$no</td> 
				<td align='center'>$r[nis]</td>
				<td >$r[nama_lengkap]</td>
				<td align='center'>$nilai[nilai_akhir]</td>";
 
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
