 
<?php
switch($_GET[act]){

  default:

    echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kelas  </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Kelas</p>
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
						   <input type=button class='btn btn-success' value='Tambah Kelas ' onclick=location.href='?module=kelas&act=tambahkelas'>
					</div>
					 
					<div class='col-sm-4'>
						 
					</div>
				</div>
				<div class='table-responsive' >  ";
		  
		  
	 
	
	
        echo "  
		  <table id='sample-table-1'  class='table table-striped table-hovered'>
		  <thead>
          <tr>
			  <th width=50>no</th>
			  <th>Tingkat</th>
			  <th>Nama Kelas </th>
			  <th> Wali Kelas </th>
			  <th> Jumlah Santri </th> 
			  <th width=150> Aksi </th>
		  </tr>
		  </thead><tbody>"; 
		  
	  
   
	
    $tampil=mysql_query("SELECT * FROM kelas where tahunajaran='$_SESSION[tahunajaran]' ORDER BY tingkat ASC, namakelas ASC"); 
	 
    $no= 1;  
    while ($r=mysql_fetch_array($tampil)){
	
		 $carisiswa=mysql_query("select * from siswa, riwayatkelas 
		 where riwayatkelas.id_siswa=siswa.id_siswa   
		 AND riwayatkelas.id_kelas='$r[id_kelas]'");
		 $jumlahsiswa=mysql_num_rows($carisiswa);
		 
		 $cariwalikelas=mysql_query("select * from guru where id_guru='$r[walikelas]'");
		 $jumlahwali=mysql_num_rows($cariwalikelas);
		 $wali=mysql_fetch_array($cariwalikelas);
		 
       echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$r[tingkat]</td>
				<td align='center'> $r[namakelas] </td>
				  ";
		
		echo " <td > $wali[nama_guru] </td>";
		 
        echo " <td align='center'> $jumlahsiswa </a>  </td>
		
		<td ><a href=?module=kelas&act=editkelas&id=$r[id_kelas] class='btn btn-sm btn-warning' title='Edit Kelas'> Edit</a>";
		 ?>
	               
		  
		 
		      <form method="POST" action="modul/mod_kelas/aksi_kelas.php?module=kelas&act=hapus_kelas&id=<?php echo $r[id_kelas]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Kelas" data-message="Apakah Anda Yakin Akan Menghapus Data Kelas <?php echo $r[namakelas];?> ?">
        			Hapus
    				</button>
				</form>
				
				
		 		   
        <?php    echo"  </td></tr>";
      $no++;
    }
    echo "</table> ";
	
	 
					
	echo "</div>
		 
	 </section>
	</div>
    </section>
	</article>
	";
	
 
    break;
  

	
	
	
	
	
	
	
	case "tambahkelas":
	
	?>
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kelas </h1>
                        <p class="title-description"> Tambah Kelas  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
 
 
 
		
		<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_kelas/aksi_kelas.php?module=kelas&act=input' role="form" parsley-validate>
		
		<div class="form-group row" >
			<label for="namakelas" class="col-sm-3 control-label">Nama Kelas</label>
			<div class="col-sm-4">
			<input type="text" name="namakelas" class="form-control required" id="namakelas" placeholder="Nama Kelas" >
			</div>
		</div>
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label">Tingkat</label>
			<div class="col-sm-4">
			  <select name='tingkat' class="form-control wide required"> 
			      <option value=''> -- Pilih Tingkat -- </option>
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
		<label for="walikelas" class="col-sm-3 control-label">Wali Kelas</label>
		<div class="col-sm-4">
		<?php 
			echo "<select name='walikelas' class='form-control  wide required' >";
				 $queryguru = mysql_query("select * from guru");
				 	echo "<option value=''> -- Pilih Wali Kelas -- </option>";
					 while ($guru=mysql_fetch_array($queryguru)) {
							echo "<option value=$guru[id_guru] > $guru[nama_guru]</option>";
					 }
			echo	"</select>";
		?>
		</div>
	</div>
	
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-2"> 
			</div>
		</div>
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-9"> 
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
	



	
	
 case "editkelas":
 	$edit=mysql_query("SELECT * FROM kelas WHERE id_kelas='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
	?>
	
 	 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kelas </h1>
                        <p class="title-description"> Edit Kelas  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
 
 
		
		<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_kelas/aksi_kelas.php?module=kelas&act=updatekelas' role="form" parsley-validate>
		
		
		<input type=hidden name='id' size=30  value='<?php echo $_GET[id]; ?>'>
		
		
		<div class="form-group row" >
			<label for="namakelas" class="col-sm-3 control-label">Nama Kelas</label>
			<div class="col-sm-4">
			<input type="text" name="namakelas" class="form-control required" id="namakelas" placeholder="Nama Kelas" value='<?php echo $r[namakelas]; ?>'>
			</div>
		</div>
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label">Tingkat</label>
			<div class="col-sm-4">
			 <select name='tingkat' class="form-control  wide required">
			 
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
		<label for="walikelas" class="col-sm-3 control-label">Wali Kelas</label>
		<div class="col-sm-4">
		<?php 
			echo "<select name='walikelas' class='form-control wide required' >
					<option value='' > -- Pilih Wali Kelas -- </option>
					";
				 $queryguru = mysql_query("select * from guru");
					
					 while ($guru=mysql_fetch_array($queryguru)) {
						if ($guru[id_guru]==$r[walikelas]) {
							echo "<option value=$guru[id_guru] selected=selected> $guru[nama_guru]</option>";
						} else {
							echo "<option value=$guru[id_guru] > $guru[nama_guru]</option>";
						}
					 }
			echo	"</select>";
		?>
		</div>
	</div>
	
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-2">
		 
			</div>
		</div>
		
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-8">
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

	
	
	
	
	

   case "kelolasiswa":
   
   $carikelas = mysql_query("SELECT * FROM kelas where id_kelas='$_GET[id]' ");
   $kelas=mysql_fetch_array($carikelas); 
   $namakelas=$kelas[namakelas];
   $tingkat=$kelas[tingkat];
  ?>
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Santri <font size='6'> <?php echo $tingkat; ?> Kelas <?php echo $namakelas; ?> </font> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?></h1>
                        <p class="title-description"> Penempatan Santri  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
    <?php 	 
		 
   
     echo " <input type=button class='btn btn-success' value='Tambah Penempatan Santri' onclick=location.href='?module=kelas&act=tambahsiswa&id=$_GET[id]'>
          
		  <br/><br/>";
		  
		  
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
	
	
         echo " <div class='table-responsive'>
		  <table id='datatable_demo' class='table table-striped'>
		  <thead>
          <tr>
			<th>no</th>
			<th>nis</th>
			<th>nama santri</th>
			<th>Jenis Kelamin</th>
			<th>alamat</th>
			<th width=150>aksi</th>
		  </tr>
		  </thead><tbody>";


    $tampil = mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
					where siswa.id_siswa=riwayatkelas.id_siswa 
					AND riwayatkelas.id_kelas=kelas.id_kelas
					AND kelas.id_kelas='$_GET[id]' 
					ORDER BY siswa.nis ASC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td align='center'>$no</td>
                <td align='center'>$r[nis]</td>
                <td >$r[nama_lengkap]</td>
				 <td >$r[jenis_kelamin]</td>
                <td >$r[alamat_wali]</td>
               <td align='center'> <a href=?module=kelas&act=editpenempatan&idk=$r[id_kelas]&id=$r[id_riwayat] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
			    
				
				
				 <form method="POST" action="./modul/mod_kelas/aksi_kelas.php?module=kelas&act=hapus_siswa&id=<?php echo $r[id_siswa].'&idkelas='.$_GET[id];?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Siswa" data-message="Apakah Anda Yakin Akan Menghapus Data Siswa <?php echo $r[nama_lengkap];?> ?">
        			<span class='glyphicon glyphicon-trash'></span>Hapus
    				</button>
				</form>
				
				
		
	<?php	
	  echo " </td>  </tr>";
      $no++;
    }
    echo "</tbody></table></div>
	 	</section>
	</div>
    </section>
	</article>
	";


   break;
   
   
   
   
   
   
   case "tambahsiswa":
   	
		 
			
		 $carikelas = mysql_query("SELECT * FROM kelas where id_kelas='$_GET[id]' ");
		   $kelas=mysql_fetch_array($carikelas); 
		   $namakelas=$kelas[namakelas];
		   $tingkat=$kelas[tingkat];
   
				
   		?>
		
		
		  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Santri <font size='6'> <?php echo $tingkat; ?> Kelas <?php echo $namakelas; ?> </font> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?></h1>
                        <p class="title-description"> Penempatan Santri  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
										
		
 					 
			
			<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_kelas/aksi_kelas.php?module=penempatansiswa&act=input' role="form" parsley-validate>
	
			<input type="hidden" name="idkelas" value="<?php echo $_GET[id]; ?>">

	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Kelas </label>
		<div class="col-sm-4">
		<?php
		 $carikelas = mysql_query("SELECT * FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' ORDER BY namakelas ASC");
		 echo "<select name=idkelasxxx class='form-control required' disabled> ";
		 echo "<option value=''> -- Cari Kelas --</option>";
		 while ($kelas=mysql_fetch_array($carikelas)) {
			 if($kelas[id_kelas]==$_GET[id]) { $ok="selected=selected";} else { $ok="";} 
			 echo "<option value='$kelas[id_kelas]' $ok >$kelas[tingkat] - $kelas[namakelas] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
		<div class="form-group row" >
		<label for="nis" class="col-sm-3 control-label">Nama Siswa</label>
		<div class="col-sm-4">
		 <?php
		 $carisiswa = mysql_query("SELECT * FROM siswa WHERE status='aktif' ORDER BY nama_lengkap ASC");
		 echo "<select name=idsiswa class='form-control required'> ";
		 echo "<option value=''> -- Cari Santri --</option>";
		 while ($siswa=mysql_fetch_array($carisiswa)) {
			 echo "<option value='$siswa[id_siswa]'>$siswa[nis] - $siswa[nama_lengkap] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label"> </label>
		<div class="col-sm-4">
		 <input type="submit" class="btn  btn-success" value="Tempatkan Santri">
		</div>
	</div>
	
	</form>
	
	<div class="clearfix"></div>
	
		 
     
		 
		  
	
		
   	  </section>
	</div>
    </section>
	</article>
   		<?php
   break;
   
   
   
   
   
   
   
   case "editpenempatan" :
   
    $carikelas = mysql_query("SELECT * FROM kelas where id_kelas='$_GET[idk]' ");
		   $kelas=mysql_fetch_array($carikelas); 
		   $namakelas=$kelas[namakelas];
		   $tingkat=$kelas[tingkat];
   
   		   $edit = mysql_query("SELECT * FROM riwayatkelas WHERE id_riwayat='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

?>

	     <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Siswa <font size='6'> <?php echo $tingkat; ?> Kelas <?php echo $namakelas; ?> </font> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?></h1>
                        <p class="title-description"> Penempatan Siswa  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
										
		  
	 <form id="formulir" class="form-horizontal" method="post" action='./modul/mod_kelas/aksi_kelas.php?module=penempatansiswa&act=input' role="form" parsley-validate>
	<input type="hidden" name="idriwayatlama" value="<?php echo $r[id_riwayat]; ?>">
	<input type="hidden" name="idkelas" value="<?php echo $_GET[idk]; ?>">
	
	
	  	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label">Kelas </label>
		<div class="col-sm-4">
		<?php
		 $carikelas = mysql_query("SELECT * FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' ORDER BY namakelas ASC");
		 echo "<select name=idkelas class='form-control required' disabled> ";
		 echo "<option value=''> -- Cari Kelas --</option>";
		 while ($kelas=mysql_fetch_array($carikelas)) {
			 if($kelas[id_kelas]==$r[id_kelas]) { $selected = "selected=selected"; } else { $selected=""; }
			 echo "<option value='$kelas[id_kelas]' $selected>$tingkat - $kelas[namakelas] </option>";
		 }
		 echo "</select>";
		 ?>
		</div>
	</div>
	
	
	<div class="form-group row" >
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
	
	
	<div class="form-group row" >
		<label for="nama_lengkap" class="col-sm-3 control-label"> </label>
		<div class="col-sm-4">
		 <input type="submit" class="btn btn-sm btn-success" value="Tempatkan Siswa">
		</div>
	</div>
	
	</form>
	 
	 
 	  </section>
	</div>
    </section>
	</article>
	

	<?php
   
   break;
   
   
   
   

   
   
   
    case "tambahwali" :
   		$edit = mysql_query("SELECT * FROM kelas  WHERE kelas.id_kelas='$_GET[id]'");
   		 $r    = mysql_fetch_array($edit);
		
		?>
		
	 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kelas </h1>
                        <p class="title-description"> Tambah Wali Kelas  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
	 
 
		  
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_kelas/aksi_kelas.php?module=kelas&act=updatewali&idkelas=<?php echo $_GET[id]; ?>' role="form" parsley-validate>
	
	
	<div class="form-group row" >
		<label for="namakelas" class="col-sm-3 control-label">Tingkat</label>
		<div class="col-sm-2"> 
		<input type="text" name="tingkat" class="form-control" id="namakelas" placeholder="Nama Kelas" value='<?php echo $r[tingkat]; ?>' disabled=disabled>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="namakelas" class="col-sm-3 control-label">Nama Kelas</label>
		<div class="col-sm-2"> 
		<input type="text" name="namakelas" class="form-control" id="namakelas" placeholder="Nama Kelas" value='<?php echo $r[namakelas]; ?>' disabled=disabled>
		</div>
	</div>
	
	  
	
	<div class="form-group row" >
		<label for="walikelas" class="col-sm-3 control-label">Wali Kelas</label>
		<div class="col-sm-4">
		<?php 
			echo "<select name='walikelas' class='form-control  wide required' >";
				 $queryguru = mysql_query("select * from guru");
				 	echo "<option value=0> </option>";
					 while ($guru=mysql_fetch_array($queryguru)) {
							echo "<option value=$guru[id_guru] > $guru[nama_guru]</option>";
					 }
			echo	"</select>";
		?>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="walikelas" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		 
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="walikelas" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
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
   
   
   
   
   
   
      case "editwali" :
   		$edit = mysql_query("SELECT * FROM kelas, guru WHERE kelas.id_kelas='$_GET[id]'");
   		 $r    = mysql_fetch_array($edit);

	?>
	
	 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Kelas </h1>
                        <p class="title-description"> Edit Wali Kelas  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
	 
		  
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_kelas/aksi_kelas.php?module=kelas&act=updatewali&idkelas=<?php echo $_GET[id]; ?>' role="form" parsley-validate>
	
	
	<div class="form-group row" >
		<label for="namakelas" class="col-sm-3 control-label">Tingkat</label>
		<div class="col-sm-2"> 
		<input type="text" name="tingkat" class="form-control" id="namakelas" placeholder="Nama Kelas" value='<?php echo $r[tingkat]; ?>' disabled=disabled>
		</div>
	</div>
	
	
	<div class="form-group row" >
		<label for="namakelas" class="col-sm-3 control-label">Nama Kelas</label>
		<div class="col-sm-2"> 
		<input type="text" name="namakelas" class="form-control" id="namakelas" placeholder="Nama Kelas" value=' <?php echo $r[namakelas]; ?>' disabled=disabled>
		</div>
	</div>
	
	  
	
	<div class="form-group row" >
		<label for="walikelas" class="col-sm-3 control-label">Wali Kelas</label>
		<div class="col-sm-4">
		<?php 
			echo "<select name='walikelas' class='form-control wide required' >";
				 $queryguru = mysql_query("select * from guru");
				 
					 while ($guru=mysql_fetch_array($queryguru)) {
						if ($guru[id_guru]==$r[walikelas]) {
							echo "<option value=$guru[id_guru] selected=selected> $guru[nama_guru]</option>";
						} else {
							echo "<option value=$guru[id_guru] > $guru[nama_guru]</option>";
						}
					 }
			echo	"</select>";
		?>
		</div>
	</div>
	
	
	
	<div class="form-group row" >
		<label for="walikelas" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		 
		</div>
	</div>

	
	<div class="form-group row" >
		<label for="walikelas" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
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
