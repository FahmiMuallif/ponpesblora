<section class="vbox">
	<section class="scrollable padder">
		<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
			<li>
				<a href="dashboard.php"><i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Raport Sementara</li>
		</ul>
		
		<div class='m-b-md'>
			<h3 class='m-b-none'>Raport Sementara</h3><small>Melihat, Mencetak Raport Sementara</small>
		</div>
		

<?php
switch($_GET[act]){
 
  default: 
 
		 
		 
	
	
		echo "  <section class='panel panel-default'>
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						 
					</div>
					 
					<div class='col-sm-4'>
						 
					 
						 
					</div>
				</div>
				<div class='table-responsive'  >
	  ";
	  
	  
	
          echo " 
		  <table id='SIAdataTable' class='table table-striped table-bordered table-hovered'>
		  <thead>
			<tr><th width=15>no</th>
			  <th>nis</th> 
			  <th>nama siswa</th>
			  <th>wali siswa</th>
			  <th>tingkat</th>
			  <th>kelas</th> 
			  <th width=200>Raport Sementara</th>
			</tr>
		  </thead><tbody>";
 

    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							ORDER BY siswa.nis asc  ");
   
	
    $no=  1;  
	
	
    while($r=mysql_fetch_array($tampil)){
		
		 
		
      echo "<tr><td align=center>$no</td>
                <td align=center>$r[nis]</td> 
                <td >$r[nama_lengkap]</td>
				 <td >$r[nama_wali]</td>
				<td align=center>$r[tingkat]</td>
                <td align=center>$r[namakelas]</td>  
               <td> <a href='modul/mod_raport/raport1_pdf.php?id=$r[id_siswa]' target='_blank' class='btn btn-sm btn-success' title='Semester 1'>  Semester 1</a> 
			   
			   <a href='modul/mod_raport/raport2_pdf.php?id=$r[id_siswa]' target='_blank' class='btn btn-sm btn-success' title='Semester 2'>  Semester 2</a> 
			   ";     
	echo  "</td> </tr>";
      $no++;
    }
    
					
					
	echo "</div>
		 
	</section>
							
							
	</section>
	</section>";
   
 
    break;
  
  
  
  
  
  
	
  case "kelolanilai1":
    $edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							AND siswa.id_siswa='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	$idsiswa=$r[id_siswa];
	$idkelas=$r[id_kelas];
	
	
		 		  
	if($_SESSION[gagal] !="") {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[gagal];
		 $_SESSION[gagal]="";   
		echo "</div>";
	
	} else if($_SESSION[sukses] !="") {
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[sukses];
		 $_SESSION[sukses]="";   
		echo "</div>";
	}	 
	
	
	
	
	?>
	
	

 <nav id='breadcrumbs'>
            
	  <section class="panel panel-default">
		<header class="panel-heading"> 
			Kelola Nilai Siswa <i class="fa fa-angle-double-right"></i>
			Edit Nilai Siswa
		</header>
		<section class="chat-list panel-body">
		  
		  
		  
		 <h5> DATA SISWA </h5>
		 <table class="table table-striped table-bordered">
			<tr><td rowspan="6" width="200">
			<?php
						if($r[foto]==""){
							echo "<img src='../upload/foto_siswa/noimage.jpg' width=100%>";
						} else {
							echo "<img src='../upload/foto_siswa/$r[foto]' width=100%>";
						}
						?>
				</td><td width="250">NIS</td><td ><?php echo $r[nis]; ?></td></tr>
			<tr><td>Nama Lengkap</td><td><?php echo $r[nama_lengkap]; ?></td></tr>
			<tr><td> Tingkat / Kelas</td><td><?php echo $r[tingkat]." / ".$r[namakelas]; ?></td></tr>
			<tr><td>Nama Wali</td><td><?php echo $r[nama_wali]; ?></td></tr>
			<tr><td>Alamat</td><td><?php echo $r[alamat_wali]; ?></td></tr>
			<tr><td>No.Telp.</td><td><?php echo $r[notelp_wali]; ?></td></tr>
		 </table>
		 
		 	  
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_nilai/aksi_nilai.php?module=nilai&act=updatenilai1' role="form">
	<input type=hidden name='idsiswa' size=40 value='<?php echo $r[id_siswa]; ?>'>
	<input type=hidden name='idkelas' size=40 value='<?php echo $r[id_kelas]; ?>'>
 
	
	 <br/>	 <br/>

	 <h5> NILAI MATA PELAJARAN SEMESTER 1 </h5>
	 
	 
		 <table class="table table-striped table-bordered"> 
			<tr><th width="30">No</th>
				<th>Mata Pelajaran</th>
				 <th width="200">Nilai Akhir</th>
			</tr>
			
			<?php 
			
			//siapkan kolom nilai  
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND semester='1' ");
		
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]'  ");
				$jumlahnilai = mysql_num_rows($carinilai);
			
				if($jumlahnilai<1){
						mysql_query("INSERT INTO nilai (id_siswa,id_kelas, id_mapel) VALUES ('$r[id_siswa]','$r[id_kelas]','$mapel[id_mapel]')");
				}
			}
					
			// end siapkan kolom nilai	
			
			
			
			
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND semester='1' ");	
			$no=1;
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]'  "); 
				while ($n=mysql_fetch_array($carinilai)) {
					 
					echo "<tr>
						<td align=center>$no</td> 
						<td>$mapel[nama_mapel]</td> 
						<td>
						
						<input type='text' name='nilai$mapel[id_mapel]' class='form-control' value='$n[nilai_akhir]'>
						
						
						</td></tr>";
				}
					 
			$no++;	 
				
			}
			
			
			?>
			
		 </table>
		 
		  
		 
	<input type="submit" class="btn btn-sm btn-success pull-right" value="Simpan"> 
	
	
	</form>
	
	
	
	
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_nilai/aksi_nilai.php?module=nilai&act=updatenilaiperkembangan1' role="form">
	<input type=hidden name='idsiswa' size=40 value='<?php echo $r[id_siswa]; ?>'>
	<input type=hidden name='idkelas' size=40 value='<?php echo $r[id_kelas]; ?>'>
 
	
	 <br/>	 <br/>

	 <h5> NILAI PERKEMBANGAN SEMESTER 1 </h5>
	 
	 
		 <table class="table table-striped table-bordered"> 
			<tr><th width="30">No</th>
				<th width="250">Aspek Perkembangan</th>
				 <th>Nilai / Informasi Perkembangan</th>
			</tr>
			
			<?php 
			
			//siapkan kolom nilai  
			$carinilaiperkembangan = mysql_query("SELECT * FROM informasiperkembangan
							WHERE id_siswa='$idsiswa'
							AND id_kelas='$idkelas'
							AND semester='1' ");
			$jumlahnilaiperkembangan = mysql_num_rows($carinilaiperkembangan);
			
		 
			if($jumlahnilaiperkembangan<1){
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','1','Agama dan Moral')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','1','Motorik')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','1','Bahasa')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','1','Kognitif')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','1','Sosial Emosi')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','1','Seni')");
			}
			  	
			// end siapkan kolom nilai	
			
			
			
			 
			 
		 
			$carinilaiperkembangan = mysql_query("SELECT * FROM informasiperkembangan
						WHERE id_siswa='$idsiswa'
						AND id_kelas='$idkelas'
						AND semester='1' order by id_informasiperkembangan asc");
			$no=1;
			while ($np=mysql_fetch_array($carinilaiperkembangan)) {
				 
				echo "<tr>
					<td align=center>$no</td> 
					<td>$np[nama_aspek]</td> 
					<td>
					
					<textarea name='nilai$no' class='form-control'>$np[informasiperkembangan]</textarea> 
					
					</td></tr>";
				$no++;	
			}
					 
			 
			 
			
			?>
			
		 </table>
		 
		  
		 
	<input type="submit" class="btn btn-sm btn-success pull-right" value="Simpan"> 
	
	
	</form>
	
	
	 
	
 	   </section>
		<footer class="panel-footer">
		 
		</footer>
	</section>

		  <div class='clearfix'></div>
	<br/> <br/> <br/> <br/> <br/><br/>
	
	<?php
    break;  
	
	
	
	
	
	
	
	
	
	
case "kelolanilai2":
    $edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							AND siswa.id_siswa='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	$idsiswa=$r[id_siswa];
	$idkelas=$r[id_kelas];
	
		 		  
	if($_SESSION[gagal] !="") {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[gagal];
		 $_SESSION[gagal]="";   
		echo "</div>";
	
	} else if($_SESSION[sukses] !="") {
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[sukses];
		 $_SESSION[sukses]="";   
		echo "</div>";
	}	 
	
	
	?>

 <nav id='breadcrumbs'>
            
	  <section class="panel panel-default">
		<header class="panel-heading"> 
			Kelola Nilai Siswa <i class="fa fa-angle-double-right"></i>
			Edit Nilai Siswa
		</header>
		<section class="chat-list panel-body">
		  
		  
		  
		 <h5> DATA SISWA </h5>
		 <table class="table table-striped table-bordered">
			<tr><td rowspan="6" width="200">
			<?php
						if($r[foto]==""){
							echo "<img src='../upload/foto_siswa/noimage.jpg' width=100%>";
						} else {
							echo "<img src='../upload/foto_siswa/$r[foto]' width=100%>";
						}
						?>
				</td><td width="250">NIS</td><td ><?php echo $r[nis]; ?></td></tr>
			<tr><td>Nama Lengkap</td><td><?php echo $r[nama_lengkap]; ?></td></tr>
			<tr><td> Tingkat / Kelas</td><td><?php echo $r[tingkat]." / ".$r[namakelas]; ?></td></tr>
			<tr><td>Nama Wali</td><td><?php echo $r[nama_wali]; ?></td></tr>
			<tr><td>Alamat</td><td><?php echo $r[alamat_wali]; ?></td></tr>
			<tr><td>No.Telp.</td><td><?php echo $r[notelp_wali]; ?></td></tr>
		 </table>
		 
		 	  
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_nilai/aksi_nilai.php?module=nilai&act=updatenilai2' role="form">
	<input type=hidden name='idsiswa' size=40 value='<?php echo $r[id_siswa]; ?>'>
	<input type=hidden name='idkelas' size=40 value='<?php echo $r[id_kelas]; ?>'>
	
	 <br/>	 <br/>

	 <h5> NILAI SEMESTER 2 </h5>
	 
	 
		 <table class="table table-striped table-bordered"> 
			<tr><th width="30">No</th>
				<th>Mata Pelajaran</th>
				 <th width="200">Nilai Akhir</th>
			</tr>
			
			<?php 
			
			//siapkan kolom nilai  
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND semester='2' ");
		
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]'  ");
				$jumlahnilai = mysql_num_rows($carinilai);
			
				if($jumlahnilai<1){
						mysql_query("INSERT INTO nilai (id_siswa,id_kelas, id_mapel) VALUES ('$r[id_siswa]','$r[id_kelas]','$mapel[id_mapel]')");
				}
			}
					
			// end siapkan kolom nilai	
			
			
			
			
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND semester='2' ");	
			$no=1;
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]'  "); 
				while ($n=mysql_fetch_array($carinilai)) {
					 
					echo "<tr>
						<td align=center>$no</td> 
						<td>$mapel[nama_mapel]</td> 
						<td>
						
						<input type='text' name='nilai$mapel[id_mapel]' class='form-control' value='$n[nilai_akhir]'>
						
						
						</td></tr>";
				}
					 
			$no++;	 
				
			}
			
			
			?>
			
		 </table>
		 
		  
		 
	<input type="submit" class="btn btn-sm btn-success pull-right" value="Simpan"> 
	
	
	</form>
	
	
	
	
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_nilai/aksi_nilai.php?module=nilai&act=updatenilaiperkembangan2' role="form">
	<input type=hidden name='idsiswa' size=40 value='<?php echo $r[id_siswa]; ?>'>
	<input type=hidden name='idkelas' size=40 value='<?php echo $r[id_kelas]; ?>'>
 
	
	 <br/>	 <br/>

	 <h5> NILAI PERKEMBANGAN SEMESTER 2 </h5>
	 
	 
		 <table class="table table-striped table-bordered"> 
			<tr><th width="30">No</th>
				<th width="250">Aspek Perkembangan</th>
				 <th>Nilai / Informasi Perkembangan</th>
			</tr>
			
			<?php 
			
			//siapkan kolom nilai  
			$carinilaiperkembangan = mysql_query("SELECT * FROM informasiperkembangan
							WHERE id_siswa='$idsiswa'
							AND id_kelas='$idkelas'
							AND semester='2' ");
			$jumlahnilaiperkembangan = mysql_num_rows($carinilaiperkembangan);
			
		 
			if($jumlahnilaiperkembangan<1){
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Agama dan Moral')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Motorik')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Bahasa')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Kognitif')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Sosial Emosi')");
				mysql_query("INSERT INTO informasiperkembangan (id_siswa,id_kelas, semester, nama_aspek) VALUES ('$r[id_siswa]','$r[id_kelas]','2','Seni')");
			}
			  	
			// end siapkan kolom nilai	
			
			 
		 
			$carinilaiperkembangan = mysql_query("SELECT * FROM informasiperkembangan
						WHERE id_siswa='$idsiswa'
						AND id_kelas='$idkelas'
						AND semester='2' order by id_informasiperkembangan asc");
			$no=1;
			while ($np=mysql_fetch_array($carinilaiperkembangan)) {
				 
				echo "<tr>
					<td align=center>$no</td> 
					<td>$np[nama_aspek]</td> 
					<td>
					
					<textarea name='nilai$no' class='form-control'>$np[informasiperkembangan]</textarea> 
					
					</td></tr>";
				$no++;	
			}
					 
			 
			 
			
			?>
			
		 </table>
		 
		  
		 
	<input type="submit" class="btn btn-sm btn-success pull-right" value="Simpan"> 
	
	
	</form>
	
	
 	   </section>
		<footer class="panel-footer">
		 
		</footer>
	</section>

		  <div class='clearfix'></div>
	<br/> <br/> <br/> <br/> <br/><br/>
	
	<?php
    break;  
	

}
?>
