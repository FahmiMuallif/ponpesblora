 

<?php
switch($_GET[act]){
 
  default: 
 
		 
		   echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pembayaran Santri </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Pembayaran Santri</p>
                    </div>
                    <section class="section"> ';
					
					
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
	 
 
  echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						 
					</div>
					 
					<div class='col-sm-4'>
						 <div align='right'>
						<form method='POST' action='dashboard.php?module=pembayaransiswa' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder='Nama Santri ' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-success' type='button' style='height:34px; border-radius:0px 4px 4px 0px;'><span class='input-group-btn'></span>Cari</button></span>
							</div> 
						</form>
						 </div>
					</div>
				</div>
				<div class='table-responsive' style='padding:3px;'>  ";
	  
	
          echo " 
		  <table class='table table-condensed'>
		  <thead>
			<tr><th width=20>no</th>
			  <th>nis</th> 
			  <th>nama santri</th>
			  <th>tingkat</th>
			  <th>kelas</th> 
			  <th width=150>aksi</th>
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
							AND nama_lengkap like '%".$_POST[pencarian]."%'
							ORDER BY siswa.nis asc  ");
							
	} else {
		 
     
	   $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							ORDER BY siswa.nis asc limit $mulai, $limit ");
							
		 
	}
	
    $no= ($posisi-$limit) +1;   
	
	
    while($r=mysql_fetch_array($tampil)){
		
		 
		
      echo "<tr><td align=center>$no</td>
                <td align=center>$r[nis]</td> 
                <td >$r[nama_lengkap]</td>
				<td align=center>$r[tingkat]</td>
                <td align=center>$r[namakelas]</td>  
               <td> <a href=?module=pembayaransiswa&act=kelolapembayaran&id=$r[id_siswa] class='btn btn-sm btn-success' title='Kelola'>  Kelola Pembayaran</a> ";     
	echo  "</td> </tr>";
      $no++;
    }
    
	  echo "</tbody></table>  ";
 
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
  
  
  
  
  
  
	
  case "kelolapembayaran":
    $edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
							AND siswa.id_siswa='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	
	   echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pembayaran Santri </h1>
                        <p class="title-description"> Pembayaran Santri '.$r[nama_lengkap].'</p>
                    </div>
                    <section class="section"> ';
					
	
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
	 
 
  echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>  ";
				
	?>

  
		  
		  
		 <h5> DATA SANTRI </h5>
		 <table class="table table-condensed">
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
		 
	
	
	<br/><br/>
	 <div class="sameheight-item">
		<div class="">
			<div class="card-title-block">
				<h5> PEMBAYARAN SANTRI </h5>
			</div>
			<!-- Nav tabs -->
			<ul class="nav nav-pills">
			<?php
			$caribiaya = mysql_query("SELECT * FROM biayapendidikan 
							WHERE tahunajaran='$_SESSION[tahunajaran]' AND tingkat='$r[tingkat]'");
			
			$x=0;
			while($biaya = mysql_fetch_array($caribiaya)) {
				if($x==0){ $ok= "active"; } else { $ok="";} 
				echo "<li class='nav-item'> <a href='' class='nav-link $ok' data-target='#$biaya[id_biaya]-pills' aria-controls='home-pills' data-toggle='tab' role='tab'>$biaya[nama_biaya]</a> </li>";
				$x++;
			}
			?>
				
				 
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			
			<?php
			$caribiaya = mysql_query("SELECT * FROM biayapendidikan 
							WHERE tahunajaran='$_SESSION[tahunajaran]' AND tingkat='$r[tingkat]'");
			
			$x=0;
			while($biaya = mysql_fetch_array($caribiaya)) {
				if($x==0){ $ok= "active"; } else { $ok="";} 
				echo "<div class='tab-pane fade in $ok' id='$biaya[id_biaya]-pills'>
					 <br/><br/>";
				?>
				<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_pembayaransiswa/aksi_pembayaransiswa.php?module=pembayaransiswa&act=updatepembayaransiswa' role="form">
				
				<input type=hidden name='idsiswa' value='<?php echo $r[id_siswa]; ?>'>
				<input type=hidden name='idkelas' value='<?php echo $r[id_kelas]; ?>'>
				<input type=hidden name='idbiaya' value='<?php echo $biaya[id_biaya]; ?>'>
				
					<table class="table table-striped table-bordered"> 
					<tr><th>Angsuran Ke</th><th> Tagihan</th><th> Tanggal Terlambat</th><th>Tanggal Bayar</th><th>Jumlah Bayar</th></tr>
			
				<?php
					$caribiayadetail = mysql_query("SELECT * FROM biayapendidikandetail 
							WHERE id_biaya='$biaya[id_biaya]' order by id_detailbiaya ASC"); 
					
					while($biayadetail = mysql_fetch_array($caribiayadetail)) {
						
						$caripembayaran = mysql_query("SELECT * FROM pembayaransiswa 
							WHERE id_siswa='$_GET[id]' 
							AND id_biaya='$biaya[id_biaya]' 
							AND angsuran_ke='$biayadetail[angsuran_ke]'"); 
					
						$pembayaran= mysql_fetch_array($caripembayaran);
						if($pembayaran[tgl_bayar]=="0000-00-00") { $pembayaran[tgl_bayar]=""; } else { $pembayaran[tgl_bayar]=$pembayaran[tgl_bayar]; }
						
						if($pembayaran[jumlah_bayar]=="0") { $pembayaran[jumlah_bayar]=""; } else { $pembayaran[jumlah_bayar]=$pembayaran[jumlah_bayar]; } 
						echo "<tr>
								<td align='center'>$biayadetail[angsuran_ke]</td>
								<td align='center'> ".format_rupiah($biayadetail[tagihan])."</td>
								<td align='center'> $biayadetail[tgl_terlambat]</td>
								<td> 
								<input type='hidden' class='form-control' name='idpembayaran[]' value='$pembayaran[id_pembayaran]'>
								<input type='text' class='date-picker form-control' name='tglbayar[]' value='$pembayaran[tgl_bayar]' data-date-format='yyyy-mm-dd'></td>
								<td> <input type='text' class='form-control' name='jumlahbayar[]' value='$pembayaran[jumlah_bayar]'></td>
							</tr>";
					}
				?>
				
					</table>
					
					<input type="submit" class="btn btn-success pull-right" value="SIMPAN">
				
				</form>
					 
				<?php	 
				echo "</div>";
				$x++;
			}
			
			?>
				
				
				 
			</div>
		</div>
		<!-- /.card-block -->
	</div>
	<!-- /.card -->
                        
	
	
	 <br/>	 <br/>
	 
	
	
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
