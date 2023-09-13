 
		
<?php
switch($_GET[act]){

  default:
  
       echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pengguna</h1>
                        <p class="title-description"> Tambah, Edit, Hapus Pengguna</p>
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
						   <input type=button class='btn btn-success' value='Tambah Pengguna' onclick=location.href='?module=pengguna&act=tambahpengguna'>
					</div>
					 
					<div class='col-sm-4'>
						 <div align='right'>
 
						 </div>
					</div>
				</div>
				 
				<div class='table-responsive' >  ";
				
     
	 
		  
	echo "   
		  <table id='sample-table-1' class='table table-striped table-hovered'>
		   <thead>
			  <tr>
				  <th width=50>no</th> 
				  <th>nama pengguna</th>
				  <th>alamat</th>
				  <th>notelp</th>
				  <th>hak akses</th>
				  <th>status</th>
				  <th width=150>aksi</th>
			 </tr> 
           </thead> <tbody>";
        
    $tampil=mysql_query("SELECT * FROM pengguna ORDER BY id_pengguna DESC"); 
	 
	 
    $no= 1; 
    while ($r=mysql_fetch_array($tampil)){
		if($r[status]=="Aktif") {
			$r[status]="<label class='text-success'>Aktif</label>";
		} else {
			$r[status]="<label class='text-danger'>Non Aktif</label>";
		}
		
		
       echo "<tr><td align=center>$no</td> 
				<td >$r[nama_lengkap]</td>
				<td >$r[alamat]</td>
				<td >$r[notelp]</td>
				<td align=center>$r[hak_akses]</td>
				<td align=center>$r[status]</td>
             <td><a href='?module=pengguna&act=editpengguna&id=$r[id_pengguna]' class='btn btn-sm btn-warning' title='Edit'> Edit </a>  "; ?>
			 
	                <form method="POST" action="./modul/mod_pengguna/aksi_pengguna.php?module=pengguna&act=hapus_pengguna&id=<?php echo $r[id_pengguna]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus pengguna" data-message="Apakah Anda Yakin Akan Menghapus Data pengguna dengan Nama <?php echo $r[nama_lengkap];?> ?"> Hapus
    				</button>
				</form>
				   <?php echo "</td></tr>";
      $no++;
    }
    echo " </tbody> 
    	</table>";
		
		 
 
					
					
	echo "</div>
		 
	 	 </section>
	</div>
    </section>
	</article>
	";
	
	
    break;







  case "tambahpengguna":
  ?>
  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pengguna</h1>
                        <p class="title-description"> Tambah Pengguna</p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
		  
	<form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./modul/mod_pengguna/aksi_pengguna.php?module=pengguna&act=input' role="form" parsley-validate>
	
 
	
 
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
		<div class="col-sm-4">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama Lengkap" >
		</div>
	</div>
	
	<div class='form-group row'>
		<label class='col-sm-3 control-label' > Jenis Kelamin </label>
		<div class='col-sm-4'>
				<select name="jk"  class='form-control required'>
					<option value="">-- Pilih Jenis Kelamin --</option>
					<option value="Laki-laki" >Laki-laki</option>
					<option value="Perempuan" >Perempuan</option>
				</select>
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-3 control-label">Alamat</label>
		<div class="col-sm-4">
		<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Nomor Telpon</label>
		<div class="col-sm-4">
		<input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telpon" >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="email" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Username</label>
		<div class="col-sm-4">
		<input type="text" name="username" class="form-control" id="notelp" placeholder="Username" >
		
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Password</label>
		<div class="col-sm-4">
		<input type="text" name="password" class="form-control" id="notelp" placeholder="Password" >
		
		</div>
	</div>
	
	<div class='form-group row'>
		<label class='col-sm-3 control-label' > Hak Akses </label>
		<div class='col-sm-4'>
				<select name="hakakses"  class='form-control required'>
					<option value="">-- Pilih Hak Akses --</option>
					<option value="Superadmin" >Superadmin</option>
					<option value="Administrasi" >Administrasi</option>
					<option value="Keuangan" >Keuangan</option>
				</select>
		</div>
	</div>
	
	
	
	
	<div class="form-group row" >
		<label for="email" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
		</div>
	</div>
	
	
	
	
	<div class="form-group row" >
		<label for="email" class="col-sm-3 control-label">Foto</label>
		<div class="col-sm-7">
		<input type="file" name="fupload" id="foto" placeholder="Foto">
		</div>
	</div>
	
	
	 
	
	<div class="form-group row" >
		<label for="password" class="col-sm-3 control-label"></label>
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

	
	
	
	
	
	
	
  case "editpengguna":
    $edit = mysql_query("SELECT * FROM pengguna WHERE id_pengguna='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
	
	
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pengguna</h1>
                        <p class="title-description"> Edit Pengguna</p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		
		
		
	<form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./modul/mod_pengguna/aksi_pengguna.php?module=pengguna&act=update' role="form" parsley-validate>
	
          <input type=hidden name=id value='<?php echo $r[id_pengguna]; ?>'>
		  
		  
	 
	
  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
		<div class="col-sm-4">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama pengguna" value="<?php echo $r[nama_lengkap]; ?>" >
		</div>
	</div>
	
	
	
		<div class='form-group row'>
		<label class='col-sm-3 control-label' > Jenis Kelamin </label>
		<div class='col-sm-4'>
				<select name="jk"  class='form-control required'>
					<option value="">-- Pilih Jenis Kelamin --</option>
					<option value="Laki-laki" <?php if ($r[jenis_kelamin]=="Laki-laki") { echo "selected=selected"; } else { echo ""; } ?> >Laki-laki</option>
					<option value="Perempuan" <?php if ($r[jenis_kelamin]=="Perempuan") { echo "selected=selected"; } else { echo ""; } ?>>Perempuan</option>
				</select>
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-3 control-label">Alamat</label>
		<div class="col-sm-4">
		<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo $r[alamat]; ?>" >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Nomor Telpon</label>
		<div class="col-sm-4">
		<input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telpon" value="<?php echo $r[notelp]; ?>">
		</div>
	</div>
	
 
	<div class="form-group row" >
		<label for="email" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Username</label>
		<div class="col-sm-4">
		<input type="text" name="username" class="form-control" id="notelp" placeholder="Username" value="<?php echo $r[username]; ?>">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Password</label>
		<div class="col-sm-4">
		<input type="text" name="passwordbaru" class="form-control" id="notelp" placeholder="Password" value="">
		<br/>
		*) Kosongkan, apabila password tidak diubah.
		<input type="hidden" name="passwordlama" class="form-control" value="<?php echo $r[password]; ?>">
		
		</div>
	</div>
	
	
	
	<div class='form-group row'>
		<label class='col-sm-3 control-label' > Hak Akses </label>
		<div class='col-sm-4'>
				<select name="hakakses"  class='form-control required'>
					<option value="">-- Pilih Hak Akses --</option>
					<option value="Superadmin" <?php if ($r[hak_akses]=="Superadmin") { echo "selected=selected"; } else { echo ""; } ?>>Superadmin</option>
					<option value="Administrasi" <?php if ($r[hak_akses]=="Administrasi") { echo "selected=selected"; } else { echo ""; } ?>>Administrasi</option>
					<option value="Keuangan" <?php if ($r[hak_akses]=="Keuangan") { echo "selected=selected"; } else { echo ""; } ?>>Keuangan</option>
				</select>
		</div>
	</div>
	
	
	<div class='form-group row'>
		<label class='col-sm-3 control-label' > Status </label>
		<div class='col-sm-4'>
				<select name="status"  class='form-control required'>
					<option value="">-- Pilih Status --</option>
					<option value="Aktif" <?php if ($r[status]=="Aktif") { echo "selected=selected"; } else { echo ""; } ?>>Aktif</option>
					<option value="Non Aktif" <?php if ($r[status]=="Non Aktif") { echo "selected=selected"; } else { echo ""; } ?>>Non Aktif</option> 
				</select>
		</div>
	</div>
	
	
	
	<div class="form-group row" >
		<label for="email" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
		</div>
	</div>
	
	
		<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Foto </label>
				<div class='col-sm-7'>
						<?php
						if($r[foto]==""){
							echo "<img src='../upload/foto_pengguna/noimage.jpg' width=200>";
						} else {
							echo "<img src='../upload/foto_pengguna/$r[foto]' width=200>";
						}
						?>
					     <br/> <input type=file name='fupload' > <br/>
						 *) Kosongkan, apabila foto tidak diubah.
						 <input type="hidden" name="fotolama"  value='<?php echo $r[foto]; ?>' >
				</div>
			</div>
			
	
	<div class="form-group row" >
		<label for="password" class="col-sm-3 control-label"></label>
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
