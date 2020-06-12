<?php
include "../Connections/koneksi.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" type="text/css" href="../images/favicon.png" type="image/x-icon" />
  <style>
    .img-pen-list {
      width: 200px;
      height: auto;
      margin: 10px 0;
    }
  </style>
  <title>Penyakit</title>
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
    <p style="font-size:16pt; font-weight:bold; margin:0px; margin-bottom:10px; text-align:center;">LAPORAN PENYAKIT</p>
    <table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14; border-collapse:collapse;">
      <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
        <td width="5%" valign="middle"><strong>No.</strong></td>
        <td width="20%" valign="middle"><strong>Penyakit</strong></td>
        <td valign="middle"><strong>Gejala</strong></td>
        <td width="30%" valign="middle"><strong>Keterangan</strong></td>
      </tr>
      <?php
      $no = 1;
      $result = $koneksi->query("SELECT * FROM penyakit order by idpen asc");
      while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
        $idpen = $row['idpen'];
        if ($row['gambar_pen'] == "") {
          $gambar = "";
        } else {
          $gambar = '<br><img src="../images/penyakit/' . $row['gambar_pen'] . '" class="img-pen-list"/>';
        }
      ?> <tr align="left" valign="top" class="bg_row">
          <td align="center"><?= $no; ?></td>
          <td><strong><?= $row['idpen']; ?><br /><?= $row['nama_pen']; ?></strong><?= $gambar; ?></td>
          <td>
            <ol>
              <?php
              $result2 = $koneksi->query("SELECT * FROM pg, gejala where pg.idgej_pg=gejala.idgej and idpen_pg='$idpen' order by cf_gej desc ");
              while ($row2 = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
                echo '<li><strong>' . $row2['idgej'] . ' [' . $row2['cf_gej'] . ']</strong> - ' . $row2['nama_gej'] . '</li>';
              }
              ?>
            </ol>
          </td>
          <td><?= $row['ket']; ?><br /><br />
            <strong>Pencegahan</strong>:
            <?php
            $isi = explode("|", $row['pencegahan']);
            echo '<ol>';
            while (list($key, $val) = each($isi)) {
              echo '<li>' . $val . '</li>';
            }
            echo '</ol></p>';
            ?>
            <strong>Penanganan</strong>:
            <?php
            $isi = explode("|", $row['penanganan']);
            echo '<ol>';
            while (list($key, $val) = each($isi)) {
              echo '<li>' . $val . '</li>';
            }
            echo '</ol></p>';
            ?>
          </td>
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
          <p style="font-weight:bold"> <u>AFDAL, S.P</u> <br>NIP. 197508062007011007</p>
        </td>
      </tr>
    </table>

  </div>
</body>

</html>