<div class="col col-md-12 col-sm-12">
  <h3 class="menu-second"><a href="?page=gejala"><i class="fa fa-list"></i> Gejala</a></h3>
  <h3 class="menu-second"><a href="?page=penyakit&menu=tambah"><i class="fa fa-plus"></i> Tambah Penyakit</a></h3>
  <h3 class="menu-second"><a href="#" onclick="window.open('../cetak/?menu=penyakit','page','toolbar=0,scrollbars=1,location=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')"><i class="fa fa-print"></i> Cetak</a></h3>
    <?php
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'ubah-berhasil': echo '<div class="notif-box">Ubah data penyakit berhasil.</div>'; break;
            case 'hapus-berhasil': echo '<div class="notif-box">Hapus data penyakit berhasil.</div>'; break;
        }
    }
    ?>
    <table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14;">
      <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
        <td width="5%" valign="middle" ><strong>No.</strong></td>
        <td width="20%" valign="middle"><strong>Penyakit</strong></td>
        <td valign="middle"><strong>Gejala</strong></td>
        <td width="30%" valign="middle"><strong>Keterangan</strong></td>
        <td colspan="2" valign="middle"><strong>Aksi</strong></td>
      </tr>
    <?php
    $no=1; $result=$koneksi->query("SELECT * FROM penyakit order by idpen asc");
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
		$idpen=$row['idpen'];
		
    ?>  <tr align="left" valign="top" class="bg_row">
        <td align="center"><?= $no; ?></td>
        <td><strong><?= $row['nama_pen'];?></strong></td>
        <td><ol>
          <?php
        $result2=$koneksi->query("SELECT * FROM pg, gejala where pg.idgej_pg=gejala.idgej and idpen_pg='$idpen' order by cf_gej desc ");
        while($row2=mysqli_fetch_array($result2,MYSQLI_BOTH)) {     
			echo '<li><strong>'.$row2['idgej'].' ['.$row2['cf_gej'].']</strong> - '.$row2['nama_gej'].'</li>';
		}
		?>
          </ol>
        </td>
        <td><?= $row['ket'];?><br /><br />
<strong>Pencegahan</strong>:
<?php
$isi=explode("|",$row['pencegahan']);
echo '<ol>';
while(list($key,$val)=each($isi)) {
    echo '<li>'.$val.'</li>';
}
echo '</ol></p>';
?>
<strong>Penanganan</strong>: 
<?php
$isi=explode("|",$row['penanganan']);
echo '<ol>';
while(list($key,$val)=each($isi)) {
    echo '<li>'.$val.'</li>';
}
echo '</ol></p>';
?>
        </td>
        <td width="5%" align="center"><a href="?page=penyakit&menu=ubah&id=<?= $row['idpen']; ?>" title="Ubah" style="font-size:20px; color:#962400;"><img src="../images/edit.ico" height="25" width="25"></i></a></td>
        <td width="5%" align="center"><a style="font-size:20px; color:#962400;" title="Hapus" href="?page=penyakit&menu=hapus&id=<?= $row['idpen'];?>&gambar=<?= $row['gambar_pen'];?>" onclick="return hapus('Apakah benar akan menghapus penyakit <?= $row['nama_pen'];?>?')"><img src="../images/delete.png" height="25" width="25"></i></a></td>
      </tr>
    <?php $no++; } ?>  
    </table>
</div>