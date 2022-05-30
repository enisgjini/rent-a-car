<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        $vehicletitle = $_POST['vehicletitle'];
        $brand = $_POST['brandname'];
        $vehicleoverview = $_POST['vehicalorcview'];
        $priceperday = $_POST['priceperday'];
        $fueltype = $_POST['fueltype'];
        $modelyear = $_POST['modelyear'];
        $seatingcapacity = $_POST['seatingcapacity'];
        $airconditioner = $_POST['airconditioner'];
        $powerdoorlocks = $_POST['powerdoorlocks'];
        $antilockbrakingsys = $_POST['antilockbrakingsys'];
        $brakeassist = $_POST['brakeassist'];
        $powersteering = $_POST['powersteering'];
        $driverairbag = $_POST['driverairbag'];
        $passengerairbag = $_POST['passengerairbag'];
        $powerwindow = $_POST['powerwindow'];
        $cdplayer = $_POST['cdplayer'];
        $centrallocking = $_POST['centrallocking'];
        $crashcensor = $_POST['crashcensor'];
        $leatherseats = $_POST['leatherseats'];
        $id = intval($_GET['id']);

        $sql = "update tblvehicles set VehiclesTitle=:vehicletitle,VehiclesBrand=:brand,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats where id=:id ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
        $query->bindParam(':brand', $brand, PDO::PARAM_STR);
        $query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
        $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
        $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
        $query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
        $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
        $query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
        $query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
        $query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
        $query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
        $query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
        $query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
        $query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
        $query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
        $query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
        $query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
        $query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
        $query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Data updated successfully";
    }


?>
    <!doctype html>
    <html lang="en" class="no-js">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="theme-color" content="#3e454c">

        <title>Car Rental Portal | Admin Dashboard</title>

        <!-- Font awesome - Version 6.1.1 -->
        <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS - Version (5.2.0 - Beta) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.12.1/jquery.dataTables.min.js" integrity="sha512-MOsicOaJyNWPgwMOE1q4sTPZK6KuUQTMBhkmzb0tFVSRxgx3VnGTwIyRme/IhBJQdWJkfTcIKozchO11ILrmSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />

        <!-- BOX ICONS CSS-->
        <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />

        <!-- Bootstrap Datatables -->
        <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
        <!-- Bootstrap social button library -->
        <link rel="stylesheet" href="css/bootstrap-social.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="css/bootstrap-select.css">
        <!-- Bootstrap file input -->
        <link rel="stylesheet" href="css/fileinput.min.css">
        <!-- Awesome Bootstrap checkbox -->
        <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
        <!-- Admin Stye -->
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php include('includes/header.php'); ?>

        <div class="container-fluid mt-3 p-5">
            <div class="row">
                <!-- Kolona Sidebar -->
                <div class="col-md-2 col-lg-2 border-end">
                    <?php include('includes/leftbar.php'); ?>
                </div>

                <div class="col-md-10">
                    <h2>
                        Përditso automjetin
                    </h2>
                    <hr>




                    <?php if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong> :
                            <?php echo htmlentities($msg); ?> </div><?php } ?>
                    <?php
                    $id = intval($_GET['id']);
                    $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {    ?>

                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="emriautomjetit" name="vehicletitle" placeholder="Emri i automjetit" value="<?php echo htmlentities($result->VehiclesTitle) ?>" required>
                                            <label for="emriautomjetit">Emri i automjetit</label>
                                        </div>
                                    </div>

                                    <div class="col-4">


                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="brandname" required>
                                                <option value="<?php echo htmlentities($result->bid); ?>">
                                                    <?php echo htmlentities($bdname = $result->BrandName); ?>
                                                </option>
                                                <?php $ret = "select id,BrandName from tblbrands";
                                                $query = $dbh->prepare($ret);
                                                //$query->bindParam(':id',$id, PDO::PARAM_STR);
                                                $query->execute();
                                                $resultss = $query->fetchAll(PDO::FETCH_OBJ);
                                                if ($query->rowCount() > 0) {
                                                    foreach ($resultss as $results) {
                                                        if ($results->BrandName == $bdname) {
                                                            continue;
                                                        } else {
                                                ?>
                                                            <option value="<?php echo htmlentities($results->id); ?>">
                                                                <?php echo htmlentities($results->BrandName); ?></option>
                                                <?php }
                                                    }
                                                } ?>

                                            </select>
                                            <label for="brandname">Zgjidhni markën</label>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="emriautomjetit" name="vehicletitle" placeholder="Emri i automjetit" value="<?php echo htmlentities($result->VehiclesTitle) ?>" required>
                                            <label for="emriautomjetit">Emri i automjetit</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div>

                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Përmbledhje e automjeteve" name="vehicalorcview" id="floatingTextarea2" style="height: 100px"><?php echo htmlentities($result->VehiclesOverview); ?></textarea>
                                            <label for="floatingTextarea2">Përmbledhje e automjeteve</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>


                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="emriautomjetit" name="priceperday" placeholder="Emri i automjetit" value="<?php echo htmlentities($result->PricePerDay); ?>" required>
                                            <label for="emriautomjetit">Çmimi në ditë (në USD)</label>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="fueltype" required>
                                                <option value="<?php echo htmlentities($result->FuelType); ?>">
                                                    <?php echo htmlentities($result->FuelType); ?> </option>

                                                <option value="Petrol">Petrol</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="CNG">CNG</option>
                                            </select>
                                            <label for="emriautomjetit">Zgjidhni llojin e karburantit</label>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="emriautomjetit" name="priceperday" placeholder="Emri i automjetit" value="<?php echo htmlentities($result->PricePerDay); ?>" required>
                                            <label for="emriautomjetit">Çmimi në ditë (në USD)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="viti" name="modelyear" placeholder="Emri i automjetit" value="<?php echo htmlentities($result->ModelYear); ?>" required>
                                            <label for="viti">Viti i modelit</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="seatingcapacity" name="seatingcapacity" placeholder="Emri i automjetit" value="<?php echo htmlentities($result->SeatingCapacity); ?>" required>
                                            <label for="seatingcapacity">Kapaciteti i ulësve</label>
                                        </div>
                                    </div>
                                </div>


                                <hr>


                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <h4><b>Vehicle Images</b></h4>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card border">
                                            <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Imazhi 1 ( Imazhi i parë )</h5>

                                                <a class="btn btn-primary mt-2" href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                                    Image 1</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card border">
                                            <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage2); ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Imazhi 2 ( Imazhi i dytë )</h5>
                                                <a class="btn btn-primary mt-2" href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                                    Image 2</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card border">
                                            <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage3); ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Imazhi 3 ( Imazhi i tretë )</h5>
                                                <a class="btn btn-primary mt-2" href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                                    Image 3</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card border">
                                            <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Imazhi 4 ( Imazhi i katërt )</h5>

                                                <a class="btn btn-primary mt-2" href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                                    Image 1</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card border">
                                            <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage5); ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Imazhi 5 ( Imazhi i pestë )</h5>
                                                <a class="btn btn-primary mt-2" href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Change
                                                    Image 2</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <!-- Kondicioner -->
                                    <div class="col-4">
                                        <?php if ($result->AirConditioner == 1) { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="kondicioner" name="airconditioner" checked value="1" class="form-check-input">
                                                <label for="kondicioner">Kondicioner </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="kondicioner1" name="airconditioner" value="1" class="form-check-input">
                                                <label for="kondicioner1"> Kondicioner </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!--  Bllokime elektrike te dyerve -->
                                    <div class="col-4 border-start border-end">
                                        <?php if ($result->PowerDoorLocks == 1) { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" checked value="1" class="form-check-input">
                                                <label for="powerdoorlocks">Bllokime elektrike te dyerve </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="powerdoorlocks1" name="powerdoorlocks" value="1" class="form-check-input">
                                                <label for="powerdoorlocks1"> Bllokime elektrike te dyerve </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!--  Sistemi kundër bllokimit të frenimit -->
                                    <div class="col-4">
                                        <?php if ($result->AntiLockBrakingSystem == 1) { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="antilockbrakingsys" checked value="1" class="form-check-input">
                                                <label for="flexCheckDefault">Sistemi kundër bllokimit të frenimit </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="antilockbrakingsys" value="1" class="form-check-input">
                                                <label for="flexCheckDefault"> Sistemi kundër bllokimit të frenimit </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Asistent për frenim -->
                                    <div class="col-4">
                                        <?php if ($result->BrakeAssist == 1) { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="brakeassist" checked value="1" class="form-check-input">
                                                <label for="flexCheckDefault">Asistent për frenim </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="brakeassist" value="1" class="form-check-input">
                                                <label for="flexCheckDefault"> Asistent për frenim </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!--  Drejtues me energji elektrike -->
                                    <div class="col-4 border-start border-end">
                                        <?php if ($result->PowerSteering == 1) { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="powersteering" checked value="1" class="form-check-input">
                                                <label for="flexCheckDefault">Drejtues me energji elektrike </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="powersteering" value="1" class="form-check-input">
                                                <label for="flexCheckDefault"> Drejtues me energji elektrike </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!--  Sistemi kundër bllokimit të frenimit -->
                                    <div class="col-4">
                                        <?php if ($result->DriverAirbag == 1) { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="passengerairbag" checked value="1" class="form-check-input">
                                                <label for="flexCheckDefault">Airbag të shoferit </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="flexCheckDefault" name="passengerairbag" value="1" class="form-check-input">
                                                <label for="flexCheckDefault"> Airbag të shoferit </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <?php if ($result->DriverAirbag == 1) {
                                        ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="driverairbag" checked value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Airbag i pasagjerit </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="driverairbag" value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Airbag i pasagjerit </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-4 border-start border-end ">
                                        <?php if ($result->PowerWindows == 1) {
                                        ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="powerwindow" checked value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Dritaret me energji elektrike </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="powerwindow" value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Dritaret me energji elektrike </label>
                                            </div>
                                        <?php } ?>
                                    </div>



                                    <div class="col-4">
                                        <?php if ($result->CDPlayer == 1) {
                                        ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="cdplayer" checked value="1" class="form-check-input">
                                                <label for="inlineCheckbox1"> CD Player </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="cdplayer" value="1" class="form-check-input">
                                                <label for="inlineCheckbox1"> CD Player </label>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <?php if ($result->CentralLocking == 1) {
                                        ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="centrallocking" checked value="1" class="form-check-input">
                                                <label for="inlineCheckbox2">Mbyllje qendrore</label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox1" name="centrallocking" value="1" class="form-check-input">
                                                <label for="inlineCheckbox2">Mbyllje qendrore</label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-4">
                                        <?php if ($result->CrashSensor == 1) {
                                        ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="crashcensor" checked value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Sensori i përplasjes </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="crashcensor" value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Sensori i përplasjes </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-4">
                                        <?php if ($result->LeatherSeats == 1) {
                                        ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="leatherseats" checked value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Sedilje prej lëkure </label>
                                            </div>
                                        <?php } else { ?>
                                            <div class="form-check">
                                                <input type="checkbox" id="inlineCheckbox1" name="leatherseats" value="1" class="form-check-input">
                                                <label for="inlineCheckbox3"> Sedilje prej lëkure </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <button class="btn btn-primary" name="submit" type="submit">Ruaj
                                            ndryshime</button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>


        </div>





    </body>

    </html>
<?php } ?>
<?php } ?>
<?php } ?>