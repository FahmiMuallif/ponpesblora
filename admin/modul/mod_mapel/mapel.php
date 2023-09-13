<?php
switch($_GET[act]){

  default:
      echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Mata Pelajaran </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Mata Pelajaran</p>
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
						   <input type=button class='btn btn-success' value='Tambah Mata Pelajaran' onclick=location.href='?module=mapel&act=tambahmapel'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				<div class='table-responsive' >  ";
				
      
	
    $tampil = mysql_query("SELECT * FROM mapel WHERE tahunajaran='$_SESSION[tahunajaran]' ORDER BY id_mapel DESC");
	 
	
	echo " 
		  <table  id='sample-table-1' class='table table-striped table-condensed'>
		  <thead>
          <tr>
			  <th>no</th>
			  <th>Kode </th>
			  <th>nama Mata pelajaran</th> 
			   <th>tingkat</th>  
			    <th>deskripsi pencapaian</th>
			  <th width=160>aksi</th>
		  </tr>
		   </thead>
		   <tbody>"; 
		   
    $no= 1;  
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$r[kode_mapel]</td>
				<td >$r[nama_mapel]</td>
				<td align='center'>$r[tingkat]</td>  
			    <td >$r[deskripsi_pencapaian]</td>
			  
				<td align='center'><a href=?module=mapel&act=editmapel&id=$r[id_mapel] class='btn btn-sm btn-warning' title='Edit'><span class='glyphicon glyphicon-edit'></span> Edit</a>  ";
			 ?>
			 
	               
	                <form method="POST" action="./modul/mod_mapel/aksi_mapel.php?module=mapel&act=hapus&id=<?php echo $r[id_mapel]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Mata Pelajaran" data-message="Apakah Anda Yakin Akan Menghapus Data Mata Pelajaran dengan Nama <?php echo $r[nama_mapel];?> ?">
        			<span class='glyphicon glyphicon-trash'></span>Hapus
    				</button>
				</form>
				
		<?php		
         echo "</td></tr>";
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
  
  
  
  
  
  case "tambahmapel":
  ?>
  
   <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Mata Pelajaran</h1>
                        <p class="title-description"> Tambah Mata Pelajaran  </p>
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
 
		  
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_mapel/aksi_mapel.php?module=mapel&act=input' role="form" parsley-validate>
    
      	<div class="form-group row" >
		<label for="kode_mapel" class="col-sm-3 control-label">Kode Mapel</label>
		<div class="col-sm-2">
		<input type="text" name="kode_mapel" class="form-control required" id="kode_mapel" placeholder="Kode Mapel">
		</div>
	</div>
  
  	<div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label">Nama Mapel</label>
		<div class="col-sm-4">
		<input type="text" name="nama_mapel" class="form-control required" id="nama_mapel" placeholder="Nama Mapel">
		</div>
	</div>
	
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label">Tingkat</label>
			<div class="col-sm-4">
			  <select name='tingkat' class="form-control wide required"> 
				  <option value=''> -- Pilih Tingkat --</option>
				  <option value='AWALIYAH I'> AWALIYAH I</option>
				  <option value='AWALIYAH II'> AWALIYAH II</option>
				  <option value='AWALIYAH III'> AWALIYAH III</option>
				  <option value='AWALIYAH IV'> AWALIYAH IV</option> 
				  <option value='WUSTHO I'> WUSTHO I</option> 
				  <option value='WUSTHO II'> WUSTHO II</option>
				  <option value='ULYA I'> ULYA I</option> 
				  <option value='ULYA II'> ULYA II</option> 
			  </select>
			</div>
		</div>
		
		 
		
		
	<div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label">Deskripsi Pencapaian</label>
	  <div class="col-sm-6">
		<textarea  name="deskripsi" class="form-control" id="keterangan"></textarea>
		</div>
	</div>
	

	
 
	
	<div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label"></label>
		<div class="col-sm-6">
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
	 
	 
	 
	 
	 
    
  case "editmapel":
    $edit=mysql_query("SELECT * FROM mapel WHERE id_mapel='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	?>
	
	   <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Mata Pelajaran</h1>
                        <p class="title-description"> Edit Mata Pelajaran </p>
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
										
		  
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_mapel/aksi_mapel.php?module=mapel&act=update' role="form" parsley-validate>
	
  	<input type=hidden name=id_mapel value='<?php echo $r[id_mapel]; ?>'>
	
    
      	<div class="form-group row" >
		<label for="kode_mapel" class="col-sm-3 control-label">Kode Mapel</label>
		<div class="col-sm-2">
		<input type="text" name="kode_mapel" class="form-control required" id="kode_mapel" placeholder="Kode Mapel" value="<?php echo $r[kode_mapel]; ?>">
		</div>
	</div>
    
    
  	<div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label">Nama Mapel</label>
		<div class="col-sm-4">
		<input type="text" name="nama_mapel" class="form-control required" id="nama_mapel" placeholder="Nama Mapel" value="<?php echo $r[nama_mapel]; ?>">
		</div>
	</div>
	
	
		
	<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label">Tingkat</label>
			<div class="col-sm-4">
			 <select name='tingkat' class="form-control  wide required">
			 <option value=''> -- Pilih Tingkat --</option>
				<option value='AWALIYAH I' <?php if($r[tingkat]=="AWALIYAH I") { echo "selected=selected"; } else {echo "";} ?>> AWALIYAH I</option>
				  <option value='AWALIYAH II' <?php if($r[tingkat]=="AWALIYAH II") { echo "selected=selected"; } else {echo "";} ?>> AWALIYAH II</option>
				  <option value='AWALIYAH III' <?php if($r[tingkat]=="AWALIYAH III") { echo "selected=selected"; } else {echo "";} ?>> AWALIYAH III</option>
				  <option value='AWALIYAH IV' <?php if($r[tingkat]=="AWALIYAH IV") { echo "selected=selected"; } else {echo "";} ?>> AWALIYAH IV</option> 
				  <option value='WUSTHO I' <?php if($r[tingkat]=="WUSTHO I") { echo "selected=selected"; } else {echo "";} ?>> WUSTHO I</option> 
				  <option value='WUSTHO II' <?php if($r[tingkat]=="WUSTHO II") { echo "selected=selected"; } else {echo "";} ?>> WUSTHO II</option>
				  <option value='ULYA I' <?php if($r[tingkat]=="ULYA I") { echo "selected=selected"; } else {echo "";} ?>> ULYA I</option> 
				  <option value='Ulya II' <?php if($r[tingkat]=="ULYA II") { echo "selected=selected"; } else {echo "";} ?>> ULYA II</option> 
		  </select>
			</div>
		</div>
		
		
		 
		
	
	<div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label">Deskripsi Pencapaian</label>
		<div class="col-sm-6">
		<textarea  name="deskripsi" class="form-control" id="keterangan"><?php echo $r[deskripsi_pencapaian]; ?></textarea>
		</div>
	</div>

 
	
	<div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label"></label>
		<div class="col-sm-6">
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
