 

<?php
switch($_GET[act]){
 
  default: 
 
	   	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Nilai </h1>
                        <p class="title-description"> Tambah, Edit Nilai Santri </p>
                    </div>
                    <section class="section"> ';
	 
	  
			echo "
		  <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
					
					<div class='row text-sm wrapper'>
					 <div class='col-sm-8 m-b-xs'>
						 
					</div>
					 
					<div class='col-sm-4'>
						 <div align='right'>
						<form method='POST' action='dashboard.php?module=nilai' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder=' Nama Santri' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-success' type='button' style='height:34px; border-radius:0px 4px 4px 0px;'><span class='input-group-btn'></span>Cari</button></span>
							</div> 
						</form>
						 </div>
					</div>
				</div>
				

	 <div class='table-responsive'>
		  <table class='table table-condensed table-hovered'>
		  <thead>
			<tr><th width=15>no</th>
			  <th>nis</th> 
			  <th>nama santri</th>
			  <th>wali santri</th>
			  <th>tingkat</th>
			  <th>kelas</th> 
			  <th width=220>Kelola Nilai</th>
			</tr>
		  </thead><tbody>";
 

    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							ORDER BY siswa.nis asc  ");
   
	 
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 10;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
    if(isset($_POST['pencarian'])) {
		 
		 
		$tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							AND siswa.nama_lengkap like '%".$_POST[pencarian]."%'
							ORDER BY siswa.nis asc  limit $mulai, $limit"); 
	} else {
		$tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							ORDER BY siswa.nis asc  limit $mulai, $limit"); 
		 
	}
	
    $no= ($posisi-$limit) +1; 
    while($r=mysql_fetch_array($tampil)){
		
		 
		
      echo "<tr><td align=center>$no</td>
                <td align=center>$r[nis]</td> 
                <td >$r[nama_lengkap]</td>
				 <td >$r[nama_wali]</td>
				<td align=center>$r[tingkat]</td>
                <td align=center>$r[namakelas]</td>  
               <td> <a href=?module=nilai&act=kelolanilai1&id=$r[id_siswa] class='btn btn-sm btn-success' title='Semester 1'>  Semester 1</a> 
			   
			   <a href=?module=nilai&act=kelolanilai2&id=$r[id_siswa] class='btn btn-sm btn-success' title='Semester 2'>  Semester 2</a> 
			   ";     
	echo  "</td> </tr>";
      $no++;
    }
	
	echo "</table></div>"; 
    
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
    </section>
	</article>
	";
   
 
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
	$tingkat=$r[tingkat];
	
	

	
	
	
	?>
	
	

   <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Nilai </h1>
                        <p class="title-description"> Edit Nilai  </p>
                    </div>
                    <section class="section">
                      
					  	  <?php
		  		 		  
	 if($_SESSION[sukses]!="")
	 {
		echo " <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
		</i></button>".$_SESSION['sukses']."</div>";
	 	$_SESSION[sukses]="";  
	 } else if($_SESSION[gagal]!="")
	 {
	 	echo " <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
		</i></button>".$_SESSION['gagal']."</div>";
	 	$_SESSION[gagal]="";  
	 }
	
		  
		  ?>
		  
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										

		  
		 <h5> DATA SANTRI </h5>
		 <table class="table table-striped table-bordered">
			<tr><td rowspan="6" width="180">
			<?php
						if($r[foto]==""){
							echo "<img src='../upload/foto_siswa/noimage.jpg' width=100%>";
						} else {
							echo "<img src='../upload/foto_siswa/$r[foto]' width=100%>";
						}
						?>
				</td><td width="150">NIS</td><td ><?php echo $r[nis]; ?></td></tr>
			<tr><td>Nama Lengkap</td><td><?php echo $r[nama_lengkap]; ?></td></tr>
			<tr><td> Tingkat </td><td><?php echo $r[tingkat]; ?></td></tr> 
			<tr><td> Nama Kelas</td><td><?php echo $r[namakelas]; ?></td></tr> 
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
							AND tingkat = '$tingkat' ");
							
							 
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]' 
									AND semester='1'");
				$jumlahnilai = mysql_num_rows($carinilai);
			
				if($jumlahnilai<1){
						mysql_query("INSERT INTO nilai (id_siswa,id_kelas, id_mapel, semester) VALUES ('$r[id_siswa]','$r[id_kelas]','$mapel[id_mapel]','1')");
				}
			}
					
			// end siapkan kolom nilai	
			
			
			
			
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND tingkat = '$tingkat'
							 ");	
			$no=1;
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]' 
									AND semester='1'"); 
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
	
	
	
	
	 
	
	
	 
	 	 </section>
	</div>
    </section>
	</article>

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
	$tingkat=$r[tingkat];
	
	 
	
	?>
	
	

   <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Nilai </h1>
                        <p class="title-description"> Edit Nilai  </p>
                    </div>
                    <section class="section">
					
					  <?php
		  		 		  
	 if($_SESSION[sukses]!="")
	 {
		echo " <div class='alert alert-success'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
		</i></button>".$_SESSION['sukses']."</div>";
	 	$_SESSION[sukses]="";  
	 } else if($_SESSION[gagal]!="")
	 {
	 	echo " <div class='alert alert-danger'><button class='close' data-dismiss='alert' type='button'><i class='ace-icon fa fa-times'>
		</i></button>".$_SESSION['gagal']."</div>";
	 	$_SESSION[gagal]="";  
	 }
	
		  
		  ?> 
		  
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
		 
		  
		 <h5> DATA SANTRI </h5>
		 <table class="table table-striped table-bordered">
			<tr><td rowspan="6" width="180">
			<?php
						if($r[foto]==""){
							echo "<img src='../upload/foto_siswa/noimage.jpg' width=100%>";
						} else {
							echo "<img src='../upload/foto_siswa/$r[foto]' width=100%>";
						}
						?>
				</td><td width="150">NIS</td><td ><?php echo $r[nis]; ?></td></tr>
			<tr><td>Nama Lengkap</td><td><?php echo $r[nama_lengkap]; ?></td></tr>
			<tr><td> Tingkat </td><td><?php echo $r[tingkat]; ?></td></tr> 
			<tr><td> Nama Kelas</td><td><?php echo $r[namakelas]; ?></td></tr> 
		 </table>
		 
		 	  
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_nilai/aksi_nilai.php?module=nilai&act=updatenilai2' role="form">
	<input type=hidden name='idsiswa' size=40 value='<?php echo $r[id_siswa]; ?>'>
	<input type=hidden name='idkelas' size=40 value='<?php echo $r[id_kelas]; ?>'>
 
	
	 <br/>	 <br/>

	 <h5> NILAI MATA PELAJARAN SEMESTER 2 </h5>
	 
	 
		 <table class="table table-striped table-bordered"> 
			<tr><th width="30">No</th>
				<th>Mata Pelajaran</th>
				 <th width="200">Nilai Akhir</th>
			</tr>
			
			<?php 
			
			//siapkan kolom nilai  
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]'
							AND tingkat='$tingkat'  ");
							
							 
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]'
									AND semester='2'");
				$jumlahnilai = mysql_num_rows($carinilai);
			
				if($jumlahnilai<1){
						mysql_query("INSERT INTO nilai (id_siswa,id_kelas, id_mapel,semester) VALUES ('$r[id_siswa]','$r[id_kelas]','$mapel[id_mapel]','2')");
				}
			}
					
			// end siapkan kolom nilai	
			
			
			
			
			$carimapel = mysql_query("SELECT * FROM mapel
							WHERE tahunajaran='$_SESSION[tahunajaran]' ");	
			$no=1;
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai 
									WHERE id_siswa='$r[id_siswa]'  
									AND id_mapel='$mapel[id_mapel]' 
									AND semester='2'"); 
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
	
	
	
	
	 
	
	
	 
	 	 </section>
	</div>
    </section>
	</article>

		  <div class='clearfix'></div>
	<br/> <br/> <br/> <br/> <br/><br/>
	
	<?php
    break;  
	
	

}
?>
