<?php
switch($_GET[act]){

  default:

	 echo "<nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li>
					<li>Kelola Wali Kelas</li>  
                           
                     </ul>


            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
    	<h2 class='heading_a'><span class ='heading_text'>Kelola Wali Kelas</span></h2>
		<br/>";
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
	
	
    echo "  
          <div class='table-responsive'>
		  <table id='datatable_demo' class='table table-striped'>
          <thead>
		  <tr>
			  <th>no</th>
			  <th>Tingkat</th>
			  <th>Nama Kelas </th>
			  <th> Jumlah Santri</th>
			  <th> Wali Kelas </th>
			  <th width=100> Aksi Wali Kelas</th>
		  </tr>
		  </thead><tbody>"; 
		  
	  
 
	
    $tampil=mysql_query("SELECT * FROM kelas where tahunajaran='$_SESSION[tahunajaran]' ORDER BY id_kelas DESC");
     $no = 1;
	 
	
    while ($r=mysql_fetch_array($tampil)){
	
		 $carisiswa=mysql_query("select * from santri where kelas='$r[id_kelas]'");
		 $jumlahsiswa=mysql_num_rows($carisiswa);
		 
		 $cariwalikelas=mysql_query("select * from guru where id_guru='$r[walikelas]'");
		 $jumlahwali=mysql_num_rows($cariwalikelas);
		 $wali=mysql_fetch_array($cariwalikelas);
		 
       echo "<tr><td>$no</td>
             <td >$r[tingkat]</td>
             <td > $r[namakelas] </td>
			  
			  <td >  
			   $jumlahsiswa   </td>  ";
			 
		 
		echo " <td >  $wali[nama_guru] </td>";
		 
		
		if ($jumlahwali == 1) {
			echo " <td align=center><a href=?module=walikelas&act=editwali&id=$r[id_kelas] class='btn btn-success' title='Edit Wali Kelompok'><span class='glyphicon glyphicon-edit'></span> </a>  </td>";
		} else {
			echo "<td align=center> <a href=?module=walikelas&act=tambahwali&id=$r[id_kelas] class='btn btn-success' title='Tambah Wali Kelompok'><span class='glyphicon glyphicon-plus-sign'></span></a>  </td>";
		}
		
           echo"   </tr>";
      $no++;
    }
    echo "</tbody></table> </div>
	</div>
            </div>
            </div>
     </div>";
	
  
	
    break;
  

	
	
	 
   
   
   
   case "editwali" :
   		$edit = mysql_query("SELECT * FROM kelas, guru WHERE kelas.id_kelas='$_GET[id]'");
   		 $r    = mysql_fetch_array($edit);

	?>
	
	 <nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li>
					<li>Kelola Wali Kelas</li>  
                           
                     </ul>


            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
    	<h2 class='heading_a'><span class ='heading_text'>Edit Wali Kelas </span></h2>
		  
	<form id="formulir" class="form-horizontal" method="post" action='./aksi.php?module=walikelas&act=updatewali&idkelas=<?php echo $_GET[id]; ?>' role="form">
	
	<div class="form-group" >
		<label for="namakelas" class="col-sm-3 control-label">Nama Kelas</label>
		<div class="col-sm-2"> 
		<input type="text" name="namakelas" class="form-control" id="namakelas" placeholder="Nama Kelas" value='<?php echo $r[namakelas]; ?>' disabled=disabled>
		</div>
	</div>
	
	  
	
	<div class="form-group" >
		<label for="walikelas" class="col-sm-3 control-label">Wali Kelas</label>
		<div class="col-sm-4">
		<?php 
			echo "<select name='walikelas' class='form-control' >";
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
	
	
	<div class="form-group">
    	<div class="col-sm-offset-3 col-sm-9">
      		<input type="submit" class="btn btn-success" name="simpan" value="Simpan">
			<input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()' >
    	</div>
  	</div>
	
	
	</form>
	
		 </div>
				</div>
            </div>
            </div>
     </div>
		 
   <?php
   break;
   
   
   
   
    case "tambahwali" :
   		$edit = mysql_query("SELECT * FROM kelas  WHERE kelas.id_kelas='$_GET[id]'");
   		 $r    = mysql_fetch_array($edit);
		
		?>

	 <nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li>
					<li>Kelola Wali Kelas</li>  
                           
                     </ul>


            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
    	<h2 class='heading_a'><span class ='heading_text'>Tambah Wali Kelas </span></h2>
		  
	<form id="formulir" class="form-horizontal" method="post" action='./aksi.php?module=walikelas&act=updatewali&idkelas=<?php echo $_GET[id]; ?>' role="form">
	
	<div class="form-group" >
		<label for="namakelas" class="col-sm-3 control-label">Nama Kelas</label>
		<div class="col-sm-2"> 
		<input type="text" name="namakelas" class="form-control" id="namakelas" placeholder="Nama Kelas" value='<?php echo $r[namakelas]; ?>' disabled=disabled>
		</div>
	</div>
	
	  
	
	<div class="form-group" >
		<label for="walikelas" class="col-sm-3 control-label">Wali Kelompok</label>
		<div class="col-sm-4">
		<?php 
			echo "<select name='walikelas' class='form-control' >";
				 $queryguru = mysql_query("select * from guru");
				 	echo "<option value=0> </option>";
					 while ($guru=mysql_fetch_array($queryguru)) {
							echo "<option value=$guru[id_guru] > $guru[nama_guru]</option>";
					 }
			echo	"</select>";
		?>
		</div>
	</div>
	
	
	<div class="form-group">
    	<div class="col-sm-offset-3 col-sm-9">
      		<input type="submit" class="btn btn-success" name="simpan" value="Simpan">
			<input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()' >
    	</div>
  	</div>
	
	
	</form>
	
</div>
				</div>
            </div>
            </div>
     </div>
   <?php
   break;
   
   
}

?>
