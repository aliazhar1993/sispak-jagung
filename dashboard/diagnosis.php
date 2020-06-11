<?php
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {
		case "hasil": $page_menu="diagnosis-hasil.php"; $title="Hasil Diagnosis"; break;
	}
} else {
	$page_menu="diagnosis-list.php"; $title="Diagnosis";
}
?>


 <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    
                    
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           
                           
                        </div>
					
                            
                        <div class="body">
						<div class="row clearfix">
                            <div class="table-responsive">
							

<div class="page-top" id="web_page_1"></div>
<div class="middle-content">
    <div class="container">
        <div class="row">
            <div class="h1-title"><h1><?= $title;?></h1></div>
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









