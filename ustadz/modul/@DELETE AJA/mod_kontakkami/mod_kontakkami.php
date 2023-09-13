<?php
switch($_GET[act]){
  // Tampil guru
  default:
    echo "<h2>Kelola Kontak Kami</h2> <hr/>
 
            <div class='table-responsive'>
		  <table class='table table-striped'>
		  
          <tr><th>no</th><th>Nama</th><th>Email</th><th>Judul Pesan</th><th>Pesan</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM kontakkami ORDER BY tanggal desc LIMIT $posisi,$batas");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td >$r[nama]</td>
				<td >$r[email]</td>
				<td >$r[subjek]</td>
               <td >$r[pesan]</td>
               <td> <a href=?module=kontakkami&act=balaspesan&id=$r[id_kontak]  class='btn btn-warning' title='Balas Pesan'><span class='glyphicon glyphicon-send'></span></a> 
					 <a href=./aksi.php?module=kontakkami&act=hapus&id=$r[id_kontak] \" 
 					onClick=\"return confirm('Apakah Anda benar-benar akan menghapus pesan dari $r[nama]?')\" class='btn btn-danger' title='Hapus Pesan'><span class='glyphicon glyphicon-trash'></a>
			   
			   </tr>";
      $no++;
    }
    echo "</table> </div>";

    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kontakkami"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging> $linkHalaman</div><br>";
 
    break;
  
 
  case "balaspesan":
    $edit = mysql_query("SELECT * FROM kontakkami WHERE id_kontak='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	?>
	<h2> Reply Email </h2>
	<hr/>
	<form class="form-horizontal" method="post" action='./aksi.php?module=kontakkami&act=balasemail' role="form">
          <input type=hidden name=id value='<?php echo $r[id_kontak]; ?>'>
		  
  	<div class="form-group" >
		<label for="email" class="col-sm-3 control-label">Kepada</label>
		<div class="col-sm-4">
		<input type="text" name="email" class="form-control" id="email" placeholder="Nama Pengirim" value="<?php echo $r[email]; ?>" >
		</div>
	</div>
	
	<div class="form-group" >
		<label for="subjek" class="col-sm-3 control-label">Judul Email</label>
		<div class="col-sm-4">
		<input type="text" name="subjek" class="form-control" id="subjek" placeholder="Judul" value="Re : <?php echo $r[subjek]; ?>">
		</div>
	</div>
	

	<div class="form-group" >
		<label for="password" class="col-sm-3 control-label">Isi Pesan</label>
		<div class="col-sm-8">
		<textarea name='pesan' class="form-control" ><br/><br/>     
  ----------------------------------------------------------------------------------------------------------------------
  <br/><?php echo $r[pesan]; ?></textarea>
		
		</div>
	</div>
	
	<div class="form-group">
    	<div class="col-sm-offset-3 col-sm-10">
      		<input type="submit" class="btn btn-success" name="kirim" value="Kirim">
			<input type='button' class="btn btn-warning" value='Batal' onclick='self.history.back()' >
    	</div>
  	</div>
	
	
	</form>
	
    
	<?php
    break;  

}
?>
