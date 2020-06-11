<?php
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {
		case "tambah": $page_menu="pengelola-tambah.php"; $title="Tambah Pengelola"; break;
		case "ubah": $page_menu="pengelola-ubah.php"; $title="Ubah Pengelola"; break;
		case "hapus":
			$id=$_GET['id'];
			$insert=$koneksi->query("delete from pengelola where idpeng='$id' ");
			header("Location: ?page=pengelola&status=hapus-berhasil");
		break;
	}
} else {
	$page_menu="pengelola-list.php"; $title="Pengelola";
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
                                Tabel Pengelola
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





