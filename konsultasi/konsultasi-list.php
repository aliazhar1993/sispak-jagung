<?php
include "../Connections/koneksi.php";
$idkon = auto_no("konsultasi", "K");
if (isset($_POST['pil_cf_gej'])) {
    $tgl = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);
    if (is_array($_POST['pil_cf_gej'])) {
        while (list($key, $value) = each($_POST['pil_cf_gej'])) {
            if ($value != "") {
                $value = explode("|", $value);
                $idgej = $value[0];
                $cf_kg = $value[1];
                $insert = $koneksi->query("insert into konsultasi_gejala (idkon_kg,idgej_kg,cf_kg) values ('$idkon','$idgej','$cf_kg')");
            }
        }
    }
    include "konsultasi-proses.php";
    $insert = $koneksi->query("insert into konsultasi (idkon,iduser_kon,tgl_kon,idpen_kon,cf_kon) values ('$idkon','$iduser_login','$tgl','$idpen_hasil','$cf_hasil')");
    header("Location: ?page=konsultasi&menu=hasil&id=$idkon");
}
?>
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
                                        <th>Gejala</th>
                                        <th>Jawaban</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Gejala</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $result = $koneksi->query("SELECT * FROM gejala order by idgej asc");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                        if ($row['gambar_gej'] == "") {
                                            $gambar = "";
                                        } else {
                                            $gambar = '<input type="button" id="btngam|' . $row['idgej'] . '" name="btn_gam[]" class="mainBtn btn_gam" value="Gambar" /><img id="gam_' . $row['idgej'] . '" name="tam_gam[]" src="../images/gejala/' . $row['gambar_gej'] . '" class="img-pen-list gam-view"/>';
                                        }

                                    ?>

                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><label for="pil_cf_gej_<?= $no; ?>" id="label_cf_gej_<?= $no - 1; ?>"><?= $row['idgej']; ?> - <?= $row['nama_gej']; ?></label><?= $gambar; ?></td>
                                            <td>
                                                <select id="pil_cf_gej_<?= $no; ?>" name="pil_cf_gej[]">
                                                    <option value="">- Pilih -</option>
                                                    <option value="<?= $row['idgej']; ?>|0.20">Kemungkinan kecil</option>
                                                    <option value="<?= $row['idgej']; ?>|0.40">Mungkin</option>
                                                    <option value="<?= $row['idgej']; ?>|0.60">Kemungkinan besar</option>
                                                    <option value="<?= $row['idgej']; ?>|0.80">Hampir pasti</option>
                                                    <option value="<?= $row['idgej']; ?>|1">Pasti</option>
                                                </select><?php $no++;
                                                        } ?>
                                            </td>

                                        </tr>


                                </tbody>

                            </table>
                            <div class="col col-md-4 col-sm-4">
                                <label class="war">Setidaknya memilih 2 gejala.</label>
                                <input type="submit" class="mainBtn" id="proses" value="Proses">
                                <span style="visibility:hidden"><input type="text" id="jum_pil_gej" name="jum_pil_gej" /></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>

<script>
    $(function() {
        $(".btn_gam").click(function() {
            id = $(this).attr("id").split("|");
            if ($("#gam_" + id[1]).css("display") == "none") {
                $("#gam_" + id[1]).css("display", "block");
            } else {
                $("#gam_" + id[1]).css("display", "none");
            }
        })

        $(".pil_cf_gej").change(function() {
            gej_cf();
        })

        function gej_cf() {
            var tot_gej = $(".pil_cf_gej").length - 1;
            var jum_pil = 0;
            for (i = 0; i <= tot_gej; i++) {
                if (document.getElementsByName("pil_cf_gej[]").item(i).value != "") {
                    jum_pil++;
                    $("#label_cf_gej_" + i).css("color", "#d45622");
                    document.getElementsByName("pil_cf_gej[]").item(i).style.borderColor = "#d45622";
                } else {
                    $("#label_cf_gej_" + i).css("color", "#333");
                    document.getElementsByName("pil_cf_gej[]").item(i).style.borderColor = "#ccc";
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
            gej_cf();
        })
    });
</script>

<?php
include "footer.php";
?>