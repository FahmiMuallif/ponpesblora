 
		
<?php
switch($_GET[act]){

  default:
  
       echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Jadwal Kelas</h1>
                        <p class="title-description"> Edit Jadwal Kelas</p>
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
				  <th>Nama Kelas </th> 
				  <th>Tingkat</th>
				  <th> Wali Kelas </th>
				  <th> Tahun Ajaran</th>
				  <th width=150>aksi</th>
			 </tr> 
           </thead> <tbody>";
        
   
	 $tampil=mysql_query("select * from kelas, guru where tahunajaran='$_SESSION[tahunajaran]' and kelas.walikelas=guru.id_guru ORDER BY id_kelas asc");
	 
	 
	
    $no= 1; 
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr>
			<td align='center'>$no</td>
             <td align='center'>$r[namakelas]</td>
			 <td align='center'>$r[tingkat]</td>
			 <td >$r[nama_guru]</td>
			 <td align='center'>$r[tahunajaran]</td>
             <td align='center'><a href='?module=jadwalkelas&act=lihatjadwal&id=$r[id_kelas]' class='btn btn-sm btn-info' title='Lihat'> Lihat  </a>  
			 <a href='?module=jadwalkelas&act=editjadwal&id=$r[id_kelas]' class='btn btn-sm btn-warning' title='Edit'> Edit </a>
			 </td></tr>";
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





	
case "editjadwal" :
?>
<style type="text/css">
	td {
	padding-bottom:10px;
	}
</style>
<?php


 echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Jadwal Kelas</h1>
                        <p class="title-description"> Edit Jadwal Kelas</p>
                    </div>
                    <section class="section"> ';
					
  echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>";

  	$idkelas=$_GET[id];
    echo "<h2>Edit Jadwal Kelas</h2> ";
        
		$querykelas = mysql_query(" select * from kelas, guru where id_kelas = $idkelas and kelas.walikelas=guru.id_guru");
		$kelas=mysql_fetch_array($querykelas);
		$idkelas=$kelas[id_kelas];
		$tingkat=$kelas[tingkat];
		
	echo "<table class='table ' > ";
	echo "<tr> <td width=200> Nama Kelas </td> <td> : $kelas[namakelas] </td> </tr>";
	echo "<tr> <td > Tingkat </td> <td> : $kelas[tingkat] </td> </tr>";
	echo "<tr> <td > Tahun Ajaran </td> <td> : $kelas[tahunajaran] </td> </tr>";
	echo "<tr> <td > Wali Kelas </td> <td> : $kelas[nama_guru] </td> </tr>";
	echo "</table> <br/> <br/>";
		
   	 ?>
	 
  <h2> Senin</h2> 
  <table width="100%" border="1">
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Jadwal</div></th>
  </tr>
  
  <tr>
    <td width="150"><div align="center">04.00 - 05.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='04.00-05.30'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		
	 
		
		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="04.00-05.30" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='15.00-17.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" >Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="15.00-17.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='18.00-19.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="18.00-19.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td><div align="center">19.00 - 21.00 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='19.00-21.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="senin" />
		<input type="hidden" name="jammengajar" value="19.00-21.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
  <table width="100%" border="1">
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Jadwal</div></th>
  </tr>
  
  <tr>
    <td width="150"><div align="center">04.00 - 05.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='04.00-05.30'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="04.00-05.30" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='15.00-17.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="15.00-17.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='18.00-19.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="18.00-19.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td><div align="center">19.00 - 21.00 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='19.00-21.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="selasa" />
		<input type="hidden" name="jammengajar" value="19.00-21.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
  <table width="100%" border="1">
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Jadwal</div></th>
  </tr>
  
  <tr>
    <td width="150"><div align="center">04.00 - 05.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='04.00-05.30'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="04.00-05.30" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='15.00-17.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="15.00-17.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='18.00-19.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="18.00-19.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td><div align="center">19.00 - 21.00 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='19.00-21.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="rabu" />
		<input type="hidden" name="jammengajar" value="19.00-21.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
  <table width="100%" border="1">
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Jadwal</div></th>
  </tr>
  
  <tr>
    <td width="150"><div align="center">04.00 - 05.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='04.00-05.30'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="04.00-05.30" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='15.00-17.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="15.00-17.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='18.00-19.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="18.00-19.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td><div align="center">19.00 - 21.00 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='19.00-21.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="kamis" />
		<input type="hidden" name="jammengajar" value="19.00-21.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
	
	
	
	
	
	
	
	<h2> Jumat</h2> 
  <table width="100%" border="1">
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Jadwal</div></th>
  </tr>
  
  <tr>
    <td width="150"><div align="center">04.00 - 05.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='04.00-05.30'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="jumat" />
		<input type="hidden" name="jammengajar" value="04.00-05.30" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='15.00-17.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="jumat" />
		<input type="hidden" name="jammengajar" value="15.00-17.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='18.00-19.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="jumat" />
		<input type="hidden" name="jammengajar" value="18.00-19.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td><div align="center">19.00 - 21.00 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='19.00-21.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="jumat" />
		<input type="hidden" name="jammengajar" value="19.00-21.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
	
	
	
	
	
	<h2> Sabtu</h2> 
  <table width="100%" border="1">
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Jadwal</div></th>
  </tr>
  
  <tr>
    <td width="150"><div align="center">04.00 - 05.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='04.00-05.30'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="04.00-05.30" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='15.00-17.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="15.00-17.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='18.00-19.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="18.00-19.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td><div align="center">19.00 - 21.00 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='19.00-21.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="sabtu" />
		<input type="hidden" name="jammengajar" value="19.00-21.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
	
	
	
	
	<h2> Minggu / Ahad </h2> 
  <table width="100%" border="1">
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Jadwal</div></th>
  </tr>
  
  <tr>
    <td width="150"><div align="center">04.00 - 05.30 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='04.00-05.30'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="minggu" />
		<input type="hidden" name="jammengajar" value="04.00-05.30" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='15.00-17.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="minggu" />
		<input type="hidden" name="jammengajar" value="15.00-17.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center"></div></td>
    </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='18.00-19.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="minggu" />
		<input type="hidden" name="jammengajar" value="18.00-19.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
    <td><div align="center">19.00 - 21.00 </div></td>
  <td ><div align="center">
	
	<?php
		
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where jadwal.harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='19.00-21.00'
						and jadwal.tahunajaran='$_SESSION[tahunajaran]'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);

		if ($ketemu > 0 ) 
		{ ?>
			
			<div class="form-group" >
		<div class="col-sm-3">
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
		<div class="col-sm-4">
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
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control'  disabled='disabled'>"; 
			$queryguru = mysql_query(" select * from ruang where id_ruang='$kelas[id_ruang]'");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
		
		<div class="form-group" >
		<div class="col-sm-1">
				<a href="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=hapus&idjadwal=<?php echo $kelas[id_jadwal];?>&id=<?php echo $idkelas;?>"> <button class="btn  btn-danger" value="Simpan">Hapus</button> </a>
		</div>
		</div>
		
		<?php
		} else {
		?>
			
		<form id="formulir" class=""  method="POST" action="./modul/mod_jadwalkelas/aksi_jadwalkelas.php?module=jadwalkelas&act=input">
		
		<input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>" />
		<input type="hidden" name="harimengajar" value="minggu" />
		<input type="hidden" name="jammengajar" value="19.00-21.00" />
		
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		 echo " <select name=idmapel class='form-control'> ";
		  echo "<option value='' > - Materi - </option> ";
			 $querymapel = mysql_query(" select * from mapel where tahunajaran='$_SESSION[tahunajaran]' and tingkat='$tingkat' order by nama_mapel");
			 while ($mapel=mysql_fetch_array($querymapel)){
					echo "<option value=$mapel[id_mapel] > $mapel[nama_mapel] </option> ";
			 }
		  
		echo "</select> ";
		?>
		</div>
		</div>
		
		 
		<div class="form-group" >
		<div class="col-sm-4">
		<?php
		echo  "<select name=idguru class='form-control' >"; 
		echo "<option value='' > - Ustad - </option> ";
			$queryguru = mysql_query(" select * from guru");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_guru] > $guru[nama_guru] </option> ";
			 }
	  
		echo " </select>";
		?>
		</div>
		</div>
	
		<div class="form-group" >
		<div class="col-sm-3">
		<?php
		echo  "<select name=idruang class='form-control' >"; 
		echo "<option value='' > - Ruang - </option> ";
			$queryguru = mysql_query(" select * from ruang");
			 while ($guru=mysql_fetch_array($queryguru)){
			 	echo "<option value=$guru[id_ruang] > $guru[nama_ruang] </option> ";
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
	 	 </section>
	</div>
    </section>
	</article>
	 
	
<?php	  

		
    break;
	
	
	
	//==================================================================================================================================================

	
	
	case 'lihatjadwal':
  
  

 echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Jadwal Kelas</h1>
                        <p class="title-description"> Edit Jadwal Kelas</p>
                    </div>
                    <section class="section"> ';
					
  echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>";

					
					
  	$idkelas=$_GET[id];
    echo "<h2>Jadwal Kelas</h2> ";
        
		$querykelas = mysql_query(" select * from kelas, guru where id_kelas = $idkelas and kelas.walikelas=guru.id_guru");
		$kelas=mysql_fetch_array($querykelas);
	echo "<table width=50% class='table'> ";
	echo "<tr> <td width=200> Nama Kelas </td> <td> : $kelas[namakelas] </td> </tr>";
	echo "<tr> <td > Tingkat </td> <td> : $kelas[tingkat] </td> </tr>";
	echo "<tr> <td > Tahun Ajaran </td> <td> : $kelas[tahunajaran] </td> </tr>";
	echo "<tr> <td > Wali Kelas </td> <td> : $kelas[nama_guru] </td> </tr>";
	echo "</table> <br/> <br/>";
		
   	 ?>
	 
  <table width="100%" border="1" >
  <tr>
    <th colspan="4"><div align="center">senin</div></th>
    <th colspan="4"><div align="center">selasa</div></th>
  </tr>
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">guru</div></th>
	<th><div align="center">tempat</div></th>
   <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">guru</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
	
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  

    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
  
  
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='senin' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
</table>

	<br/>
	<br/>
	
	<table width="100%" border="1">
  <tr>
    <th colspan="4"><div align="center">rabu</div></th>
    <th colspan="4"><div align="center">kamis</div></th>
  </tr>
  
  <tr>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">guru</div></th>
	<th><div align="center">tempat</div></th>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">guru</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		
		
		?>
    </div></td>
  

    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
  

  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
      <?php 
	$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='rabu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
</table>


<br/>
<br/>

<table width="100%" border="1">
  <tr>
    <th colspan="4"><div align="center">jumat</div></th>
    <th colspan="4"><div align="center">sabtu</div></th>
  </tr>
  
  <tr>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">guru</div></th>
	<th><div align="center">tempat</div></th>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">guru</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		
		
		?>
    </div></td>
  

    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		?>
    </div></td>
  </tr>

  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'

						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
  
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
        <?php 
	$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='jumat' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[nama_guru] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
</table><table width="50%" border="1">
  <tr>
    <th colspan="4"><div align="center">minggu</div></th>
  </tr>
  
  <tr>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">guru</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="20%"><div align="center">04.00 - 05.30 </div></td>
    <td width="20%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=34% > $kelas[nama_guru] </td><td align=center width=26% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		
		
		?>
    </div></td>
  

   
  </tr>

  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
  </tr>
  <tr>
    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=34% > $kelas[nama_guru] </td><td align=center width=26% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

   
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>

  </tr>
  <tr>
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=34% > $kelas[nama_guru] </td><td align=center width=26% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  
 
  </tr>
  <tr>
    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='minggu' 
						and jadwal.id_guru=guru.id_guru 
						and jadwal.id_kelas='$idkelas'
						and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=34% > $kelas[nama_guru] </td><td align=center width=26% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>


<br>
<br>






   
  </tr>
</table>

	 	 </section>
	</div>
    </section>
	</article>
 
<?php	  

		
    break;

 

}
?>
