<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_REQUEST['del'])) {
		$delid = intval($_GET['del']);
		$sql = "delete from tblvehicles  WHERE  id=:delid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':delid', $delid, PDO::PARAM_STR);
		$query->execute();
		$msg = " Rekordi i automjetit u fshi me sukses";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net/1.12.1/jquery.dataTables.min.js"
        integrity="sha512-MOsicOaJyNWPgwMOE1q4sTPZK6KuUQTMBhkmzb0tFVSRxgx3VnGTwIyRme/IhBJQdWJkfTcIKozchO11ILrmSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
                    Menaxho automjetet
                </h2>
                <hr>
                <?php if ($error) { ?><div class="errorWrap">
                    <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                </div><?php } else if ($msg) { ?><div class="alert alert-success alert-dismissible fade show"
                    role="alert">
                    <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>

                </div><?php } ?>
                <div class="panel-body border p-3">

                    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Emri i automjetit</th>
                                <th>Marka </th>
                                <th>Çmimi në ditë</th>
                                <th>Lloj karburanti</th>
                                <th>Viti i model</th>
                                <th>Vepro</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								$cnt = 1;
								if ($query->rowCount() > 0) {
									foreach ($results as $result) {				?>
                            <tr>
                                <td><?php echo htmlentities($cnt); ?></td>
                                <td><?php echo htmlentities($result->VehiclesTitle); ?></td>
                                <td><?php echo htmlentities($result->BrandName); ?></td>
                                <td><?php echo htmlentities($result->PricePerDay); ?></td>
                                <td><?php echo htmlentities($result->FuelType); ?></td>
                                <td><?php echo htmlentities($result->ModelYear); ?></td>
                                <td><a class="btn btn-primary" href="edit-vehicle.php?id=<?php echo $result->id; ?>"><i
                                            class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                    <a class="btn btn-danger" href="manage-vehicles.php?del=<?php echo $result->id; ?>"
                                        onclick="return confirm('Do you want to delete');"><i
                                            class="fa fa-close"></i></a>
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
    </div>



































    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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