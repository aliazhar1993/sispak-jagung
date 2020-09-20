
<?php
include "../Connections/koneksi.php";
include "header.php";
$iduser_login=$row['iduser'];
$idkon=auto_no("konsultasi","K");
if (isset($_POST['pil_cf_gej'])) {
	$tgl=gmdate("Y-m-d H:i:s", time()+60*60*7);
	if (is_array($_POST['pil_cf_gej'])) {
		while(list($key,$value)=each($_POST['pil_cf_gej'])) {
			if ($value!="") {
				$value=explode("|",$value);
				$idgej=$value[0]; $cf_kg=$value[1];
				$insert=$koneksi->query("insert into konsultasi_gejala (idkon_kg,idgej_kg,cf_kg) values ('$idkon','$idgej','$cf_kg')");
			}
		}
	}
	include "konsultasi-proses.php";
	$insert=$koneksi->query("insert into konsultasi (idkon,iduser_kon,tgl_kon,idpen_kon,cf_kon) values ('$idkon','$iduser_login','$tgl','$idpen_hasil','$cf_hasil')");
	header("Location: konsultasi-hasil.php?id=$idkon");
}
?>
    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Riwayat Konsultasi Penyakit Jagung
                    
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
						<div class="row clearfix">
                            <div class="table-responsive">
							
							<form name="pil_cf_gej" method="post" id="pil_cf_gej" >
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gejala</th>
                                            <th>Jawaban</th>
                                            
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
  <?php
            $no=1; $result=$koneksi->query("SELECT * FROM gejala order by idgej asc");
            while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
				if ($row['gambar_gej']=="") {$gambar="";} else {$gambar='<input type="button" id="btngam|'.$row['idgej'].'" name="btn_gam[]" class="mainBtn btn_gam" value="Gambar" /><img id="gam_'.$row['idgej'].'" name="tam_gam[]" src="../images/gejala/'.$row['gambar_gej'].'" class="img-pen-list gam-view"/>';}
				
            ?>
									 
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><label for="pil_cf_gej_<?= $no;?>" id="label_cf_gej_<?= $no-1;?>" class="pilih"><?= $row['idgej'];?> - <?= $row['nama_gej'];?></label><?= $gambar;?>
											</td>
                                            <td>
											<select id="pil_cf_gej_<?= $no;?>" name="pil_cf_gej[]" class="form-control show-tick">
											<option value="">- Pilih -</option>
											<option value="<?= $row['idgej'];?>|0.20">Kemungkinan kecil</option>
											<option value="<?= $row['idgej'];?>|0.40">Mungkin</option>
											<option value="<?= $row['idgej'];?>|0.60">Kemungkinan besar</option>
											<option value="<?= $row['idgej'];?>|0.80">Hampir pasti</option>
											<option value="<?= $row['idgej'];?>|1">Pasti</option>
											</select>
											</td>
										</tr>
									<?php $no++; } ?>  
									</table>                                                                                       
                                    </tbody>
									
                               
								<div class="col col-md-4 col-sm-4">
            <label class="war">Setidaknya memilih 2 gejala.</label>
            <input type="submit" class="mainBtn" id="proses" value="Proses">
        </div>
    <span style="visibility:hidden"><input type="text" id="jum_pil_gej" name="jum_pil_gej" /></span>
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
