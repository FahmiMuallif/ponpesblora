 
		
<?php
switch($_GET[act]){

  default:
  
       echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Ustad  </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Ustadz</p>
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
						   <input type=button class='btn btn-success' value='Tambah Ustad' onclick=location.href='?module=guru&act=tambahguru'>
					</div>
					 
					<div class='col-sm-4'>
						  
					</div>
				</div>
				<div class='table-responsive' >  ";
				
     
	 
		  
	echo "   
		  <table id='sample-table-1' class='table table-striped table-hovered'>
		   <thead>
			  <tr>
				  <th width=50>no</th> 
				  <th>nama ustad</th>
				  <th>alamat</th>
				  <th>notelp</th>
				  <th width=150>aksi</th>
			 </tr> 
           </thead> <tbody>";
        
    $tampil=mysql_query("SELECT * FROM guru ORDER BY id_guru DESC"); 
	 
    $no= 1; 
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td align=center>$no</td> 
				<td >$r[nama_guru]</td>
				<td >$r[alamat]</td>
				<td >$r[notelp]</td>
             <td><a href='?module=guru&act=editguru&id=$r[id_guru]' class='btn btn-sm btn-warning' title='Edit'> Edit </a>  "; ?>
			 
	                <form method="POST" action="./modul/mod_guru/aksi_guru.php?module=guru&act=hapus_guru&id=<?php echo $r[id_guru]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Guru" data-message="Apakah Anda Yakin Akan Menghapus Data Guru dengan Nama <?php echo $r[nama_guru];?> ?"> Hapus
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







  case "tambahguru":
  ?>
  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Ustadz </h1>
                        <p class="title-description"> Tambah Ustadz </p>
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
										
		  
	<form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./modul/mod_guru/aksi_guru.php?module=guru&act=input' role="form" parsley-validate>
	
 

	
	<div class="form-group row" >
		<label for="nama_guru" class="col-sm-3 control-label">Nama Lengkap</label>
		<div class="col-sm-4">
		<input type="text" name="nama_guru" class="form-control required" id="nama_guru" placeholder="Nama Ustadz" >
		</div>
	</div>
	
	<div class='form-group row'>
		<label class='col-sm-3 control-label' > Jenis Kelamin </label>
		<div class='col-sm-4'>
				 <input type="radio"   name="jk" value="Laki-laki"><span> Laki-laki  </span>
				 <input type="radio"   name="jk" value="Perempuan"><span> Perempuan </span>
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
		<label for="notelp" class="col-sm-3 control-label">Kompetensi Mengajar</label>
		<div class="col-sm-6">
		<textarea name="kompetensi" class="form-control"  placeholder="Kompetensi" ></textarea>
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Riwayat Pendidikan</label>
		<div class="col-sm-6">
		<textarea name="riwayatpendidikan" class="form-control"  placeholder="Riwayat Pendidikan" ></textarea>
		</div>
	</div>
	
	
	
	
			<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Username</label>
		<div class="col-sm-6">
		<input type="text" name="username" class="form-control" id="notelp" placeholder="Username" >
		
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Password</label>
		<div class="col-sm-6">
		<input type="text" name="password" class="form-control" id="notelp" placeholder="Password" >
		
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

	
	
	
	
	
	
	
  case "editguru":
    $edit = mysql_query("SELECT * FROM guru WHERE id_guru='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
	
	
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Ustadz</h1>
                        <p class="title-description"> Edit Ustadz </p>
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
		
		
		
	<form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./modul/mod_guru/aksi_guru.php?module=guru&act=update' role="form" parsley-validate>
	
          <input type=hidden name=id value='<?php echo $r[id_guru]; ?>'>
		  
		  

  
	
	
  	<div class="form-group row" >
		<label for="nama_guru" class="col-sm-3 control-label">Nama Lengkap</label>
		<div class="col-sm-4">
		<input type="text" name="nama_guru" class="form-control required" id="nama_guru" placeholder="Nama Ustadz" value="<?php echo $r[nama_guru]; ?>" >
		</div>
	</div>
	
	
	
		<div class='form-group row'>
		<label class='col-sm-3 control-label' > Jenis Kelamin </label>
		<div class='col-sm-4'>
				 <input type="radio"   name="jk" value="Laki-laki" <?php if ($r[jenis_kelamin]=="Laki-laki") { echo "checked=checked"; } else { echo ""; } ?>><span> Laki-laki  </span>
				 <input type="radio"   name="jk" value="Perempuan" <?php if ($r[jenis_kelamin]=="Perempuan") { echo "checked=checked"; } else { echo ""; } ?>><span> Perempuan </span>
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
		<label for="notelp" class="col-sm-3 control-label">Kompetensi Mengajar</label>
		<div class="col-sm-6">
		<textarea name="kompetensi" class="form-control"  placeholder="Kompetensi" ><?php echo $r[kompetensi]; ?></textarea>
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Riwayat Pendidikan</label>
		<div class="col-sm-6">
		<textarea name="riwayatpendidikan" class="form-control"  placeholder="Riwayat Pendidikan" ><?php echo $r[riwayat_pendidikan]; ?></textarea>
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
						 *) Apabila foto tidak diubah, kosongkan saja.
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
