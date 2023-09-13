 

<?php
switch($_GET[act]){
 
  default: 
  
     echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Santri  </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Santri</p>
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
						   <input type=button class='btn btn-success' value='Tambah Santri ' onclick=location.href='?module=siswa&act=tambahsiswa'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				<div class='table-responsive' >  ";
				
				
  
		 
	
	
	
          echo " 
		  <table id='sample-table-1' class='table table-striped table-hovered '>
		  <thead>
          <tr><th width=50>no</th>
		  <th>NIS</th> 
		  <th>nama santri</th>
		  <th>Jenis Kelamin</th> 
		  <th>alamat lengkap</th>
		  <th>notelp orangtua</th>
		  <th>status</th>
		  <th width=150>aksi</th>
		  </tr></thead><tbody>";
 

   

    $tampil = mysql_query("SELECT * FROM siswa ORDER BY id_siswa DESC");
 
	
    $no= 1; 
	while($r=mysql_fetch_array($tampil)){
		
		if($r[status]=="aktif") { 
			$status = "<a href='./modul/mod_siswa/aksi_siswa.php?module=siswa&act=ubahstatus&id=".$r[id_siswa]."' class='btn btn-sm btn-success'>Aktif</a>";
		} else if($r[status]=="keluar") {
			$status = "<a href='./modul/mod_siswa/aksi_siswa.php?module=siswa&act=ubahstatus&id=".$r[id_siswa]."' class='btn btn-sm btn-danger'>Keluar</a>";
		} else if($r[status]=="lulus") {
			$status = "<a href='./modul/mod_siswa/aksi_siswa.php?module=siswa&act=ubahstatus&id=".$r[id_siswa]."' class='btn btn-sm btn-danger'>Lulus</a>";
		}
		
      echo "<tr><td align=center>$no</td>
                <td >$r[nis]</td> 
                <td >$r[nama_lengkap]</td>
                <td >".strtoupper($r[jenis_kelamin])."</td> 
				<td >$r[alamat_lengkap]</td>
				<td >$r[notelp_ortu]</td>
				<td >$status</td>
               <td> <a href=?module=siswa&act=editsiswa&id=$r[id_siswa] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
 
				
				
				 <form method="POST" action="./modul/mod_siswa/aksi_siswa.php?module=siswa&act=hapus_siswa&id=<?php echo $r[id_siswa]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Siswa" data-message="Apakah Anda Yakin Akan Menghapus Data Siswa <?php echo $r[nama_lengkap];?> ?">Hapus
    				</button>
				</form>
				
		
	<?php	   
	echo  "</td> </tr>";
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
  
  
 
	
  
  case "tambahsiswa":
  ?>
 	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Santri </h1>
                        <p class="title-description"> Tambah Santri  </p>
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
										
 
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_siswa/aksi_siswa.php?module=siswa&act=input' role="form" parsley-validate>
	
	<div class="col-lg-6">
	
	<div class="form-group row" >
		<label for="id_siswa" class="col-sm-5 control-label">NIS</label>
		<div class="col-sm-7">
		<input type="text" name="nis" class="form-control required" id="nis" placeholder="NIS" >
		</div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Nama </label>
		<div class="col-sm-7">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama" >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="email" class="col-sm-5 control-label">Jenis Kelamin</label>
		<div class="col-sm-7">
				<input type="radio"   name="jk" value="Laki-laki"><span> Laki-laki  </span>
				<input type="radio"   name="jk" value="Perempuan"><span> Perempuan </span>
		 </div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Tempat Lahir </label>
		<div class="col-sm-7">
		<input type="text" name="tempatlahir" class="form-control required" id="nama_lengkap" placeholder="Tempat Lahir" >
		</div>
	</div>
	

  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Tanggal Lahir </label>
		<div class="col-sm-7">
		<input type="text" name="tgllahir" class="form-control required date-picker" id="nama_lengkap" placeholder="Tanggal Lahir" data-date-format="yyyy-mm-dd">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">&nbsp; </label>
		<div class="col-sm-7">
		 &nbsp; 
		 </div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Alamat Lengkap</label>
		<div class="col-sm-7">
		<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">No. Telp. Orangtua</label>
		<div class="col-sm-7">
		<input type="text" name="notelp" class="form-control" id="alamat" placeholder="Nomor Telp. Orangtua" >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Nama Bapak</label>
		<div class="col-sm-7">
		<input type="text" name="namabapak" class="form-control" id="alamat" placeholder="Nama Bapak" >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Pekerjaan Bapak</label>
		<div class="col-sm-7">
		<input type="text" name="pekerjaanbapak" class="form-control" id="alamat" placeholder="Pekerjaan Bapak" >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Nama Ibu</label>
		<div class="col-sm-7">
		<input type="text" name="namaibu" class="form-control" id="alamat" placeholder="Nama Ibu" >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Pekerjaan Ibu</label>
		<div class="col-sm-7">
		<input type="text" name="pekerjaanibu" class="form-control" id="alamat" placeholder="Pekerjaan Ibu" >
		</div>
	</div>
	
	
 
	
		
	
	</div>
	<div class="col-lg-6">
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Tanggal Mulai Masuk </label>
		<div class="col-sm-7">
		<input type="text" name="tglmasuk" class="form-control required date-picker" id="nama_lengkap" placeholder="Tanggal Mulai Masuk" data-date-format="yyyy-mm-dd">
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="email" class="col-sm-5 control-label">Foto</label>
		<div class="col-sm-7">
		<input type="file" name="fupload" id="foto" placeholder="Foto">
		</div>
	</div>
 
	
	<br/><br/><br/>
	
	<h5 style="margin-bottom:15px; font-size:18px;">RIWAYAT PENDIDIKAN</h5>
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">SMP/MTs/SD/MI asal</label>
		<div class="col-sm-7">
		<input type="text" name="sekolah_asal" class="form-control" id="nama_lengkap" placeholder="Sekolah Asal">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Madin/TPQ</label>
		<div class="col-sm-7">
		<input type="text" name="madin_asal" class="form-control" id="nama_lengkap" placeholder="Madin Asal">
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Pondok Pesantren</label>
		<div class="col-sm-7">
		<input type="text" name="ponpes_asal" class="form-control" id="nama_lengkap" placeholder="Ponpes Asal">
		</div>
	</div>
	
		<br/><br/><br/>
	
	<div class="form-group row" >
		<label for="pass" class="col-sm-5 control-label">Password</label>
		<div class="col-sm-7">
		<input type="text" name="pass" class="form-control required" id="pass" placeholder="Password" >
		</div>
	</div>
	
	

	 
	
		<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">&nbsp; </label>
		<div class="col-sm-7">
		 &nbsp; 
		 </div>
	</div>
	
	
		<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">&nbsp; </label>
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

	
	
	
	
	
	
  case "editsiswa":
    $edit = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>

	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Santri </h1>
                        <p class="title-description"> Edit Santri   </p>
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
 
		  
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_siswa/aksi_siswa.php?module=siswa&act=updatesiswa' role="form" parsley-validate>
	<input type=hidden name='idsiswa' size=40 value='<?php echo $r[id_siswa]; ?>'>
	
	<div class="col-lg-6">
	
	<div class="form-group row" >
		<label for="id_siswa" class="col-sm-5 control-label">NIS</label>
		<div class="col-sm-7">
		<input type="text" name="nisbaru" class="form-control required" id="nis" placeholder="NIS" value='<?php echo $r[nis]; ?>'>
		</div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Nama </label>
		<div class="col-sm-7">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama" value='<?php echo $r[nama_lengkap]; ?>'>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="email" class="col-sm-5 control-label">Jenis Kelamin</label>
		<div class="col-sm-7">
				<input type="radio"   name="jk" value="Laki-laki" <?php if ($r[jenis_kelamin]=="Laki-laki") { echo "checked=checked"; } else { echo ""; } ?>><span> Laki-laki  </span>
				<input type="radio"   name="jk" value="Perempuan" <?php if ($r[jenis_kelamin]=="Perempuan") { echo "checked=checked"; } else { echo ""; } ?>><span> Perempuan </span>
		 </div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Tempat Lahir </label>
		<div class="col-sm-7">
		<input type="text" name="tempatlahir" class="form-control required" id="nama_lengkap" placeholder="Tempat Lahir" value="<?php echo $r[tempat_lahir]; ?>">
		</div>
	</div>
	

  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Tanggal Lahir </label>
		<div class="col-sm-7">
		<input type="text" name="tgllahir" class="form-control required date-picker" id="nama_lengkap" placeholder="Tanggal Lahir" value="<?php echo $r[tgl_lahir]; ?>" data-date-format="yyyy-mm-dd">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">&nbsp; </label>
		<div class="col-sm-7">
		 &nbsp; 
		 </div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Alamat Lengkap</label>
		<div class="col-sm-7">
		<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" value="<?php echo $r[alamat_lengkap]; ?>" >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">No. Telp. Orangtua</label>
		<div class="col-sm-7">
		<input type="text" name="notelp" class="form-control" id="alamat" placeholder="Nomor Telp. Orangtua" value="<?php echo $r[notelp_ortu]; ?>">
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Nama Bapak</label>
		<div class="col-sm-7">
		<input type="text" name="namabapak" class="form-control" id="alamat" placeholder="Nama Bapak" value="<?php echo $r[nama_bapak]; ?>">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Pekerjaan Bapak</label>
		<div class="col-sm-7">
		<input type="text" name="pekerjaanbapak" class="form-control" id="alamat" placeholder="Pekerjaan Bapak" value="<?php echo $r[pekerjaan_bapak]; ?>">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Nama Ibu</label>
		<div class="col-sm-7">
		<input type="text" name="namaibu" class="form-control" id="alamat" placeholder="Nama Ibu" value="<?php echo $r[nama_ibu]; ?>">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Pekerjaan Ibu</label>
		<div class="col-sm-7">
		<input type="text" name="pekerjaanibu" class="form-control" id="alamat" placeholder="Pekerjaan Ibu" value="<?php echo $r[pekerjaan_ibu]; ?>" >
		</div>
	</div>
	
	
	
	
 
	

			
			</div>
			<div class="col-lg-6">
			
			
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Tanggal Mulai Masuk </label>
		<div class="col-sm-7">
		<input type="text" name="tglmasuk" class="form-control required date-picker" id="nama_lengkap" placeholder="Tanggal Mulai Masuk" value='<?php echo $r[tgl_masuk]; ?>' data-date-format="yyyy-mm-dd">
		</div>
	</div>
 
	
		<div class='form-group row'>
				<label class='col-sm-5 control-label no-padding-right' > Foto </label>
				<div class='col-sm-7'>
						<?php
						if($r[foto]==""){
							echo "<img src='../upload/foto_siswa/noimage.jpg' width=150>";
						} else {
							echo "<img src='../upload/foto_siswa/$r[foto]' width=150>";
						}
						?>
					     <input type=file name='fupload' > <br/>
						 *) Apabila foto tidak diubah, kosongkan saja.
						 <input type="hidden" name="fotolama"  value='<?php echo $r[foto]; ?>' >
				</div>
			</div>
			
			
			
			
		<br/>
	
	<h5 style="margin-bottom:15px; font-size:18px;">RIWAYAT PENDIDIKAN</h5>
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">SMP/MTs/SD/MI asal</label>
		<div class="col-sm-7">
		<input type="text" name="sekolah_asal" class="form-control" id="nama_lengkap" placeholder="Sekolah Asal" value="<?php echo $r[sekolah_asal_ibu]; ?>">
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Madin/TPQ</label>
		<div class="col-sm-7">
		<input type="text" name="madin_asal" class="form-control" id="nama_lengkap" placeholder="Madin Asal" value="<?php echo $r[madin_asal]; ?>">
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Pondok Pesantren</label>
		<div class="col-sm-7">
		<input type="text" name="ponpes_asal" class="form-control" id="nama_lengkap" placeholder="Ponpes Asal" value="<?php echo $r[ponpes_asal]; ?>">
		</div>
	</div>
	
		<br/><br/> 
		
		
	<div class="form-group row" >
		<label for="pass" class="col-sm-5 control-label">Password</label>
		<div class="col-sm-7">
		<input type="text" name="passbaru" class="form-control " id="pass" placeholder="Password"  >
		*) Apabila password tidak diubah, kosongkan saja.
		<input type="hidden" name="passlama" class="form-control " id="pass" placeholder="Password" value='<?php echo $r[password]; ?>' >
		
		</div>
	</div>
	
	

	
	<div class="form-group row" >
		<label for="email" class="col-sm-5 control-label">Status</label>
		<div class="col-sm-7">
		 <select name="status"  class="form-control required" > 
			<option value="aktif" <?php if($r[status]=="aktif") { echo "selected=selected"; } else { echo "";} ?>>Aktif</option>
			<option value="keluar" <?php if($r[status]=="keluar") { echo "selected=selected"; } else { echo "";} ?>>Keluar</option>
			<option value="lulus" <?php if($r[status]=="lulus") { echo "selected=selected"; } else { echo "";} ?>>Lulus</option>
		 </select>
		 </div>
	</div>
	
	
		<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">&nbsp; </label>
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
