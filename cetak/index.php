<?php
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {
		case "penyakit": $page_menu="penyakit.php"; break;
		case "gejala": $page_menu="gejala.php"; break;
		case "diagnosis": $page_menu="diagnosis.php"; break;
		case "konsultasi": $page_menu="konsultasi.php"; break;
	}
} 
include $page_menu;
?>