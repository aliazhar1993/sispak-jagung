<?php
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {
		case "tambah": $page_menu="gejala-tambah.php"; $title="Tambah Gejala"; break;
		case "ubah": $page_menu="gejala-ubah.php"; $title="Ubah Gejala"; break;
		case "hapus":
			$id=$_GET['id']; $gambar=$_GET['gambar'];
			unlink("../images/gejala/".$gambar);
			$insert=$koneksi->query("delete from gejala where idgej='$id' ");
			header("Location: ?page=gejala&status=hapus-berhasil");
		break;
	}
} else {
	$page_menu="gejala-list.php"; $title="Gejala";
}
?>

 <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Gejala
                            </h2>
                           
                        </div>
					
                            
                        <div class="body">
						<div class="row clearfix">
                            <div class="table-responsive">
							
							<div class="page-top" id="web_page_1"></div>
<div class="middle-content">
    <div class="container">
        <div class="row">

            <?php include $page_menu;?>
        </div>
    </div> 
</div>

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





