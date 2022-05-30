<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">

<head>

  <title>Emri i kompanis</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!--Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

  <!-- Bootstrap Icons CDN - Version 1.8.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <!-- Link to CSS -->
  <link rel="stylesheet" href="assets/css/style.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
    .header {
      position: relative;
      text-align: center;
      /* background-color:; */
      color: white;
    }



    .inner-header {
      height: 65vh;
      width: 100%;
      margin: 0;
      padding: 0;
    }

    .flex {
      /*Flexbox for containers*/
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .waves {
      position: relative;
      width: 100%;
      height: 15vh;
      margin-bottom: -7px;
      /*Fix for safari gap*/
      min-height: 100px;
      max-height: 150px;
    }

    .content {
      position: relative;
      height: 20vh;
      text-align: center;

    }

    /* Animation */

    .parallax>use {
      animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
    }

    .parallax>use:nth-child(1) {
      animation-delay: -2s;
      animation-duration: 7s;
    }

    .parallax>use:nth-child(2) {
      animation-delay: -3s;
      animation-duration: 10s;
    }

    .parallax>use:nth-child(3) {
      animation-delay: -4s;
      animation-duration: 13s;
    }

    .parallax>use:nth-child(4) {
      animation-delay: -5s;
      animation-duration: 20s;
    }

    @keyframes move-forever {
      0% {
        transform: translate3d(-90px, 0, 0);
      }

      100% {
        transform: translate3d(85px, 0, 0);
      }
    }

    /*Shrinking for mobile*/
    @media (max-width: 768px) {
      .waves {
        height: 40px;
        min-height: 40px;
      }

      .content {
        height: 30vh;
      }

      h1 {
        font-size: 24px;
      }
    }

  </style>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  
</head>

<body class="bg-light" style="font-family: 'Nunito', sans-serif;">



  <!--Header-->
  <?php include('includes/header.php'); ?>



  <div class="container">
    <div class="row">
      <!-- <div class="col-sm-5 p-5">
        <h1 class="text-left text-success mt-5">Start Finding</h1>
        <h1 class="text-left mt-2 mb-5">Your Car Color!</h1>
        <p>Thanks to our high quality and new generation of professional retouching formulas, you can achieve impressive results even without wasting a lot of money in workshops.</p>
        <div class="animate__backInDown">Example</div>

      </div>
      <div class="col-sm-7 mt-5">
        <img src="https://i.postimg.cc/HsDqZF4Z/Image-363.png" alt="" width="100%" style="margin-top: 100px;">
      </div> -->
    </div>


    <div class="header">
      <div class="inner-header flex">
        <div class="col-sm-5 p-5">
          <h1 class="text-left text-success mt-5">Start Finding</h1>
          <h1 class="text-left text-body mt-2 mb-5">Your Car Color!</h1>
          <p class=" text-body mt-2 mb-5">Thanks to our high quality and new generation of professional
            retouching formulas, you can achieve impressive results even without wasting a lot of money in
            workshops.</p>





          <a href="car-listing.php" class="btn btn-dark pe-5 ps-5 pt-2">Shiko më shumë</a>




          <!-- <a href="" class="btn btn-outline-dark">Shiko më shumë</a> -->

        </div>
        <div class="col-sm-7 mt-3">
          <img src="https://i.postimg.cc/HsDqZF4Z/Image-363.png" alt="" width="100%" style="margin-top: 100px;">
        </div>
      </div>



      <!--Waves end-->

    </div>
    <!--Header ends-->

  </div>
  <div>
    <div>
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="parallax">
          <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(218, 218, 218, 0.27)" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(162, 162, 162, 0.27)" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(83, 83, 83, 0.27)" />
          <use xlink:href="#gentle-wave" x="48" y="7" fill="grey" />
        </g>
      </svg>
    </div>
  </div>
  <div class="container border mt-5 mb-5 p-5 rounded-5 shadow">
    <div class="row">
      <div class="col-3 text-center border-end ">
        <h2><i class="fa-solid fa-calendar "></i> </h2>
        <h4 class="text">40+ </h4>
        <p>Vite në biznes</p>
      </div>
      <div class="col-3 text-center border-end">
        <h2><i class="fa-solid fa-tags"></i> </h2>
        <h4 class="text">1200+ </h4>
        <p>Makina të reja për shitje</p>
      </div>
      <div class="col-3 text-center border-end">
        <h2><i class="fa-solid fa-car"></i> </h2>
        <h4 class="text">1000+ </h4>
        <p>Makina të përdorura për shitje</p>
      </div>
      <div class="col-3 text-center">
        <h2><i class="fa-solid fa-face-smile"></i> </h2>
        <h4 class="text">600+ </h4>
        <p>Klientë të kënaqur</p>
      </div>
    </div>
  </div>





  <!--Testimonial -->
  <section>
    <div class="container border mt-5 p-5 rounded-5 shadow">
      <div class="section-header white-text text-center border-bottom">
        <h2 class="text-center ">Reagimet e përdoruesve</span></h2>


      </div>
      <div class="row">
        <div id="testimonial-slider ">
          <?php
          $tid = 1;
          $sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid limit 4";
          $query = $dbh->prepare($sql);
          $query->bindParam(':tid', $tid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {  ?>


              <section class="p-4 p-md-5 text-center text-lg-start" style="
    background-image: url(https://mdbcdn.b-cdn.net/img/Photos/Others/background2.webp);
  ">
                <div class="row d-flex justify-content-center">
                  <div class="col-md-10">
                    <div class="card">
                      <div class="card-body m-3">
                        <div class="row">
                          <div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                            <img src="data:image/png;base64,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">
                          </div>
                          <div class="col-lg-8">
                            <p class="fw-bold lead mb-2">
                              <strong><?php echo htmlentities($result->FullName); ?></strong>
                            </p>
                            <p class="fw-bold text-muted mb-0 border-bottom">Klientë</p>
                            <p class="text-muted fw-light mb-4">
                              <?php echo htmlentities($result->Testimonial); ?>
                            </p>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>















              <!-- <div class="text-center">
                        <h4 class="mb-4 text-start mt-3"><i class="fa-solid fa-user-pen"></i>
                            <?php echo htmlentities($result->FullName); ?></h4>
                        <p class=" text-start border-bottom">
                            <?php echo htmlentities($result->Testimonial); ?>
                        </p>
                    </div> -->



          <?php }
          } ?>
        </div>
      </div>
    </div>
    <div class="dark-overlay"></div>
  </section>
  <!-- /Testimonial-->


  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer-->

  <!--Back to top-->
  <!-- <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div> -->
  <!--/Back to top-->

  <!--Login-Form -->
  <?php include('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include('includes/registration.php'); ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include('includes/forgotpassword.php'); ?>
  <!--/Forgot-password-Form -->





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
  <!-- MDB -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script> -->

</body>


<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->

</html>