<?php
include "../Connections/koneksi.php";
include "header.php";
$idkon=$_GET['id'];
$gambar="";
$ket_pen="";
$pencegahan="";
$penanggulangan="";
$result=$koneksi->query("SELECT * FROM penyakit, konsultasi where idkon='$idkon' and penyakit.idpen=konsultasi.idpen_kon ");
$row=mysqli_fetch_array($result,MYSQLI_BOTH); 
$idpen=$row['idpen'];
$nama_pen=$row['nama_pen'];
$cf_kon=$row['cf_kon'];
if ($cf_kon==0) {
	$ket_hasil="Tidak dapat diketahui penyakit apa yang dialami.";
} else {
	if ($row['cf_kon']>=0 && $row['cf_kon']<=0.20) {
		$ket_cf_kon="Kemungkinan kecil";	
	} elseif ($row['cf_kon']>0.20 && $row['cf_kon']<=0.40) {
		$ket_cf_kon="Mungkin";
	} elseif ($row['cf_kon']>0.40 && $row['cf_kon']<=0.60) {
		$ket_cf_kon="Kemungkinan besar";
	} elseif ($row['cf_kon']>0.60 && $row['cf_kon']<=0.80) {
		$ket_cf_kon="Hampir dipastikan";
	} elseif ($row['cf_kon']>0.80) {
		$ket_cf_kon="Dipastikan";
	}
	$ket_hasil='<strong>'.$ket_cf_kon.'</strong> mengalami penyakit <strong><u>'.$nama_pen.'</u>, dengan keyakinan '.($cf_kon*100).'%</strong>.';
    $gambar=$row['gambar_pen'];
    $ket_pen=$row['ket'];
    $pencegahan=$row['pencegahan'];
    $penanganan=$row['penanganan'];
}

?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Riwayat Konsultasi Penyakit Kucing
                    
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
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
							<h3 class="menu-second"><a href="#" onclick="window.open('../cetak/?menu=konsultasi&idkon=<?= $idkon;?>','page','toolbar=0,scrollbars=1,location=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')"><i class="fa fa-print"></i> Cetak</a></h3>
    <div class="isian-form">
							<form name="pil_cf_gej" method="post">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Gejala</th>
											<th>Gejala</th>
                                            <th>Jawaban</th>
                                            
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php
    $no=1; $result=$koneksi->query("SELECT * FROM konsultasi_gejala, gejala where konsultasi_gejala.idgej_kg=gejala.idgej and idkon_kg='$idkon' order by idgej_kg asc");
    while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
		switch ($row['cf_kg']*100) {
			case "0": $ket="Tidak tahu"; break;
			case "20": $ket="Kemungkinan kecil"; break;
			case "40": $ket="Mungkin"; break;	
			case "60": $ket="Kemungkinan besar"; break;	
			case "80": $ket="Hampir pasti"; break;	
			case "100": $ket="Pasti"; break;
			default: $ket=""; break;
		}
    ?> 
									 
                                        <tr>
                                              <td align="center"><?= $no; ?></td>
											<td><?= $row['idgej'];?></td>
											<td><?= $row['nama_gej'];?></td>
											<td><?= $ket;?></td>
            </tr>
              <?php $no++; } ?>  
    </table>   
                                           
                                      
                                    
                                       
                                    </tbody>
									
                               
							<h3>Maka dapat disimpulkan bahwa ternak tersebut:<br /><?= $ket_hasil;?></h3>
<?php
if ($gambar!="") {
    echo '<img class="gambar-hasil" src="../images/penyakit/'.$gambar.'" />';
}
# gejala
echo '<p class="ket_hasil"><strong>Gejala</strong><ol style="margin-top:-20px;">';
$result2=$koneksi->query("SELECT * FROM pg, gejala where pg.idgej_pg=gejala.idgej and idpen_pg='$idpen' order by idgej asc ");
while($row2=mysqli_fetch_array($result2,MYSQLI_BOTH)) {
	echo '<li>'.$row2['nama_gej'].'</li>';
}
echo '</ol></p>';

if ($ket_pen!="") {
	echo '<p class="ket_hasil"><strong>Keterangan</strong><br>'.$ket_pen.'</p>';
}
if ($pencegahan!="") {
	echo '<p class="ket_hasil"><strong>Pencegahan</strong>';	
	$isi=explode("|",$pencegahan);
	echo '<ol style="margin-top:-20px;">';
	while(list($key,$val)=each($isi)) {
		echo '<li>'.$val.'</li>';
	}
	echo '</ol></p>';
}
if ($penanganan!="") {
	echo '<p class="ket_hasil"><strong>Penanganan</strong>';	
	$isi=explode("|",$penanganan);
	echo '<ol style="margin-top:-20px;">';
	while(list($key,$val)=each($isi)) {
		echo '<li>'.$val.'</li>';
	}
	echo '</ol></p>';
}
?>    
        </div>
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
