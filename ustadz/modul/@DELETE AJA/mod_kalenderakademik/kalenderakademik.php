 
		
<?php

 
switch($_GET[act]){
  // Tampil kalenderakademik
  default:
  
   	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kalender Akademik </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Kalender Akademik </p>
                    </div>
                    <section class="section">
                      
	';
	 
		  
	if($_SESSION[gagal] !="") {
		echo "<div class='alert alert-danger alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[gagal];
		 $_SESSION[gagal]="";   
		echo "</div>";
	
	} else if($_SESSION[sukses] !="") {
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span>
			  <span class='sr-only'>Close</span></button>";
		 echo $_SESSION[sukses];
		 $_SESSION[sukses]="";   
		echo "</div>";
	}	   
	
  	
   
	echo "
		  <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
					
					
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						<input type=button class='btn btn-success' value='Tambah Kalender Akademik' onclick=location.href='?module=kalenderakademik&act=tambahkalenderakademik'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				
				
				
		 
		 <div class='table-responsive'>
		  <table id='sample-table-1' class='table table-striped table-hovered'>
          <thead>
		  <tr><th>no</th>
			<th>Nama Kegiatan</th>
			<th width=140>Tgl Mulai</th>
			<th width=140>Tgl Selesai</th>
			<th width=160>aksi</th>
		  </tr>
		  </thead> <tbody>";

   
 
    $tampil = mysql_query("SELECT * FROM kalenderakademik WHERE tahunajaran='$_SESSION[tahunajaran]'  ORDER BY tgl_mulai DESC");
   
	
    $no= 1; 
    while($r=mysql_fetch_array($tampil)){
		
		 
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td align='center'>$no</td>
                <td>$r[nama_kegiatan]</td>
                <td>".tgl_indo($r[tgl_mulai])."</td>
				 <td>".tgl_indo($r[tgl_selesai])."</td>
		            <td><a href=?module=kalenderakademik&act=editkalenderakademik&id=$r[id_kalenderakademik] class='btn btn-sm btn-warning' title='Edit'>Edit</a> "; ?>
	              
				   
				     <form method="POST" action="aksi.php?module=kalenderakademik&act=hapus&id=<?php echo $r['id_kalenderakademik']; ?>"   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Kalender Akademik" data-message="Apakah Anda Yakin Akan Menghapus Kegiatan <?php echo $r[nama_kegiatan];?> ?">
        			Hapus
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
  
  
  
  
  case "tambahkalenderakademik":
  
  ?>
  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kalender Akademik </h1>
                        <p class="title-description"> Tambah Kalender Akademik  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
   
 		 
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_kalenderakademik/aksi_kalenderakademik.php?module=kalenderakademik&act=input' role="form" parsley-validate>

  
  
   <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Kegiatan</label>
		<div class="col-sm-6">
		<input type="text" name="judul" class="form-control validate[required]" id="judul" placeholder="Nama Kegiatan">
		</div>
	</div>
   
    <div class="form-group row" >
		<label for="isi_kalenderakademik" class="col-sm-3 control-label">Deskripsi</label>
		<div class="col-sm-8">
		<textarea name="isi_kalenderakademik" class="form-control validate[required]" id="isi_kalenderakademik" placeholder="Keterangan" rows="8"></textarea>
		</div>
	</div>

         
	 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tanggal Mulai</label>
		<div class="col-sm-4">
		<input type="text" name="tglmulai" class="datepicker-input  form-control required date-picker" id="tanggal" data-date-format="yyyy-mm-dd"  placeholder="Tanggal Mulai">
		</div>
	</div>
	
	 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tanggal Selesai</label>
		<div class="col-sm-4">
		<input type="text" name="tglselesai" class="datepicker-input form-control date-picker" id="tanggal"  data-date-format="yyyy-mm-dd"  placeholder="Tanggal Selesai">
		</div>
	</div>
	
			
			
		<div class="form-group row" >
		<label for="File" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		 <input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
			<input type=button value=Batal onclick=self.history.back() class="btn btn-warning"> 
		</div>
	</div>
	
	</form>
	
  </section>
	</div>
    </section>
	</article>
		  
		  <div class='clearfix'></div>
	<br/> <br/> <br/> <br/> <br/><br/>
		  
	<?php
     break;
	 
	 
	 
	 
	 
	 
	 
    
  case "editkalenderakademik":
    $edit = mysql_query("SELECT * FROM kalenderakademik WHERE id_kalenderakademik='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
 
 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kalender Akademik </h1>
                        <p class="title-description"> Edit Kalender Akademik  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
		
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_kalenderakademik/aksi_kalenderakademik.php?module=kalenderakademik&act=update' role="form">
	<input type=hidden name=id value='<?php echo $r[id_kalenderakademik]; ?>'>
  
  
   <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Kegiatan</label>
		<div class="col-sm-6">
		<input type="text" name="judul" class="form-control validate[required]" id="judul" placeholder="Nama Kegiatan" value="<?php echo $r[nama_kegiatan];?>">
		</div>
	</div>
   
    <div class="form-group row" >
		<label for="isi_kalenderakademik" class="col-sm-3 control-label">Deskripsi</label>
		<div class="col-sm-8">
		<textarea name="isi_kalenderakademik" class="form-control validate[required]" id="isi_kalenderakademik" placeholder="Keterangan" rows="8"><?php echo $r[deskripsi_kegiatan];?></textarea>
		</div>
	</div>

         
		 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tanggal Mulai</label>
		<div class="col-sm-4">
		<input type="text" name="tglmulai" class="datepicker-input form-control required date-picker" id="tanggal" placeholder="Tanggal Mulai" value="<?php echo $r[tgl_mulai];?>"  data-date-format="yyyy-mm-dd" >
		</div>
	</div>
	
	 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tanggal Selesai</label>
		<div class="col-sm-4">
		<input type="text" name="tglselesai" class="datepicker-input form-control required date-picker" id="tanggal" placeholder="Tanggal Selesai" value="<?php echo $r[tgl_selesai];?>"  data-date-format="yyyy-mm-dd" >
		</div>
	</div>
	 
			
			
	<div class="form-group row" >
		<label for="File" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		 <input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
			<input type=button value=Batal onclick=self.history.back() class="btn btn-warning"> 
		</div>
	</div>
	
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
