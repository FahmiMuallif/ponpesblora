 
		

		
<?php 

switch($_GET[act]){
  // Tampil biayapendidikan
  default:
  	
   
   echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Biaya Pendidikan </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Biaya Pendidikan</p>
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
						   <input type=button class='btn btn-success' value='Tambah Biaya Pendidikan ' onclick=location.href='?module=biayapendidikan&act=tambahbiayapendidikan'>
					</div>
					 
					<div class='col-sm-4'>
						 <div align='right'>
						<form method='POST' action='dashboard.php?module=biayapendidikan' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder='Nama Biaya ' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-success' type='button' style='height:34px; border-radius:0px 4px 4px 0px;'><span class='input-group-btn'></span>Cari</button></span>
							</div> 
						</form>
						 </div>
					</div>
				</div>
				<div class='table-responsive' style='padding:3px;'>  ";
	 
	
	
		  
        echo "   
		  <table  class='table table-condensed'>
          <thead>
		  <tr>
			<th>no</th>
			<th>Tingkat</th>
			<th>Nama Komponen Biaya</th>
			<th>Deskripsi</th>
			<th>Besaran Biaya (/Tahun) </th>
			<th>Jumlah Angsuran </th>
			<th>Detail Tagihan </th>
			<th width=160>aksi</th></tr>
		  </thead> <tbody>";

   
 
      $tampil = mysql_query("SELECT * FROM biayapendidikan  WHERE tahunajaran='$_SESSION[tahunajaran]' ORDER BY id_biaya ASC ");
	  
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 10;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
    if(isset($_POST['pencarian'])) {
		$tampil=mysql_query("SELECT * FROM biayapendidikan WHERE nama_biaya like '%".$_POST[pencarian]."%' AND  tahunajaran='$_SESSION[tahunajaran]' ORDER BY id_biaya ASC");
	} else {
		 
      $tampil = mysql_query("SELECT * FROM biayapendidikan  WHERE tahunajaran='$_SESSION[tahunajaran]' ORDER BY id_biaya ASC limit $mulai, $limit");
		 
	}
	
    $no= ($posisi-$limit) +1;   
    while($r=mysql_fetch_array($tampil)){
		
		$cari = mysql_query("SELECT * FROM biayapendidikandetail  WHERE id_biaya='$r[id_biaya]' ");
		$jumlahangsur=mysql_num_rows($cari);
	
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td align='center'>$no</td>
				<td align='center'>$r[tingkat]</td>
				<td>$r[nama_biaya]</td>
                <td>$r[deskripsi_biaya]</td>
                <td align='center'>".number_format($r[besar_biaya],0,',','.')."</td>
				<td align='center'>$jumlahangsur</td>
				<td align='center'><a href=?module=biayapendidikan&act=kelolatagihan&id=$r[id_biaya] class='btn btn-sm  btn-success' title='Kelola'>  Kelola</a> 
  	              </td>
		            <td align='center'><a href=?module=biayapendidikan&act=editbiayapendidikan&id=$r[id_biaya] class='btn btn-sm  btn-warning' title='Edit'>  Edit</a> "; ?>
	              
				   
				     <form method="POST" action="./modul/mod_biayapendidikan/aksi_biayapendidikan.php?module=biayapendidikan&act=hapus&id=<?php echo $r['id_biaya']; ?>"   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Biaya Pendidikan" data-message="Apakah Anda Yakin Akan Menghapus Komponen Biaya <?php echo $r[nama_biaya];?> ?"> Hapus
    				</button>
				</form>
				
				
				   <?php echo "</td>
		        </tr>";
      $no++;
    }
     echo "</tbody></table>  ";
 
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
	</article>
	";
	
 
    break;
  
  
  
  
  case "tambahbiayapendidikan":
  
  ?>
  
  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Biaya Pendidikan </h1>
                        <p class="title-description"> Tambah Biaya Pendidikan </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_biayapendidikan/aksi_biayapendidikan.php?module=biayapendidikan&act=input' role="form" parsley-validate>

	<input type="hidden" name="tahunajaran"  value="<?php $_SESSION[tahunajaran]; ?>">
	
  	<div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label">Tingkat</label>
		<div class="col-sm-4">
		  <select name="tingkat"  class="form-control required" >
			<option value="">-- Pilih Tingkat Kelas --</option>
			<?php
			$cari = mysql_query("SELECT distinct(tingkat) FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' ");
			while($k=mysql_fetch_array($cari)){
				echo "<option value='$k[tingkat]'>$k[tingkat]</option>";
			}
			?>
		 </select>
		</div>
	</div>
	

 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Biaya</label>
		<div class="col-sm-6">
		<input type="text" name="namabiaya" class="form-control required" placeholder="Nama Biaya">
		</div>
	</div>
	 
   
    <div class="form-group row" >
		<label for="isi_biayapendidikan" class="col-sm-3 control-label">Deskripsi</label>
		<div class="col-sm-8">
		<textarea name="deskripsi" class="form-control validate[required]"  placeholder="Deskripsi" rows="3"></textarea>
		</div>
	</div>

         

	  <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Besar Biaya</label>
		<div class="col-sm-6">
		<input type="text" name="besaran" class="form-control" placeholder="Besar Biaya">
		</div>
	</div>
	

			
			
		<div class="form-group row" >
		<label for="password" class="col-sm-3 control-label"></label>
		<div class="col-sm-6">
		 <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
			<input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()' >
		</div>
	</div>
	
	</form>
	
	   </section>
	</div>
    </section>
	</article>
	
		  
	<?php
     break;
	 
	 
	 
	 
	 
	 
	 
    
  case "editbiayapendidikan":
    $edit = mysql_query("SELECT * FROM biayapendidikan WHERE id_biaya='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
	   
	   
  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Biaya Pendidikan </h1>
                        <p class="title-description"> Edit Biaya Pendidikan </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
		
		
		
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_biayapendidikan/aksi_biayapendidikan.php?module=biayapendidikan&act=update' role="form">
	<input type=hidden name=id value='<?php echo $r[id_biaya]; ?>'>
   
   <input type="hidden" name="tahunajaran"  value="<?php $_SESSION[tahunajaran]; ?>">
   	
  
  <div class="form-group row" >
		<label for="nama_mapel" class="col-sm-3 control-label">Tingkat</label>
		<div class="col-sm-4">
		  <select name="tingkat"  class="form-control  required" >
    
			<?php
			$cari = mysql_query("SELECT distinct(tingkat) FROM kelas WHERE tahunajaran='$_SESSION[tahunajaran]' ");
			while($k=mysql_fetch_array($cari)){
				if($k[tingkat]==$r[tingkat]) { $terpilih="selected=selected"; } else { $terpilih=""; } 
				echo "<option value='$k[tingkat]' $terpilih>$k[tingkat]</option>";
			}
			?> 
		  
					 
			  
		 </select>
		</div>
	</div>
	

 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Nama Biaya</label>
		<div class="col-sm-6">
		<input type="text" name="namabiaya" class="form-control required" placeholder="Nama Biaya" value="<?php echo $r[nama_biaya]; ?>">
		</div>
	</div>
	
 
   
   
    <div class="form-group row" >
		<label for="isi_biayapendidikan" class="col-sm-3 control-label">Deskripsi</label>
		<div class="col-sm-8">
		<textarea name="deskripsi" class="form-control validate[required]"  placeholder="Deskripsi" rows="3"><?php echo $r[deskripsi_biaya]; ?></textarea>
		</div>
	</div>

         

	  <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Besar Biaya</label>
		<div class="col-sm-6">
		<input type="text" name="besaran" class="form-control" placeholder="Besar Biaya" value="<?php echo $r[besar_biaya]; ?>">
		</div>
	</div>
	
	
	
	<div class="form-group row" >
		<label for="password" class="col-sm-3 control-label"></label>
		<div class="col-sm-6">
		 <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
			<input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()' >
		</div>
	</div>
	
	</form>
	
	
	   </section>
	</div>
    </section>
	</article>
	
	<?php
    break;  





    case "kelolatagihan":
   
   $carikelas = mysql_query("SELECT * FROM biayapendidikan where id_biaya='$_GET[id]' ");
   $kelas=mysql_fetch_array($carikelas); 
   $namakelas=$kelas[nama_biaya];
   $tingkat=$kelas[tingkat];
  ?>
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Tagihan  Biaya <font size='6'> <?php echo $namakelas; ?> Tingkat <?php echo $tingkat; ?> </font> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?></h1>
                        <p class="title-description"> Detail Tagihan  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
    <?php 	 
		 
   
     echo " <input type=button class='btn btn-success' value='Tambah Detail' onclick=location.href='?module=biayapendidikan&act=tambahdetail&id=$_GET[id]'>
          
		  <br/><br/>";
		  
		  
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
	
	
         echo " <div class='table-responsive'>
		  <table id='datatable_demo' class='table table-striped'>
		  <thead>
          <tr>
			<th>no</th>
			<th>angsuran ke</th>
			<th>besar tagihan</th>
			<th>tgl terlambat</th>
			<th width=150>aksi</th>
		  </tr>
		  </thead><tbody>";


    $tampil = mysql_query("SELECT * FROM biayapendidikandetail
					WHERE id_biaya='$_GET[id]' 
					ORDER BY id_detailbiaya ASC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td align='center'>$no</td>
                <td align='center'>$r[angsuran_ke]</td>
                <td align='center'>".number_format($r[tagihan],0,',','.')."</td>
				 <td align='center' >$r[tgl_terlambat]</td>
               <td align='center'> <a href=?module=biayapendidikan&act=editdetail&id=$r[id_biaya]&idt=$r[id_detailbiaya] class='btn btn-sm btn-warning' title='Edit'>  Edit</a> "; ?>
			   
			    
				
				
				 <form method="POST" action="./modul/mod_biayapendidikan/aksi_biayapendidikan.php?module=biayapendidikan&act=hapusdetail&id=<?php echo $r[id_biaya].'&idt='.$_GET[id_detailbiaya];?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Siswa" data-message="Apakah Anda Yakin Akan Menghapus Data Angsuran Ke <?php echo $r[angsuran_ke];?> ?">
        			<span class='glyphicon glyphicon-trash'></span>Hapus
    				</button>
				</form>
				
				
		
	<?php	
	  echo " </td>  </tr>";
      $no++;
    }
    echo "</tbody></table></div>
	 	</section>
	</div>
    </section>
	</article>
	";


   break;
   
   




  
  case "tambahdetail":
  
  $carikelas = mysql_query("SELECT * FROM biayapendidikan where id_biaya='$_GET[id]' ");
   $kelas=mysql_fetch_array($carikelas); 
   $namakelas=$kelas[nama_biaya];
   $tingkat=$kelas[tingkat];
  ?>
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Tagihan  Biaya <font size='6'> <?php echo $namakelas; ?> Tingkat <?php echo $tingkat; ?> </font> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?></h1>
                        <p class="title-description"> Tambah Detail Tagihan  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
    
 		 

  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_biayapendidikan/aksi_biayapendidikan.php?module=biayapendidikan&act=inputdetail' role="form" parsley-validate>

  		<input type="hidden" name="idbiaya" class="form-control" id="judul" value="<?php echo $_GET[id]; ?>">
  
   <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Angsuran Ke</label>
		<div class="col-sm-6">
		<input type="text" name="angsuranke" class="form-control validate[required]" id="judul" placeholder="Angsuran Ke">
		</div>
	</div>
   
       <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Besar Tagihan</label>
		<div class="col-sm-6">
		<input type="text" name="besartagihan" class="form-control validate[required]" id="judul" placeholder="Besar Tagihan">
		</div>
	</div>

         
	 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tanggal Terlambat Bayar</label>
		<div class="col-sm-4">
		<input type="text" name="tglterlambat" class="datepicker-input  form-control required date-picker" id="tanggal" data-date-format="yyyy-mm-dd"  placeholder="Tanggal Terlambat Bayar">
		</div>
	</div>
	

	
			
			
		<div class="form-group row" >
		<label for="File" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		 <input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
			<input type=button value=Batal onclick=self.history.back() class="btn btn-warning"> 
		</div>
	</div>
	
	</form>
	
  </section>
	</div>
    </section>
	</article>
		  
		  <div class='clearfix'></div>
	<br/> <br/> <br/> <br/> <br/><br/>
		  
	<?php
     break;
	 
	 
	 
	 
	 
	 
	 
    
  case "editdetail":
  $carikelas = mysql_query("SELECT * FROM biayapendidikan where id_biaya='$_GET[id]' ");
   $kelas=mysql_fetch_array($carikelas); 
   $namakelas=$kelas[nama_biaya];
   $tingkat=$kelas[tingkat];


   $caridetail = mysql_query("SELECT * FROM biayapendidikandetail where id_detailbiaya='$_GET[idt]' ");
   $d=mysql_fetch_array($caridetail); 



  ?>
    <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Tagihan  Biaya <font size='6'> <?php echo $namakelas; ?> Tingkat <?php echo $tingkat; ?> </font> Tahun Ajaran <?php echo $_SESSION[tahunajaran]; ?></h1>
                        <p class="title-description"> Edit Detail Tagihan  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
										
	
		
  <form id="formulir" enctype="multipart/form-data" class="form-horizontal" method="post" action='./modul/mod_biayapendidikan/aksi_biayapendidikan.php?module=biayapendidikan&act=updatedetail' role="form" parsley-validate>

		<input type="hidden" name="idbiaya" class="form-control" id="judul" value="<?php echo $_GET[id]; ?>">
		<input type="hidden" name="idbiayadetail" class="form-control" id="judul" value="<?php echo $_GET[idt]; ?>">
  
   <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Angsuran Ke</label>
		<div class="col-sm-6">
		<input type="text" name="angsuranke" class="form-control validate[required]" id="judul" placeholder="Angsuran Ke" value="<?php echo $d[id_biaya]; ?>">
		</div>
	</div>
   
       <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Besar Tagihan</label>
		<div class="col-sm-6">
		<input type="text" name="besartagihan" class="form-control validate[required]" id="judul" placeholder="Besar Tagihan" value="<?php echo $d[tagihan]; ?>">
		</div>
	</div>

         
	 <div class="form-group row" >
		<label for="Judul" class="col-sm-3 control-label">Tanggal Terlambat Bayar</label>
		<div class="col-sm-4">
		<input type="text" name="tglterlambat" value="<?php echo $d[tgl_terlambat]; ?>" class="datepicker-input  form-control required date-picker" id="tanggal" data-date-format="yyyy-mm-dd"  placeholder="Tanggal Terlambat Bayar">
		</div>
	</div>
	 
			
			
	<div class="form-group row" >
		<label for="File" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		 <input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
			<input type=button value=Batal onclick=self.history.back() class="btn btn-warning"> 
		</div>
	</div>
	
	</form>
	
		 	 
		 </section>
	</div>
    </section>
	</article>
	
		  <div class='clearfix'></div>
	<br/> <br/> <br/> <br/> <br/><br/>
	
	<?php
    break;  



}
?>
