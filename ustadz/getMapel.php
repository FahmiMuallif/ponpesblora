<?php
	session_start();
	error_reporting(0);
	include "../config/koneksi.php";
	
	$id = isset($_GET['id_kelas']) ? intval($_GET['id_kelas']) : 0;
	$smt = isset($_GET['semester']) ? intval($_GET['semester']) : $_SESSION[semester_terpilih];
	
	$carikelas = mysql_query("SELECT * FROM kelas WHERE id_kelas='$id'");
	$k=mysql_fetch_array($carikelas);
	$tingkat=$k[tingkat];
	
	$query = "SELECT * FROM mapel WHERE tahunajaran='$_SESSION[tahunajaran]' 
					AND tingkat='$tingkat' 
					AND semester='$smt'";
	$result = mysql_query($query);
	
	$respon = array();
	while ($hasil = mysql_fetch_array($result))
	{
	    $respon[]= $hasil;
	}
	echo json_encode($respon);	
?>