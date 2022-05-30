<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <title> Car Rental | Contact Us Page</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!--Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

  <style>
    .centered {

      position: absolute;

      top: 50%;

      left: 50%;

      color: white;

      font-size: 30px;

      transform: translate(-50%, -50%);

    }
  </style>
</head>

<body class="bg-light">
  <!-- Header -->
  <?php include('includes/header.php'); ?>

  <!--Page Header-->
  <section>
    <div class="container-fluid  mb-n5" style="background: rgba(0, 0, 0, 0.8); ">
      <img src="https://i.ibb.co/n6VQgjL/Header-Pic-Mask.png" alt="Snow" style="width:100%;opacity: 0.1;height:450px;object-fit:cover;">
      <div class="centered">
        <h1>Listimi i makinave</h1>
      </div>
    </div>
  </section>


  <div class="container bg-light rounded-5 border p-5 shadow mt-n5">
    <div class="row">
      <div class="col-3 border-end">
        <div class="card text-bg-light mb-3" style="max-width: 18rem;">
          <div class="card-header">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Filtro</h5>
          </div>
          <div class="card-body">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <select class="form-select" name="brand">
                  <option>Zgjidhni markën</option>

                  <?php $sql = "SELECT * from  tblbrands ";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) {       ?>
                      <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?></option>
                  <?php }
                  } ?>

                </select>
              </div>
              <div>
                <select class="form-select mt-1" name="fueltype">
                  <option>Zgjidhni llojin e karburantit</option>
                  <option value="Petrol">Benzinë</option>
                  <option value="Diesel">Naftë</option>
                  <option value="CNG">CNG</option>
                </select>
              </div>

              <div class="form-group mt-1">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Kërko</button>
              </div>
            </form>
          </div>
        </div>




        <div class="sidebar_filter">

        </div>
      </div>
      <div class="col-9">
        <!--Listing-->
        <section>
          <div class="container">
            <?php
            //Query for Listing count
            $sql = "SELECT id from tblvehicles";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = $query->rowCount();
            ?>
            <h4><?php echo htmlentities($cnt); ?> Listings</h4>
            <hr>
            <div class="row">
              <?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              $cnt = 1;
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {  ?>
                  <div class="col-sm-4 mt-2">
                    <div class="card" style="width: 18rem;">
                      <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="card-img-top" src="..." style="width:100%;height:250px;object-fit:scale-down" alt="Card image cap"></a>
                      <div class="card-body">
                        <h6 class="card-title"><a class="text-decoration-none" href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                        <hr>
                        <p class="card-text"><i class="fa fa-car" aria-hidden="true"></i> <?php echo htmlentities($result->FuelType); ?></p>
                        <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo htmlentities($result->ModelYear); ?> model</p>
                        <p class="card-text"><i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlentities($result->SeatingCapacity); ?> ulëse</p>
                      </div>
                    </div>
                  </div>
                  <br>
              <?php }
              } ?>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>




  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!--Login-Form -->
  <?php include('includes/login.php'); ?>
  <!--Register-Form -->
  <?php include('includes/registration.php'); ?>
  <!--Forgot-password-Form -->
  <?php include('includes/forgotpassword.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>