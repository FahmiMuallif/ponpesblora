 
		
<?php
switch($_GET[act]){

  default:
  
       echo '<article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pengguna </h1>
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
						   <input type=button class='btn btn-success' value='Tambah Pengguna ' onclick=location.href='?module=pengguna&act=tambahadmin'>
					</div>
					 
					<div class='col-sm-4'>
						  
					</div>
				</div>
				<div class='table-responsive'>  ";
				
     
	 
		  
	echo "   
		  <table  id='sample-table-1' class='table table-striped table-hovered'>
		   <thead>
			  <tr>
				  <th width=50>no</th> 
				  <th>nama administrator</th>
				  <th>alamat</th>
				  <th>notelp</th>
				  <th width=150>aksi</th>
			 </tr> 
           </thead> <tbody>";
        
    $tampil=mysql_query("SELECT * FROM admin ORDER BY id_admin DESC"); 
	 
	
    $no= 1; 
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td align=center>$no</td> 
				<td >$r[nama_lengkap]</td>
				<td >$r[alamat]</td>
				<td >$r[notelp]</td>
             <td><a href='?module=pengguna&act=editadmin&id=$r[id_admin]' class='btn btn-sm btn-warning' title='Edit'> Edit </a>  "; ?>
			 
	                <form method="POST" action="./modul/mod_admin/aksi_admin.php?module=pengguna&act=hapus_admin&id=<?php echo $r[id_admin]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus admin" data-message="Apakah Anda Yakin Akan Menghapus Data admin dengan Nama <?php echo $r[nama_lengkap];?> ?"> Hapus
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







  case "tambahadmin":
  ?>
  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pengguna </h1>
                        <p class="title-description"> Tambah Pengguna </p>
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

	
	<form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./modul/mod_admin/aksi_admin.php?module=pengguna&act=input' role="form" parsley-validate>
	

	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
		<div class="col-sm-4">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama Lengkap" >
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
		<label for="email" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-3 control-label">Username</label>
		<div class="col-sm-6">
		<input type="text" name="username" class="form-control required" id="username" placeholder="Username" 							 data-parsley-trigger="change"
                                   data-parsley-remote-options='{ "type": "POST", "dataType": "jsonp" }'
                                   data-parsley-remote="http://localhost/SIM_PONDOK/admin/cekusernameadmin.php"
                                   data-parsley-remote-message="Username telah dipakai" >
		
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

	
	
	
	
	
	
	
  case "editadmin":
    $edit = mysql_query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
	
	
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Pengguna</h1>
                        <p class="title-description"> Edit Pengguna </p>
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
		
		
		
	<form id="formulir" class="form-horizontal" method="post" enctype="multipart/form-data"  action='./modul/mod_admin/aksi_admin.php?module=pengguna&act=update' role="form" parsley-validate>
	
          <input type=hidden name=id value='<?php echo $r[id_admin]; ?>'>
		  
	 
  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
		<div class="col-sm-4">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama admin" value="<?php echo $r[nama_lengkap]; ?>" >
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
							echo "<img src='../upload/foto_admin/noimage.jpg' width=200>";
						} else {
							echo "<img src='../upload/foto_admin/$r[foto]' width=200>";
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
