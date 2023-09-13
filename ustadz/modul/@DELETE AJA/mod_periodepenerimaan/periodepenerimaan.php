 
<?php
switch($_GET[act]){

  default:

    $tampil=mysql_query("SELECT * FROM periodepenerimaan "); 
	$jumlahdata=mysql_num_rows($tampil);
	
	
    echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Periode Penerimaan </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Periode Penerimaan</p>
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
						   <input type=button class='btn btn-success' value='Tambah Periode Penerimaan' onclick=location.href='?module=periodepenerimaan&act=tambahperiodepenerimaan'>
					</div>
					 
					<div class='col-sm-4'>
						<div style='text-align:right'>
						<form method='POST' action='dashboard.php?module=periodepenerimaan' class='form-inline'>
							<div class='input-group'>
								<input name='pencarian' class='input-sm form-control' placeholder='Nama Periode ' type='text'> <span class='input-group-btn'><button type='Submit' class='btn btn-sm btn-success' type='button' style='height:34px; border-radius:0px 4px 4px 0px;'><span class='input-group-btn'></span>Cari</button></span>
							</div> 
						</form>
						 </div>
					</div>
				</div>
				<div class='table-responsive' style='padding:3px;'>  ";
		  
		  
	 
	
	
        echo "  
		  <table  class='table table-condensed table-hovered'>
		  <thead>
          <tr>
			  <th width=50>no</th> 
			  <th>Nama Periode  </th>
			  <th> Tanggal Pelaksanaan</th>
			  <th> Pendaftaran</th>
			  <th> Pengumuman</th>
			  <th width=150> Aksi</th>
		  </tr>
		  </thead><tbody>"; 
		  
	  
   
	
    $tampil=mysql_query("SELECT * FROM periodepenerimaan "); 
	$jumlahdata=mysql_num_rows($tampil);
	
	 
	$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1; 
	
	 		 
	$limit = 5;  
 	$posisi = $page * $limit;
	$mulai	=	$posisi-$limit;
  
    if(isset($_POST['pencarian'])) {
		$tampil=mysql_query("SELECT * FROM periodepenerimaan WHERE nama_periode like '%".$_POST[pencarian]."%' AND  ORDER BY id_periode ASC");
	} else {
		 $tampil=mysql_query("SELECT * FROM periodepenerimaan  ORDER BY id_periode ASC limit $mulai, $limit");
	}
	
    $no= ($posisi-$limit) +1;  
    while ($r=mysql_fetch_array($tampil)){
	
		 
		 
       echo "<tr>
			<td align='center'>$no</td>
            <td align='center'>$r[nama_periode]</td>
            <td >".tgl_indo($r[tgl_mulai])."-".tgl_indo($r[tgl_selesai])."</td>
			<td >".tgl_indo($r[tgl_mulai_pendaftaran])."-".tgl_indo($r[tgl_selesai_pendaftaran])."</td>
			    <td >".tgl_indo($r[tgl_pengumuman])."</td> ";
			 
		 
        echo " <td ><a href=?module=periodepenerimaan&act=editperiodepenerimaan&id=$r[id_periodepenerimaan] class='btn btn-sm btn-warning' title='Edit Periode Penerimaan'> Edit</a>";
		 ?>
	               
		  
		 
		      <form method="POST" action="aksi.php?module=periodepenerimaan&act=hapus_periodepenerimaan&id=<?php echo $r[id_periodepenerimaan]; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Data Periode Penerimaan" data-message="Apakah Anda Yakin Akan Menghapus Data Periode Penerimaan <?php echo $r[namaperiodepenerimaan];?> ?">
        			Hapus
    				</button>
				</form>
				
				
		 		   
        <?php    echo"  </td></tr>";
      $no++;
    }
    echo "</table> ";
	
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
  

	
	
	
	
	
	
	
	case "tambahperiodepenerimaan":
	
	?>
	  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Periode Penerimaan </h1>
                        <p class="title-description"> Tambah Periode Penerimaan  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
										
 
 
 
 
		
		<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_periodepenerimaan/aksi_periodepenerimaan.php?module=periodepenerimaan&act=input' role="form" parsley-validate>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Nama Periode </label>
			<div class="col-sm-4">
			<input type="text" name="namaperiodepenerimaan" class="form-control required" id="namaperiodepenerimaan" placeholder="Nama Periode" >
			</div>
		</div>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Tanggal Pelaksanaan </label>
			<div class="col-sm-2">
			<input type="text" name="tglmulai" class="form-control required" id="" placeholder="Tgl Mulai" >
			</div>
			<div class="col-sm-2">
			<input type="text" name="tglselesai" class="form-control required" id="" placeholder="Tgl Selesai" >
			</div>
		</div>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Tanggal Pendaftaran </label>
			<div class="col-sm-2">
			<input type="text" name="tglmulaipendaftaran" class="form-control required" id="" placeholder="Tgl Mulai" >
			</div>
			<div class="col-sm-2">
			<input type="text" name="tglselesaipendaftaran" class="form-control required" id="" placeholder="Tgl Selesai" >
			</div>
		</div>
		 
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Tanggal Pengumuman </label>
			<div class="col-sm-2">
			<input type="text" name="tglpengumuman" class="form-control required" id="" placeholder="Tgl Pengumuman" >
			</div>
			 
		</div>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Prosedur Pendaftaran </label>
			<div class="col-sm-8">
			<textarea name="prosedur" class="form-control required" ></textarea>
			</div>
			 
		</div>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Kontak Panitia </label>
			<div class="col-sm-8">
			<textarea name="kontak" class="form-control required" ><?php echo $r[kontak_panitia]; ?></textarea>
			</div>
			 
		</div>
		
		 
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-2"> 
			</div>
		</div>
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-9"> 
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
	



	
	
 case "editperiodepenerimaan":
 	$edit=mysql_query("SELECT * FROM periodepenerimaan WHERE id_periodepenerimaan='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
	?>
	
 	 <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Periode Penerimaan </h1>
                        <p class="title-description"> Edit Periode Penerimaan  </p>
                    </div>
                    <section class="section">
                      
					   <div class='card'>
                                    <div class='card-block'>
                                        <div class='card-title-block'> 
                                        </div>
                                        <section class='example'>
 
 
		
		<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_periodepenerimaan/aksi_periodepenerimaan.php?module=periodepenerimaan&act=updateperiodepenerimaan' role="form" parsley-validate>
		
		
		<input type=hidden name='id' size=30  value='<?php echo $_GET[id]; ?>'>
		
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Nama Periode </label>
			<div class="col-sm-4">
			<input type="text" name="namaperiodepenerimaan" class="form-control required" id="namaperiodepenerimaan" placeholder="Nama Periode " value='<?php echo $r[nama_periode]; ?>'>
			</div>
		</div>
		
		 <div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Tanggal Pelaksanaan </label>
			<div class="col-sm-2">
			<input type="text" name="tglmulai" class="form-control required" id="" placeholder="Tgl Mulai"  value='<?php echo $r[tgl_mulai]; ?>' >
			</div>
			<div class="col-sm-2">
			<input type="text" name="tglselesai" class="form-control required" id="" placeholder="Tgl Selesai"  value='<?php echo $r[tgl_selesai]; ?>'>
			</div>
		</div>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Tanggal Pendaftaran </label>
			<div class="col-sm-2">
			<input type="text" name="tglmulaipendaftaran" class="form-control required" id="" placeholder="Tgl Mulai"  value='<?php echo $r[tgl_mulai_pendaftaran]; ?>'>
			</div>
			<div class="col-sm-2">
			<input type="text" name="tglselesaipendaftaran" class="form-control required" id="" placeholder="Tgl Selesai"  value='<?php echo $r[tgl_mulai_pendaftaran]; ?>'>
			</div>
		</div>
		 
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Tanggal Pengumuman </label>
			<div class="col-sm-2">
			<input type="text" name="tglpengumuman" class="form-control required" id="" placeholder="Tgl Pengumuman"  value='<?php echo $r[tgl_pengumuman]; ?>'>
			</div>
			 
		</div>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Prosedur Pendaftaran </label>
			<div class="col-sm-8">
			<textarea name="prosedur" class="form-control required" ><?php echo $r[prosedur_pendaftaran]; ?></textarea>
			</div>
			 
		</div>
		
		<div class="form-group row" >
			<label for="namaperiodepenerimaan" class="col-sm-3 control-label">Kontak Panitia </label>
			<div class="col-sm-8">
			<textarea name="kontak" class="form-control required" ><?php echo $r[kontak_panitia]; ?></textarea>
			</div>
			 
		</div>
		
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-2">
		 
			</div>
		</div>
		
		
		<div class="form-group row" >
			<label for="tingkat" class="col-sm-3 control-label"></label>
			<div class="col-sm-8">
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

	
	
	
	 
   
}

?>
