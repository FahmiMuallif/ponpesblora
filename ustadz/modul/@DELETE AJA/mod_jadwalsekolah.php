<?php
switch($_GET[act]){

  default:
    echo "<nav id='breadcrumbs'>
                <ul>
                    <li><a href='dashboard.php?module=home'>Home</a></li>
					<li>Kelola Jadwal Sekolah</li>  
                           
                     </ul>


            </nav>

            <!-- main content -->
            <div id='main_wrapper'>
                <div class='container-fluid'>
                    <div class='row'>
                    <div class='col-lg-12'>
                    
    	<h2 class='heading_a'><span class ='heading_text'>Kelola Jadwal Sekolah</span></h2> 
		  <br/> 
          <div class='table-responsive'>
		  <table id='datatable_demo' class='table table-striped'>
          <thead><tr> <th> No </th><th>Kelas </th> <th>Tingkat</th><th> Wali Kelas </th><th> Tahun Ajaran</th><th width=160>Aksi</th></tr></thead><tbody>"; 
		  
	 
	 		  
    $tampil=mysql_query("select * from kelas, guru where tahunajaran='$_SESSION[tahunajaran]' and kelas.walikelas=guru.id_guru ORDER BY id_kelas asc  ");
      $no = 1;
    while($r=mysql_fetch_array($tampil)){

       echo "<tr>
	   			<td> $no </td>
	   		 
			 <td >$r[namakelas]</td>
			 <td >$r[tingkat]</td>
			 <td >$r[nama_guru]</td>
			 <td >$r[tahunajaran]</td>
             <td> 
			 
			 <a href=?module=jadwalkelas&act=lihatjadwal&id=$r[id_kelas] class='btn btn-info' title='Lihat Jadwal'>
			 <span class='glyphicon glyphicon-eye-open'></span> </a> 
			 
			 <a href=?module=jadwalkelas&act=editjadwal&id=$r[id_kelas] class='btn btn-success' title='Kelola Jadwal'>
			 <span class='glyphicon glyphicon-list'></span> </a> 

             </td></tr>";
      $no++;
    }
    echo "</tbody></table> </div>
	
	</div>
				</div>
            </div>
            </div>
     </div>
	 ";
	 
    break;
  
  
  

}

?>
