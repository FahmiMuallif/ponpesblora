<style type="text/css">
.datetimepicker {
	background-color:#FFF !important;	
 
}
</style>
<?php

include "../config/fungsi_indotgl.php";

switch($_GET[act]){
  // Tampil jadwalpesantren
  default:
  	
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
	  <nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li>
					<li>Kelola Tata Tertib Pesantren</li>  
                           
                     </ul>


            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
 		
		<h2 class='heading_a'>Edit Tata Tertib Santri <small> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?> </small></h2> 
		
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./aksi.php?module=tatatertib&act=update' role="form">
	<input type=hidden name=id value='<?php echo $r[id_tatatertib]; ?>'>
  
    
   
    <div class="form-group" >
		<label for="isi_jadwalpesantren" class="col-sm-3 control-label">Isi Tata Tertib</label>
		<div class="col-sm-8">
		<textarea name="isi" class="form-control validate[required]" id="isi_jadwalpesantren" placeholder="Isi" rows="8">
		<?php echo $r[isi_tatatertib];?>
		</textarea>
		</div>
	</div>
	
	<div class='form-group'>
				<label class='col-sm-3 control-label no-padding-right' > File Tata Tertib</label>
				<div class='col-sm-8'>
						<?php
						if($r[file_tatatertib]==""){
							echo "-";
						} else {
							echo "<a href='../file/$r[file_tatatertib]' target='_blank'>$r[file_tatatertib]</a>";
						}
						?>
					     <input type=file name='fupload' > <br/> 
						 <input type=hidden name='filelama' value="<?php echo $r[file_tatatertib]; ?>" >  
				</div>
			</div> 
			
			
	<div class="form-group">
    	<div class="col-sm-offset-3 col-sm-9">
      		<input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
    	</div>
  	</div>
	
	</form>
	
	<br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> 
	
	</div>
				</div>
            </div>
            </div>
     </div>
	 
	 <?php
    break;
 
 
}
?>
