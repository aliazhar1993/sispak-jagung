

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">

            </div>
            <!-- Body Copy -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Profil USer
                            </h2>
                            
                        </div>
                        <div >
                          
 
<?php
if (isset($_GET['menu'])) {
	switch ($_GET['menu']) {
		case "ubah": $page_menu="profil-ubah.php"; $title="Ubah Profil"; break;
	}
} else {
	$page_menu="profil-list.php"; ;
}
?>
<div class="page-top" id="web_page_2"></div>
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
            <!-- #END# Body Copy -->
           
     
           
        </div>
    </section>

