<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	// Code for change password	
	if (isset($_POST['submit'])) {
		$address = $_POST['address'];
		$email = $_POST['email'];
		$contactno = $_POST['contactno'];
		$sql = "update tblcontactusinfo set Address=:address,EmailId=:email,ContactNo=:contactno";
		$query = $dbh->prepare($sql);
		$query->bindParam(':address', $address, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
		$query->execute();
		$msg = "Info Updateed successfully";
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
						Përditësoni informacionin e kontaktit
					</h2>
					<hr>
					<?php if ($error) { ?><div class="errorWrap">
							<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
						</div><?php } else if ($msg) { ?><div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

						</div><?php } ?>
					<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">


						<?php if ($error) { ?><div class="errorWrap">
								<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
							</div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
						<?php $sql = "SELECT * from  tblcontactusinfo ";
						$query = $dbh->prepare($sql);
						$query->execute();
						$results = $query->fetchAll(PDO::FETCH_OBJ);
						$cnt = 1;
						if ($query->rowCount() > 0) {
							foreach ($results as $result) {				?>

								<div class="form-group">
									<label class="col-sm-4 control-label"> Address</label>
									<div class="col-sm-8">
										<textarea class="form-control" name="address" id="address" required><?php echo htmlentities($result->Address); ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label"> Email id</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" name="email" id="email" value="<?php echo htmlentities($result->EmailId); ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label"> Contact Number </label>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo htmlentities($result->ContactNo); ?>" name="contactno" id="contactno" required>
									</div>
								</div>
						<?php }
						} ?>
						<br>
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-4">

								<button class="btn btn-primary" name="submit" type="submit">Update</button>
							</div>
						</div>

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