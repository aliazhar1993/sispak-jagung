<div class="col col-md-12 col-sm-12">
  <h3 class="menu-second"><a href="?page=gejala&menu=tambah"><i class="fa fa-plus"></i> Tambah Gejala</a></h3>
  <h3 class="menu-second"><a href="#" onclick="window.open('../cetak/?menu=gejala','page','toolbar=0,scrollbars=1,location=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')"><i class="fa fa-print"></i> Cetak</a></h3>
  <?php
  if (isset($_GET['status'])) {
    switch ($_GET['status']) {
      case 'ubah-berhasil':
        echo '<div class="notif-box">Ubah data gejala berhasil.</div>';
        break;
      case 'hapus-berhasil':
        echo '<div class="notif-box">Hapus data gejala berhasil.</div>';
        break;
    }
  }
  ?>
  <table class="table table-hover">
    <tr align="center">
      <td width="5%" valign="middle"><strong>No.</strong></td>
      <td width="7%" valign="middle"><strong>ID</strong></td>
      <td valign="middle"><strong>Gejala</strong></td>
      <td colspan="2" valign="middle"><strong>Aksi</strong></td>
    </tr>
    <?php
    $no = 1;
    $result = $koneksi->query("SELECT * FROM gejala order by idgej desc");
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
      if ($row['gambar_gej'] == "") {
        $gambar = "";
      } else {
        $gambar = '<img src="../images/gejala/' . $row['gambar_gej'] . '" class="img-pen-list"/>';
      }
    ?> <tr align="left" valign="top" class="bg_row">
        <td align="center"><?= $no; ?></td>
        <td><?= $row['idgej']; ?></td>
        <td><?= $row['nama_gej']; ?><?= $gambar; ?></td>
        <td width="5%" align="center"><a href="?page=gejala&menu=ubah&id=<?= $row['idgej']; ?>" title="Ubah" style="font-size:20px; color:#962400;"><img src="../images/edit.ico" height="25" width="25"></i></a></td>
        <td width="5%" align="center"><a style="font-size:20px; color:#962400;" title="Hapus" href="?page=gejala&menu=hapus&id=<?= $row['idgej']; ?>&gambar=<?= $row['gambar_gej']; ?>" onclick="return hapus('Apakah benar akan menghapus gejala <?= $row['nama_gej']; ?>?')"><img src="../images/delete.png" height="25" width="25"></i></a></td>
      </tr>
    <?php $no++;
    } ?>
  </table>
</div>