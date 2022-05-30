<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_REQUEST['eid'])) {
		$eid = intval($_GET['eid']);
		$status = "0";
		$sql = "UPDATE tbltestimonial SET status=:status WHERE  id=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Dëshmia me sukses joaktive";
	}


	if (isset($_REQUEST['aeid'])) {
		$aeid = intval($_GET['aeid']);
		$status = 1;

		$sql = "UPDATE tbltestimonial SET status=:status WHERE  id=:aeid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->bindParam(':aeid', $aeid, PDO::PARAM_STR);
		$query->execute();

		$msg = "Dëshmia me sukses aktive";
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
						Menaxho dëshmitë
					</h2>
					<hr>
					<?php if ($error) { ?><div class="errorWrap">
							<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
						</div><?php } else if ($msg) { ?><div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

						</div><?php } ?>
					<div class="panel-body border p-3">

						<table id="zctb" class="table display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Testimonials</th>
									<th>Posting date</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Testimonials</th>
									<th>Posting date</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>

								<?php $sql = "SELECT tblusers.FullName,tbltestimonial.UserEmail,tbltestimonial.Testimonial,tbltestimonial.PostingDate,tbltestimonial.status,tbltestimonial.id from tbltestimonial join tblusers on tblusers.Emailid=tbltestimonial.UserEmail";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $result) {				?>
										<tr>
											<td><?php echo htmlentities($cnt); ?></td>
											<td><?php echo htmlentities($result->FullName); ?></td>
											<td><?php echo htmlentities($result->UserEmail); ?></td>
											<td><?php echo htmlentities($result->Testimonial); ?></td>
											<td><?php echo htmlentities($result->PostingDate); ?></td>
											<td><?php if ($result->status == "" || $result->status == 0) {
												?><a class="btn btn-danger" href="testimonials.php?aeid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('A doni vërtet të aktivizoni')"> Joaktiv</a>
												<?php } else { ?>

													<a class="btn btn-primary" href="testimonials.php?eid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('A doni vërtet të mosveproni')"> Aktiv</a>
											</td>
										<?php } ?></td>
										</tr>
								<?php $cnt = $cnt + 1;
									}
								} ?>
							</tbody>
						</table>
					</div>
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