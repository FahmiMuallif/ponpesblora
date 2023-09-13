<section class="vbox">
	<section class="scrollable padder">
		<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
			<li>
				<a href="index.html"><i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Kelola Penempatan Siswa</li>
		</ul>
		
		<div class='m-b-md'>
			<h3 class='m-b-none'>Kelola Penempatan Siswa</h3>
			<small>Menempatkan Siswa Pada Kelas</small> 
		</div>


<?php
switch($_GET[act]){
  // Tampil siswa
  default:
  
  
  	 		  
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
	
	
 
    echo "<section class='panel panel-default'>
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						<input type=button class='btn btn-sm btn-success' value='Penempatan Baru' onclick=location.href='?module=penempatansiswa'>
					</div>
					 
					<div class='col-sm-4'>
						 
						<form method='POST' action='dashboard.php?module=penempatansiswa' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder='Nama Siswa' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-default' type='button'><span class='input-group-btn'>Cari!</span></button></span>
							</div> 
						</form>
						 
					</div>
				</div>
				
          ";
		  
		 
		 
	
	?>
	
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_penempatansiswa/aksi_penempatansiswa.php?module=penempatansiswa&act=input' role="form" parsley-validate>
	
	
	<div class="form-group" >
		<label for="nis" class="col-sm-3 control-label">Nama Siswa</label>
		<div class="col-sm-4">
		 <?php
		 $carisiswa = mysql_query("SELECT * FROM siswa ORDER BY nama_lengkap ASC");
		 echo "<select name=idsiswa class='form-control required'> ";
		 echo "<option value=''> -- Cari Siswa --</option>";
		 while ($siswa=mysql_fetch_array($carisiswa)) {
			 echo "<option value='$siswa[id_siswa]'>$siswa[nama_lengkap] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	  	<div class="form-group" >
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
	
     <?php

		echo "<div class='table-responsive' style='padding:3px;'>  
		  <table  class='table table-striped table-bordered table-hovered'>
		  <thead>
          <tr><th width=50>no</th> <th>nama siswa</th><th>alamat</th><th>Kelas</th>
		  <th width=150>aksi</th>
		  </tr></thead><tbody>";
 

    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							ORDER BY id_riwayat DESC  ");
   
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 5;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
    if(isset($_POST['pencarian'])) {
		$tampil=mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							AND siswa.nama_lengkap='%".$_POST[pencarian]."%'  
							ORDER BY id_riwayat DESC ");
	} else {
		 $tampil=mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							ORDER BY id_riwayat DESC   limit $mulai, $limit");
	}
	
    $no= ($posisi-$limit) +1;   
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td> 
                <td >$r[nama_lengkap]</td>
                <td >$r[alamat]</td>
				<td >$r[namakelas]</td>
               <td> <a href=?module=penempatansiswa&act=editpenempatan&id=$r[id_riwayat] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
  
				 <form method="POST" action="aksi.php?module=penempatansiswa&act=hapus_penempatan&id=<?php echo $r[id_riwayat]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Penempatan Siswa" data-message="Apakah Anda Yakin Akan Menghapus Data Penempatan Siswa <?php echo $r[nama_lengkap];?> ?"> Hapus
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
							
							
	</section>
	</section>
	";
	
	
    break;
  
   
	
	
	
  case "editpenempatan":
  
    $edit = mysql_query("SELECT * FROM riwayatkelas WHERE id_riwayat='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
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
	
	
	
	echo "<section class='panel panel-default'>
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						<input type=button class='btn btn-sm btn-success' value='Penempatan Baru' onclick=location.href='?module=penempatansiswa'>
					</div>
					 
					<div class='col-sm-4'>
						 
						<form method='POST' action='dashboard.php?module=penempatansiswa' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder='Nama Siswa' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-default' type='button'><span class='input-group-btn'>Cari!</span></button></span>
							</div> 
						</form>
						 
					</div>
				</div>";
		  
		 
		 
	 
	
	?>
	
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_penempatansiswa/aksi_penempatansiswa.php?module=penempatansiswa&act=input' role="form" parsley-validate>
	<input type="hidden" name="idriwayatlama" value="<?php echo $r[id_riwayat]; ?>">
	
	<div class="form-group" >
		<label for="nis" class="col-sm-3 control-label">Nama Siswa</label>
		<div class="col-sm-4">
		 <?php
		 $carisiswa = mysql_query("SELECT * FROM siswa ORDER BY nama_lengkap ASC");
		 echo "<select name=idsiswa class='form-control required'> ";
		 echo "<option value=''> -- Cari Siswa --</option>";
		 while ($siswa=mysql_fetch_array($carisiswa)) {
			 if($siswa[id_siswa]==$r[id_siswa]) { $selected = "selected=selected"; } else { $selected=""; }
			 echo "<option value='$siswa[id_siswa]' $selected>$siswa[nama_lengkap] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	  	<div class="form-group" >
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
	
     <?php

		echo " <div class='table-responsive' style='padding:3px;'>  
		  <table  class='table table-striped table-bordered table-hovered'>
		  <thead>
          <tr><th>no</th> <th>nama siswa</th><th>alamat</th><th>Kelas</th>
		  <th width=150>aksi</th>
		  </tr></thead><tbody>";
 

    
    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							ORDER BY id_riwayat DESC  ");
   
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 5;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
    if(isset($_POST['pencarian'])) {
		$tampil=mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							AND siswa.nama_lengkap='%".$_POST[pencarian]."%'  
							ORDER BY id_riwayat DESC ");
	} else {
		 $tampil=mysql_query("SELECT * FROM siswa, riwayatkelas, kelas 
							WHERE siswa.id_siswa=riwayatkelas.id_siswa 
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$_SESSION[tahunajaran]'
							ORDER BY id_riwayat DESC   limit $mulai, $limit");
	}
	
    $no= ($posisi-$limit) +1;   
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td> 
                <td >$r[nama_lengkap]</td>
                <td >$r[alamat]</td>
				<td >$r[namakelas]</td>
               <td> <a href=?module=penempatansiswa&act=editpenempatan&id=$r[id_riwayat] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
 
				
				
				 <form method="POST" action="aksi.php?module=penempatansiswa&act=hapus_penempatan&id=<?php echo $r[id_riwayat]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Penempatan Siswa" data-message="Apakah Anda Yakin Akan Menghapus Data Penempatan Siswa <?php echo $r[nama_lengkap];?> ?"> Hapus
    				</button>
				</form>
				
		
	<?php	   
	echo  "</td> </tr>";
      $no++;
    }
    echo "</tbody></table>  ";

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
							
							
	</section>
	</section>
	";
  
    break;  

}
?>
