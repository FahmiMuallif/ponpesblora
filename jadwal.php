
<?php
  
  $data=mysql_query("select * from siswa, riwayatkelas, kelas 
					where siswa.id_siswa='$_SESSION[idsiswa]'
					and riwayatkelas.id_siswa=siswa.id_siswa 
					and riwayatkelas.id_kelas=kelas.id_kelas
					and kelas.tahunajaran='$tahunajaran'");
					 
					$isi=mysql_fetch_array($data);
					
  	$idkelas=$isi[id_kelas];
   
        
	$querykelas = mysql_query(" select * from kelas, guru 
								where id_kelas = $idkelas 
								and kelas.tahunajaran='$tahunajaran'
								and kelas.walikelas=guru.id_guru");
		$kelas=mysql_fetch_array($querykelas);
 
		
   	 ?>
	 <br/>
	 <div class="table-responsive">
	
	<table width="100%" border="1" class="tabelku">
  <tr>
    <th colspan="4"><div align="center">Senin</div></th>
    <th colspan="4"><div align="center">Selasa</div></th>
  </tr>
  
  <tr> 
  <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">Guru</div></th>
	<th><div align="center">Tempat</div></th>
   <th><div align="center">Jam </div></th>
  <th><div align="center">Materi</div></th>
    <th><div align="center">Guru</div></th>
	<th><div align="center">Tempat</div></th>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
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
	
	<table width="100%" border="1" class="tabelku">
  <tr>
    <th colspan="4"><div align="center">Rabu</div></th>
    <th colspan="4"><div align="center">Kamis</div></th>
  </tr>
  
  <tr>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">Guru</div></th>
	<th><div align="center">Tempat</div></th>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">Guru</div></th>
	<th><div align="center">Tempat</div></th>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
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

<table width="100%" border="1" class="tabelku">
  <tr>
    <th colspan="4"><div align="center">Jumat</div></th>
    <th colspan="4"><div align="center">Sabtu</div></th>
  </tr>
  
  <tr>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">Guru</div></th>
	<th><div align="center">Tempat</div></th>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">Guru</div></th>
	<th><div align="center">Tempat</div></th>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
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
</table>

<table width="50%" border="1" class="tabelku">
  <tr>
    <th colspan="4"><div align="center">Minggu</div></th>
  </tr>
  
  <tr>
    <th><div align="center">Jam </div></th>
    <th><div align="center">Materi</div></th>
    <th><div align="center">Guru</div></th>
	<th><div align="center">Tempat</div></th>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
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
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
    <td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>
	<td bgcolor="#F1F1F1"><div align="center">&nbsp;</div></td>

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
	 
    </div> 


