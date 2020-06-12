<?php
$idkon = $_GET['id'];
$gambar = "";
$ket_pen = "";
$pencegahan = "";
$penanganan = "";
$result = $koneksi->query("SELECT * FROM penyakit, konsultasi where idkon='$idkon' and penyakit.idpen=konsultasi.idpen_kon ");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
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
<div class="col-md-12 col-sm-12">
	<div class="isian-form">
		<h3>Berdasarkan gejala-gejala yang telah dipilih, sebagai berikut:</h3>
		<table class="table table-bordered">
			<tr align="center">
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
			echo '<img class="gambar-hasil" src="../images/penyakit/' . $gambar . '" />';
		}

		if ($ket_pen != "") {
			echo '<p class="ket_hasil"><strong>Keterangan</strong><br>' . $ket_pen . '</p>';
		}

		if ($pencegahan != "") {
			echo '<p class="ket_hasil"><strong>Pencegahan</strong>';
			echo '<br><br>';
			$isi = explode("|", $pencegahan);
			echo '<ol style="margin-top:-20px;">';
			while (list($key, $val) = each($isi)) {
				echo '<li>' . $val . '</li>';
			}
			echo '</ol></p>';
		}
		if ($penanganan != "") {
			echo '<p class="ket_hasil"><strong>Penanganan</strong>';
			echo '<br><br>';
			$isi = explode("|", $penanganan);
			echo '<ol style="margin-top:-20px;">';
			while (list($key, $val) = each($isi)) {
				echo '<li>' . $val . '</li>';
			}
			echo '</ol></p>';
		}
		?>
	</div>
</div>