<?php
$idpen=$_GET['id'];
if (isset($_POST['nama_pen'])) {
	$nama_pen=$_POST['nama_pen'];
	# hapus gejala lama
	$insert=$koneksi->query("delete from pg where idpen_pg='$idpen' ");
	if (is_array($_POST['pil_cf_gej'])) {
		while(list($key,$value)=each($_POST['pil_cf_gej'])) {
			if ($value!="") {
				$value=explode("|",$value);
				$idgej=$value[0];
				$cf_gej=$value[1];
				$insert=$koneksi->query("insert into pg (idpen_pg,idgej_pg,cf_gej) values ('$idpen','$idgej','$cf_gej')");
			}
		}
	}
	# proses gambar
	$nama_gam=""; $nama_gam=$_POST['gam_lama'];
	if (isset($_FILES["gam"]["name"]) && $_FILES["gam"]["name"]!="") {
		unlink("../images/penyakit/".$_POST['gam_lama']);
		$tipe_gam=explode("/",$_FILES["gam"]["type"]);
		$nama_gam=$idpen.'_'.date("ymdhis").'.'.$tipe_gam[1];
		move_uploaded_file($_FILES['gam']['tmp_name'], "../images/penyakit/".$nama_gam);
	}	
	$ket_pen=$_POST['ket_pen'];
	$cegah_pen=$_POST['cegah_pen'];
	$tanggul_pen=$_POST['tanggul_pen'];	
	$insert=$koneksi->query("update penyakit set nama_pen='$nama_pen',ket='$ket_pen',pencegahan='$cegah_pen', penanggulangan='$tanggul_pen', gambar_pen='$nama_gam' where idpen='$idpen' ");
	header("Location: ?page=penyakit&status=ubah-berhasil");
}
$result2=$koneksi->query("SELECT * FROM penyakit where idpen='$idpen' ");
$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
if ($row2['gambar_pen']=="") {$gambar="";} else {$gambar='<img src="../images/penyakit/'.$row2['gambar_pen'].'" class="img-pen-list"/><p>Untuk mengubah gambar, silakan unggah gambar baru!</p>';}
?>
<script>
$(function() {
	$("#pil_cf_pen option[value='<?= ($row2['cf_pen']+0); ?>']").attr("selected",true);
});
</script>
<form name="form1" id="form1" method="post" enctype="multipart/form-data">
<input type="hidden" id="gam_lama" name="gam_lama" value="<?= $row2['gambar_pen'];?>" />
<div class="isian-form">
    <div class="col-md-4 col-sm-4">
		<?php
        if (isset($_GET['status'])) {
            switch ($_GET['status']) {
                case 'tambah-berhasil': echo '<div class="notif-box">Tambah penyakit baru berhasil.</div>'; break;
            }
        }
        ?>
        <label>ID Penyakit</label>
        <input name="idgej" type="text" id="idgej" readonly="readonly" placeholder="ID Penyakit" value="<?= $idpen;?>"><br>
        <label>Nama Penyakit</label>
        <input name="nama_pen" type="text" id="nama_pen" placeholder="Nama Penyakit" value="<?= $row2['nama_pen'];?>" />
        <label style="font-weight:normal; font-size:13px; margin:25px 0 10px 0;" class="text-justify"><strong>Tips</strong>: Untuk membuat baris baru, gunakan tanda "<strong>|</strong>" (<em>vertical line</em>).</label>
        <br><label>Keterangan</label>
        <textarea id="ket_pen" name="ket_pen" placeholder="Keterangan"><?= $row2['ket'];?></textarea>
        <br><label>Pencegahan</label>
        <textarea id="cegah_pen" name="cegah_pen" placeholder="Pencegahan"><?= $row2['pencegahan'];?></textarea>
        <br><label>Penanggulangan</label>
        <textarea id="tanggul_pen" name="tanggul_pen" placeholder="Penaggulangan"><?= $row2['penanggulangan'];?></textarea>
        <br><label>Gambar</label>
        <input type="file" name="gam" id="gam" class="form-control" />
        <?= $gambar;?>
        <input type="submit" class="mainBtn" id="proses" value="Simpan">
    </div>
    <div class="col-md-8 col-sm-8">
        <div style="overflow:scroll; width:100%; height:800px;">
        <table width="100%" border="1" cellpadding="5" bordercolor="#000" style="font-size:14">
          <tr align="center" bgcolor="#962400" style="color:#fff" height="40">
            <td width="5%" valign="middle" ><strong>No.</strong></td>
            <td valign="middle"><strong>Gejala</strong></td>
            <td valign="middle"><strong>Nilai Kepastian (CF)</strong></td>
          </tr>
        <?php
        $no=1; $result=$koneksi->query("SELECT * FROM gejala order by idgej asc");
        while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
			$idgej=$row['idgej'];
        ?>
        <tr align="left" valign="top" class="bg_row">
            <td align="center"><?= $no; ?></td>
            <td><label for="pil_cf_gej_<?= $no-1;?>" id="label_cf_gej<?= $no-1;?>" class="pilih"><?= $row['idgej'];?> - <?= $row['nama_gej'];?></label></td>
            <td>
            <select id="pil_cf_gej_<?= $no-1;?>" name="pil_cf_gej[]" class="pil_cf_gej" style="width:200px;">
                <option value="">- Pilih -</option>
                <?php
				$result2=$koneksi->query("SELECT * FROM pg where idgej_pg='$idgej' and idpen_pg='$idpen' ");
				$row2=mysqli_fetch_array($result2); $cf_gej=$row2['cf_gej'];
                for($i=20;$i<=100;$i++) {
					$sel=""; if ($i/100==$cf_gej) {$sel=' selected="selected"';}
                    switch ($i) {
                        case "20": $ket=" - Kemungkinan kecil"; break;	
                        case "40": $ket=" - Mungkin"; break;	
                        case "60": $ket=" - Kemungkinan besar"; break;	
                        case "80": $ket=" - Hampir pasti"; break;	
                        case "100": $ket=" - Pasti"; break;
                        default: $ket=""; break;
                    }
                ?>        
                <option <?= $sel;?> value="<?= $row['idgej'];?>|<?= $i/100;?>"><?= ($i/100).$ket;?></option>
                <?php } ?>
            </select>                        
            </td>
          </tr>
        <?php $no++; } ?>  
        </table>
        </div>
        <label class="war">Sedikitnya memilih 2 gejala.</label>
    </div>
</div>
<span style="visibility:hidden"><input type="text" id="jum_pil_gej" name="jum_pil_gej" /></span>
</form>
<script>
$(function() {
	pil_cf_gej();
	$(".pil_cf_gej").change(function(){
		pil_cf_gej();
	})
	function pil_cf_gej() {
		var tot_gej=$(".pil_cf_gej").length-1; var jum_pil=0;
		for(i=0;i<=tot_gej;i++) {
			if (document.getElementsByName("pil_cf_gej[]").item(i).value!="") {
				jum_pil++;
				$("#label_cf_gej"+i).css("color","#d45622");
				$("#pil_cf_gej_"+i).css("border-color","#d45622");
			} else {
				$("#label_cf_gej"+i).css("color","#333");
				$("#pil_cf_gej_"+i).css("border-color","#cfcfcf");
			} 
		}
		for(i=0;i<=tot_gej;i++) {
			if (jum_pil==11 && document.getElementsByName("pil_cf_gej[]").item(i).value=="") {
				document.getElementsByName("pil_cf_gej[]").item(i).disabled=true;					
			} else {
				document.getElementsByName("pil_cf_gej[]").item(i).disabled=false;					
			}			
		}		
		if (jum_pil<2) {
			$(".war").css("display","block"); $("#jum_pil_gej").val("");
		} else {
			$(".war").css("display","none"); $("#jum_pil_gej").val(jum_pil);
		}		
	}

	$("#proses").click(function(){
		pil_cf_gej();
	})
});
</script>