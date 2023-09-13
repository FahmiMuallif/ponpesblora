
<?php
switch($_GET[act]){

  default:
  
  	$idguru=$_GET[id];
    echo "<h2>Jadwal Guru</h2> ";
        
		$queryguru = mysql_query(" select * from guru where id_guru = $idguru");
		$guru=mysql_fetch_array($queryguru);
	echo "<table width=50% > ";
	echo "<tr> <td width=100> Nama Guru </td> <td> : $guru[nama_guru] </td> </tr>";
	echo "<tr> <td> NIP </td> <td> : $guru[nip] </td> </tr>";
	echo "<tr> <td>Alamat </td> <td> : $guru[alamat] </td> </tr>";
	echo "<tr> <td>No Telp </td> <td> : $guru[notelp] </td> </tr>";
	echo "</table> <br/> <br/>";
		
   	 ?>
	 
	 <table width="100%" border="1">
  <tr>
    <th colspan="3">Senin</th>
    <th colspan="3">Selasa</th>
  </tr>
  
  <tr> 
  <th>Jam </th>
  <th>Kelas</th>
   <th>Mapel</th>
  <th>Jam </th>
  <th>Kelas</th>
   <th>Mapel</th>
  </tr>
  
  <tr>
    <td width="18%"><div align="center">07.00 - 07.45 </div></td>
    <td width="15%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='1'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		
		
		?>
    </div></td>
  

    <td width="18%"><div align="center">07.00 - 07.45 </div></td>
    <td width="15%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='1'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  
  <tr>
    <td><div align="center">07.45 - 08.30</div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='2'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}
		else {
			echo " &nbsp; </td> <td align=center> ";
		}
		?>
    </div></td>
  
    <td><div align="center">07.45 - 08.30</div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='2'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		 
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">08.30 - 09.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='3'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
    
    <td><div align="center">08.30 - 09.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='3'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
	<td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='4'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='4'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='5'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='5'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='6'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='6'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
	<td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='7'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='7'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Senin' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='8'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Selasa' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='8'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
</table>

	<br/>
	<br/>
	
	<table width="100%" border="1">
  <tr>
    <th colspan="3">Rabu</th>
    <th colspan="3">Kamis</th>
  </tr>
  
  <tr> 
  <th>Jam </th>
  <th>Kelas</th>
   <th>Mapel</th>
  <th>Jam </th>
  <th>Kelas</th>
   <th>Mapel</th>
  </tr>
  
  <tr>
    <td width="18%"><div align="center">07.00 - 07.45 </div></td>
    <td width="15%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='1'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		
		
		?>
    </div></td>
  

    <td width="18%"><div align="center">07.00 - 07.45 </div></td>
    <td width="15%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='1'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  
  <tr>
    <td><div align="center">07.45 - 08.30</div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='2'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}
		else {
			echo " &nbsp; </td> <td align=center> ";
		}
		?>
    </div></td>
  
    <td><div align="center">07.45 - 08.30</div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='2'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		 
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">08.30 - 09.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='3'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
    
    <td><div align="center">08.30 - 09.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='3'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
	<td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='4'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='4'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='5'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='5'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='6'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='6'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
	<td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='7'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='7'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Rabu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='8'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Kamis' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='8'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
</table>


<br/>
<br/>

<table width="100%" border="1">
  <tr>
    <th colspan="3">Jumat</th>
    <th colspan="3">Sabtu</th>
  </tr>
  
  <tr> 
  <th>Jam </th>
  <th>Kelas</th>
   <th>Mapel</th>
  <th>Jam </th>
  <th>Kelas</th>
   <th>Mapel</th>
  </tr>
  
  <tr>
    <td width="18%"><div align="center">07.00 - 07.45 </div></td>
    <td width="15%"><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='1'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		
		
		?>
    </div></td>
  

    <td width="18%"><div align="center">07.00 - 07.45 </div></td>
    <td width="15%"><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel 
						and jadwal.jammengajar='1'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  
  <tr>
    <td><div align="center">07.45 - 08.30</div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='2'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}
		else {
			echo " &nbsp; </td> <td align=center> ";
		}
		?>
    </div></td>
  
    <td><div align="center">07.45 - 08.30</div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='2'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		 
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">08.30 - 09.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='3'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
    
    <td><div align="center">08.30 - 09.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='3'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
	<td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='4'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		}else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">09.30 - 10.15 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='4'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='5'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">10.15 - 11.00 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='5'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='6'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">11.00 - 11.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='6'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td bgcolor="#FF9900"><div align="center">Istirahat</div></td>
    <td><div align="center"></div></td>
	<td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='7'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  
    <td><div align="center">12.00 - 12.45 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='7'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
      <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Jumat' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='8'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>

    <td><div align="center">12.45 - 13.30 </div></td>
    <td><div align="center">
        <?php 
		$carijadwal=mysql_query ("select * from jadwal, kelas, mapel where harimengajar='Sabtu' and id_guru='$idguru' 
						and jadwal.id_kelas=kelas.id_kelas 
						and jadwal.id_mapel=mapel.id_mapel
						and jadwal.jammengajar='8'");
		$kelas = mysql_fetch_array($carijadwal);
		$ketemu = mysql_num_rows($carijadwal);
		
		if ($ketemu > 0 ) {
			echo "$kelas[namakelas] </td> <td align=center> $kelas[nama_mapel]";
		} else {
			echo " &nbsp; </td> <td align=center> ";
		}
		
		?>
    </div></td>
  </tr>
</table>

<?php	  

		
    break;
 
}

?>
