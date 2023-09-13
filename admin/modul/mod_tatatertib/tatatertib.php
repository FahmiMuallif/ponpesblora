 <?php
 

switch($_GET[act]){
  // Tampil jadwalpesantren
  default:
  	?>
	 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Edit Tata Tertib</h1>
                        <p class="title-description"> Tata Tertib Santri </p>
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
										
	
	<?php	
										
  $edit = mysql_query("SELECT * FROM tatatertibsantri WHERE tahunajaran='$_SESSION[tahunajaran]'");
  $jumlah = mysql_num_rows($edit);
  
  if($jumlah==0) {
	  mysql_query("INSERT INTO tatatertibsantri (tahunajaran) VALUES ('$_SESSION[tahunajaran]')");
	  $edit = mysql_query("SELECT * FROM tatatertibsantri WHERE tahunajaran='$_SESSION[tahunajaran]'");
	  $r    = mysql_fetch_array($edit);
  }
  else {
	$r    = mysql_fetch_array($edit);
  }
	?>
	 
            
		
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_tatatertib/aksi_tatatertib.php?module=tatatertib&act=update' role="form" parsley-validate>
	<input type=hidden name=id value='<?php echo $r[id_tatatertib]; ?>'>
  
    
   
    <div class="form-group row" >
		<label for="isi_jadwalpesantren" class="col-sm-3 control-label">Isi Tata Tertib</label>
		<div class="col-sm-8">
		<textarea name="isi" class="form-control required" id="" placeholder="Isi" rows="8"><?php echo $r[isi_tatatertib];?></textarea>
		</div>
	</div>
	
	<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > File Tata Tertib</label>
				<div class='col-sm-8'>
						<?php
						if($r[file_tatatertib]==""){
							echo "-";
						} else {
							echo "<a href='../upload/$r[file_tatatertib]' target='_blank'>$r[file_tatatertib]</a>";
						}
						?>
					     <input type=file name='fupload' > <br/> 
						 <input type=hidden name='filelama' value="<?php echo $r[file_tatatertib]; ?>" >  
				</div>
			</div> 
			
			
	   <div class="form-group row" >
		<label for="isi_jadwalpesantren" class="col-sm-3 control-label"> </label>
		<div class="col-sm-8">
			<input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
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
