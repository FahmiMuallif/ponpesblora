<?php
switch($_GET[act]){

  default:
   
   
    echo "<h2>Lihat Jadwal guru</h2> <hr/>
   
		  <br/><br/>
            <div class='table-responsive'>
		  <table class='table table-striped'>
		  
          <tr><th>no</th><th>Nip </th><th>Nama guru</th><th>Alamat</th><th>Nomor Telp</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM guru ORDER BY id_guru desc LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td >$r[nip]</td>
				<td >$r[nama_guru]</td>
				<td >$r[alamat]</td>
				<td >$r[notelp]</td>
               
               <td> <a href=?module=lihatjadwal&act=lihatdetil&id=$r[id_guru]  class='btn btn-info' title='Lihat Jadwal'><span class='glyphicon glyphicon-eye-open'></span></a> 
			
			   
			   </tr>";
      $no++;
    }
    echo "</table> </div>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM guru"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging> $linkHalaman</div><br>";
	
	
    break;
  
  
  
  
  
  
  
  // ===============================================================================================================================================================
  
  case 'lihatdetil':
  
  
  
  	$idguru=$_GET[id];
    echo "<h2>Detil Jadwal guru</h2> ";
        
		$queryguru = mysql_query(" select * from guru where id_guru = $idguru");
		$guru=mysql_fetch_array($queryguru);
	echo "<table width=100% class='table'> ";
	echo "<tr> <td width=200> Nama guru </td> <td> : $guru[nama_guru] </td> </tr>";
	echo "<tr> <td> NIP </td> <td> : $guru[nip] </td> </tr>";
	echo "<tr> <td>Alamat </td> <td> : $guru[alamat] </td> </tr>";
	echo "<tr> <td>No Telp </td> <td> : $guru[notelp] </td> </tr>";
	echo "</table> <br/> <br/>";
		
   	 ?>
	 
	 <table width="100%" border="1" >
  <tr>
    <th colspan="3"><div align="center">senin</div></th>
    <th colspan="3"><div align="center">selasa</div></th>
  </tr>
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">kelas</div></th>
	
   <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">kelas</div></th>
	
  </tr>
  
  <tr>
    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
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
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
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
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">09.15 - 09.30 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">09.15 - 09.30</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	
  </tr>
  <tr>
    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='09.30-10.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='09.30-10.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  
  <tr>
    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='10.15-11.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='10.15-11.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='11.00-11.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='11.00-11.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">11.45 - 12.00 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">11.45 - 12.00 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.00-12.45 '");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.00-12.45 '");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='senin' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.45-13.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">12.45 - 13.30</div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='selasa' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.45-13.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
</table>

	<br/>
	<br/>
	
  <table width="100%" border="1" >
  <tr>
    <th colspan="3"><div align="center">rabu</div></th>
    <th colspan="3"><div align="center">kamis</div></th>
  </tr>
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">kelas</div></th>
	
   <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">kelas</div></th>
	
  </tr>
  
  <tr>
    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
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
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
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
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">08.30 - 09.15 </div></td>

    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">09.15 - 09.30 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">09.15 - 09.30</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	
  </tr>
  <tr>
    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='09.30-10.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='09.30-10.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  
  <tr>
    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='10.15-11.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='10.15-11.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='11.00-11.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='11.00-11.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">11.45 - 12.00 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">11.45 - 12.00 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.00-12.45 '");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.00-12.45 '");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='rabu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.45-13.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">12.45 - 13.30</div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='kamis' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.45-13.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
</table>


<br/>
<br/>

 <table width="100%" border="1" >
  <tr>
    <th colspan="3"><div align="center">jumat</div></th>
    <th colspan="3"><div align="center">sabtu</div></th>
  </tr>
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">kelas</div></th>
	
   <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">kelas</div></th>
	
  </tr>
  
  <tr>
    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.00 - 07.45 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.00-07.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
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
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  

    <td width="13%"><div align="center">07.45 - 08.30 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='07.45-08.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
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
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>

    </div></td>
  

    <td width="13%"><div align="center">08.30 - 09.15 </div></td>
    <td width="16%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel, guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='08.30-09.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">09.15 - 09.30 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">09.15 - 09.30</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	
  </tr>
  <tr>
    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='09.30-10.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='09.30-10.15'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  
  <tr>
    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='10.15-11.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='10.15-11.00'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='11.00-11.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='11.00-11.45'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
 
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">11.45 - 12.00 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	<td bgcolor="#CCCCCC"><div align="center">11.45 - 12.00 </div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
    <td bgcolor="#CCCCCC"><div align="center">&nbsp;</div></td>
	
  </tr>
  
  
  <tr>
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.00-12.45 '");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.00-12.45 '");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
  
  
  <tr>
    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='jumat' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]' 
						 
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.45-13.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>

    <td><div align="center">12.45 - 13.30</div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel,  guru where harimengajar='sabtu' 
						and jadwal.id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						 and kelas.tahunajaran='$_SESSION[tahunajaran]'  
						and jadwal.id_mapel=mapel.id_mapel and jadwal.jammengajar='12.45-13.30'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[nama_mapel] </td> <td align=center width=17% > $kelas[namakelas] </td>";
		} else {
			echo " &nbsp; </td> <td align=center> &nbsp;  ";
		}
		
		?>
    </div></td>
  </tr>
</table>

<?php	  


  
  break;

}

?>
