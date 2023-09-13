 
<?php

 

switch($_GET[act]){
  // Tampil jenispelanggaran
  default:
  	
     echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Jenis Pelanggaran </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Jenis Pelanggaran</p>
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
						   <input type=button class='btn btn-success' value='Tambah Jenis Pelanggaran' onclick=location.href='?module=jenispelanggaran&act=tambahjenispelanggaran'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				<div class='table-responsive' >  ";
	
	
		  
        echo "  <div class='table-responsive'>
		  <table id='sample-table-1' class='table table-striped table-hovered'>
          <thead>
		  <tr><th>no</th><th>Jenis</th><th>Nama Pelanggaran</th><th>Deskripsi</th><th>Sanksi</th><th>Pemberi Sanksi</th><th width=160>aksi</th></tr>
		  </thead> <tbody>";

   
 
  $tampil = mysql_query("SELECT * FROM jenispelanggaran ORDER BY id_jenispelanggaran DESC");
	 
    $no= 1;  
    while($r=mysql_fetch_array($tampil)){
		
		 
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td align='center'>$no</td>
				<td>$r[tipe_pelanggaran]</td>
                <td>$r[nama_pelanggaran]</td>
                <td>$r[deskripsi_pelanggaran]</td>
				<td>$r[sanksi]</td>
				<td>$r[pemberi_sanksi]</td>
 
		        <td align='center'><a href=?module=jenispelanggaran&act=editjenispelanggaran&id=$r[id_jenispelanggaran] class='btn btn-sm  btn-warning' title='Edit'><span class='glyphicon glyphicon-edit'></span> Edit</a> "; ?>
	              
				   
				     <form method="POST" action="./modul/mod_jenispelanggaran/aksi_jenispelanggaran.php?module=jenispelanggaran&act=hapus&id=<?php echo $r['id_jenispelanggaran']; ?>"   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Jenis Pelanggaran" data-message="Apakah Anda Yakin Akan Menghapus Kegiatan <?php echo $r[nama_kegiatan];?> ?">
        			<span class='glyphicon glyphicon-trash'></span>Hapus
    				</button>
				</form>
				
				
				   <?php echo "</td>
		        </tr>";
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
  
  
  
  
  case "tambahjenispelanggaran":
  
  ?>
  
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Jenis Pelanggaran</h1>
                        <p class="title-description"> Tambah Jenis Pelanggaran  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_jenispelanggaran/aksi_jenispelanggaran.php?module=jenispelanggaran&act=input' role="form" parsley-validate>

	<div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tipe Pelanggaran</label>
		<div class="col-sm-6">
		<select name="tipe" class="form-control  required">
			<option value="">-- Pilih Jenis Pelanggaran --</option>
			<option value="Sangat Berat">Sangat Berat</option>
			<option value="Berat">Berat</option>
			<option value="Khusus">Khusus</option>
			<option value="Sedang">Sedang</option>
			<option value="Ringan">Ringan</option>
		</select>
		</div>
	</div>
  

 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Pelanggaran</label>
		<div class="col-sm-6">
		<input type="text" name="namapelanggaran" class="form-control required" placeholder="Nama Pelanggaran">
		</div>
	</div>
	

	
   
   
    <div class="form-group row" >
		<label for="isi_jenispelanggaran" class="col-sm-3 control-label">Deskripsi</label>
		<div class="col-sm-8">
		<textarea name="deskripsi" class="form-control validate[required]"  placeholder="Deskripsi" rows="8"></textarea>
		</div>
	</div>

         

	  <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Sanksi</label>
		<div class="col-sm-6">
		<input type="text" name="sanksi" class="form-control" placeholder="Sanksi">
		</div>
	</div>
	
	
	 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Pemberi Sanksi</label>
		<div class="col-sm-6">
		<input type="text" name="pemberisanksi" class="form-control" placeholder="Pemberi Sanksi">
		</div>
	</div>
	
	
		
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">&nbsp; </label>
		<div class="col-sm-7">
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
	 
	 
	 
	 
	 
	 
	 
    
  case "editjenispelanggaran":
    $edit = mysql_query("SELECT * FROM jenispelanggaran WHERE id_jenispelanggaran='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
 
 
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Jenis Pelanggaran</h1>
                        <p class="title-description"> Edit Jenis Pelanggaran  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_jenispelanggaran/aksi_jenispelanggaran.php?module=jenispelanggaran&act=update' role="form" parsley-validate>
	<input type=hidden name=id value='<?php echo $r[id_jenispelanggaran]; ?>'>
  
   	<div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tipe Pelanggaran</label>
		<div class="col-sm-6">
		<select name="tipe" class="form-control  required">
			<option value="Sangat Berat" <?php if($r[tipe_pelanggaran]=="Sangat Berat") { echo "selected=selected"; } else { echo ""; } ?>>Sangat Berat</option>
			<option value="Berat" <?php if($r[tipe_pelanggaran]=="Berat") { echo "selected=selected"; } else { echo ""; } ?>>Berat</option>
			<option value="Khusus" <?php if($r[tipe_pelanggaran]=="Khusus") { echo "selected=selected"; } else { echo ""; } ?>>Khusus</option>
			<option value="Sedang" <?php if($r[tipe_pelanggaran]=="Sedang") { echo "selected=selected"; } else { echo ""; } ?>>Sedang</option>
			<option value="Ringan" <?php if($r[tipe_pelanggaran]=="Ringan") { echo "selected=selected"; } else { echo ""; } ?>>Ringan</option>
		</select>
		</div>
	</div>
  

 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Pelanggaran</label>
		<div class="col-sm-6">
		<input type="text" name="namapelanggaran" class="form-control required" placeholder="Nama Pelanggaran" value="<?php echo $r[nama_pelanggaran]; ?>">
		</div>
	</div>
	
 
   
   
    <div class="form-group row" >
		<label for="isi_jenispelanggaran" class="col-sm-3 control-label">Deskripsi</label>
		<div class="col-sm-8">
		<textarea name="deskripsi" class="form-control validate[required]"  placeholder="Deskripsi" rows="8"><?php echo $r[deskripsi_pelanggaran]; ?></textarea>
		</div>
	</div>

         

	  <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Sanksi</label>
		<div class="col-sm-6">
		<input type="text" name="sanksi" class="form-control" placeholder="Sanksi" value="<?php echo $r[sanksi]; ?>">
		</div>
	</div>
	
	
	 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Pemberi Sanksi</label>
		<div class="col-sm-6">
		<input type="text" name="pemberisanksi" class="form-control" placeholder="Pemberi Sanksi" value="<?php echo $r[pemberi_sanksi]; ?>">
		</div>
	</div>
	
	
			
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">&nbsp; </label>
		<div class="col-sm-7">
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
