<div class="col col-md-12 col-sm-12">
    <?php
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'ubah-berhasil':
                echo '<div class="notif-box">Ubah data user berhasil.</div>';
                break;
            case 'hapus-berhasil':
                echo '<div class="notif-box">Hapus data user berhasil.</div>';
                break;
        }
    }
    ?>
    <div class="body table-responsive">
        <table class="table table-hover">
            <tr>
                <td width="5%" align="center"><strong>No.</strong></td>
                <td width="20%" align="center"><strong>Email</strong></td>
                <td align="center"><strong>Nama</strong></td>
                <td width="8%" align="center"><strong>Jenis Kelamin</strong></td>
                <td align="center"><strong>Alamat</strong></td>
                <td width="12%" align="center"><strong>Tanggal Daftar</strong></td>
                <td colspan="2" align="center"><strong>Aksi</strong></td>
            </tr>
            <?php
            $no = 1;
            $result = $koneksi->query("SELECT * FROM user order by tgl_daftar desc");
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            ?> <tr align="left" valign="top" class="bg_row">
                    <td align="center"><?= $no; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['nama_user']; ?></td>
                    <td><?= $row['jk']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= date("d/m/Y H:i", strtotime($row['tgl_daftar'])); ?></td>
                    <td width="5%" align="center"><a href="?page=user&menu=ubah&id=<?= $row['iduser']; ?>" title="Ubah" style="font-size:20px; color:#962400;"><img src="../images/edit.ico" height="25" width="25"></i></a></td>
                    <td width="5%" align="center"><a style="font-size:20px; color:#962400;" title="Hapus" href="?page=user&menu=hapus&id=<?= $row['iduser']; ?>" onclick="return hapus('Apakah benar akan menghapus user <?= $row['nama_user']; ?>?')"><img src="../images/delete.png" height="25" width="25"></i></a></td>
                </tr>
            <?php $no++;
            } ?>
        </table>
    </div>
</div>