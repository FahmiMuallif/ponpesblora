 
 <?php
    $edit = mysql_query("SELECT * FROM guru WHERE id_guru='$_SESSION[idadmin]'");
    $r    = mysql_fetch_array($edit);
	?>
	
	
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Profil Pengguna</h1>
                        <p class="title-description"> Edit Data Diri dan Akun Login </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		
		
		
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
		
	<form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./modul/mod_editakun/aksi_editakun.php?module=editakun&act=update' role="form" parsley-validate>
	
          <input type=hidden name=id value='<?php echo $r[id_guru]; ?>'>
		  
		  
 
	
	
  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
		<div class="col-sm-4">
		<input type="text" name="nama_lengkap" class="form-control validate[required]" id="nama_lengkap" placeholder="Nama admin" value="<?php echo $r[nama_guru]; ?>" >
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
							echo "<img src='../upload/foto_guru/noimage.jpg' width=200>";
						} else {
							echo "<img src='../upload/foto_guru/$r[foto]' width=200>";
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
	
 