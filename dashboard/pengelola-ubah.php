<?php
$id = $_GET['id'];
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $passw = md5($_POST['passw']);
    $nama_peng = $_POST['nama_peng'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];
    $insert = $koneksi->query("update pengelola set email='$email',passw='$passw',nama_peng='$nama_peng',alamat='$alamat',level='$level' where idpeng='$id' ");
    header("Location: ?page=pengelola&status=ubah-berhasil");
}
$result = $koneksi->query("SELECT * FROM pengelola where idpeng='$id' ");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
?>
<script>
    $(function() {
        $("#level option[value='<?= $row['level']; ?>']").attr("selected", true);
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form name="form1" id="form1" method="post">

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="">Email</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" name="email" type="text" id="email" placeholder="Email" value="<?= $row['email']; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="">Password</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" name="passw" type="text" id="passw" placeholder="Password" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="">Nama Pengelola</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" name="nama_peng" type="text" id="nama_peng" placeholder="Nama" value="<?= $row['nama_peng']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="">Alamat</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input class="form-control" name="alamat" type="text" id="alamat" placeholder="Alamat" maxlength="50" value="<?= $row['alamat']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="">Level</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control" id="level" name="level">
                                    <option value="">- Pilih -</option>
                                    <option value="0">Pengelola</option>
                                    <option value="1">Operator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <input type="submit" class="mainBtn" id="submit" value="Simpan">
                    </div>
                </div>
                <!-- <label>Email</label>
                <input name="email" type="text" id="email" placeholder="Email" value="<?= $row['email']; ?>">
                <label>Password</label>
                <input name="passw" type="text" id="passw" placeholder="Password" />
                <label>Nama Pengelola</label>
                <input name="nama_peng" type="text" id="nama_peng" placeholder="Nama" value="<?= $row['nama_peng']; ?>">
                <label>Alamat</label>
                <input name="alamat" type="text" id="alamat" placeholder="Alamat" maxlength="50" value="<?= $row['alamat']; ?>">
                <label>Level</label>
                <select id="level" name="level">
                    <option value="">- Pilih -</option>
                    <option value="0">Pengelola</option>
                    <option value="1">Operator</option>
                </select>
                <input type="submit" class="mainBtn" id="submit" value="Simpan"> -->
            </form>
        </div>
    </div>
</div>

</div>
<!-- <div class="col-md-7 col-sm-6">
    <img class="logo-isian" src="images/logo.png" />
</div> -->