 

<?php
switch($_GET[act]){
 
  default: 
 
		 
		   echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Tabungan Siswa </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Tabungan Siswa</p>
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
						<form method='POST' action='dashboard.php?module=tabungan' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder='Nama Siswa ' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-success' type='button' style='height:34px; border-radius:0px 4px 4px 0px;'><span class='input-group-btn'></span>Cari</button></span>
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
			  <th>nama siswa</th>
			  <th>tingkat</th>
			  <th>kelas</th>
			  <th>saldo</th>
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
		
		$caritabungan = mysql_query("SELECT * FROM tabungan 
		WHERE tahunajaran='$_SESSION[tahunajaran]' 
		AND id_siswa='$r[id_siswa]'
		AND id_kelas='$r[id_kelas]' ");
		
		$debet=0;
		$kredit=0;
		$saldo=0;
		 while($t=mysql_fetch_array($caritabungan)){
			if($t[jenis_transaksi]=="debet") {
				$debet=$debet+$t[jumlah];
			} else if($t[jenis_transaksi]=="kredit") {
				$kredit=$kredit+$t[jumlah];
			}
			
		 }
		
		$saldo = $debet-$kredit;
		 
		
      echo "<tr><td align=center>$no</td>
                <td align=center>$r[nis]</td> 
                <td >$r[nama_lengkap]</td>
				<td align=center>$r[tingkat]</td>
                <td align=center>$r[namakelas]</td> 
				<td align=center>".format_rupiah($saldo)."</td> 
               <td> <a href=?module=tabungan&act=kelolapembayaran&id=$r[id_siswa] class='btn btn-sm btn-success' title='Kelola'>  Kelola Tabungan</a> ";     
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
                        <h1 class="title"> Kelola Tabungan Siswa </h1>
                        <p class="title-description"> Tabungan Siswa '.$r[nama_lengkap].'</p>
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
					<section class='example'>  ";
				
	?>

  
		  
		  
		 <h5> DATA SISWA </h5>
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
	
<div class='col-lg-6'>	
<h5> TRANSAKSI TABUNGAN </h5>  <br/>
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_tabungan/aksi_tabungan.php?module=tabungan&act=tambahtabungan' role="form" parsley-validate>
	<input type=hidden name='idsiswa' size=40 value='<?php echo $r[id_siswa]; ?>'>
	<input type=hidden name='idkelas' size=40 value='<?php echo $r[id_kelas]; ?>'>
	<input type=hidden name='tahunajaran' size=40 value='<?php echo $_SESSION[tahunajaran]; ?>'>
	
	
	
	<div class="form-group row" >
			<label for="namakelas" class="col-sm-4 control-label">Tanggal </label>
			<div class="col-sm-7">
			<input type="text" name="tgl" class="form-control date-picker required" id="namakelas" placeholder="Nama Kelas" value='<?php echo date('Y-m-d'); ?>'>
			</div>
		</div>
		
	<div class="form-group row" >
			<label for="namakelas" class="col-sm-4 control-label">Jenis Transaksi</label>
			<div class="col-sm-7">
			<select name="jenis" class="form-control">
				<option value="debet">Setoran Tabungan</option>
				<option value="kredit">Pengambilan Tabungan</option>
			</select>
		</div>
	</div>
		
	<div class="form-group row" >
			<label for="namakelas" class="col-sm-4 control-label">Jumlah</label>
			<div class="col-sm-7">
				<input type="number" name="jumlah" class="form-control required" id="namakelas" placeholder="Jumlah" min="0" value=''>
			</div>
		</div>
		
		
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-4 control-label"> </label>
		<div class="col-sm-7">
		 <input type="submit" class="btn  btn-success" value="Simpan">
		</div>
	</div>
	
	
	
	</form>
	
	
	 <br/>	 <br/>
</div>




<div class='col-lg-12'>	


	 
		 <table class="table table-striped table-bordered"> 
			<tr>
				<th>No</th>
				<th>Tgl Transaksi</th>
				<th>Jenis Transaksi</th>
				<th>Jumlah </th>
				<th>Saldo</th>
				<th>Aksi</th>
			</tr>
			
			<?php 
			
			 
			$caritabungan = mysql_query("SELECT * FROM tabungan 
		WHERE tahunajaran='$_SESSION[tahunajaran]' 
		AND id_siswa='$r[id_siswa]'
		AND id_kelas='$r[id_kelas]' ");
		
		
			$no=1;
			while($t = mysql_fetch_array($caritabungan)) {
				 
				  
					if($t[jenis_transaksi]=="debet") {
						$debet=$debet+$t[jumlah];
					} else if($t[jenis_transaksi]=="kredit") {
						$kredit=$kredit+$t[jumlah];
					}
					
				  
				$saldo = $debet-$kredit;
		
				echo "<tr>
						<td align=center>$no</td>
						<td align=center>$t[tgl_transaksi]</td>
						<td align=center>$t[jenis_transaksi]</td>
						<td align=center>".format_rupiah($t[jumlah])."</td>
						<td align=center>".format_rupiah($saldo)."</td> <td align=center>";
						
					?>

					 <form method="POST" action="modul/mod_tabungan/aksi_tabungan.php?module=tabungan&act=hapustabungan&id=<?php echo $t[id_tabungan]; ?>&ids=<?php echo $r[id_siswa]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Transaksi Tabungan" data-message="Apakah Anda Yakin Akan Menghapus Data Transaksi Tabungan Terpilih?">
        			Hapus
    				</button>
				</form>
				
					<?php 
						
				echo "</td></tr>"; 
				$no++;
				
			}
			
			
			?>
			
		 </table>
		 
		 
		 
		  <br/>	  
		  
 </div>
	
	
	
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
