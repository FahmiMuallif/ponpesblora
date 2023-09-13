
<?php
switch($_GET[act]){
  // Tampil siswa
  default:
  
     	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Penempatan Santri </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Penempatan Santri </p>
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
	
	
 
    echo " <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
					
					
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						<input type=button class='btn btn-sm btn-success' value='Penempatan Baru' onclick=location.href='?module=penempatansiswa'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				
				 
				 
				
          ";
		  
		 
		 
	
	?>
	
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_penempatansiswa/aksi_penempatansiswa.php?module=penempatansiswa&act=input' role="form" parsley-validate>
	
	
	<div class="form-group row" >
		<label for="nis" class="col-sm-3 control-label">Nama Santri</label>
		<div class="col-sm-4">
		 <?php
		 $carisiswa = mysql_query("SELECT * FROM siswa ORDER BY nama_lengkap ASC");
		 echo "<select name=idsiswa class='form-control required'> ";
		 echo "<option value=''> -- Cari Santri --</option>";
		 while ($siswa=mysql_fetch_array($carisiswa)) {
			 echo "<option value='$siswa[id_siswa]'>$siswa[nama_lengkap] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Kelas </label>
		<div class="col-sm-4">
		<?php
		 $carikelas = mysql_query("SELECT * FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' ORDER BY namakelas ASC");
		 echo "<select name=idkelas class='form-control required'> ";
		 echo "<option value=''> -- Cari Kelas --</option>";
		 while ($kelas=mysql_fetch_array($carikelas)) {
			 echo "<option value='$kelas[id_kelas]'>$kelas[namakelas] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	
	<div class="form-group" >
		<label for="nama_lengkap" class="col-sm-3 control-label"> </label>
		<div class="col-sm-4">
		 <input type="submit" class="btn btn-sm btn-success" value="Tempatkan Siswa">
		</div>
	</div>
	
	</form>
	<br/><br/><br/>
     <?php

		echo "<div class='table-responsive' >  
		  <table id='sample-table-1'  class='table table-striped table-hovered'>
		  <thead>
			<tr><th width=50>no</th> <th>nama santri</th><th>alamat</th><th>Kelas</th>
			<th width=150>aksi</th>
			</tr></thead><tbody>";
 

    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							AND riwayatkelas.id_tahunajaran='$_SESSION[tahunajaran]'
							ORDER BY id_riwayat DESC  ");
   
	 
	
    $no= 1;   
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td align=center>$no</td> 
                <td >$r[nama_lengkap]</td>
                <td >$r[alamat_lengkap]</td>
				<td >$r[namakelas]</td>
               <td> <a href=?module=penempatansiswa&act=editpenempatan&id=$r[id_riwayat] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
  
				 <form method="POST" action="./modul/mod_penempatansiswa/aksi_penempatansiswa.php?module=penempatansiswa&act=hapus_penempatan&id=<?php echo $r[id_riwayat]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Penempatan Santri" data-message="Apakah Anda Yakin Akan Menghapus Data Penempatan Santri <?php echo $r[nama_lengkap];?> ?"> Hapus
    				</button>
				</form>
				
		
	<?php	   
	echo  "</td> </tr>";
      $no++;
    }
   
					
					
	echo "</table>
	</div>
		 </section>
	</div>
    </section>
	</article>
	";
	
	
    break;
  
   
	
	
	
  case "editpenempatan":
  
  	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Penempatan Santri </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Penempatan Santri </p>
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
	
	
 
    echo " <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
					
					
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						<input type=button class='btn btn-sm btn-success' value='Penempatan Baru' onclick=location.href='?module=penempatansiswa'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				
				 
				 
				
          ";
  
    $edit = mysql_query("SELECT * FROM riwayatkelas WHERE id_riwayat='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	  
	
	?>
	
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_penempatansiswa/aksi_penempatansiswa.php?module=penempatansiswa&act=update' role="form" parsley-validate>
	
	
	<input type="hidden" name="idriwayatlama" value="<?php echo $r[id_riwayat]; ?>">
	<input type="hidden" name="idsiswa" value="<?php echo $r[id_siswa]; ?>">
	
	<div class="form-group row" >
		<label for="nis" class="col-sm-3 control-label">Nama Santri</label>
		<div class="col-sm-4">
		 <?php
		 $carisiswa = mysql_query("SELECT * FROM siswa ORDER BY nama_lengkap ASC");
		 echo "<select name=idsiswaxxx class='form-control required' disabled> ";
		 echo "<option value=''> -- Cari Santri --</option>";
		 while ($siswa=mysql_fetch_array($carisiswa)) {
			 if($siswa[id_siswa]==$r[id_siswa]) { $selected = "selected=selected"; } else { $selected=""; }
			 echo "<option value='$siswa[id_siswa]' $selected>$siswa[nama_lengkap] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Kelas </label>
		<div class="col-sm-4">
		<?php
		 $carikelas = mysql_query("SELECT * FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' ORDER BY namakelas ASC");
		 echo "<select name=idkelas class='form-control required'> ";
		 echo "<option value=''> -- Cari Kelas --</option>";
		 while ($kelas=mysql_fetch_array($carikelas)) {
			 if($kelas[id_kelas]==$r[id_kelas]) { $selected = "selected=selected"; } else { $selected=""; }
			 echo "<option value='$kelas[id_kelas]' $selected>$kelas[namakelas] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	
	<div class="form-group" >
		<label for="nama_lengkap" class="col-sm-3 control-label"> </label>
		<div class="col-sm-4">
		 <input type="submit" class="btn btn-sm btn-success" value="Tempatkan Siswa">
		</div>
	</div>
	
	</form>
	
	<br/><br/><br/>
     <?php

		echo " <div class='table-responsive' >  
		  <table id='sample-table-1' class='table table-striped table-hovered'>
		  <thead>
          <tr><th>no</th> <th>nama siswa</th><th>alamat</th><th>Kelas</th>
		  <th width=150>aksi</th>
		  </tr></thead><tbody>";
 

    
    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							AND riwayatkelas.id_tahunajaran='$_SESSION[tahunajaran]'
							ORDER BY id_riwayat DESC  ");
   
	 
	
    $no= 1;   
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td align=center>$no</td> 
                <td >$r[nama_lengkap]</td>
                <td >$r[alamat_lengkap]</td>
				<td >$r[namakelas]</td>
               <td> <a href=?module=penempatansiswa&act=editpenempatan&id=$r[id_riwayat] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
 
				
				
				 <form method="POST" action="./modul/mod_penempatansiswa/aksi_penempatansiswa.php?module=penempatansiswa&act=hapus_penempatan&id=<?php echo $r[id_riwayat]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Penempatan Santri" data-message="Apakah Anda Yakin Akan Menghapus Data Penempatan Santri <?php echo $r[nama_lengkap];?> ?"> Hapus
    				</button>
				</form>
				
		
	<?php	   
	echo  "</td> </tr>";
      $no++;
    }
    echo "</tbody></table>  ";

	 
					
					
	echo "</div>
		 </section>
	</div>
    </section>
	</article>
	";
  
    break;  

}
?>
