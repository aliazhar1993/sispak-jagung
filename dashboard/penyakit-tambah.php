<?php
$idpen = auto_no("penyakit", "P");
if (isset($_POST['nama_pen'])) {
    $nama_pen = $_POST['nama_pen'];
    if (is_array($_POST['pil_cf_gej'])) {
        while (list($key, $value) = each($_POST['pil_cf_gej'])) {
            if ($value != "") {
                $value = explode("|", $value);
                $idgej = $value[0];
                $cf_gej = $value[1];
                $insert = $koneksi->query("insert into pg (idpen_pg,idgej_pg,cf_gej) values ('$idpen','$idgej','$cf_gej')");
            }
        }
    }
    # proses gambar
    $nama_gam = "";
    if (isset($_FILES["gam"]["name"]) && $_FILES["gam"]["name"] != "") {
        $tipe_gam = explode("/", $_FILES["gam"]["type"]);
        $nama_gam = $idpen . '_' . date("ymdhis") . '.' . $tipe_gam[1];
        move_uploaded_file($_FILES['gam']['tmp_name'], "../images/penyakit/" . $nama_gam);
    }
    $ket_pen = $_POST['ket_pen'];
    $cegah_pen = $_POST['cegah_pen'];
    $tanggul_pen = $_POST['tanggul_pen'];
    $insert = $koneksi->query("insert into penyakit (idpen, nama_pen, ket, pencegahan, penanganan, gambar_pen) values ('$idpen','$nama_pen','$ket_pen','$cegah_pen','$tanggul_pen','$nama_gam')");
    header("Location: ?page=penyakit&menu=tambah&status=tambah-berhasil");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form name="nama_pen" id="nama_pen" method="post" enctype="multipart/form-data">
                <div class="isian-form">
                    <div class="col-md-4 col-sm-4">
                        <?php
                        if (isset($_GET['status'])) {
                            switch ($_GET['status']) {
                                case 'tambah-berhasil':
                                    echo '<div class="notif-box">Tambah penyakit baru berhasil.</div>';
                                    break;
                            }
                        }
                        ?>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="IDGejala">ID</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" name="idgej" type="text" id="idgej" readonly="readonly" placeholder="ID Penyakit" value="<?= $idpen; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Nama Penyakit</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" name="nama_pen" type="text" id="nama_pen" placeholder="Nama Penyakit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label style="font-weight:normal; font-size:13px; margin:25px 0 10px 0;" class="text-justify"><strong>Tips</strong>: Untuk membuat baris baru, gunakan tanda "<strong>|</strong>" (<em>vertical line</em>).</label>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Keterangan</label>
                            </div>
                            <br><br>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control" id="ket_pen" name="ket_pen" placeholder="Keterangan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Pencegahan</label>
                            </div>
                            <br><br>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control" id="cegah_pen" name="cegah_pen" placeholder="Pencegahan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Penanganan</label>
                            </div>
                            <br><br>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control" id="tanggul_pen" name="tanggul_pen" placeholder="Penaggulangan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Gambar</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" type="file" name="gam" id="gam" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="submit" class="mainBtn" id="proses" value="Simpan">

                                <!-- <input type="submit" class="mainBtn" id="proses" value="Proses"> -->
                            </div>
                        </div>


                        <!-- <label>ID Penyakit</label>
            <input name="idgej" type="text" id="idgej" readonly="readonly" placeholder="ID Penyakit" value="<?= $idpen; ?>">
            <label>Nama Penyakit</label>
            <input name="nama_pen" type="text" id="nama_pen" placeholder="Nama Penyakit" />
            <label>Keterangan</label>
            <textarea id="ket_pen" name="ket_pen" placeholder="Keterangan"></textarea>
            <label>Pencegahan</label>
            <textarea id="cegah_pen" name="cegah_pen" placeholder="Pencegahan"></textarea>
            <label>Penanganan</label>
            <textarea id="tanggul_pen" name="tanggul_pen" placeholder="Penaggulangan"></textarea>
            <label>Gambar</label>
            <input type="file" name="gam" id="gam" class="form-control" /> -->
                        <!-- <input type="submit" class="mainBtn" id="proses" value="Simpan"> -->
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div style="overflow:scroll; width:100%; height:800px;">
                            <table class="table table-bordered">
                                <tr align="center">
                                    <td width="5%" valign="middle"><strong>No.</strong></td>
                                    <td valign="middle"><strong>Gejala</strong></td>
                                    <td valign="middle"><strong>Nilai Kepastian (CF)</strong></td>
                                </tr>
                                <?php
                                $no = 1;
                                $result = $koneksi->query("SELECT * FROM gejala order by idgej asc");
                                while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                ?>
                                    <tr align="left" valign="top" class="bg_row">
                                        <td align="center"><?= $no; ?></td>
                                        <td><label for="pil_cf_gej_<?= $no - 1; ?>" id="label_cf_gej<?= $no - 1; ?>" class="pilih"><?= $row['idgej']; ?> - <?= $row['nama_gej']; ?></label></td>
                                        <td>
                                            <select id="label_cf_gej<?= $no - 1; ?>" name="pil_cf_gej[]" style="width:200px;">
                                                <option value="">- Pilih -</option>
                                                <?php
                                                for ($i = 20; $i <= 100; $i++) {
                                                    switch ($i) {
                                                        case "20":
                                                            $ket = " - Kemungkinan kecil";
                                                            break;
                                                        case "40":
                                                            $ket = " - Mungkin";
                                                            break;
                                                        case "60":
                                                            $ket = " - Kemungkinan besar";
                                                            break;
                                                        case "80":
                                                            $ket = " - Hampir pasti";
                                                            break;
                                                        case "100":
                                                            $ket = " - Pasti";
                                                            break;
                                                        default:
                                                            $ket = "";
                                                            break;
                                                    }
                                                ?>
                                                    <option value="<?= $row['idgej']; ?>|<?= $i / 100; ?>"><?= ($i / 100) . $ket; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </table>
                        </div>
                        <label class="war">Sedikitnya memilih 2 gejala.</label>
                    </div>
                </div>
                <span style="visibility:hidden"><input type="text" id="jum_pil_gej" name="jum_pil_gej" /></span>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".pil_cf_gej").change(function() {
            pil_cf_gej();
        })

        function pil_cf_gej() {
            var tot_gej = $(".pil_cf_gej").length - 1;
            var jum_pil = 0;
            for (i = 0; i <= tot_gej; i++) {
                if (document.getElementsByName("pil_cf_gej[]").item(i).value != "") {
                    jum_pil++;
                    $("#label_cf_gej" + i).css("color", "#d45622");
                    $("#pil_cf_gej_" + i).css("border-color", "#d45622");
                } else {
                    $("#label_cf_gej" + i).css("color", "#333");
                    $("#pil_cf_gej_" + i).css("border-color", "#cfcfcf");
                }
            }
            for (i = 0; i <= tot_gej; i++) {
                if (jum_pil == 11 && document.getElementsByName("pil_cf_gej[]").item(i).value == "") {
                    document.getElementsByName("pil_cf_gej[]").item(i).disabled = true;
                } else {
                    document.getElementsByName("pil_cf_gej[]").item(i).disabled = false;
                }
            }
            if (jum_pil < 2) {
                $(".war").css("display", "block");
                $("#jum_pil_gej").val("");
            } else {
                $(".war").css("display", "none");
                $("#jum_pil_gej").val(jum_pil);
            }
        }

        $("#proses").click(function() {
            pil_cf_gej();
        })
    });
</script>