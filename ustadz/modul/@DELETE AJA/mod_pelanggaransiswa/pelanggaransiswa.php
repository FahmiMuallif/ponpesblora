<?php
switch($_GET[act]){
 
  default: 
    echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pelanggaran Santri </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Pelanggaran Santri</p>
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
						   <input type=button class='btn btn-success' value='Tambah Pelanggaran Santri' onclick=location.href='?module=pelanggaransiswa&act=tambahpelanggaran'>
					</div>
					 
					<div class='col-sm-4'>
						  
					</div>
				</div>
				<div class='table-responsive' >  ";
		
		 
	    
	
          echo " 
		  <table id='sample-table-1'  class='table table-striped table-hovered'>
		  <thead>
          <tr><th width=20>no</th> 
		  <th>tgl pelanggaran</th> 
		  <th>nama santri</th>
		  <th>pelanggaran</th>
		  <th>Catatan</th> 
		  <th width=150>aksi</th>
		  </tr></thead><tbody>";
 

    $tampil = mysql_query("SELECT * FROM pelanggaransantri, siswa, jenispelanggaran
							WHERE pelanggaransantri.id_siswa=siswa.id_siswa 
							AND pelanggaransantri.id_jenispelanggaran=jenispelanggaran.id_jenispelanggaran 
							AND pelanggaransantri.tahunajaran='$_SESSION[tahunajaran]' 
							ORDER BY pelanggaransantri.id_pelanggaran DESC  ");
  
     
    $no= 1; 
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td> 
				<td >".tgl_indo($r[tgl_pelanggaran])."</td>
                <td >$r[nama_lengkap]</td> 
				<td >$r[nama_pelanggaran]</td>
				<td ><b>Tipe pelanggan </b>: $r[tipe_pelanggaran]<br/>
				<b>Sanksi </b>: $r[sanksi]<br/>
				<b>Pemberi sanksi </b>: $r[pemberi_sanksi]<br/>
				<b>Pembinaan atau feedback </b>: $r[catatan]</td>
               <td> <a href=?module=pelanggaransiswa&act=editpelanggaran&id=$r[id_pelanggaran] class='btn btn-sm btn-warning' title='Edit'> Edit</a> "; ?>
			   
 
				
				
				 <form method="POST" action="aksi.php?module=pelanggaransiswa&act=hapus_pelanggaran&id=<?php echo $r[id_pelanggaran]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Pelanggran" data-message="Apakah Anda Yakin Akan Menghapus Data Pelanggaran <?php echo $r[nama_lengkap];?> ?"> Hapus </button>
				</form>
				
		
	<?php	   
	echo  "</td> </tr>";
      $no++;
    }
	
	
    echo "</tbody></table>";
	
	  
		
		
	echo "</div>
		 
	 </section>
	</div>
    </section>
	</article>
	";
 

   
 
    break;
  
  
 
	
  
  case "tambahpelanggaran":
  ?>
 
 
 
		<article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pelanggaran Santri</h1>
                        <p class="title-description"> Tambah Pelanggaran Santri </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		  
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_pelanggaransiswa/aksi_pelanggaransiswa.php?module=pelanggaransiswa&act=input' role="form" parsley-validate>
	
	 
	
	<div class="form-group row" >
		<label for="nis" class="col-sm-3 control-label">Tanggal Pelanggaran</label>
		<div class="col-sm-4">
		<input type="text" name="tanggal" class="form-control date-picker required" id="nis" placeholder="Tanggal" data-date-format="yyyy-mm-dd" >
		</div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Nama Santri</label>
		<div class="col-sm-4">
		<?php
		 $cari = mysql_query("SELECT *, siswa.nama_lengkap as namasiswa FROM siswa, riwayatkelas, kelas 
					WHERE siswa.id_siswa=riwayatkelas.id_siswa
					AND riwayatkelas.id_kelas=kelas.id_kelas 
					AND kelas.tahunajaran='$_SESSION[tahunajaran]'  
					ORDER BY siswa.id_siswa DESC  ");
		echo "<select name='idsiswa' class='form-control  required'> ";
		echo "<option value=''> -- Pilih Santri --</option>";
		while($k=mysql_fetch_array($cari)) {
			echo "<option value='$k[id_siswa]'>$k[namasiswa]</option>";
		}
		echo "</select>";
		
		?>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-3 control-label">Jenis Pelanggaran</label>
		<div class="col-sm-6">
		 <?php
		  $tampil = mysql_query("SELECT * FROM jenispelanggaran  ORDER BY id_jenispelanggaran ASC");
      
		echo "<select name='idjenis' class='form-control  required'> ";
		echo "<option value=''> -- Pilih Pelanggaran --</option>";
		while($r=mysql_fetch_array($tampil)) {
			echo "<option value='$r[id_jenispelanggaran]'>$r[nama_pelanggaran]</option>";
		}
		echo "</select>";
		
		 
		 ?>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="nis" class="col-sm-3 control-label">Catatan </label>
		<div class=" col-lg-8"><small>Pembinaan Pengasuh Ke Santri Atau Feedback Ke Orangtua/Wali Santri</small>
		<textarea name="catatan" class="form-control" placeholder=""></textarea>
		</div>
	</div>
	
	 
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">&nbsp; </label>
		<div class="col-sm-4">
		 &nbsp; 
		 </div>
	</div>
	
	 
	 
	 
	
		<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">&nbsp; </label>
		<div class="col-sm-4">
		  <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
		  <input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()' >
			
		 </div>
	</div>
	
	
	 
	
	</form>
 
    </section>
	</div>
    </section>
	</article>

    <?php
	break;  

	
	
	
	
	
	
  case "editpelanggaran":
    $edit = mysql_query("SELECT * FROM pelanggaransantri WHERE id_pelanggaran='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>

	 
	 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pelanggaran Siswa</h1>
                        <p class="title-description"> Edit Pelanggaran Siswa </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
										 
		  
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_pelanggaransiswa/aksi_pelanggaransiswa.php?module=pelanggaransiswa&act=update' role="form" parsley-validate>
	
	 <input type="hidden" name="id" class="form-control" id="nis" placeholder="Tanggal" value="<?php echo $r[id_pelanggaran]; ?>" >
	
	<div class="form-group row" >
		<label for="nis" class="col-sm-3 control-label">Tanggal Pelanggaran</label>
		<div class="col-sm-2">
		<input type="text" name="tanggal" class="form-control date-picker required" id="nis" placeholder="Tanggal" value="<?php echo $r[tgl_pelanggaran]; ?>" data-date-format="yyyy-mm-dd">
		</div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Nama Santri</label>
		<div class="col-sm-4">
		<?php
		 $cari = mysql_query("SELECT *, siswa.nama_lengkap as namasiswa FROM siswa, riwayatkelas, kelas  
					WHERE siswa.id_siswa=riwayatkelas.id_siswa
					AND riwayatkelas.id_kelas=kelas.id_kelas 
					AND kelas.tahunajaran='$_SESSION[tahunajaran]' 
					ORDER BY siswa.id_siswa DESC  ");
		echo "<select name='idsiswa' class='form-control  required'> ";
		echo "<option value=''> -- Pilih Siswa --</option>";
		while($k=mysql_fetch_array($cari)) {
			if($k[id_siswa]==$r[id_siswa]){ $selected="selected=selected"; } else { $selected=""; }
			echo "<option value='$k[id_siswa]' $selected>$k[namasiswa]</option>";
		}
		echo "</select>";
		
		?>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-3 control-label">Jenis Pelanggaran</label>
		<div class="col-sm-6">
		 <?php
		  $tampil = mysql_query("SELECT * FROM jenispelanggaran  ORDER BY id_jenispelanggaran ASC");
      
		echo "<select name='idjenis' class='form-control  required'> ";
		echo "<option value=''> -- Pilih Pelanggaran --</option>";
		while($p=mysql_fetch_array($tampil)) {
			if($p[id_jenispelanggaran]==$r[id_jenispelanggaran]){ $selected="selected=selected"; } else { $selected=""; }
			echo "<option value='$p[id_jenispelanggaran]' $selected>$p[nama_pelanggaran]</option>";
		}
		echo "</select>";
		
		 
		 ?>
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="nis" class="col-sm-3 control-label">Catatan </label>
		<div class=" col-lg-8"><small>Pembinaan Pengasuh Ke Siswa Atau Feedback Ke Orangtua/Wali Siswa</small>
		<textarea name="catatan" class="form-control" placeholder=""><?php echo $r[catatan]; ?></textarea>
		</div>
	</div>
	
	
	
	 
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">&nbsp; </label>
		<div class="col-sm-4">
		 &nbsp; 
		 </div>
	</div>
	
	 
	 
	 
		
		<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">&nbsp; </label>
		<div class="col-sm-4">
		  <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
		  <input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()' >
			
		 </div>
	</div>
	
	
	 
	
	</form>
 
    </section>
	</div>
    </section>
	</article>

	<?php
    break;  

}
?>
