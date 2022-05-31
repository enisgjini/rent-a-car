<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['eid'])) {
		$eid = intval($_GET['eid']);
		$status = "2";
		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Booking Successfully Cancelled";
	}


	if (isset($_REQUEST['aeid'])) {
		$aeid = intval($_GET['aeid']);
		$status = 1;

		$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Booking Successfully Confirmed";
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



		<!-- MDB -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />

		<!-- BOX ICONS CSS-->
		<link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />

		<!-- Bootstrap Datatables -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.12.1/jquery.dataTables.min.js" integrity="sha512-MOsicOaJyNWPgwMOE1q4sTPZK6KuUQTMBhkmzb0tFVSRxgx3VnGTwIyRme/IhBJQdWJkfTcIKozchO11ILrmSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
		<style>
			.errorWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #dd3d36;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}

			.succWrap {
				padding: 10px;
				margin: 0 0 20px 0;
				background: #fff;
				border-left: 4px solid #5cb85c;
				-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
				box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			}
		</style>


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
						Menaxho rezervimet
					</h2>
					<hr>

					<!-- Menaxho rezervimet -->
					<div class="row">
						<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Vehicle</th>
									<th>From Date</th>
									<th>To Date</th>
									<th>Message</th>
									<th>Status</th>
									<th>Posting date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php $sql = "SELECT tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id  ";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $result) {				?>
										<tr>
											<td><?php echo htmlentities($cnt); ?></td>
											<td><?php echo htmlentities($result->FullName); ?></td>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></td>
											<td><?php echo htmlentities($result->FromDate); ?></td>
											<td><?php echo htmlentities($result->ToDate); ?></td>
											<td><?php echo htmlentities($result->message); ?></td>
											<td><?php
												if ($result->Status == 0) {
													echo htmlentities('Nuk konfirmohet akoma');
												} else if ($result->Status == 1) {
													echo htmlentities('I konfirmuar');
												} else {
													echo htmlentities('I anuluar');
												}
												?></td>
											<td><?php echo htmlentities($result->PostingDate); ?></td>
											<td><a class="btn btn-success" href="manage-bookings.php?aeid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Confirm this booking')"><i class="fa-solid fa-check"></i></a> 


												<a class="btn btn-danger" href="manage-bookings.php?eid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Cancel this Booking')"><i class="fa-solid fa-xmark"></i></a>
											</td>

										</tr>
								<?php $cnt = $cnt + 1;
									}
								} ?>

							</tbody>
						</table>
					</div>
					<hr>

					<!-- Rezervimet e aprovuara -->
					<div class="row">
						<h2 class="page-title">Rezervimet e konfirmuara</h2>
						<table id="example" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Booking No.</th>
									<th>Vehicle</th>
									<th>From Date</th>
									<th>To Date</th>
									<th>Status</th>
									<th>Posting date</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>

								<?php

								$status = 1;
								$sql = "SELECT tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id   where tblbooking.Status=:status";
								$query = $dbh->prepare($sql);
								$query->bindParam(':status', $status, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $result) {				?>
										<tr>
											<td><?php echo htmlentities($cnt); ?></td>
											<td><?php echo htmlentities($result->FullName); ?></td>
											<td><?php echo htmlentities($result->BookingNumber); ?></td>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></td>
											<td><?php echo htmlentities($result->FromDate); ?></td>
											<td><?php echo htmlentities($result->ToDate); ?></td>
											<td><?php
												if ($result->Status == 0) {
													echo htmlentities('Not Confirmed yet');
												} else if ($result->Status == 1) {
													echo htmlentities('Confirmed');
												} else {
													echo htmlentities('Cancelled');
												}
												?></td>
											<td><?php echo htmlentities($result->PostingDate); ?></td>
											<td>


												<a class="btn btn-primary" href="bookig-details.php?bid=<?php echo htmlentities($result->id); ?>"><i class="fa-solid fa-eye"></i> Shiko</a>
											</td>

										</tr>
								<?php $cnt = $cnt + 1;
									}
								} ?>

							</tbody>
						</table>

					</div>
					<hr>

					<!-- Rezervimet e anuluara -->
					<div class="row">
						<h2 class="page-title">Rezervimet e anuluara</h2>
						<table id="example2" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Booking No.</th>
									<th>Vehicle</th>
									<th>From Date</th>
									<th>To Date</th>
									<th>Status</th>
									<th>Posting date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								<?php

								$status = 2;
								$sql = "SELECT tblusers.FullName,tblbrands.BrandName,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.PostingDate,tblbooking.id,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail join tblbrands on tblvehicles.VehiclesBrand=tblbrands.id   where tblbooking.Status=:status";
								$query = $dbh->prepare($sql);
								$query->bindParam(':status', $status, PDO::PARAM_STR);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $result) {				?>
										<tr>
											<td><?php echo htmlentities($cnt); ?></td>
											<td><?php echo htmlentities($result->FullName); ?></td>
											<td><?php echo htmlentities($result->BookingNumber); ?></td>
											<td><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></td>
											<td><?php echo htmlentities($result->FromDate); ?></td>
											<td><?php echo htmlentities($result->ToDate); ?></td>
											<td><?php
												if ($result->Status == 0) {
													echo htmlentities('Not Confirmed yet');
												} else if ($result->Status == 1) {
													echo htmlentities('Confirmed');
												} else {
													echo htmlentities('Cancelled');
												}
												?></td>
											<td><?php echo htmlentities($result->PostingDate); ?></td>
											<td>


												<a class="btn btn-primary" href="bookig-details.php?bid=<?php echo htmlentities($result->id); ?>"> <i class="fa-solid fa-eye"></i> Shiko</a>
											</td>

										</tr>
								<?php $cnt = $cnt + 1;
									}
								} ?>

							</tbody>
						</table>

					</div>
				</div>
				
			</div>














			<!-- Bootstrap Bundle JS -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
			</script>

			<!-- MDB -->
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

			<!-- Refresh PHP Problem solve using Javascript -->
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
			<script>
				$(document).ready(function() {
					$('#example2').DataTable();
				});
			</script>

			<script src="js/main.js"></script>
	</body>

	</html>
<?php } ?>