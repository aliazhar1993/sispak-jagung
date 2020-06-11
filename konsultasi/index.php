
<?php
error_reporting(0);
ob_start();

include "auto_no.php";
if (isset($_GET['page'])) {
	switch ($_GET['page']) {

		case "profil": $page="profil.php"; break;	
		case "konsultasi": $page="konsultasi.php"; break;	
		case "riwayat": $page="riwayat.php"; break;	
		case "penjelasan": $page="penjelasan.php"; break;
		case "informasi": $page="informasi.php"; break;			
	}
} else {
	$page="penjelasan.php"; 
}


include "../validasi/css2.php";
include $page;
include "header.php";

?>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

          
           

            <div class="row clearfix">
               
            </div>
        </div>
    </section>

  <?php
  include"footer.php";
  ?>
