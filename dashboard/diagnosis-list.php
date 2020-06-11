<div class="col col-md-12 col-sm-12">

  <h3 class="menu-second"><a href="#" onclick="window.open('../cetak/?menu=diagnosis','page','toolbar=0,scrollbars=1,location=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')"><i class="fa fa-print"></i> Cetak</a></h3>
<div class="isian-form">
    <table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14">
      <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
        <td width="5%" valign="middle" ><strong>No.</strong></td>
        <td valign="middle"><strong>ID Konsultasi</strong></td>
        <td valign="middle"><strong>User</strong></td>
        <td valign="middle"><strong>Tanggal</strong></td>
        <td valign="middle"><strong>Kesimpulan</strong></td>
        <td valign="middle"><strong>Penyakit</strong></td>
        <td valign="middle"><strong>Keyakinan</strong></td>
        <td valign="middle"><strong>Aksi</strong></td>
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
        <td width="5%" align="center"><a href="?page=diagnosis&menu=hasil&id=<?= $row['idkon']; ?>" title="Selengkapnya" style="font-size:20px; color:#962400;"><img src="../images/view.png" height="25" width="25"></i></a></td>
        </tr>
    <?php $no++; } ?>  
    </table>
</div>
</div>