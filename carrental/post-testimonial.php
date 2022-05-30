<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['submit'])) {
    $testimonoial = $_POST['testimonial'];
    $email = $_SESSION['login'];
    $sql = "INSERT INTO  tbltestimonial(UserEmail,Testimonial) VALUES(:email,:testimonoial)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':testimonoial', $testimonoial, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      $msg = "Testimonail submitted successfully";
    } else {
      $error = "Something went wrong. Please try again";
    }
  }
?>
  <!DOCTYPE HTML>
  <html lang="en">

  <head>

    <title>Car Rental Portal |Post testimonial</title>
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>

   

    <!--Header-->
    <?php include('includes/header.php'); ?>
   

    <?php
    $useremail = $_SESSION['login'];
    $sql = "SELECT * from tblusers where EmailId=:useremail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $result) { ?>
        <section class="user_profile inner_pages">
          <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40">
              <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
              </div>

              <div class="dealer_info">
                <h5><?php echo htmlentities($result->FullName); ?></h5>
                <p><?php echo htmlentities($result->Address); ?><br>
                  <?php echo htmlentities($result->City); ?>&nbsp;<?php echo htmlentities($result->Country);
                                                                }
                                                              } ?></p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 col-sm-3">
                
                <div class="col-md-6 col-sm-8">
                  <div class="profile_wrap">
                    
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!--/Profile-setting-->

        <<!--Footer -->
          <?php include('includes/footer.php'); ?>
          <!-- /Footer-->

          <!--Back to top-->
          <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
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



  </body>

  </html>
<?php } ?>