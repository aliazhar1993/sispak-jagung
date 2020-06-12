<?php
$id = $_GET['id'];
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $passw = md5($_POST['passw']);
    $nama_user = $_POST['nama_user'];
    $alamat = $_POST['alamat'];

    $insert = $koneksi->query("update user set email='$email',passw='$passw',nama_user='$nama_user',alamat='$alamat',level='2' where iduser='$id' ");
    header("Location: ?page=user&status=ubah-berhasil");
}
$result = $koneksi->query("SELECT * FROM user where iduser='$id' ");
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
            <form class="form-horizontal" name="form1" id="form1" method="POST">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="email" name="email" class="form-control" value="<?= $row['email']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="passw">Password</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" id="passw" name="passw" class="form-control" placeholder="Password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="passw">Nama User</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" value="<?= $row['nama_user']; ?>" id="nama_user" name="nama_user" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="passw">Alamat</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" maxlength="50" value="<?= $row['alamat']; ?>" name="alamat" id="alamat" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <input type="submit" class="mainBtn" id="submit" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">

            </div>
        </div>
    </div>
</div> -->