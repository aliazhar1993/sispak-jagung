<div class="col col-md-12 col-sm-12">
  <h3 class="menu-second"><a href="?page=pengelola&menu=tambah"><i class="fa fa-plus"></i> Tambah Pengelola</a></h3>
    <?php
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'ubah-berhasil': echo '<div class="notif-box">Ubah data pengelola berhasil.</div>'; break;
            case 'hapus-berhasil': echo '<div class="notif-box">Hapus data pengelola berhasil.</div>'; break;
        }
    }
    ?>
    <table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14">
      <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
        <td width="5%" valign="middle" ><strong>No.</strong></td>
        <td valign="middle"><strong>Email</strong></td>
        <td valign="middle"><strong>Nama</strong></td>
        <td valign="middle"><strong>Alamat</strong></td>
        <td valign="middle"><strong>Level</strong></td>
        <td colspan="2" valign="middle"><strong>Aksi</strong></td>
      </tr>
    <?php $level=array("Pengelola","Operator");
    $no=1; $result=$koneksi->query("SELECT * FROM pengelola order by nama_peng asc");
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
    ?>  <tr align="left" valign="top" class="bg_row">
        <td align="center"><?= $no; ?></td>
        <td><?= $row['email'];?></td>
        <td><?= $row['nama_peng'];?></td>
        <td><?= $row['alamat'];?></td>
        <td><?= $level[$row['level']];?></td>
        <td width="5%" align="center"><a href="?page=pengelola&menu=ubah&id=<?= $row['idpeng']; ?>" title="Ubah" style="font-size:20px; color:#962400;"><img src="../images/edit.ico" height="25" width="25"></i></a></td>
        <td width="5%" align="center"><a style="font-size:20px; color:#962400;" title="Hapus" href="?page=pengelola&menu=hapus&id=<?= $row['idpeng'];?>" onclick="return hapus('Apakah benar akan menghapus pengelola <?= $row['nama_peng'];?>?')"><img src="../images/delete.png" height="25" width="25"></i></a></td>
      </tr>
    <?php $no++; } ?>  
    </table>
</div>