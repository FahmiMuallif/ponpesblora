<?php
date_default_timezone_set('Asia/Jakarta');
session_start();
 
$aksi="modul/database/aksi_database.php";
switch($_GET[aksi]){
default:
$path="modul/database/backup/";

if($_GET['act']=="backup")
{
	include "fungsi.php";
	backup_tables(); // Cuma backup tabel doang buat keperluan restore
	echo "<meta http-equiv='refresh' content='2; url=dashboard.php?module=database'>";
}

 
elseif ($_GET['act']=="restore")
{
				// Restore Tabel
				$filename = $path.$_GET['file']; // Path File
				$templine = ''; // Temporary variable, used to store current query
				$lines = file($filename); // Read in entire file
				foreach ($lines as $line) // Loop through each line
				{
					if (substr($line, 0, 2) == '--' || $line == '') // Skip it if it’s a comment
						continue;
					$templine .= $line; // Add this line to the current segment
					if (substr(trim($line), -1, 1) == ';') // If it has a semicolon at the end, it’s the end of the query
					{
						mysql_query($templine); // Perform the query
						$templine = ''; // Reset temp variable to empty
					}
				}
					echo "<script>alert('Database berhasil direstore'); window.location = 'dashboard.php?module=database'</script>";
}

elseif ($_GET['act']=="hapus")
{
	if(unlink($path.$_GET['file'])){
		echo "<meta http-equiv='refresh' content='0; url=dashboard.php?module=database'>";
	}else{
	echo "<script>alert('File gagal dihapus'); window.location = 'dashboard.php?module=database'</script>";
	}
}

elseif ($_GET['act']=="hapusbackup")
{
	if(unlink('../saniharto.zip')){
		echo "<meta http-equiv='refresh' content='0; url=dashboard.php?module=database'>";
	}else{
	echo "<script>alert('File gagal dihapus'); window.location = 'dashboard.php?module=database'</script>";
	}
}

if ($handle = opendir($path)) {
 ?>
	
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Backup Basisdata </h1>
                        <p class="title-description"> Backup dan Restore Basisdata </p>
                    </div>
                    <section class="section">
    

	<?php
    
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
	
	?>
 

 
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>         
                
  <?php               
echo "<form method='post'>			
          
							 <a class='btn btn-info square-btn-adjust' href='?module=database&act=backup'><i class='fa fa-download'></i> Backup</a>
							 
							 
							<span style='float: right;'> 
									<a class='btn btn-warning square-btn-adjust' href='?module=database&aksi=upload'><i class='fa fa-upload'></i> Upload</a>
									</span> 
								<br/><br/>
                                <table  id='example1' class='table table-striped table-bordered table-hover datatable' >
                                    <thead>
                                        <tr>
                                            <th style='text-align:center' data-hide='phone'>No</th>
											<th data-hide='phone'>Nama</th>
                                            <th>Dibuat Tanggal</th>
                                            <th style='text-align:center' data-hide='phone'>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
											";
											$no = 1;
											while (false !== ($file = readdir($handle)))
												if ($file != "." && $file != ".." && strpos($file, ".sql",1) && $s = explode("-",$file))
												echo"
											<tr>
												<td style='text-align:center'>".$no++."</td>
												<td><a href='modul/database/download.php?file=$file'>$file</a></td>
												<td>".@date('d M Y H:i:s',$s[2])."</td>
												<td style='text-align:center'>
												
												<a class='btn btn-sm btn-success square-btn-adjust' href='?module=database&act=restore&file=$file' onClick=\"return confirm('Apakah Anda benar-benar mau merestore database? Data terbaru anda mungkin akan hilang!')\">Restore</a>
												
												<a class='btn btn-sm btn-danger square-btn-adjust' href='?module=database&act=hapus&file=$file' onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\">HAPUS</a></td>
											</tr>
											";
											closedir($handle);
											echo"
                                    </tbody>
									 
                                </table>
                       
	</form>
	   </section>
	</div>
    </section>
	</article>
";    
}
break;




case "upload":

	?>
	 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Backup Basisdata </h1>
                        <p class="title-description"> Upload Basisdata </p>
                    </div>
                    <section class="section">
    

	<?php
    
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
	
	 
						echo "
						
						<div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>  
										
      
                            <div class='row'>
                                <div class='col-md-12'>
                                    <form method='post' action='modul/database/aksi_database.php?act=upload' enctype='multipart/form-data'>
                                        <div class='form-group'>
											<label>File SQL</label>
											<input type='file' name='fupload'></input>
                                        </div>
								</div>
                            </div>
                        
						 
                                        <button type='submit' class='btn btn-primary square-btn-adjust'>  Upload</button>
										
										<a class='btn  btn-warning square-btn-adjust' onClick='self.history.back()'>  Batal</a>
                                    </form>
                        
		</section>
	</div>
    </section>
	</article>
	
";
break;

 
 
}//penutup switch
 
?>