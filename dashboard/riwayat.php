<?php
include "header.php";
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {
		case "hasil": $page_menu="riwayat-hasil.php"; $title="Hasil Konsultasi"; break;
	}
} else {
	$page_menu="riwayat-list.php"; $title="Riwayat Konsultasi";
}
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Riwayat Konsultasi Penyakit Kucing
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Riwayat Konsultasi
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Konsultasi</th>
                                            <th>Tanggal Konsultasi</th>
                                            <th>Kesimpulan</th>
                                            <th>Penyakit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
  <?php 
    $no=1; $result=$koneksi->query("SELECT * FROM konsultasi, penyakit where iduser_kon='$iduser_login' and konsultasi.idpen_kon=penyakit.idpen order by tgl_kon desc");
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
    ?>  
    
									 
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['idkon'];?></td>
                                            <td><?= date("d/m/Y H:i",strtotime($row['tgl_kon']));?></td>
                                            <td><?= $ket_hasil;?></td>
                                            <td><?= $nama_pen;?></td>
                                            <td><a href="konsultasi-hasil.php?id=<?= $row['idkon']; ?>"><img src="../images/view.png" width="20" height="20"></a></td>
                                        </tr>
                               <?php $no++; } ?>          
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
          
        </div>
    </section>

  <?php
  include"footer.php";
  ?>
