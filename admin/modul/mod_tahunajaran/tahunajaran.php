 
		
<?php
switch($_GET[act]){

  default:
  
  echo ' <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Tahun Ajaran </h1>
                        <p class="title-description"> Tambah, Edit, Hapus Tahun Ajaran </p>
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
	 
	
    echo "   <div class='card'>
				<div class='card-block'>
					<div class='card-title-block'> 
					</div>
					<section class='example'>
					
					
				 
				<div class='row text-sm wrapper'>
					<div class='col-sm-8 m-b-xs'>
						 <input type=button class='btn btn-success' value='Tambah Tahun Ajaran' onclick=location.href='?module=tahunajaran&act=tambahtahunajaran'>
					</div>
					  
					<div class='col-sm-4'></div>
					
					
				</div>
				<div class='table-responsive' >
	  ";
		  
		  
	 
	echo " 
	  <table id='sample-table-1' class='table table-striped table-hovered'>
	  <thead>
	  <tr><th width=50>no</th>
			<th>Tahun Ajaran </th>
			<th>Status</th>
			<th width=150> Aksi</th>
			</tr> </thead><tbody>"; 
		  
	  
   
	
    $tampil=mysql_query("SELECT * FROM tahunajaran ORDER BY id_tahunajaran DESC"); 
	 
    $no= 1; 
    while ($r=mysql_fetch_array($tampil)){
		
		if($r[status]=="aktif") { 
			$status = "<a href='./modul/mod_tahunajaran/aksi_tahunajaran.php?module=tahunajaran&act=ubahstatus&id=".$r[id_tahunajaran]."' class='btn btn-sm btn-success'>Aktif</a>";
		} else if($r[status]=="nonaktif") {
			$status = "<a href='./modul/mod_tahunajaran/aksi_tahunajaran.php?module=tahunajaran&act=ubahstatus&id=".$r[id_tahunajaran]."' class='btn btn-sm btn-danger'>Non Aktif</a>";
		} 
		
		
		
       echo "<tr><td align=center>$no</td>
           
             <td >$r[namatahunajaran] </td>
			 <td align=center>$status</td>
             <td ><a href=?module=tahunajaran&act=edittahunajaran&id=$r[id_tahunajaran] class='btn btn-sm btn-warning' title='Edit'> Edit</a>"; ?>
			 
			  
			   
			     <form method="POST" action="./modul/mod_tahunajaran/aksi_tahunajaran.php?module=tahunajaran&act=hapus&id=<?php echo $r[id_tahunajaran] ; ?>" 
			   accept-charset="UTF-8" style="display:inline">
    				<button class="btn btn-sm btn-danger" type="button" data-toggle="modal" 
					data-target="#confirmDelete" data-title="Hapus Tahun Ajaran" data-message="Apakah Anda Yakin Akan Menghapus Data Tahun Ajaran <?php echo $r[namatahunajaran];?> ?">Hapus
    				</button>
				</form>
	 
             </td></tr>
	<?php
      $no++;
    }
    echo "</tbody></table>";
	
	 
					
					
	echo "</div>
		 
	 </section>
	</div>
    </section>
	</article>";
	

    break;
  

  
  
  
	
	
	case "tambahtahunajaran":
		  ?>
		  
		  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Tahun Ajaran </h1>
                        <p class="title-description"> Tambah Tahun Ajaran  </p>
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
										
	
		  
		  <form id="formulir" class="form-horizontal" method="post" action='./modul/mod_tahunajaran/aksi_tahunajaran.php?module=tahunajaran&act=input' role="form" parsley-validate>
		  
	<div class="form-group row" >
		<label for="namatahunajaran" class="col-sm-3 control-label">Tahun Ajaran</label>
		<div class="col-sm-2">
		<input type="text" name="namatahunajaran1" style="text-align:center" class="form-control required col-sm-1" id="tahunajaran1" placeholder=""> 
		</div> 
		<label for="namatahunajaran" class="col-sm-1 control-label" style="width:10px; text-align:center;">/</label>
		<div class="col-sm-2">
		<input type="text" name="namatahunajaran2" style="text-align:center" class="form-control required col-sm-1" id="tahunajaran2" placeholder=""> 
		</div>
		  
	</div>
	
	<div class="form-group row" >
		<label for="status" class="col-sm-3 control-label">Status</label>
		<div class="col-sm-4">
		<input type=radio name=status class="required" value=aktif /> Aktif
		  <input type=radio name=status class="required" value=nonaktif /> Non Aktif
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="status" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="status" class="col-sm-3 control-label"></label>
		<div class="col-sm-4"> 
		<input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
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
	

	
	
	
	


 case "edittahunajaran":
 	$edit=mysql_query("SELECT * FROM tahunajaran WHERE id_tahunajaran='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
	$tahun = $r[namatahunajaran];
	$tahun=explode("/",$tahun);
	$ta1=$tahun[0];
	$ta2=$tahun[1];
	
	?>
  <article class="content static-tables-page">
                    <div class="title-block">
                        <h1 class="title"> Kelola Tahun Ajaran </h1>
                        <p class="title-description"> Tambah Tahun Ajaran  </p>
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
										
	
	
		
	<form id="formulir" class="form-horizontal" method="post" action='./modul/mod_tahunajaran/aksi_tahunajaran.php?module=tahunajaran&act=updatetahunajaran' role="form" parsley-validate>
		  <input type=hidden name='id' size=30  value='<?php echo $_GET[id]; ?>'>
	
	
	 
	
		<div class="form-group row" >
		<label for="namatahunajaran" class="col-sm-3 control-label">Tahun Ajaran</label>
		<div class="col-sm-2">
		<input type="text" name="namatahunajaran1" style="text-align:center" class="form-control required col-sm-1" id="tahunajaran1" placeholder="" value='<?php echo $ta1; ?>'> 
		</div> 
		<label for="namatahunajaran" class="col-sm-1 control-label" style="width:10px; text-align:center;">/</label>
		<div class="col-sm-2">
		<input type="text" name="namatahunajaran2" style="text-align:center" class="form-control required col-sm-1" id="tahunajaran2" placeholder="" value='<?php echo $ta2; ?>'> 
		</div>
		  
	</div>
	
	
	<div class="form-group row" >
		<label for="status" class="col-sm-3 control-label">Status</label>
		<div class="col-sm-4">
		<?php
			if ($r[status]=="aktif") 
			{
					echo "
					<input type=radio name=status value=aktif checked=checked /> Aktif
				   <input type=radio name=status value=nonaktif /> Non Aktif
					";
		  	} else 
			{
				  echo "
					<input type=radio name=status value=aktif  /> Aktif
				   <input type=radio name=status value=nonaktif checked=checked /> Non Aktif
					";
		  	}
		?>
		</div>
	</div>
	
	<div class="form-group row" >
		<label for="namatahunajaran" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		 </div>
	</div>
	
		<div class="form-group row" >
		<label for="namatahunajaran" class="col-sm-3 control-label"></label>
		<div class="col-sm-4">
		<input type="submit" class="btn btn-success" name="simpanmateri" value="Simpan">
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
