<?php
session_start(); error_reporting(0);
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

 
if($module=='guru' AND $act=='hapus_guru'){

	$querygurumapel="select * from gurumapel where id_guru='$_GET[id]'";
	$jumlah=mysql_num_rows(mysql_query($querygurumapel));
	
	 
	if($jumlah!="" and $jumlah >0) {
		$_SESSION[gagal]="Data ustadz gagal dihapus. Hapus dahulu jadwal ustadz."; 
		header('location:dashboard.php?module=guru'); 
	} else {
		
		 
	$hapus = mysql_query("DELETE FROM guru WHERE id_guru='$_GET[id]'");
	 
	 if($hapus){
			$_SESSION[sukses]="Data ustadz berhasil dihapus";
	  }else{
			$_SESSION[gagal]="Data ustadz gagal dihapus";
	  }
		 
  
  	header('location:../../dashboard.php?module=guru');
 	} 
	
}


// Input guru
if ($module=='guru' and $act=='input'){
	
	  $lokasi_file    = $_FILES['fupload']['tmp_name'];
	  $tipe_file      = $_FILES['fupload']['type'];
	  $nama_file      = $_FILES['fupload']['name'];
	  $acak           = rand(000000,999999);
	  $nama_file_unik = $acak.$nama_file; 
	  
	   

	  // Apabila ada gambar yang diupload
	  if (!empty($lokasi_file)){
		  
		  $ukuran_file = $_FILES["fupload"]["size"]; 
		  $tipe_file = $_FILES["fupload"]["type"];
		  
	  
		  if($ukuran_file >= (1024*1000)){
			   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
			   header('location:../../dashboard.php?module=guru&act=tambahguru');
			   break;
		  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=guru&act=tambahguru');
		   break;
		}
		
		 
		   move_uploaded_file($lokasi_file,"../../../upload/foto_guru/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = "";
	  }
	  
	  
	   //validasi username -- username tidak boleh ada yang sama
	  $cari=mysql_query("SELECT * FROM guru WHERE username='$_POST[username]'");
	  $jumlah=mysql_num_rows($cari);
	  if($jumlah>0){
		   $_SESSION[gagal]="Gagal menyimpan data ustadz. Username <b>".$_POST[username]."</b> telah digunakan!"; 
			   header('location:../../dashboard.php?module=guru&act=tambahguru');
			   break;
	  }
	  
	  
	 $pass = md5($_POST[password]);
     $simpan = mysql_query("INSERT INTO guru(nama_guru, 
									 alamat,
									 notelp, 
									 jenis_kelamin,
									 kompetensi,
									 riwayat_pendidikan,
									 foto, 
									 username,
									 password) 
                             VALUES(
							 '$_POST[nama_guru]', 
							 '$_POST[alamat]',
							 '$_POST[notelp]',
							 '$_POST[jk]',
							 '$_POST[kompetensi]',
                                    '$_POST[riwayatpendidikan]',
									'$nama_file_unik',
									'$_POST[username]',
									'$pass')");
      
	   if($simpan){
			$_SESSION[sukses]="Data ustadz berhasil ditambahkan";
	  }else{
			  $_SESSION[gagal]="Data ustadz gagal ditambahkan";
	  }
		  
	  header('location:../../dashboard.php?module='.$module);
  }
  
  
  

// Update guru
if ($module=='guru' AND $act=='update'){

	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	  $tipe_file      = $_FILES['fupload']['type'];
	  $nama_file      = $_FILES['fupload']['name'];
	  $acak           = rand(000000,999999);
	  $nama_file_unik = $acak.$nama_file; 
	  
	   

	  // Apabila ada gambar yang diupload
	  if (!empty($lokasi_file)){
		 
	  
		  $ukuran_file = $_FILES["fupload"]["size"]; 
		  $tipe_file = $_FILES["fupload"]["type"];
		  
	  
		  if($ukuran_file >= (1024*1000)){
			   $_SESSION[gagal]="Gagal menyimpan. Ukuran file yang diupload tidak boleh melebihi 1MB!"; 
			   header('location:../../dashboard.php?module=guru&act=editguru&id='.$_POST[id]);
			   break;
		  }
 
		if($tipe_file == "image/png" or $tipe_file == "image/jpg" or $tipe_file == "image/jpeg" or $tipe_file == "image/gif"){
			// do nothing
		} else {
		   $_SESSION[gagal]="Gagal menyimpan. File yang diupload harus file gambar(*.png/*.jpg/*.jpeg/*.gif)!"; 
		   header('location:../../dashboard.php?module=guru&act=editguru&id='.$_POST[id]);
		   break;
		}
		
		
		 if($_POST[fotolama]!="") {
				unlink("../../upload/foto_guru/$_POST[fotolama]"); 
		 }
		   move_uploaded_file($lokasi_file,"../../../upload/foto_guru/$nama_file_unik");
		   $nama_file_unik =  $nama_file_unik;
	  } else {
		   $nama_file_unik = $_POST[fotolama];
	  }
  
  
	if($_POST[passwordbaru]==""){
		$pass = $_POST[passwordlama];
	} else {
		$pass = md5($_POST[passwordbaru]);
	}
	
	//validasi username -- username tidak boleh ada yang sama
	  $cari=mysql_query("SELECT * FROM guru WHERE username='$_POST[username]' and id_admin<>'$_POST[id]'");
	  $jumlah=mysql_num_rows($cari);
	  if($jumlah>0){			   

		    $_SESSION[gagal]="Gagal menyimpan data ustadz. Username <b>".$_POST[username]."</b> telah digunakan!"; 
			header('location:../../dashboard.php?module=guru&act=editguru&id='.$_POST[id]);
			break;
	  }
	  
  
    $simpan = mysql_query("UPDATE guru SET 
                                 nama_guru = '$_POST[nama_guru]', 
								 alamat = '$_POST[alamat]',
								 notelp = '$_POST[notelp]',
								 jenis_kelamin = '$_POST[jk]',
								 kompetensi= '$_POST[kompetensi]',
                                 riwayat_pendidikan     = '$_POST[riwayatpendidikan]',
								 foto  ='$nama_file_unik', 
								 username = '$_POST[username]',
								password = '$pass'
                           WHERE id_guru      = '$_POST[id]'");

	if($simpan){
		$_SESSION[sukses]="Data ustadz berhasil diupdate";
    }else{
		$_SESSION[gagal]="Data ustadz gagal diupdate";
    }
 
  
  header('location:../../dashboard.php?module='.$module);
}









else if($module=='guru' AND $act=='export'){
	
	/** Include PHPExcel */
	require_once '../../../config/PHPExcel.php';

	$conn = new PDO("mysql:host=localhost; dbname=tabunganpondok2; charset=utf8", "root", "root"); 

	// Create new PHPExcel object
	//echo date('H:i:s') , " Create new PHPExcel object" , EOL;
	$objPHPExcel = new PHPExcel();	
	
	$objPHPExcel->getProperties()->setCreator("")
								 ->setLastModifiedBy("")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Test result file");
								 

	//find row and column size in DB
	try
	{		
		$query = $conn->query('SELECT * FROM guru order by id_guru asc');			
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	$rowSize = $query->rowCount();
	$columnSize = $query->columnCount();
	$result = $query->fetchAll();

	// Add column names to spreadsheet
	// column names must be updated here as per table	
	//id_guru 	nama_guru 	jenis_kelamin 	alamat 	notelp 	kompetensi 	riwayat_pendidikan 	foto 	username 	password 
	$objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue('A1', 'id_guru')
	            ->setCellValue('B1', 'nama_guru')
	            ->setCellValue('C1', 'jenis_kelamin')
	            ->setCellValue('D1', 'alamat')
				->setCellValue('E1', 'notelp')
				->setCellValue('F1', 'kompetensi')
				->setCellValue('G1', 'riwayat_pendidikan')
				->setCellValue('H1', 'foto')
				->setCellValue('I1', 'username')
				->setCellValue('J1', 'password');
	
	$objPHPExcel->getActiveSheet()->setTitle('dataguru');


	//column names in bold text
	$row = $objPHPExcel->getActiveSheet()->getRowIterator(1)->current();
	$cellIterator = $row->getCellIterator();
	$cellIterator->setIterateOnlyExistingCells(false);
	foreach ($cellIterator as $cell)
	   $cell->getStyle()->getFont()->setBold(true);

	// column names must be updated here as per table
	$columns_array = array('id_guru', 'nama_guru', 'jenis_kelamin', 'alamat','notelp','kompetensi','riwayat_pendidikan','foto','username','password');	

	//adding data to spreadsheet
	for($i=1; $i<=$rowSize; $i++)
	{
		$c = 'A';  //to be used in cell name
		for ($j=1; $j<=$columnSize; $j++, $c++)
		{
			$cell_name = $c.($i+1);			
			$column_name = $columns_array[$j-1];

			//uncomment echo command to verify cell names and their respective values 
			//echo $cell_value.'---------'.$result[$i-1][$column_name].'<br>';			

			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell_name, $result[$i-1][$column_name]);
		}
	}

	// Uncomment commands to Rename worksheet
	//echo date('H:i:s') , " Rename worksheet" , EOL;
	//$objPHPExcel->getActiveSheet()->setTitle('Simple');

	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

		$objPHPExcel->setActiveSheetIndex($objPHPExcel->getIndex($worksheet));

		$sheet = $objPHPExcel->getActiveSheet();
		$cellIterator = $sheet->getRowIterator()->current()->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(true);
		/** @var PHPExcel_Cell $cell */
		foreach ($cellIterator as $cell) {
			$sheet->getColumnDimension($cell->getColumn())->setAutoSize(true);
		}
	}


	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="dataguru.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	
	
}




    if($module=='guru' AND $act=='impor'){
	
	
	if( isset($_POST["submit"]) )
	{		

		$conn = new PDO("mysql:host=localhost; dbname=tabunganpondok2; charset=utf8", "root", "root"); 
		//  Include PHPExcel_IOFactory 
		include '../../../config/PHPExcel/IOFactory.php';

		//saving xlsx file
		$inputFileName = $_FILES['file']['tmp_name'];

		//  Read your Excel workbook
		try
		{
		    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
		    $objPHPExcel = $objReader->load($inputFileName);
		}
		catch(Exception $e)
		{
		    die('Error loading file "'.pathinfo($inputFileName, PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		
		  

		//  Loop through each row of the worksheet in turn
		for ($row = 2; $row <= $highestRow; $row++)
		{ 
		    //  Read a row of data into an array
		    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

		    //  Insert row data array into your database of choice here
		    try
		    {
				// id_guru 	nama_guru 	jenis_kelamin 	alamat 	notelp 	kompetensi 	riwayat_pendidikan 	foto 	username 	password 
		    	$query = $conn->prepare('INSERT INTO guru (id_guru, 
									nama_guru, 
									 jenis_kelamin,
									 alamat,
									 notelp,  
									 kompetensi,
									 riwayat_pendidikan, 
									 foto,
									 username,
									 password)VALUES(?, ?, ?, ?, ?, ?, ?, "", ?, ?)');
		    	$query->execute( array($rowData[0][0], $rowData[0][1], $rowData[0][2], $rowData[0][3], $rowData[0][4], $rowData[0][5], $rowData[0][6],  $rowData[0][8], md5($rowData[0][9])) );
				
				 
				
				if(!query) {
					$query = $conn->prepare('UPDATE guru SET 
									id_guru = ?, 
									nama_guru = ?, 
									 jenis_kelamin = ?,
									 alamat = ?,
									 notelp = ?,
									 kompetensi = ?,
									 riwayat_pendidikan = ?,
									 foto = ?,
									 username = ?,
									 password= ? WHERE id_guru= ?');
					$query->execute( array($rowData[0][1], $rowData[0][2], $rowData[0][3], $rowData[0][4], $rowData[0][5], $rowData[0][6], $rowData[0][7], $rowData[0][8],$rowData[0][9], $rowData[0][0]) );
				
				}
				 
				
		    }
		    catch(PDOException $e)
		    {
				
				$e->getMessage(); 
				 
		    	 
		    }

		     
 
		}

		 
	}
	
	 $_SESSION[sukses]="Data berhasil diimpor";
 
  
  header('location:../../dashboard.php?module='.$module);
	
	
	
}

?>
