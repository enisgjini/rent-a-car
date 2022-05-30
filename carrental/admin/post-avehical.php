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
		$vimage1 = $_FILES["img1"]["name"];
		$vimage2 = $_FILES["img2"]["name"];
		$vimage3 = $_FILES["img3"]["name"];
		$vimage4 = $_FILES["img4"]["name"];
		$vimage5 = $_FILES["img5"]["name"];
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
		move_uploaded_file($_FILES["img1"]["tmp_name"], "img/vehicleimages/" . $_FILES["img1"]["name"]);
		move_uploaded_file($_FILES["img2"]["tmp_name"], "img/vehicleimages/" . $_FILES["img2"]["name"]);
		move_uploaded_file($_FILES["img3"]["tmp_name"], "img/vehicleimages/" . $_FILES["img3"]["name"]);
		move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
		move_uploaded_file($_FILES["img5"]["tmp_name"], "img/vehicleimages/" . $_FILES["img5"]["name"]);

		$sql = "INSERT INTO tblvehicles(VehiclesTitle,VehiclesBrand,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats) VALUES(:vehicletitle,:brand,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:airconditioner,:powerdoorlocks,:antilockbrakingsys,:brakeassist,:powersteering,:driverairbag,:passengerairbag,:powerwindow,:cdplayer,:centrallocking,:crashcensor,:leatherseats)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
		$query->bindParam(':brand', $brand, PDO::PARAM_STR);
		$query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
		$query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
		$query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
		$query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
		$query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
		$query->bindParam(':vimage1', $vimage1, PDO::PARAM_STR);
		$query->bindParam(':vimage2', $vimage2, PDO::PARAM_STR);
		$query->bindParam(':vimage3', $vimage3, PDO::PARAM_STR);
		$query->bindParam(':vimage4', $vimage4, PDO::PARAM_STR);
		$query->bindParam(':vimage5', $vimage5, PDO::PARAM_STR);
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
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Vehicle posted successfully";
		} else {
			$error = "Something went wrong. Please try again";
		}
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

				<!-- Kolona - Post a vehcile -->
				<div class="col-md-10">
					<h2>
						Aksesorë
					</h2>
					<hr>

					<form method="post" class="form-horizontal" enctype="multipart/form-data">

						<div class="row">
							<div class="col-4">
								<div class="form-floating mb-3">

									<input type="text" class="form-control" id="emriAutomjetit" name="vehicletitle" placeholder="Emri i automjetit" required>
									<label for="emriAutomjetit">Emri i automjetit</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-floating mb-3">
									<select class="form-select" name="brandname" required>
										<option> Zgjedh </option>
										<?php $ret = "select id,BrandName from tblbrands";
										$query = $dbh->prepare($ret);
										//$query->bindParam(':id',$id, PDO::PARAM_STR);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										if ($query->rowCount() > 0) {
											foreach ($results as $result) {
										?>
												<option value="<?php echo htmlentities($result->id); ?>">
													<?php echo htmlentities($result->BrandName); ?></option>
										<?php }
										} ?>

									</select>
									<label for="floatingInput">Zgjidhni markën</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-floating mb-3">
									<textarea class="form-control" placeholder="Leave a comment here" id="vpa" name="vehicalorcview" rows="100" required></textarea>
									<label for="vpa">Vështrim i përgjithshëm i automjetit</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-4">
								<div class="form-floating mb-3">

									<input type="text" class="form-control" id="emriAutomjetit" name="priceperday" placeholder="Emri i automjetit" required>
									<label for="emriAutomjetit">Çmimi në ditë (në USD)</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-floating mb-3">
									<select class="form-select" name="fueltype" required>
										<option> Zgjedh </option>
										<option value="Petrol">Petrol</option>
										<option value="Diesel">Diesel</option>
										<option value="CNG">CNG</option>
									</select>
									<label for="emriAutomjetit">Zgjidhni llojin e karburantit</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="vitiModel" name="modelyear" placeholder="Vit model" required>
									<label for="vitiModel">Viti i modelit</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-4">
								<div class="form-floating mb-3">

									<input type="text" class="form-control" id="seatingcapacity1" name="seatingcapacity" placeholder="Emri i automjetit" required>
									<label for="seatingcapacity1">Kapacitet ulëse</label>
								</div>
							</div>

						</div>
						<hr>

						<!-- Imazhet -->
						<div class="row">
							<div class="col-3">
								<div class="mb-3">
									<!-- <span style="color:red">*</span><input type="file" name="img1" required> -->
									<label for="seatingcapacity1" class="form-label">Imazhi 1</label>
									<input type="file" class="form-control" id="img1" name="img1" placeholder="Emri i automjetit" required>

								</div>
							</div>
							<div class="col-3">
								<div class="mb-3">
									<!-- <span style="color:red">*</span><input type="file" name="img1" required> -->
									<label for="seatingcapacity1" class="form-label">Imazhi 2</label>
									<input type="file" class="form-control" id="img2" name="img2" placeholder="Emri i automjetit" required>

								</div>
							</div>
							<div class="col-3">
								<div class="mb-3">
									<!-- <span style="color:red">*</span><input type="file" name="img1" required> -->
									<label for="seatingcapacity1" class="form-label">Imazhi 3</label>
									<input type="file" class="form-control" id="img3" name="img3" placeholder="Emri i automjetit" required>

								</div>
							</div>
							<div class="col-3">
								<div class="mb-3">
									<!-- <span style="color:red">*</span><input type="file" name="img1" required> -->
									<label for="seatingcapacity1" class="form-label">Imazhi 4</label>
									<input type="file" class="form-control" id="img4" name="img4" placeholder="Emri i automjetit" required>

								</div>
							</div>
							<div class="col-3">
								<div class="mb-3">
									<!-- <span style="color:red">*</span><input type="file" name="img1" required> -->
									<label for="seatingcapacity1" class="form-label">Imazhi 5</label>
									<input type="file" class="form-control" id="img5" name="img5" placeholder="Emri i automjetit" required>

								</div>
							</div>

						</div>

						<hr>

						<div class="row">
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="airconditioner" name="airconditioner" value="1">
									<label class="form-check-label" for="airconditioner">
										Kondicioner
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
									<label class="form-check-label" for="airconditioner">
										Bllokime elektrike te dyerve
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="airconditioner" name="airconditioner" value="1">
									<label class="form-check-label" for="airconditioner">
										Sistemi kundër bllokimit të frenimit
									</label>
								</div>
							</div>

						</div>


						<div class="row">
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="brakeassist" name="brakeassist" value="1">
									<label class="form-check-label" for="airconditioner">
										Asistent për frenim
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
									<label class="form-check-label" for="airconditioner">
										Drejtues me energji elektrike
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="driverairbag" name="driverairbag" value="1">
									<label class="form-check-label" for="airconditioner">
										Airbag të shoferit
									</label>
								</div>
							</div>

						</div>


						<div class="row">
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
									<label class="form-check-label" for="airconditioner">
										Airbag i pasagjerit
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="powerwindow" name="powerwindow" value="1">
									<label class="form-check-label" for="airconditioner">
										Dritaret me energji elektrike
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer" value="1">
									<label class="form-check-label" for="airconditioner">
										CD Player
									</label>

								</div>
							</div>

						</div>


						<div class="row">
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="centrallocking" name="centrallocking" value="1">
									<label class="form-check-label" for="airconditioner">
										Mbyllje qendrore
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="crashcensor" name="crashcensor" value="1">
									<label class="form-check-label" for="airconditioner">
										Sensori i përplasjes
									</label>
								</div>
							</div>
							<div class="col-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="leatherseats" name="leatherseats" value="1">
									<label class="form-check-label" for="airconditioner">
										Karrige lëkure
									</label>

								</div>
							</div>
						</div>
						<hr>
						<button class="btn btn-default" type="reset">Anuloj</button>
						<button class="btn btn-primary" name="submit" type="submit">Ruaj
							ndryshime</button>
					</form>
				</div>
			</div>
		</div>





		<!-- Bootstrap Bundle JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
		</script>

		<!-- MDB -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

		<script>
			if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}
		</script>
		<script>
			$(document).ready(function() {
				$('#example').DataTable();
			});
		</script>

		<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>