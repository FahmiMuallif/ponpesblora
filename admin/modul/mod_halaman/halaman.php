 

<?php


$aksi="modul/mod_halaman/aksi_halaman.php";
switch($_GET[act]){
  // Tampil halaman
  default:
    
	echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Halaman </h1>
                        <p class="title-description"> Edit Halaman Profile Pondok Pesantren  </p>
                    </div>
                    <section class="section">
                      
	';
	
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
										
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						 <input type=button class='btn btn-success'  value='Tambah Halaman' onclick=\"window.location.href='?module=halaman&act=tambahhalaman';\"> 
					</div>
					 
					 
				</div>
			
		<div class='table-responsive' style='padding:3px;'>
			  
		  <table class='table table-condensed table-hover'><thead>
          <tr><th width=50>No</th>
			  <th >Judul</th>
			  <th width=150>Tgl. Update</th>
			  <th width=150>Aksi</th>
		  </tr>
		  </thead>";

    

 
    $tampil = mysql_query("SELECT * FROM halaman ORDER BY id_halaman DESC");
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 5;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
    if(isset($_POST['pencarian'])) {
		$tampil=mysql_query("SELECT * FROM halaman WHERE judul like '%".$_POST[pencarian]."%' ORDER BY id_halaman DESC");
	} else {
		 $tampil=mysql_query("SELECT * FROM halaman  ORDER BY id_halaman DESC limit $mulai, $limit");
	}
	
    $no= ($posisi-$limit) +1; 
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tgl_posting]);
      echo "<tr><td align=center>$no</td> 
                <td>$r[judul]</td>
                <td align=center>$tgl_posting</td>
		        <td align=center><a href=?module=halaman&act=edithalaman&id=$r[id_halaman] class='btn btn-sm btn-warning'>Edit</a> ";
					
		 
			?>
			 
			  <form method="POST" action="<?php echo $aksi.'?module=halaman&act=hapus&id='.$r[id_halaman]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Halaman" data-message="Apakah Anda Yakin Akan Menghapus Halaman Dengan Judul <?php echo $r[judul];?> ?">
        			Hapus
    				</button>
				</form>
			 
			<?php
		 
					
	echo"				</td>
		        </tr>";
      $no++;
    }
    echo "</table>";
		
		$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
		$pagination = (new Pagination());
		$pagination->setCurrent($page);
		$pagination->setTotal($jumlahdata);
		$pagination->setRPP($limit); 
		$markup = $pagination->parse();
					
	echo "<div class='pull-right' style='margin-right:10px;'>".$markup."</div> 
		<div class='clearfix'></div>";
					
					
	echo "</div> 

	</section>
	</div>
    </section>
	</article>";

 
 
    break;
  
  
  
  
  
  
  
  
  
  
  
  case "tambahhalaman":
  ?>
    
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Halaman </h1>
                        <p class="title-description"> Tambah Halaman  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
		
		
          <form method=POST action=<?php echo $aksi.'?module=halaman&act=input'; ?> enctype='multipart/form-data' class='form-horizontal' parsley-validate >
          
		  
		  <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Judul  </label>
				<div class='col-sm-7'>
					   <input type=text name='judul' class='form-control required' placeholder="Judul">  
				</div>
			</div>
			
		 
		 <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Isi Halaman  </label>
				<div class='col-sm-7'>
					    
					   <textarea name='isi' class='form-control required' placeholder="Isi Halaman"  ></textarea>
				</div>
			</div>
			
			
		 
			
			 <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > &nbsp; </label>
				<div class='col-sm-7'>
					  &nbsp; 
				</div>
			</div>
			
			
       <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > &nbsp; </label>
				<div class='col-sm-7'>
					     <input type=submit value=Simpan class="btn btn-success">
						 <input type=button value=Batal onclick=self.history.back() class="btn btn-warning"> 
						 
                            
				</div>
			</div>	
			
			 
  </form> 
	</section>
	</div>
    </section>
	</article>
	
	<?php
     break;
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    
  case "edithalaman":
    $edit = mysql_query("SELECT * FROM halaman WHERE id_halaman='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
	?>
		  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Halaman </h1>
                        <p class="title-description"> Edit Halaman  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		
		
          <form method=POST enctype='multipart/form-data' class='form-horizontal'  action='<?php echo $aksi.'?module=halaman&act=update'; ?>' parsley-validate >
          <input type=hidden name=id value=<?php echo $r[id_halaman]; ?>>
		  
		  
	 <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Judul  </label>
				<div class='col-sm-7'>
					   <input type=text name='judul' class='form-control required' value='<?php echo $r[judul]; ?>'>  
				</div>
			</div>
			
		 
		 <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > Isi Halaman  </label>
				<div class='col-sm-7'>
					    
					   <textarea name='isi' class='form-control required'  ><?php echo $r[isi]; ?></textarea>
				</div>
			</div>
			
			
		 
			
		
		<div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' > &nbsp; </label>
				<div class='col-sm-7'>
					  &nbsp; 
				</div>
			</div>
			
			
			
       <div class='form-group row'>
				<label class='col-sm-3 control-label no-padding-right' >  </label>
				<div class='col-sm-7'>
					     <input type=submit value=Simpan class="btn btn-success">
						 <input type=button value=Batal onclick=self.history.back() class="btn btn-warning"> 
						 
                            
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
