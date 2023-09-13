 
<?php

 

switch($_GET[act]){
  // Tampil ruang
  default:
  	
     echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Ruangan </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Ruangan</p>
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
						   <input type=button class='btn btn-success' value='Tambah Ruangan' onclick=location.href='?module=ruang&act=tambahruang'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				<div class='table-responsive'>  ";
	
	
		  
        echo "  <div class='table-responsive'>
		  <table id='sample-table-1' class='table table-striped table-hovered'>
          <thead>
		  <tr>
			<th>no</th>
			<th>Nama Ruangan</th>
			<th>Keterangan</th> 
			<th width=160>aksi</th></tr>
		  </thead> <tbody>";

   
 
  $tampil = mysql_query("SELECT * FROM ruang ORDER BY id_ruang DESC");
	 
	
    $no= 1;  
    while($r=mysql_fetch_array($tampil)){
		
		 
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td align='center'>$no</td> 
                <td>$r[nama_ruang]</td>
                <td>$r[keterangan]</td>  
		        <td align='center'><a href=?module=ruang&act=editruang&id=$r[id_ruang] class='btn btn-sm  btn-warning' title='Edit'><span class='glyphicon glyphicon-edit'></span> Edit</a> "; ?>
	              
				   
				     <form method="POST" action="./modul/mod_ruang/aksi_ruang.php?module=ruang&act=hapus&id=<?php echo $r['id_ruang']; ?>"   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Ruangan" data-message="Apakah Anda Yakin Akan Menghapus Ruangan <?php echo $r[nama_ruang];?> ?">
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
  
  
  
  
  case "tambahruang":
  
  ?>
  
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Ruangan</h1>
                        <p class="title-description"> Tambah Ruangan  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_ruang/aksi_ruang.php?module=ruang&act=input' role="form" parsley-validate>

 

 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Ruangan</label>
		<div class="col-sm-6">
		<input type="text" name="namaruang" class="form-control required" placeholder="Nama Ruangan">
		</div>
	</div>
	

	
   
   
    <div class="form-group row" >
		<label for="isi_ruang" class="col-sm-3 control-label">Keterangan</label>
		<div class="col-sm-8">
		<textarea name="keterangan" class="form-control required"  placeholder="Keterangan" rows="8"></textarea>
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
	 
	 
	 
	 
	 
	 
	 
    
  case "editruang":
    $edit = mysql_query("SELECT * FROM ruang WHERE id_ruang='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
 
 
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Ruangan</h1>
                        <p class="title-description"> Edit Ruangan  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_ruang/aksi_ruang.php?module=ruang&act=update' role="form" parsley-validate>
	<input type=hidden name=id value='<?php echo $r[id_ruang]; ?>'>
  
   
  

 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Ruangan</label>
		<div class="col-sm-6">
		<input type="text" name="namaruang" class="form-control required" placeholder="Nama Ruangan" value="<?php echo $r[nama_ruang]; ?>">
		</div>
	</div>
	
 
   
   
    <div class="form-group row" >
		<label for="isi_ruang" class="col-sm-3 control-label">Keterangan</label>
		<div class="col-sm-8">
		<textarea name="keterangan" class="form-control required"  placeholder="Keterangan" rows="8"><?php echo $r[keterangan]; ?></textarea>
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
