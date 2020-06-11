<?php
$idkon = $_GET['idkon'];
include "../Connections/koneksi.php";
$gambar = "";
$ket_pen = "";
$pencegahan = "";
$penanggulangan = "";
$result = $koneksi->query("SELECT * FROM penyakit, konsultasi where idkon='$idkon' and penyakit.idpen=konsultasi.idpen_kon ");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$idpen = $row['idpen'];
$nama_pen = $row['nama_pen'];
$cf_kon = $row['cf_kon'];
if ($cf_kon == 0) {
	$ket_hasil = "Tidak dapat diketahui penyakit apa yang dialami.";
} else {
	if ($row['cf_kon'] >= 0 && $row['cf_kon'] <= 0.20) {
		$ket_cf_kon = "Kemungkinan kecil";
	} elseif ($row['cf_kon'] > 0.20 && $row['cf_kon'] <= 0.40) {
		$ket_cf_kon = "Mungkin";
	} elseif ($row['cf_kon'] > 0.40 && $row['cf_kon'] <= 0.60) {
		$ket_cf_kon = "Kemungkinan besar";
	} elseif ($row['cf_kon'] > 0.60 && $row['cf_kon'] <= 0.80) {
		$ket_cf_kon = "Hampir dipastikan";
	} elseif ($row['cf_kon'] > 0.80) {
		$ket_cf_kon = "Dipastikan";
	}
	$ket_hasil = '<strong>' . $ket_cf_kon . '</strong> mengalami penyakit <strong><u>' . $nama_pen . '</u>, dengan keyakinan ' . ($cf_kon * 100) . '%</strong>.';
	$gambar = $row['gambar_pen'];
	$ket_pen = $row['ket'];
	$pencegahan = $row['pencegahan'];
	$penanganan = $row['penanganan'];
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="text/css" href="../images/Logo Kucing.jpg" type="image/x-icon" />
	<style>
		.img-pen-list {
			width: 200px;
			height: auto;
			margin: 10px 0;
		}
	</style>
	<title>Hasil Konsultasi</title>
</head>

<body onLoad="javascript:window:print()">
	<div style="width:1000px;">
		<table width="100%" border="0" cellpadding="5" bordercolor="#000">
			<tr align="center" height="40">
				<td align="right" valign="middle"><img src="../images/pasbar2.png" width="100" height="100"></td>
				<td valign="middle">
					<p style="font-size:18pt; font-weight:bold; margin:0px;">Dinas Pertanian dan Ketahanan Pangan</p>
					<p style="font-size:16pt; font-weight:bold; margin:0px;">KABUPATEN PASAMAN</p>
					<p style="font-size:12pt;margin:0px;">Jl. XXX pasaman</p>
					<p style="font-size:12pt;margin:0px;">Telp. (0753) 20044</p>
				</td>
				<td align="left" valign="middle"></td>
			</tr>
		</table>
		<hr>
		<br>
		<p style="font-size:16pt; font-weight:bold; margin:0px; margin-bottom:10px; text-align:center;">HASIL KONSULTASI</p>
		<h3>Berdasarkan gejala-gejala yang telah dipilih, sebagai berikut:</h3>
		<table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14;">
			<tr align="center" bgcolor="#962400" style="color:#fff" height="40">
				<td width="5%" valign="middle"><strong>No.</strong></td>
				<td width="10%" valign="middle"><strong>ID Gejala</strong></td>
				<td valign="middle"><strong>Gejala</strong></td>
				<td width="15%" valign="middle"><strong>Jawaban</strong></td>
			</tr>
			<?php
			$no = 1;
			$result = $koneksi->query("SELECT * FROM konsultasi_gejala, gejala where konsultasi_gejala.idgej_kg=gejala.idgej and idkon_kg='$idkon' order by idgej_kg asc");
			while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
				switch ($row['cf_kg'] * 100) {
					case "0":
						$ket = "Tidak tahu";
						break;
					case "20":
						$ket = "Kemungkinan kecil";
						break;
					case "40":
						$ket = "Mungkin";
						break;
					case "60":
						$ket = "Kemungkinan besar";
						break;
					case "80":
						$ket = "Hampir pasti";
						break;
					case "100":
						$ket = "Pasti";
						break;
					default:
						$ket = "";
						break;
				}
			?> <tr align="left" valign="top" class="bg_row">
					<td align="center"><?= $no; ?></td>
					<td><?= $row['idgej']; ?></td>
					<td><?= $row['nama_gej']; ?></td>
					<td><?= $ket; ?></td>
				</tr>
			<?php $no++;
			} ?>
		</table>
		<h3>Maka dapat disimpulkan bahwa ternak tersebut:<br /><?= $ket_hasil; ?></h3>
		<?php
		if ($gambar != "") {
			echo '<img class="gambar-hasil" src="../images/penyakit/' . $gambar . '" width="300" height="auto" />';
		}
		# gejala
		echo '<p class="ket_hasil"><strong>Gejala</strong><ol style="margin-top:-20px;">';
		$result2 = $koneksi->query("SELECT * FROM pg, gejala where pg.idgej_pg=gejala.idgej and idpen_pg='$idpen' order by idgej asc ");
		while ($row2 = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
			echo '<li>' . $row2['nama_gej'] . '</li>';
		}
		echo '</ol></p>';

		if ($ket_pen != "") {
			echo '<p class="ket_hasil"><strong>Keterangan</strong><br>' . $ket_pen . '</p>';
		}
		if ($pencegahan != "") {
			echo '<p class="ket_hasil"><strong>Pencegahan</strong>';
			$isi = explode("|", $pencegahan);
			echo '<ol style="margin-top:-20px;">';
			while (list($key, $val) = each($isi)) {
				echo '<li>' . $val . '</li>';
			}
			echo '</ol></p>';
		}
		if ($penanganan != "") {
			echo '<p class="ket_hasil"><strong>Penanganan</strong>';
			$isi = explode("|", $penanganan);
			echo '<ol style="margin-top:-20px;">';
			while (list($key, $val) = each($isi)) {
				echo '<li>' . $val . '</li>';
			}
			echo '</ol></p>';
		}
		?>

		<table width="100%" border="0" cellpadding="5">
			<tr>
				<td width="63%" align="left">&nbsp;</td>
				<td width="4%">&nbsp;</td>
				<td width="33%" align="left">
					<p style="margin-top:30px;">Mengetahui,<br />Kepala Dinas Pertanian</p><br />
					<p style="font-weight:bold">drh. xxxx.</p>
				</td>
			</tr>
		</table>

	</div>
</body>

</html>