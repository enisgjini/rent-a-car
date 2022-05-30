<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>

  <title>Car Rental | Details</title>
  <!--Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link href="assets/css/slick.css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">



</head>

<body>

  <!--Header-->
  <?php include('includes/header.php'); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col-3 border-end">
        <div class="card border hover-shadow" style="max-width: 18rem;">
          <div class="card-header">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Filtro </h5>
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





      </div>
      <div class="col-9">
        <!--Listing-->

        <div class="container">
          <div class="row">
            <?php
            //Query for Listing count
            $brand = $_POST['brand'];
            $fueltype = $_POST['fueltype'];
            $sql = "SELECT id from tblvehicles where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype";
            $query = $dbh->prepare($sql);
            $query->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = $query->rowCount();
            ?>
            <h4 class="border-bottom mb-5"><?php echo htmlentities($cnt); ?> listim/e</h4>
            
            <?php
            $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.VehiclesBrand=:brand and tblvehicles.FuelType=:fueltype";
            $query = $dbh->prepare($sql);
            $query->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) {  ?>
                <div class="col-4">
                  <div class="card border shadow">
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

      </div>
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

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>


</body>

</html>