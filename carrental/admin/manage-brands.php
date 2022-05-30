<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$sql = "delete from tblbrands  WHERE id=:id";
		$query = $dbh->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_STR);
		$query->execute();
		$msg = "Page data updated  successfully";
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

		<title>Car Rental Portal |Admin Manage Brands </title>

		<!-- Font awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Sandstone Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.12.1/jquery.dataTables.min.js" integrity="sha512-MOsicOaJyNWPgwMOE1q4sTPZK6KuUQTMBhkmzb0tFVSRxgx3VnGTwIyRme/IhBJQdWJkfTcIKozchO11ILrmSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<!-- Bootstrap social button library -->
		<!-- <link rel="stylesheet" href="css/bootstrap-social.css"> -->
		<!-- Bootstrap select -->
		<!-- <link rel="stylesheet" href="css/bootstrap-select.css"> -->
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

		<div class="ts-main-content">
			<?php include('includes/leftbar.php'); ?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Manage Brands</h2>

							<!-- Zero Configuration Table -->
							<div class="panel panel-default">
								
								<div class="panel-body border p-3">
									<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
									<table id="zctb" class="display" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Brand Name</th>
												<th>Creation Date</th>
												<th>Updation date</th>

												<th>Action</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>#</th>
												<th>Brand Name</th>
												<th>Creation Date</th>
												<th>Updation date</th>

												<th>Action</th>
											</tr>
											</tr>
										</tfoot>
										<tbody>

											<?php $sql = "SELECT * from  tblbrands ";
											$query = $dbh->prepare($sql);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$cnt = 1;
											if ($query->rowCount() > 0) {
												foreach ($results as $result) {				?>
													<tr>
														<td><?php echo htmlentities($cnt); ?></td>
														<td><?php echo htmlentities($result->BrandName); ?></td>
														<td><?php echo htmlentities($result->CreationDate); ?></td>
														<td><?php echo htmlentities($result->UpdationDate); ?></td>
														<td><a href="edit-brand.php?id=<?php echo $result->id; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
															<a href="manage-brands.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>
														</td>
													</tr>
											<?php $cnt = $cnt + 1;
												}
											} ?>

										</tbody>
										<tfoot></tfoot>
									</table>



								</div>
							</div>



						</div>
					</div>

				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('#example').DataTable();
			});
		</script>

		<!-- Loading Scripts -->
		<!-- <script src="js/jquery.min.js"></script> -->
		<!-- <script src="js/bootstrap-select.min.js"></script> -->
		<!-- <script src="js/bootstrap.min.js"></script> -->
		<!-- <script src="js/jquery.dataTables.min.js"></script> -->
<!-- 		
		<script src="js/dataTables.bootstrap.min.js"></script> -->
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>



	</body>

	</html>
<?php } ?>