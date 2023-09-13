


<?php
switch($_GET[act]){

  default:
  
  		
  break;


//==================================================================================================================	
	
	case "editjadwal" :
 ?>
<style type="text/css">
	td {
	padding-bottom:10px;
	}
</style>
<?php
  	$idkelas=$_GET[id];
    echo "<nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li>
					<li>Kelola Jadwal </li>  
                           
                     </ul>


            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
    	<h2 class='heading_a'><span class ='heading_text'>Edit Jadwal</span></h2>   ";
        
		$querykelas = mysql_query(" select * from kelas, guru where id_kelas = $idkelas and kelas.tahunajaran='$_SESSION[tahunajaran]' and kelas.walikelas=guru.id_guru");
		$kelas=mysql_fetch_array($querykelas);
		$idkelas=$kelas[id_kelas];
	echo "<table class='table table-bordered' > ";
	echo "<tr> <td width=150> Nama Kelas </td> <td> : $kelas[namakelas] </td> </tr>";
	echo "<tr> <td width=150> Tingkat </td> <td> : $kelas[tingkat] </td> </tr>";
	echo "<tr> <td width=150> Tahun Ajaran </td> <td> : $kelas[tahunajaran] </td> </tr>";
	echo "<tr> <td width=150> Wali Kelas </td> <td> : $kelas[nama_guru] </td> </tr>";
	echo "</table> <br/> <br/>";
		
   	 ?>
	 
  <h2> Sabtu</h2> 
  <table class="table table-bordered table-stripped table-condensed">
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Jadwal</div></th>
  </tr>
  
    
  
  
  
  
  <tr>
    <td width="250"><div align="center">07.00 - 07.45 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.00-07.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="07.00-07.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">07.45 - 08.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.45-08.30'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="07.45-08.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">08.30 - 09.15 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='08.30-09.15'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="08.30-09.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td><div align="center"> 09.15 - 10.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='09.15-10.00'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="09.30-10.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
  
  
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='10.20-11.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="10.20-11.05" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,   guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='11.05-11.50'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="11.00-11.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='12.45-13.25'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="12.45-13.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
   
    <td><div align="center">13.25 - 14.05 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='13.25-14.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	 <tr>
   
    <td><div align="center">14.05 - 14.45 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='14.05-14.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
</table>

	<br/>
	<br/>





  <h2> Ahad</h2> 
  <table class="table table-bordered table-stripped table-condensed">
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Jadwal</div></th>
  </tr>
  
    
  
  
  
  
  <tr>
    <td width="250"><div align="center">07.00 - 07.45 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.00-07.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="07.00-07.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">07.45 - 08.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.45-08.30'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="07.45-08.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">08.30 - 09.15 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='08.30-09.15'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="08.30-09.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td><div align="center"> 09.15 - 10.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='09.15-10.00'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="09.30-10.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
  
  
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='10.20-11.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="10.20-11.05" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,   guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='11.05-11.50'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="11.00-11.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='12.45-13.25'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="12.45-13.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
   
    <td><div align="center">13.25 - 14.05 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='13.25-14.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	 <tr>
   
    <td><div align="center">14.05 - 14.45 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='14.05-14.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="ahad" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
</table>

	<br/>
	<br/>

	
	
	
	
	
	
	  <h2> Senin</h2> 
  <table class="table table-bordered table-stripped table-condensed">
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Jadwal</div></th>
  </tr>
  
    
  
  
  
  
  <tr>
    <td width="250"><div align="center">07.00 - 07.45 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.00-07.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="07.00-07.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">07.45 - 08.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.45-08.30'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="07.45-08.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">08.30 - 09.15 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='08.30-09.15'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="08.30-09.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td><div align="center"> 09.15 - 10.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='09.15-10.00'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="09.30-10.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
  
  
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='10.20-11.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="10.20-11.05" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,   guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='11.05-11.50'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="11.00-11.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='12.45-13.25'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="12.45-13.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
   
    <td><div align="center">13.25 - 14.05 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='13.25-14.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	 <tr>
   
    <td><div align="center">14.05 - 14.45 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='14.05-14.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
</table>

	<br/>
	<br/>


	
	
	
	
	
  <h2> Selasa</h2> 
  <table class="table table-bordered table-stripped table-condensed">
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Jadwal</div></th>
  </tr>
  
    
  
  
  
  
  <tr>
    <td width="250"><div align="center">07.00 - 07.45 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.00-07.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="07.00-07.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">07.45 - 08.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.45-08.30'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="07.45-08.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">08.30 - 09.15 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='08.30-09.15'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="08.30-09.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td><div align="center"> 09.15 - 10.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='09.15-10.00'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="09.30-10.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
  
  
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='10.20-11.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="10.20-11.05" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,   guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='11.05-11.50'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="11.00-11.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='12.45-13.25'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="12.45-13.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
   
    <td><div align="center">13.25 - 14.05 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='13.25-14.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	 <tr>
   
    <td><div align="center">14.05 - 14.45 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='14.05-14.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
</table>

	<br/>
	<br/>

	
	
	
	
	
	
  <h2> Rabu</h2> 
  <table class="table table-bordered table-stripped table-condensed">
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Jadwal</div></th>
  </tr>
  
    
  
  
  
  
  <tr>
    <td width="250"><div align="center">07.00 - 07.45 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.00-07.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="07.00-07.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">07.45 - 08.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.45-08.30'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="07.45-08.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">08.30 - 09.15 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='08.30-09.15'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="08.30-09.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td><div align="center"> 09.15 - 10.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='09.15-10.00'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="09.30-10.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
  
  
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='10.20-11.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="10.20-11.05" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,   guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='11.05-11.50'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="11.00-11.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='12.45-13.25'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="12.45-13.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
   
    <td><div align="center">13.25 - 14.05 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='13.25-14.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	 <tr>
   
    <td><div align="center">14.05 - 14.45 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='14.05-14.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
</table>

	<br/>
	<br/>

	
	
	
	
	
	
	  <h2> Kamis</h2> 
  <table class="table table-bordered table-stripped table-condensed">
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Jadwal</div></th>
  </tr>
  
    
  
  
  
  
  <tr>
    <td width="250"><div align="center">07.00 - 07.45 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.00-07.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="07.00-07.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">07.45 - 08.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='07.45-08.30'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="07.45-08.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td width="250"><div align="center">08.30 - 09.15 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='08.30-09.15'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="08.30-09.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td><div align="center"> 09.15 - 10.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='09.15-10.00'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="09.30-10.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
  
  
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='10.20-11.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="10.20-11.05" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,   guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='11.05-11.50'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="11.00-11.45" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	

		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
  <tr>
    <td bgcolor="#F7F7F7"><div align="center"> 11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center"> Istirahat </div></td>
    </tr>
	
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='12.45-13.25'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="12.45-13.30" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	
  <tr>
   
    <td><div align="center">13.25 - 14.05 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='13.25-14.05'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
	
	
	
	 <tr>
   
    <td><div align="center">14.05 - 14.45 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where jadwalkelas.harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel 
						and jadwalkelas.jammengajar='14.05-14.45'
						and jadwalkelas.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control' disabled='disabled'> ";
			 $querymapel = mysql_query(" select * from mapel where id_mapel='$kelas[id_mapel]'");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from guru where id_guru='$kelas[id_guru]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./aksi.php?module=jadwalkelas&act=hapus&idjadwalkelas=<?php echo $kelas[id_jadwalkelas];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./aksi.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="13.30-14.15" />
		
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-5">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - guru - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	 
		
		<div class="form-group" >
		<div class="col-sm-1">
				<input type="submit" class="btn  btn-success" value="Simpan" />
		</div>
		</div>
		</form>
			
			
			
		<?php 
		}
		
		?>
	
	
	</div></td>
    </tr>
	
	
	
</table>

	<br/>
	<br/>


	
	
	
 
	<br/>
	<br/>

<?php	  

		
    break;
	
	
	
	//==================================================================================================================================================

	
	
	case 'lihatjadwal':
  
  	$idkelas=$_GET[id];
    echo "<nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li>
					<li>Kelola Jadwal </li>  
                           
                     </ul>


            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
    	<h2 class='heading_a'><span class ='heading_text'>Lihat Jadwal</span></h2>  ";
        
		$querykelas = mysql_query(" select * from kelas, guru where id_kelas = $idkelas and kelas.tahunajaran='$_SESSION[tahunajaran]' and kelas.walikelas=guru.id_guru");
		$kelas=mysql_fetch_array($querykelas);
		
	echo "<table class='table table-bordered'> ";
	echo "<tr> <td width=150> Nama Kelas </td> <td> : $kelas[namakelas] </td> </tr>";
	echo "<tr> <td width=150> Tingkat </td> <td> : $kelas[tingkat] </td> </tr>";
	echo "<tr> <td width=150> Tahun Ajaran </td> <td> : $kelas[tahunajaran] </td> </tr>";
	echo "<tr> <td width=150> Wali Kelas </td> <td> : $kelas[nama_guru] </td> </tr>";
	echo "</table> <br/> <br/>";
		
   	 ?>
	 
	 
	 
  <table class="table table-bordered table-stripped table-condensed" >
  <tr>
    <th colspan="3" bgcolor="#F7F7F7"><div align="center">sabtu</div></th>
    <th colspan="3" bgcolor="#F7F7F7"><div align="center">ahad</div></th>
  </tr>
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Materi</div></th>
    <th bgcolor="#F7F7F7"><div align="center">guru</div></th>
	
   <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Materi</div></th>
    <th bgcolor="#F7F7F7"><div align="center">guru</div></th>
	
  </tr>
  
  <tr>
    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  <tr>
    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 

 
 <tr>
    <td><div align="center">09.15 - 10.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='09.15-10.00'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.15 - 10.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='09.15-10.00'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  
    <tr>
    <td bgcolor="#F7F7F7"><div align="center">10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">10.00 - 10.20</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='10.20-11.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.20 - 11.05 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='10.20-11.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='11.05-11.50'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.05 - 11.50 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='11.05-11.50'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#F7F7F7"><div align="center">11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='12.45-13.25 '");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.45 - 13.25 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='12.45-13.25 '");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="center">13.25 - 14.05 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='13.25-14.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">13.25 - 14.05</div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='13.25-14.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
    
  <tr>
    <td><div align="center">14.05 - 14.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='14.05-14.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">14.05 - 14.45</div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='ahad' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='14.05-14.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
</table>

	<br/>
	<br/>
	
	
	
	  <table class="table table-bordered table-stripped table-condensed" >
  <tr>
    <th colspan="3" bgcolor="#F7F7F7"><div align="center">senin</div></th>
    <th colspan="3" bgcolor="#F7F7F7"><div align="center">selasa</div></th>
  </tr>
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Materi</div></th>
    <th bgcolor="#F7F7F7"><div align="center">guru</div></th>
	
   <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Materi</div></th>
    <th bgcolor="#F7F7F7"><div align="center">guru</div></th>
	
  </tr>
  
  <tr>
    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  <tr>
    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 

 
 <tr>
    <td><div align="center">09.15 - 10.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='09.15-10.00'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.15 - 10.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='09.15-10.00'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  
    <tr>
    <td bgcolor="#F7F7F7"><div align="center">10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">10.00 - 10.20</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='10.20-11.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.20 - 11.05 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='10.20-11.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='11.05-11.50'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.05 - 11.50 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='11.05-11.50'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#F7F7F7"><div align="center">11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='12.45-13.25 '");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.45 - 13.25 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='12.45-13.25 '");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="center">13.25 - 14.05 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='13.25-14.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">13.25 - 14.05</div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='13.25-14.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
    
  <tr>
    <td><div align="center">14.05 - 14.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='senin' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='14.05-14.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">14.05 - 14.45</div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='14.05-14.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
</table>

	<br/>
	<br/>
	
 

 
   <table class="table table-bordered table-stripped table-condensed" >
  <tr>
    <th colspan="3" bgcolor="#F7F7F7"><div align="center">rabu</div></th>
    <th colspan="3" bgcolor="#F7F7F7"><div align="center">kamis</div></th>
  </tr>
  
  <tr> 
  <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Materi</div></th>
    <th bgcolor="#F7F7F7"><div align="center">guru</div></th>
	
   <th bgcolor="#F7F7F7"><div align="center">Jam </div></th>
  <th bgcolor="#F7F7F7"><div align="center">Materi</div></th>
    <th bgcolor="#F7F7F7"><div align="center">guru</div></th>
	
  </tr>
  
  <tr>
    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  <tr>
    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel, guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 

 
 <tr>
    <td><div align="center">09.15 - 10.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='09.15-10.00'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.15 - 10.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='09.15-10.00'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  
    <tr>
    <td bgcolor="#F7F7F7"><div align="center">10.00 - 10.20 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">10.00 - 10.20</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">10.20 - 11.05 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='10.20-11.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.20 - 11.05 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='10.20-11.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td><div align="center">11.05 - 11.50 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='11.05-11.50'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.05 - 11.50 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='11.05-11.50'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#F7F7F7"><div align="center">11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F7F7F7"><div align="center">11.50 - 12.45 </div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F7F7F7"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">12.45 - 13.25 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='12.45-13.25 '");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.45 - 13.25 </div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='12.45-13.25 '");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="center">13.25 - 14.05 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='13.25-14.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">13.25 - 14.05</div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='13.25-14.05'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
    
  <tr>
    <td><div align="center">14.05 - 14.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='14.05-14.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">14.05 - 14.45</div></td>
    <td><div align="center">
        <?php 
		$carijadwalkelas=mysql_query ("select * from jadwalkelas, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwalkelas.id_guru=guru.id_guru 
						and jadwalkelas.id_kelas='$idkelas' 
						and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwalkelas.id_mapel=mapel.id_mapel and jadwalkelas.jammengajar='14.05-14.45'");
		$kelas = mysql_fetch_array($carijadwalkelas);
		$ketemu = mysql_num_rows($carijadwalkelas);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
</table>

	<br/>
	<br/>
	

</div>
				</div>
				
				
				
            </div>
            </div>
     </div>


<?php	  

		
    break;
	
 
}

?>
