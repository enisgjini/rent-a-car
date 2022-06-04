<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
  $fromdate = $_POST['fromdate'];
  $todate = $_POST['todate'];
  $message = $_POST['message'];
  $useremail = $_SESSION['login'];
  $status = 0;
  $vhid = $_GET['vhid'];
  $bookingno = mt_rand(100000000, 999999999);
  $ret = "SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
  $query1 = $dbh->prepare($ret);
  $query1->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query1->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
  $query1->bindParam(':todate', $todate, PDO::PARAM_STR);
  $query1->execute();
  $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

  if ($query1->rowCount() == 0) {

    $sql = "INSERT INTO  tblbooking(BookingNumber,userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:bookingno,:useremail,:vhid,:fromdate,:todate,:message,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingno', $bookingno, PDO::PARAM_STR);
    $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
    $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
    $query->bindParam(':todate', $todate, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      echo "<script>alert('Booking successfull.');</script>";
      echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
      echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
    }
  } else {
    echo "<script>alert('Car already booked for these days');</script>";
    echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
  }
}

?>


<!DOCTYPE HTML>
<html lang="en">

<head>

  <title>Car Rental | Vehicle Details</title>
  <!--Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

 
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <link rel="stylesheet" href="assets/css/style.css">

<body class="bg-light">


  <!--Header-->
  <?php include('includes/header.php'); ?>
  <!-- /Header -->

  <!--Listing-Image-Slider-->

  <?php
  $vhid = intval($_GET['vhid']);
  $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['brndid'] = $result->bid;
  ?>














      <!--Listing-detail-->
      <section lass="mt-5">
        <div class="container">
          <div class="row mt-5">
            <div class="col-9 border-end">
              <h2 class="text-dark border-bottom"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></h2>
              <!-- Carousel wrapper -->
              <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                <!-- Slides -->
                <div class="carousel-inner mt-5">
                  <div class="carousel-item active">
                    <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="d-block" alt="..." style="width:100%;height:450px;object-fit:cover">
                  </div>
                  <div class="carousel-item">
                    <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" class="d-block" alt="..." style="width:100%;height:450px;object-fit:cover">
                  </div>
                  <div class="carousel-item">
                    <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" class="d-block" alt="..." style="width:100%;height:450px;object-fit:cover">
                  </div>
                  <div class="carousel-item">
                    <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="d-block" alt="..." style="width:100%;height:450px;object-fit:cover">
                  </div>
                </div>
                <!-- Slides -->

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
                <!-- Controls -->

                <!-- Thumbnails -->
                <div class="carousel-indicators mt-5">
                  <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="width: 100px;">
                    <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-fluid" />
                  </button>
                  <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="1" aria-label="Slide 2" style="width: 100px;">
                    <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" class="img-fluid" />
                  </button>
                  <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="2" aria-label="Slide 3" style="width: 100px;">
                    <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" class="img-fluid" />
                  </button>
                  <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="3" aria-label="Slide 4" style="width: 100px;">
                    <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="img-fluid" />
                  </button>
                </div>
                <!-- Thumbnails -->
              </div>
              <!-- Carousel wrapper -->



              <div class="row">
                <div class="mt-5">

                  <!-- Tabs navs -->
                  <ul class="nav nav-pills mb-3" id="ex-with-icons" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#vehicle-overview" role="tab" aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-info-circle"></i> Përshkrimi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#accessories" role="tab" aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-cogs"></i> Paisjet aktive</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#lokacioni" role="tab" aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="bi bi-geo-alt-fill"></i> Lokacioni</a>
                    </li>

                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">

                    <!-- Vehicles Overview -->
                    <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                      <p><?php echo htmlentities($result->VehiclesOverview); ?></p>
                    </div>

                    <!-- Accessories -->
                    <div role="tabpanel" class="tab-pane" id="accessories">
                      <div class="row">
                        <div class="col-4 mt-2 border-end">
                          <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Kondicioner</td>
                                <?php if ($result->AirConditioner == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Sistemi i frenimit Antilock</td>
                                <?php if ($result->AntiLockBrakingSystem == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>

                              </tr>
                              <tr>
                                <td>Power Steering</td>
                                <?php if ($result->PowerSteering == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Power Windows</td>
                                <?php if ($result->PowerWindows == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Airbag</td>
                                <?php if ($result->DriverAirbag == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="col-4 mt-2 border-end">
                          <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                              <tr>
                                <td>CD luajtës</td>
                                <?php if ($result->CDPlayer == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Ulëse lëkure</td>
                                <?php if ($result->LeatherSeats == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Central Locking</td>
                                <?php if ($result->CentralLocking == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>

                              </tr>
                              <tr>

                                <td>Power Door Locks</td>
                                <?php if ($result->PowerDoorLocks == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>

                              </tr>
                              <tr>
                                <td>Passenger Airbag</td>
                                <?php if ($result->PassengerAirbag == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="col-4 mt-2">
                          <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Brake Assist</td>
                                <?php if ($result->BrakeAssist == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php  } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Central Locking</td>
                                <?php if ($result->CentralLocking == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>

                              </tr>
                              <tr>
                                <td>Power Door Locks</td>
                                <?php if ($result->PowerDoorLocks == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Brake Assist</td>
                                <?php if ($result->BrakeAssist == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php  } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                              <tr>
                                <td>Crash Sensor</td>
                                <?php if ($result->CrashSensor == 1) {
                                ?>
                                  <td><i class="bi bi-shield-check"></i></td>
                                <?php } else { ?>
                                  <td><i class="bi bi-x-circle"></i></i></td>
                                <?php } ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      </tbody>
                      </table>
                    </div>

                    <!-- Lokacioni -->
                    <div role="tabpanel" class="tab-pane" id="lokacioni">
                      <div class="embed-responsive embed-responsive-16by9 hoverable">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2949.895621557953!2d20.80404565751256!3d42.323424991505625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1353991d1c02f7ad%3A0xc6f5f3024104cd9f!2sVlora%20Gjini%20B.I!5e0!3m2!1sen!2s!4v1653140668331!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
          <?php }
      } ?>

            </div>
            <div class="col-3">
              <div class="card border shadow-4" style="max-width: 18rem;">
                <div class="card-body">
                  <h4>Çmimi</h4>
                  <hr>
                  <p><?php echo htmlentities($result->PricePerDay); ?> € - Dita</p>
                </div>
              </div>

              <div class="card border shadow-4 mt-3" style="max-width: 18rem;">
                <table class="table">
                  <tbody>
                    <tr>
                      <td><i class="fa-solid fa-calendar"></i> Viti</td>
                      <td><?php echo htmlentities($result->ModelYear); ?></td>
                    </tr>
                    <tr>
                      <td><i class="fa-solid fa-oil-can"></i> Lloji i karburantit</td>
                      <td><?php echo htmlentities($result->FuelType); ?></td>
                    </tr>
                    <tr>
                      <td><i class="fa-solid fa-user-plus"></i> Ulëset</td>
                      <td><?php echo htmlentities($result->SeatingCapacity); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="card border shadow-4 mt-3 p-3" style="max-width: 18rem;">
                <table class="table">
                  <tbody>

                    <form method="post">
                      <div class="form-group">
                        <label>Nga data:</label>
                        <input type="date" class="form-control" name="fromdate" placeholder="Nga data" required>
                      </div>
                      <br>
                      <div class="form-group">
                        <label>Deri më:</label>
                        <input type="date" class="form-control" name="todate" placeholder="Deri më" required>
                      </div>
                      <br>
                      <div class="form-group">
                        <label>Mesazhi juaj per ne:</label>
                        <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                      </div>
                      <br>
                      <?php if ($_SESSION['login']) { ?>
                        <div class="form-group">
                          <input type="submit" class="btn" name="submit" value="Book Now">
                        </div>
                      <?php } else { ?>
                        <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

                      <?php } ?>
                    </form>







                    <hr>





                    <tr>
                      <td>
                        <p>Share: </p>
                      </td>
                      <td>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-google-plus"></i></a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>








          </div>
        </div>
      </section>













      <div class="container">
        

        <!--Similar-Cars-->

        <div class="container owl-2-style">
          <h4>Makina të ngjashme</h4>
          <hr>
          <div class="row">
            <?php
            $bid = $_SESSION['brndid'];
            $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:bid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':bid', $bid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) { ?>
                <div class="col-4">
                  <div class="card shadow-5">
                    <div class="bg-image hover-overlay ripple " data-mdb-ripple-color="light">
                      <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" alt="Image" style="width:100%;height:250px;object-fit:cover;"></a>
                      <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </a>
                    </div>
                    <div class="card-body">
                      <h6 class="card-title"><a class="text-dark" href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                      <hr>
                      <table class="table">
                        <tbody>
                          <tr>
                            <td><i class="fa-solid fa-calendar"></i> Viti</td>
                            <td><?php echo htmlentities($result->ModelYear); ?></td>
                          </tr>
                          <tr>
                            <td><i class="fa-solid fa-oil-can"></i> Lloji i karburantit</td>
                            <td><?php echo htmlentities($result->FuelType); ?></td>
                          </tr>
                          <tr>
                            <td><i class="fa-solid fa-user-plus"></i> Ulëset</td>
                            <td><?php echo htmlentities($result->SeatingCapacity); ?></td>
                          </tr>
                          <tr>
                            <td><i class="fa-solid fa-hand-holding-dollar"></i> Qmimi ditor</td>
                            <td><?php echo htmlentities($result->PricePerDay); ?><i class="bi bi-currency-euro"></i></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            <?php }
            } ?>

          </div>
        </div>
        <!--/Similar-Cars-->


      </div>
      </section>

































      <!--/Listing-detail-->

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

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <!-- MDB -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>



</body>

</html>