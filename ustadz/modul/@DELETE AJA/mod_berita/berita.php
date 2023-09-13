 

<?php
switch($_GET[act]){
  // Tampil Berita
  default:
  	
	 	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Berita </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Berita </p>
                    </div>
                    <section class="section">
                      
	';
	
	
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
	 
	 
    echo "
		  <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
					
					
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						<input type=button class='btn btn-success' value='Tambah Berita' onclick=location.href='?module=berita&act=tambahberita'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				
				
				
		 
		 <div class='table-responsive'>
		  <table id='sample-table-1' class='table table-striped table-hovered'>
		<thead>
		 <tr><th width=50>No</th>
				<th>Judul</th>
				<th width=150>Tgl. Posting</th>
				<th width=150>Aksi</th>
			</tr>
		</thead>";

   
     
    $tampil = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC "); 
	 
    $no= 1; 
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td align=center>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=berita&act=editberita&id=$r[id_berita] class='btn btn-sm btn-warning' title='Edit'>Edit </a> "; ?>
	                
				   
				 
			  <form method="POST" action="./modul/mod_berita/aksi_berita.php?module=berita&act=hapus&id=<?php echo $r['id_berita']; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Berita" data-message="Apakah Anda Yakin Akan Menghapus Berita Dengan Judul <?php echo $r[judul];?> ?">
        			Hapus
    				</button>
				</form>
			 
				   
				   <?php echo "</td>
		        </tr>";
      $no++;
    }
    echo "</table>";
	
	 
					
	 
					
	echo "</div>
		 
	 </section>
	</div>
    </section>
	</article>
	";
	
  
    
    break;
  
  
  
  
  
  
  
  
  
  
  
  case "tambahberita":
  
  ?>
   
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Berita </h1>
                        <p class="title-description"> Tambah Berita  </p>
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
										

  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_berita/aksi_berita.php?module=berita&act=input' role="form" parsley-validate>

  
  
   <div class="form-group row">
		<label for="Judul" class="col-sm-3 control-label">Judul Berita</label>
		<div class="col-sm-6">
		<input type="text" name="judul" class="form-control required" id="judul" placeholder=" Judul Berita">
		</div>
	</div>
   
    <div class="form-group row" >
		<label for="isi_berita" class="col-sm-3 control-label">Isi Berita</label>
		<div class="col-sm-8">
		<textarea name="isi_berita" class="form-control required" id="isi_berita" placeholder=" Isi Berita" rows="8"></textarea>
		</div>
	</div>

         
	<div class="form-group row" >
		<label for="File" class="col-sm-3 control-label">Gambar</label>
		<div class="col-sm-4">
		<input type="file" name="fupload"  id="file" placeholder="">
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="File" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
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
		  
	<?php
     break;
	 
	 
	 
	 
	 
	 
    
  case "editberita":
    $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
	   <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Berita </h1>
                        <p class="title-description"> Edit Berita  </p>
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
										
										
	
	
 
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_berita/aksi_berita.php?module=berita&act=update' role="form">
	<input type=hidden name=id value='<?php echo $r[id_berita]; ?>'>
  
  
   <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Judul Berita</label>
		<div class="col-sm-6">
		<input type="text" name="judul" class="form-control validate[required]" id="judul" placeholder="Judul Berita" value="<?php echo $r[judul];?>">
		</div>
	</div>
   
    <div class="form-group row" >
		<label for="isi_berita" class="col-sm-3 control-label">Isi Berita</label>
		<div class="col-sm-8">
		<textarea name="isi_berita" class="form-control validate[required]" id="isi_berita" placeholder="isi_berita" rows="8"><?php echo trim($r[isi_berita]);?></textarea>
		</div>
	</div>

         
	<div class="form-group row" >
		<label for="File" class="col-sm-3 control-label">Gambar</label>
		<div class="col-sm-4"> 
		<?php
		if ($r[gambar]!="") 
		{
			echo "<img src='../upload/foto_berita/".$r[gambar]."' width='200px' class='img-thumbnail' >";
		} else {
			// do nothing
		}
		 ?><br />
		<input type="file" name="fupload"  id="file" placeholder="">
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
	
	<?php
    break;  
}
?>
