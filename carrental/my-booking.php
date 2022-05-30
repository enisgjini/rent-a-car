<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
  if (isset($_POST['updatepass'])) {
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
  }
?>

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

    <title>Car Rental Portal - My Booking</title>

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

  <body>

    <!--Header-->
    <?php include('includes/header.php'); ?>

    <div class="container mt-3 mb-3">
      <section class="page-header profile_page">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ballina</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-calendar-day"></i> Rezervimet</li>
          </ol>
          
        </nav>
      </section>
    </div>
    <div class="container mt-5">
      <div class="row">

        <div class="col-9">
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
              
              <section>

                <?php
                $useremail = $_SESSION['login'];
                $sql = "SELECT * from tblusers where EmailId=:useremail ";
                $query = $dbh->prepare($sql);
                $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1; ?>

                <?php
                $useremail = $_SESSION['login'];
                $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail order by tblbooking.id desc";
                $query = $dbh->prepare($sql);
                $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                  foreach ($results as $result) {  ?>

                    <div class="container">
                      <div class="row border-bottom mb-2">
                        <div class="col-4 mt-2 ">
                          <div class="card">
                            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-thumbnail" style="width:100%;height:250px;object-fit:cover" alt="Card image cap"></a>
                          </div>
                        </div>
                        <div class="col-8">
                          <table class="table table-bordered">
                            <tr>
                              <th class="table-dark">Emri i makinës</th>
                              <th class="table-dark">Nga data</th>
                              <th class="table-dark">Deri më tani</th>
                              <th class="table-dark">Ditët totale</th>
                              <th class="table-dark">Qira / Dita</th>
                            </tr>
                            <tr>
                              <td>
                                <?php echo htmlentities($result->BrandName); ?> ,
                                <?php echo htmlentities($result->VehiclesTitle); ?>
                              </td>
                              <td>
                                <?php echo htmlentities($result->FromDate); ?>
                              </td>
                              <td>
                                <?php echo htmlentities($result->ToDate); ?>
                              </td>
                              <td>
                                <?php echo htmlentities($tds = $result->totaldays); ?>
                              </td>
                              <td>
                                <?php echo htmlentities($ppd = $result->PricePerDay); ?>
                              </td>
                            </tr>
                            <tr>
                              <td>Totali</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <?php echo htmlentities($tds * $ppd); ?>
                              </td>



                            </tr>
                          </table>
                          <table class="table table-bordered">
                            <tr>
                              <th class="table-dark">Id e rezervimit</th>
                              <th class="table-dark">Mesazhi</th>
                              <th class="table-dark">Statusi</th>

                            </tr>
                            <tr>
                              <td>
                                <p class="card-text">
                                  <?php echo htmlentities($result->BookingNumber); ?>
                                </p>
                              </td>

                              <td>
                                <p class="card-text">
                                  </b>
                                  <?php echo htmlentities($result->message); ?>
                                </p>
                              </td>
                              <td>
                                <?php if ($result->Status == 1) { ?>
                                  <a href="#" class="btn btn-primary">I konfirmuar</a>



                                <?php } else if ($result->Status == 2) { ?>
                                  <a href="#" class="btn btn-primary">I anuluar</a>





                                <?php } else { ?>
                                  <a href="#" class="btn btn-primary">Nuk është konfirmuar akoma</a>

                                <?php } ?>
                              </td>
                            </tr>

                          </table>
                        </div>
                      </div>


                  <?php }
                } ?>

              </section>

              </div>
              <div class="col-3">
                <div class="card text-bg-light mb-3 shadow" style="max-width: 18rem;">
                  <div class="card-header">
                    <h5><i class="fa-solid fa-list-check"></i> Menaxho </h5>
                  </div>
                  <div class="card-body">
                    <a class="btn btn-primary mt-1" href="profile.php"><i class="fa-solid fa-gears"></i> Cilësimet e profilit</a>
                    <!-- Modal #1 - Përditso fjalekalimin -->
                    <a class="btn btn-primary mt-1" data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fa-solid fa-arrows-rotate"></i> Përditësoni fjalëkalimin</a>
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


                    <a class="btn btn-primary mt-1" href="my-booking.php"><i class="fa-solid fa-calendar-day"></i> Rezervimet e mia</a>

                    <!-- Modal #1 - Posto nje deshmi -->
                    <a class="btn btn-primary mt-1" data-mdb-toggle="modal" data-mdb-target="#exampleModal1"><i class="fa-solid fa-comments"></i> Postoni një dëshmi</a>
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

                    <a class="btn btn-primary mt-1 text-uppercase" href="my-testimonials.php"><i class="fa-solid fa-comment-dots"></i> Dëshmitë e mia</a>







                    <br>
                    <a class="btn btn-primary mt-1" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Dilni</a>
                  </div>
                </div>
              </div>
            </div>


        </div>


      </div>
    </div>
    <?php include('includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
  </body>

  </html>
<?php } ?>


<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>