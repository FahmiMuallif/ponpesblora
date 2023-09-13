 

<?php
switch($_GET[act]){
 
  default: 
  
     echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Calon Santri </h1>
                        <p class="title-description"> Tambah, Edit, Hapus calon Santri</p>
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
						   <input type=button class='btn btn-success' value='Tambah Calon Santri' onclick=location.href='?module=calonsantri&act=tambahcalonsantri'>
					</div>
					 
					<div class='col-sm-4'>
						 <div align='right'>
						<form method='POST' action='dashboard.php?module=calonsantri' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder='Nama Calon Santri ' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-success' type='button' style='height:34px; border-radius:0px 4px 4px 0px;'><span class='input-group-btn'></span>Cari</button></span>
							</div> 
						</form>
						 </div>
					</div>
				</div>
				<div class='table-responsive' style='padding:3px;'>  ";
				
				
  
		 
	
	
	
          echo " 
		  <table  class='table table-condensed '>
		  <thead>
          <tr><th width=50>no</th>
		  <th>NIS</th> 
		  <th>nama calonsantri</th>
		  <th>JK</th>
		  <th>Umur</th>
		  <th>alamat wali</th>
		  <th>notelp wali</th>
		  <th width=150>aksi</th>
		  </tr></thead><tbody>";
 

   

    $tampil = mysql_query("SELECT * FROM calonsantri ORDER BY id_calonsantri DESC");
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 10;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
    if(isset($_POST['pencarian'])) {
		$tampil=mysql_query("SELECT * FROM calonsantri WHERE nama_lengkap like '%".$_POST[pencarian]."%' ORDER BY id_calonsantri DESC");
	} else {
		 $tampil=mysql_query("SELECT * FROM calonsantri  ORDER BY id_calonsantri DESC limit $mulai, $limit");
	}
	
    $no= ($posisi-$limit) +1; 
	while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td >$r[nis]</td> 
                <td >$r[nama_lengkap]</td>
                <td >$r[alamat]</td>
				<td >$r[nama_wali]</td>
				<td >$r[alamat_wali]</td>
				<td >$r[notelp_wali]</td>
               <td> <a href=?module=calonsantri&act=editcalonsantri&id=$r[id_calonsantri] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
 
				
				
				 <form method="POST" action="./modul/mod_calonsantri/aksi_calonsantri.php?module=calonsantri&act=hapus_calonsantri&id=<?php echo $r[id_calonsantri]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data calonsantri" data-message="Apakah Anda Yakin Akan Menghapus Data calonsantri <?php echo $r[nama_lengkap];?> ?">Hapus
    				</button>
				</form>
				
		
	<?php	   
	echo  "</td> </tr>";
      $no++;
    }
    echo "</tbody></table>";

   $page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
					$pagination = (new Pagination());
					$pagination->setCurrent($page);
					$pagination->setTotal($jumlahdata);
					$pagination->setRPP($limit); 
					$markup = $pagination->parse();
					
	echo "<div class='pull-right' style='margin-right:10px;'>".$markup."</div> 
		<div class='clearfix'></div>";
					
					
	echo "</div>
		 
	 </section>
	</div>
    </section>
	</article>
	";
 
    break;
  
  
 
	
  
  case "tambahcalonsantri":
  ?>
 	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Calon Santri</h1>
                        <p class="title-description"> Tambah calon Santri  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_calonsantri/aksi_calonsantri.php?module=calonsantri&act=input' role="form" parsley-validate>
	
	<div class="col-lg-6">
	
 
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-5 control-label">Nama Lengkap</label>
		<div class="col-sm-7">
		<input type="text" name="nama_lengkap" class="form-control required" id="nama_lengkap" placeholder="Nama" >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Jenis Kelamin</label>
		<div class="col-sm-7">
		<select name="jk" class="form-control">
			<option value=""> -- Pilih Jenis Kelamin --</option>
			<option value="Laki-laki"> Laki-laki</option>
			<option value="Perempuan"> Perempuan</option>
		</select>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Tempat Lahir</label>
		<div class="col-sm-7">
		<input type="text" name="tempatlahir" class="form-control" id="alamat" placeholder="Tempat Lahir" >
		</div>
	</div>
	
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Tgl Lahir</label>
		<div class="col-sm-7">
		<input type="text" name="tgllahir" class="form-control" id="alamat" placeholder="Tgl Lahir" >
		</div>
	</div>
	
		<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Pendidikan</label>
		<div class="col-sm-7">
		<input type="text" name="pendidikan" class="form-control" id="alamat" placeholder="Pendidikan" >
		</div>
	</div>
	
	
	 
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">&nbsp; </label>
		<div class="col-sm-7">
		 &nbsp; 
		 </div>
	</div>
	
	 
	
	
 
	
		
	
	</div>
	<div class="col-lg-6">
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Nama Wali</label>
		<div class="col-sm-7">
		<input type="text" name="namawali" class="form-control" id="alamat" placeholder="Nama Wali" >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Alamat Wali</label>
		<div class="col-sm-7">
		<input type="text" name="alamatwali" class="form-control" id="alamat" placeholder="Alamat Wali" >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="email" class="col-sm-5 control-label">Email Wali</label>
		<div class="col-sm-7">
		<input type="text" name="emailwali" class="form-control" id="email" placeholder="Email Wali" >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">No. Telp. Wali</label>
		<div class="col-sm-7">
		<input type="text" name="notelpwali" class="form-control" id="notelp" placeholder="Nomor Telpon Wali" >
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

	
	
	
	
	
	
  case "editcalonsantri":
    $edit = mysql_query("SELECT * FROM calonsantri WHERE id_calonsantri='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>

	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola calonsantri / Santri</h1>
                        <p class="title-description"> Edit calonsantri / Santri  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
 
		  
	<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='./modul/mod_calonsantri/aksi_calonsantri.php?module=calonsantri&act=updatecalonsantri' role="form" parsley-validate>
	<input type=hidden name='idcalonsantri' size=40 value='<?php echo $r[id_calonsantri]; ?>'>
	
	<div class="col-lg-6">
	
	<div class="form-group row" >
		<label for="id_calonsantri" class="col-sm-5 control-label">NIS</label>
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
		<label for="alamat" class="col-sm-5 control-label">Alamat</label>
		<div class="col-sm-7">
		<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value='<?php echo $r[alamat]; ?>' >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="email" class="col-sm-5 control-label">Email</label>
		<div class="col-sm-7">
		<input type="text" name="email" class="form-control" id="email" placeholder="Email" value='<?php echo $r[email]; ?>'>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">Nomor Telpon</label>
		<div class="col-sm-7">
		<input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Telpon" value='<?php echo $r[notelp]; ?>' >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">&nbsp; </label>
		<div class="col-sm-7">
		 &nbsp; 
		 </div>
	</div>
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Nama Wali</label>
		<div class="col-sm-7">
		<input type="text" name="namawali" class="form-control" id="alamat" placeholder="Nama Wali" value='<?php echo $r[nama_wali]; ?>' >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="alamat" class="col-sm-5 control-label">Alamat Wali</label>
		<div class="col-sm-7">
		<input type="text" name="alamatwali" class="form-control" id="alamat" placeholder="Alamat Wali"value='<?php echo $r[alamat_wali]; ?>' >
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="email" class="col-sm-5 control-label">Email Wali</label>
		<div class="col-sm-7">
		<input type="text" name="emailwali" class="form-control" id="email" placeholder="Email Wali" value='<?php echo $r[email_wali]; ?>' >
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="notelp" class="col-sm-5 control-label">Nomor Telpon Wali</label>
		<div class="col-sm-7">
		<input type="text" name="notelpwali" class="form-control" id="notelp" placeholder="Nomor Telpon Wali" value='<?php echo $r[notelp_wali]; ?>'>
		</div>
	</div>
 
	
	
	
 
	

			
			</div>
			<div class="col-lg-6">
 
	
		<div class='form-group row'>
				<label class='col-sm-4 control-label no-padding-right' > Foto </label>
				<div class='col-sm-7'>
						<?php
						if($r[foto]==""){
							echo "<img src='../upload/foto_calonsantri/noimage.jpg' width=200>";
						} else {
							echo "<img src='../upload/foto_calonsantri/$r[foto]' width=200>";
						}
						?>
					     <input type=file name='fupload' > <br/>
						 *) Apabila foto tidak diubah, kosongkan saja.
						 <input type="hidden" name="fotolama"  value='<?php echo $r[foto]; ?>' >
				</div>
			</div>
			
			<div class="form-group row" >
		<label for="pass" class="col-sm-4 control-label">Password</label>
		<div class="col-sm-7">
		<input type="text" name="passbaru" class="form-control " id="pass" placeholder="Password"  >
		*) Apabila password tidak diubah, kosongkan saja.
		<input type="hidden" name="passlama" class="form-control " id="pass" placeholder="Password" value='<?php echo $r[password]; ?>' >
		
		</div>
	</div>
	
	
	
		<div class="form-group row" >
		<label for="notelp" class="col-sm-4 control-label">&nbsp; </label>
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
