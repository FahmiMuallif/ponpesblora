<?php
switch($_GET[act]){

  default:
   
   
			
	  echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Lihat Jadwal Ustadz </h1>
                        <p class="title-description">Lihat Jadwal</p>
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
             <td>  <a href=?module=jadwalguru&act=lihatdetil&id=$r[id_guru]  class='btn btn-sm btn-info' title='Lihat Jadwal'>Lihat Jadwal</a> 
			 
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
  
  
  
  
  
  
  
  // ===============================================================================================================================================================
  
  case 'lihatdetil':
  
  echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Jadwal Ustad</h1>
                        <p class="title-description"> Lihat Jadwal Ustad</p>
                    </div>
                    <section class="section"> ';
					
  echo "<div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>";
  
  	$idguru=$_GET[id];
    echo "<h2>Lihat Jadwal Ustad</h2> ";
        
		$queryguru = mysql_query(" select * from guru where id_guru = $idguru");
		$guru=mysql_fetch_array($queryguru);
	echo "<table width=100% class='table'> ";
	echo "<tr> <td width=200> Nama Guru </td> <td> : $guru[nama_guru] </td> </tr>"; 
	echo "<tr> <td>Alamat </td> <td> : $guru[alamat] </td> </tr>";
	echo "<tr> <td>No Telp </td> <td> : $guru[notelp] </td> </tr>";
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
    <th><div align="center">tingkat/kelas</div></th>
	<th><div align="center">tempat</div></th>
   <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">tingkat/kelas</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  

    <td width="10%"><div align="center">04.00 - 05.30 </div></td></td>
    <td width="10%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  </tr>
  
  
 
  <tr>
    <td bgcolor="#kitab"><div align="center">&nbsp;</div></td>
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
    <th><div align="center">tingkat/kelas</div></th>
	<th><div align="center">tempat</div></th>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">tingkat/kelas</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		
		
		?>
    </div></td>
  

    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
    <th><div align="center">tingkat/kelas</div></th>
	<th><div align="center">tempat</div></th>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">tingkat/kelas</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		
		
		?>
    </div></td>
  

    <td width="10%"><div align="center">04.00 - 05.30 </div></td>
    <td width="10%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">15.00 - 17.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='15.00-17.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">18.00 - 19.00 </div></td>
    <td><div align="center">
        <?php 
	$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='18.00-19.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp; </td> <td align=center> &nbsp; ";
		}
		
		?>
    </div></td>

    <td><div align="center">19.00 - 21.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='19.00-21.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=13% > $kelas[nama_ruang]";
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
    <th><div align="center">tingkat/kelas</div></th>
	<th><div align="center">tempat</div></th>
  </tr>
  
  <tr>
    <td width="20%"><div align="center">04.00 - 05.30 </div></td>
    <td width="20%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, ruang,  guru where harimengajar='minggu' 
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='04.00-05.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=34% > $kelas[tingkat] / $kelas[namakelas] </td><td align=center width=26% > $kelas[nama_ruang]";
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='15.00-17.00'");
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='18.00-19.00'");
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
						and jadwal.id_guru='$idguru' and jadwal.id_kelas=kelas.id_kelas and jadwal.id_ruang=ruang.id_ruang 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.tahunajaran='$_SESSION[tahunajaran]'  and jadwal.jammengajar='19.00-21.00'");
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
