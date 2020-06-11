<?php
include "../Connections/koneksi.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="text/css" href="../images/Logo Kucing.jpg" type="image/x-icon" />
<style>
.img-pen-list {
	width:200px;
	height:auto;
	margin:10px 0;
}
</style>
<title>Diagnosis</title>
</head>
<body onLoad="javascript:window:print()">
<div style="width:1000px;">
<table width="100%" border="0" cellpadding="5" bordercolor="#000">
  <tr align="center" height="40">
    <td align="right" valign="middle"><img src="../images/logo-sumbar.png" width="100" height="100"></td>
    <td valign="middle"><p style="font-size:18pt; font-weight:bold; margin:0px;">Dinas Pertanian dan Ketahanan Pangan</p>
      <p style="font-size:16pt; font-weight:bold; margin:0px;">KABUPATEN PASAMAN</p>
      <p style="font-size:12pt;margin:0px;">Jl. XXX pasaman</p>
      <p style="font-size:12pt;margin:0px;">Telp.  (0753) 20044</p></td>
    <td align="left" valign="middle"></td>
  </tr>
</table>
<hr>
<br>
<p style="font-size:16pt; font-weight:bold; margin:0px; margin-bottom:10px; text-align:center;">LAPORAN DIAGNOSIS</p>
<table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14; border-collapse:collapse;">
  <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
    <td width="5%" valign="middle" ><strong>No.</strong></td>
    <td valign="middle"><strong>ID Konsultasi</strong></td>
    <td valign="middle"><strong>User</strong></td>
    <td valign="middle"><strong>Tanggal</strong></td>
    <td valign="middle"><strong>Kesimpulan</strong></td>
    <td valign="middle"><strong>Penyakit</strong></td>
    <td valign="middle"><strong>Keyakinan</strong></td>
    </tr>
    <?php 
    $no=1; $result=$koneksi->query("SELECT * FROM konsultasi, penyakit, user where user.iduser=konsultasi.iduser_kon and konsultasi.idpen_kon=penyakit.idpen order by tgl_kon desc");
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
		$cf_kon=$row['cf_kon'];
		if ($cf_kon=='0') {
			$ket_hasil="Tidak dapat diketahui penyakit apa yang dialami."; $nama_pen="-";
		} else{
			if ($row['cf_kon']>'0' && $row['cf_kon']<='0.20') {
				$ket_cf_kon="Kemungkinan kecil";	
			} elseif ($row['cf_kon']>'0.20' && $row['cf_kon']<='0.40') {
				$ket_cf_kon="Mungkin";
			} elseif ($row['cf_kon']>'0.40' && $row['cf_kon']<='0.60') {
				$ket_cf_kon="Kemungkinan besar";
			} elseif ($row['cf_kon']>'0.60' && $row['cf_kon']<='0.80') {
				$ket_cf_kon="Hampir dipastikan";
			} elseif ($row['cf_kon']>'0.80') {
				$ket_cf_kon="Dipastikan";
			}
			$ket_hasil=$ket_cf_kon; $nama_pen=$row['nama_pen'];
		}		
    ?>  <tr align="left" valign="top" class="bg_row">
        <td align="center"><?= $no; ?></td>
        <td><?= $row['idkon'];?></td>
        <td><?= $row['nama_user'];?></td>
        <td><?= date("d/m/Y H:i",strtotime($row['tgl_kon']));?></td>
        <td><?= $ket_hasil;?></td>
        <td><?= $nama_pen;?></td>
        <td><?= $row['cf_kon']*100;?>%</td>
        </tr>
<?php $no++; } ?>  
</table>

<table width="100%" border="0" cellpadding="5">
    <tr>
        <td width="63%" align="left">&nbsp;</td>
        <td width="4%">&nbsp;</td>
        <td width="33%" align="left"><p style="margin-top:30px;">Mengetahui,<br />Kepala Dinas Pertanian</p><br />
        <p style="font-weight:bold">drh. xxxx.</p></td>
    </tr>    
</table>

</div></body></html>