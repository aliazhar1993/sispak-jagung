<div class="col col-md-12 col-sm-12">
    <?php
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'ubah-berhasil': echo '<div class="notif-box">Ubah profil berhasil.</div>'; break;
        }
    }
    ?>
    <table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14">
      <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
        <td valign="middle"><strong>Email</strong></td>
        <td valign="middle"><strong>Nama</strong></td>
        <td valign="middle"><strong>Jenis Kelamin</strong></td>
        <td valign="middle"><strong>Alamat</strong></td>
        <td valign="middle"><strong>Aksi</strong></td>
      </tr>
    <?php
    $result=$koneksi->query("SELECT * FROM user where email='$email_login' ");
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
    ?>  <tr align="left" valign="top" class="bg_row">
        <td><?= $row['email'];?></td>
        <td><?= $row['nama_user'];?></td>
        <td><?= $row['jk'];?></td>
        <td><?= $row['alamat'];?></td>
        <td width="5%" align="center"><a href="?page=profil&menu=ubah&id=<?= $row['iduser']; ?>" title="Ubah" style="font-size:20px; color:#962400;"><img height="25" width="25"src="../images/edit.ico"></img></a></td>
        </tr>
    <?php } ?>  
    </table>
</div>