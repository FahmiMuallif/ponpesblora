 
<?php
 
 
$aksi="modul/mod_profil/aksi_profil.php";
switch($_GET[act]){
  // Tampil profil
  default:
  
 
    $edit = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
    $r    = mysql_fetch_array($edit);

	
    
  echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Profil Aplikasi </h1>
                        <p class="title-description"> Edit Profil Aplikasi </p>
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
	 
	
    echo "   <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>";
					

	 
	 
	
echo "<form method=POST enctype='multipart/form-data' action='$aksi?module=profil&act=update' class='form-horizontal' parsley-validate > 
       
		 
		<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Nama Aplikasi </label>
				<div class='col-sm-7'>
					   <input type=text name='namaaplikasi' class='form-control required' value='$r[nama_aplikasi]'>  
				</div>
			</div>
		
		
		<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Nama Pondok Pesantren </label>
				<div class='col-sm-7'>
					   <input type=text name='namaponpes' class='form-control required' value='$r[nama_ponpes]'>  
				</div>
			</div>
		
		
			
			
			<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Alamat </label>
				<div class='col-sm-7'>
					   <input type=text name='alamat' class='form-control required' value='$r[alamat]'>  
				</div>
			</div>
			
			<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Nomor Telpon </label>
				<div class='col-sm-7'>
					   <input type=text name='notelp' class='form-control required' value='$r[notelp]'>  
				</div>
			</div>
			
				<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Email</label>
				<div class='col-sm-7'>
					   <input type=text name='email' class='form-control required' value='$r[email]'>  
				</div>
			</div>
			
			 
		 ";
			
		?>

		
			<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Logo</label>
				<div class='col-sm-7'>
						<?php 
							if ($r[logo]=="") {
								echo "";
							} else {
								echo "<img src='../upload/$r[logo]' width=200px>";
							} 
						?>
						<br/>
					     <input type=file name='fupload' >
						 <input type='hidden' name='logolama' value='<?php echo $r[logo]; ?>' ><br/>
						 *) Apabila gambar tidak diubah, dikosongkan saja.
				</div>
			</div>
			
			
			 
			 <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Tentang Kami  </label>
				<div class='col-sm-7'>
					    
					   <textarea name='tentangkami' class='form-control required'  ><?php echo $r['tentangkami']; ?></textarea>
				</div>
			</div>
			

			
			
          <div class='form-group'>
				<label class='col-sm-3 control-label no-padding-right' >  </label>
				<div class='col-sm-7'>
					      <input type=submit value=Simpan class='btn btn-success btn-flat'>
						 <input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-flat'> 
						
                            
				</div>
			</div>	
			
			
         </form>  

</div> <!-- end box body -->
	<div class='box-footer clearfix no-border'>
	 
	
	</div> 
</div> <!-- end-box-->

	</div>
	</div>
	</div>
	</section> 
	
	<?php
    break;  
	
 
   
}
 
?>
