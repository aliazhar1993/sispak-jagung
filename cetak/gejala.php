<?php
include "../Connections/koneksi.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" type="text/css" href="../images/Logo Kucing.jpg " type="image/x-icon" />
  <style>
    .img-pen-list {
      width: 200px;
      height: auto;
      margin: 10px 0;
    }
  </style>
  <title>Gejala</title>
</head>

<body onLoad="javascript:window:print()">
  <div style="width:1000px;">
    <table width="100%" border="0" cellpadding="5" bordercolor="#000">
      <tr align="center" height="40">
        <td align="right" valign="middle"><img src="../images/pasbar2.png" width="100" height="100"></td>
        <td valign="middle">
          <p style="font-size:18pt; font-weight:bold; margin:0px;">Dinas Tanaman Pangan Hortikultura Dan Peternakan</p>
          <p style="font-size:16pt; font-weight:bold; margin:0px;">KABUPATEN PASAMAN BARAT</p>
          <p style="font-size:12pt;margin:0px;"> Jl. Pertanian Sukamenanti, Aua Kuniang, Pasaman, Kabupaten Pasaman Barat, Sumatera Barat 26566</p>
          <p style="font-size:12pt;margin:0px;">Telepon: (0753) 65547</p>
        </td>
        <td align="left" valign="middle"></td>
      </tr>
    </table>
    <hr>
    <br>
    <p style="font-size:16pt; font-weight:bold; margin:0px; margin-bottom:10px; text-align:center;">LAPORAN GEJALA</p>
    <table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14; border-collapse:collapse;">
      <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
        <td width="5%" valign="middle"><strong>No.</strong></td>
        <td width="10%" valign="middle"><strong>ID Gejala</strong></td>
        <td valign="middle"><strong>Gejala</strong></td>
      </tr>
      <?php
      $no = 1;
      $result = $koneksi->query("SELECT * FROM gejala order by idgej asc");
      while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        if ($row['gambar_gej'] == "") {
          $gambar = "";
        } else {
          $gambar = '<br><img src="../images/gejala/' . $row['gambar_gej'] . '" class="img-pen-list"/>';
        }
      ?> <tr align="left" valign="top" class="bg_row">
          <td align="center"><?= $no; ?></td>
          <td><?= $row['idgej']; ?></td>
          <td><?= $row['nama_gej']; ?><?= $gambar; ?></td>
        </tr>
      <?php $no++;
      } ?>
    </table>

    <table width="100%" border="0" cellpadding="5">
      <tr>
        <td width="63%" align="left">&nbsp;</td>
        <td width="4%">&nbsp;</td>
        <td width="33%" align="left">
          <p style="margin-top:30px;">Mengetahui,<br />Dinas Tanaman Pangan Hortikultura Dan Peternakan</p><br />
          <p style="font-weight:bold">AFDAL, S.P</p>
        </td>
      </tr>
    </table>

  </div>
</body>

</html>