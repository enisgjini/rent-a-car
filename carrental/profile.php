<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['updateprofile'])) {
    $name = $_POST['fullname'];
    $mobileno = $_POST['mobilenumber'];
    $dob = $_POST['dob'];
    $adress = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_SESSION['login'];
    $sql = "update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $query->bindParam(':dob', $dob, PDO::PARAM_STR);
    $query->bindParam(':adress', $adress, PDO::PARAM_STR);
    $query->bindParam(':city', $city, PDO::PARAM_STR);
    $query->bindParam(':country', $country, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $msg1 = "Profili u përditësua me sukses";
  }

?>
  <?php if (isset($_POST['updatepass'])) {
    $password = md5($_POST['password']);
    $newpassword = md5($_POST['newpassword']);
    $email = $_SESSION['login'];
    $sql = "SELECT Password FROM tblusers WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
      $con = "update tblusers set Password=:newpassword where EmailId=:email";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
      $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();
      $msg = "Fjalëkalimi u përditësua";
    } else {
      $error = "Fjalëkalimi juaj aktual është i gabuar";
    }
  } ?>

  <?php
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
      $msg2 = "Dëshmia është paraqitur me sukses";
    } else {
      $error2 = "Diçka shkoi keq.Ju lutem provoni përsëri";
    }
  } ?>

  <!DOCTYPE HTML>
  <html lang="en">

  <head>

    <title>Car Rental Portal | My Profile</title>
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
  </head>

  <body class="bg-light">
    <!--Header-->
    <?php include('includes/header.php'); ?>
    <!-- /Header -->
    <!--Page Header-->
    <div class="container mt-3 mb-3">
      <section class="page-header profile_page">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ballina</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cilësimet e profilit</li>
          </ol>

        </nav>
      </section>
    </div>
    <!-- /Page Header-->




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

        <div class="container">


          <div class="row">

            <h5 class="uppercase underline">Cilësimet e përgjithshme</h5>

            <?php
            if ($msg1) {
            ?>
              <div class="succWrap">
                <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                  <div>
                    Suksese!
                    <?php echo htmlentities($msg); ?>
                  </div>
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            <?php } ?>

            <?php
            if ($error) {
            ?>
              <div class="errorWrap">
                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                  <div>
                    Error!
                    <?php echo htmlentities($error); ?>
                  </div>
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            <?php } else if ($msg) { ?>
              <div class="alert alert-success alert-dismissible" role="alert">Suksese!
                <?php echo htmlentities($msg); ?>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>

            <?php
            if ($error2) { ?>
              <div class="errorWrap">
                <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                  <div>
                    Error!
                    <?php echo htmlentities($error2); ?>
                    <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } else if ($msg2) { ?>
                  <div class="alert alert-success alert-dismissible" role="alert">Suksese!
                    <?php echo htmlentities($msg2); ?>
                    <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>














                <form method="post">
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" id="form3Example1" class="form-control form-control-lg" disabled />
                        <label class="form-label">Data e regjistrimit - <?php echo htmlentities($result->RegDate); ?></label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <?php if ($result->UpdationDate != "") { ?>
                          <input type="text" id="form3Example2" class="form-control form-control-lg" disabled />
                          <label class="form-label" for="form3Example2">Përditësimi i fundit i llogarisë u modifikua në <?php echo htmlentities($result->UpdationDate); ?></label>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" id="fullname" class="form-control form-control-lg form-control form-control-lg-lg" name="fullname" value="<?php echo htmlentities($result->FullName); ?>" required />
                        <label class="form-label" for="form3Example3">Emër i plotë</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <input type="email" class="form-control form-control-lg" value="<?php echo htmlentities($result->EmailId); ?>" name="emailid" id="email" type="email" disabled />
                        <label class="form-label" for="form3Example3">Adresa e postës elektronike</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">
                        <input type="text" id="phone-number" class="form-control form-control-lg form-control form-control-lg-lg" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo); ?>" required />
                        <label class="form-label" for="form3Example3">Numri i telefonit</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">
                        <input type="date" class="form-control form-control-lg" value="<?php echo htmlentities($result->dob); ?>" name="dob" id="birth-date" />
                        <label class="form-label" for="form3Example3">Data e lindjes&nbsp;(dd/mm/yyyy)</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                      <div class="form-outline">


                        <input type="text" id="country" class="form-control form-control-lg form-control form-control-lg-lg" name="country" value="<?php echo htmlentities($result->City); ?>" />
                        <label class="form-label" for="country">Vendbanimi</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-outline">


                        <input type="text" id="city" class="form-control form-control-lg form-control form-control-lg-lg" name="city" value="<?php echo htmlentities($result->City); ?>" />
                        <label class="form-label" for="country">Qyteti</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-outline mb-4">


                    <textarea class="form-control" id="form4Example3" rows="4" name="address"><?php echo htmlentities($result->Address); ?></textarea>
                    <label class="form-label" for="form4Example3">Adresa juaj</label>
                  </div>







                  <button type="submit" name="updateprofile" class="btn btn-primary">Ruaj ndryshimet <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>






                  <a class="btn btn-primary mt-1" data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fa-solid fa-arrows-rotate"></i> Përditësoni fjalëkalimin</a>
                  <a class="btn btn-primary mt-1" data-mdb-toggle="modal" data-mdb-target="#exampleModal1"><i class="fa-solid fa-comments"></i> Postoni një dëshmi</a>




                  <!-- Modal #1 - Përditso fjalekalimin -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Përditësoni fjalëkalimin</h5>
                          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form name="chngpwd" method="post" onSubmit="return valid();">
                          <div class="modal-body">
                            <div class="form-outline mt-3">
                              <input type="password" id="password" class="form-control form-control-lg" name="password" type="password" required />
                              <label class="form-label" for="password">Fjalëkalimi aktual</label>
                            </div>
                            <div class="form-outline mt-3">
                              <input type="password" id="newpassword" class="form-control form-control-lg" name="newpassword" type="password" required />
                              <label class="form-label" for="newpassword">Fjalëkalimi</label>
                            </div>
                            <div class="form-outline mt-3">
                              <input type="password" id="confirmpassword" class="form-control form-control-lg" name="confirmpassword" type="password" required />
                              <label class="form-label" for="password">Konfirmoni fjalëkalimin</label>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Mbylle</button>

                            <button type="submit" value="Update" name="updatepass" id="submit" class="btn btn-primary">Përditëso</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal #2 - Posto nje deshmi -->

                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Postoni një dëshmi</h5>
                          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                          <div class="modal-body">
                            <div class="form-outline">
                              <textarea class="form-control" id="textAreaExample1" rows="4" name="testimonial" required=""></textarea>
                              <label class="form-label" for="textAreaExample">Message</label>
                            </div>
                            <div class="form-group">

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Mbylle</button>

                            <button type="submit" name="submit" class="btn btn-primary">Posto</span>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>







                </form>












































            <?php }
        } ?>

                </div>
              </div>




              <!--Footer -->
              <?php include('includes/footer.php'); ?>
              <!-- /Footer-->



              <!--Login-Form -->
              <?php include('includes/login.php'); ?>
              <!--/Login-Form -->

              <!--Register-Form -->
              <?php include('includes/registration.php'); ?>

              <!--/Register-Form -->

              <!--Forgot-password-Form -->
              <?php include('includes/forgotpassword.php'); ?>
              <!--/Forgot-password-Form -->

              <!-- MDB -->
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



  </body>

  </html>
<?php } ?>