<?php
include "Connections/koneksi.php";
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $passw = md5($_POST['passw']);
  # cari pengelola
  $result = $koneksi->query("select * from pengelola where email='$email' and passw='$passw' ");
  $ada = mysqli_num_rows($result);
  $redirect = "dashboard";
  if ($ada == 0) {
    # cari user
    $result = $koneksi->query("select * from user where email='$email' and passw='$passw' ");
    $redirect = "konsultasi";
    $ada = mysqli_num_rows($result);
  }
  if ($ada > 0) {
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $level = $row['level'];
    $_SESSION['MM_Username'] = $email;
    $_SESSION['MM_UserGroup'] = $level;
    header("Location: $redirect");
  } else {
    header("Location: ?page=login&status=login-gagal");
  }
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Sistem Pakar Penyakit Jagung</title>
  <!--
Newline Template
https://templatemo.com/tm-503-newline
-->
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/fontAwesome.css">
  <link rel="stylesheet" href="css/templatemo-style.css">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <style>
    div.gallery {
      margin: 5px;
      border: 1px solid #ccc;
      float: left;
      width: 180px;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }

    div.gallery img {
      width: 100%;
      height: auto;
    }

    div.desc {
      padding: 15px;
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="overlay"></div>
  <section class="top-part">
    <video controls autoplay loop>
      <source src="videos/video1.mp4" type="video/mp4">
      <source src="videos/video1.ogg" type="video/ogg">
      Your browser does not support the video tag.
    </video>
  </section>

  <section class="cd-hero">
    <div class="cd-slider-nav">
      <nav>
        <span class="cd-marker item-1"></span>
        <ul>
          <li class="selected"><a href="#0">
              <div class="image-icon"><img src="img/home-icon.png"></div>
              <h6>Welcome</h6>
            </a></li>
          <li><a href="#0">
              <div class="image-icon"><img src="img/about-icon.png"></div>
              <h6>Tentang</h6>
            </a></li>
          <li><a href="#1">
              <div class="image-icon"><img src="img/featured-icon.png"></div>
              <h6>Login</h6>
            </a></li>
          <li><a href="#0">
              <div class="image-icon"><img src="img/projects-icon.png"></div>
              <h6>Penyakit</h6>
            </a></li>
          <li><a href="#0">
              <div class="image-icon"><img src="img/contact-icon.png"></div>
              <h6>Contact Us</h6>
            </a></li>
        </ul>
      </nav>
    </div> <!-- .cd-slider-nav -->

    <ul class="cd-hero-slider">
      <li class="selected">
        <div class="heading">
          <h1>Sistem Pakar PENYAKIT TANAMAN JAGUNG <br>Dinas Pertanian Pasaman Barat</h1>
          <span>Selamat Datang</span>
          <br><br>
          <img src="images/pasbar2.png" width="200" alt="">
        </div>
        <!-- <div class="cd-full-width first-slide">
          <div class="container">
            <div class="row">
              <div class="col-md-12">

              </div>
            </div>
          </div>
        </div> -->
      </li>
      <li>
        <div class="heading">
          <h1>About Us</h1>
          <span></span>
        </div>
        <div class="cd-half-width second-slide">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="content second-content">
                  <div class="row">
                    <div class="col-md-7 left-image">
                      <img src="images/pakar.jpg">
                    </div>
                    <div class="col-md-5">
                      <div class="right-about-text">
                        <h4>Apa Itu Sistem Pakar?</h4>
                        <p>Sistem pakar adalah aplikasi berbasis komputer yang digunakan untuk menyelesaikan masalah sebagaimana yang dipikirkan oleh pakar. Pakar yang dimaksud di sini adalah orang yang mempunyai keahlian khusus yang dapat menyelesaikan masalah yang tidak dapat yang diselesaikan oleh orang awam.</p>
                        <div class="primary-button">

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <div class="left-about-text">
                        <h4>Apa Metode Yang DIgunakan Pada Website ini?</h4>
                        <p>Metode Certainty Factor merupakan nilai untuk mengukur keyakinan pakar.Certainty Factor diperkenalkan oleh shortliffe Buchanan dalam pembuatan sistem pakar MYCHIN yang merupakan nilai parameter klinis yang di berikan MYCHIN untuk menunjukkan besarnya kepercayaan certainty factor menunjukkan ukuran kepastian terhadap suatu fakta atau aturan nilai tertinggi dalam certainty factor adalah +1,0 (pasti benar atau definitely), dan nilai terendah pada certainty factor adalah -1,0 (pasti salah atau definitely not). Nilai positif merepresentasikan derajat keaykinan, sedangkan nilai negatif merepresentasikan derajat ketidakyakinan. </p>
                        <div class="primary-button">

                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 right-image">
                      <img src="images/jagung.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="heading">
          <h1>Login</h1>
        </div>
        <div class="cd-half-width third-slide">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="content third-content">
                  <div class="row">
                    <div class="col-md-7 left-image">
                      <img src="images/login.jpg">
                    </div>
                    <div class="col-md-5">
                      <div class="right-feature-text">
                        <center>
                          <img src="images/pasbar2.png" alt="" width="100">
                        </center>
                        <center>
                          <h2 style="font-family: fantasy;">Silahkan Login</h2>
                        </center>
                        <br><?php
                            if (isset($_GET['status'])) {
                              switch ($_GET['status']) {
                                case 'login-gagal':
                                  echo '<div class="notif-box">Login anda gagal. Silakan coba lagi!</div>';
                                  break;
                              }
                            }
                            ?>
                      </div>
                      <form method="post" name="form1" id="form1">
                        <div class="form-group">
                          <label for="name" class="col-sm-3 control-label">Email</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="email" placeholder="Email" />
                          </div>
                        </div>
                        <br><b><b><br><br></b></b>
                        <div class="form-group">
                          <label for="name" class="col-sm-3 control-label">Password</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="password" name="passw" placeholder="Password" />
                          </div>
                        </div>



                        <!-- <div class="input-group">
                          <label>Email</label>
                          <input name="email" type="text" id="email" placeholder="Email">
                        </div> -->
                        <!-- <div class="input-group">
                          <label>Password</label>
                          <input name="passw" type="password" id="passw" placeholder="Password">
                        </div> -->
                        <br><br>
                        <div>
                          <button style=" color: white;" type="submit" class="btn btn-primary" name="login_user">Login</button>
                        </div>
                        <br>
                        <p>
                          <b> Belum Daftar? <a href="registrasi/">Klik Disini</a></b>

                        </p>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </li>

      <li>
        <div class="heading">
          <h1>Daftar Penyakit Jagung</h1>
          <span></span>
        </div>
        <div class="cd-half-width fourth-slide">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="content">
                  <!-- <div class="row">
                    <?php
                    $images = glob("images/penyakit/*.*");
                    for ($i = 0; $i < count($images); $i++) {
                      $single_image = $images[$i];
                    ?>
                      <div class="col-md-3 project-item">
                        <img src="<?php echo $single_image; ?>" width="150">
                      </div>
                    <?php
                    }
                    ?>
                  </div> -->
                  <?php
                  // $ambil = $koneksi->query("SELECT * FROM penyakit ");
                  // while ($r = mysqli_fetch_array($ambil)) {
                  $images = glob("images/penyakit/*.*");
                  for ($i = 0; $i < count($images); $i++) {
                    $single_image = $images[$i];

                    // $images = glob("images/penyakit/*.*");
                    // for ($i = 0; $i < count($images); $i++) {
                    //   $single_image = $images[$i];
                  ?>
                    <div class="gallery">
                      <a>
                        <img src="<?php echo $single_image; ?>" alt="Cinque Terre" width="600" height="400">
                      </a>
                      <div class="desc">Add a description of the image here</div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <div class="container">
          <div class="row">
            <div class="heading">
              <h1>Contact us</h1>
            </div>
            <div class="col-md-12">
              <div class="content fivth-content">
                <div class="row">
                  <div class="col-md-4">
                    <div class="left-info">
                      <ul class="social-icons">
                        <i><a href="#"><i class="fa fa-facebook"></i></a></i>
                        <i><a href="#"><i class="fa fa-twitter"></i></a></i>
                        <i><a href="#"><i class="fa fa-linkedin"></i></a></i>
                        <i><a href="#"><i class="fa fa-rss"></i></a></i>
                        <i><a href="#"><i class="fa fa-behance"></i></a></i>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <form id="contact" action="" method="post">
                        <div class="col-md-6">
                          <fieldset>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required="">
                          </fieldset>
                        </div>
                        <div class="col-md-6">
                          <fieldset>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Email" required="">
                          </fieldset>
                        </div>
                        <div class="col-md-12">
                          <fieldset>
                            <textarea name="message" rows="6" class="form-control" id="message" placeholder="Message" required=""></textarea>
                          </fieldset>
                        </div>
                        <div class="col-md-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="btn">Send Message</button>
                          </fieldset>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul> <!-- .cd-hero-slider -->
  </section> <!-- .cd-hero -->
  <section>
    <footer>
      <p>Copyright &copy; 2020 Sistem Pakar Jagung

        | STMIK Indonesia Padang</p>
    </footer>
  </section>



  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
  </script>

  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
</body>

</html>