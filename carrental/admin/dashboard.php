<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
?>
    <!Doctype html>
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

                <!-- Kolona - Shiriti anësor -->
                <div class="col-md-3 col-lg-2 border-end">
                    <?php include('includes/leftbar.php'); ?>
                </div>


                <!-- Kolona - Paneli -->
                <div class="col-md-9">
                    <section>
                        <h2>Paneli</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <?php
                                $sql = "SELECT id from tblusers ";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $regusers = $query->rowCount();
                                ?><div class="card" style="width: 100%;">

                                    <div class="card-body text-center border">
                                        <h2 class="card-title"><?php echo htmlentities($regusers); ?></h2>
                                        <p class="card-text">Përdorues të regjistruar</p>
                                        <a href="reg-users.php" class="btn btn-primary">Detaje të plota</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <?php
                                $sql1 = "SELECT id from tblvehicles ";
                                $query1 = $dbh->prepare($sql1);;
                                $query1->execute();
                                $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                $totalvehicle = $query1->rowCount();
                                ?>
                                <div class="card" style="width: 100%;">
                                    <div class="card-body text-center border">
                                        <h2 class="card-title"><?php echo htmlentities($totalvehicle); ?></h2>
                                        <p class="card-text">Listimi i makinave</p>
                                        <a href="manage-vehicles.php" class="btn btn-primary">Detaje të
                                            plota</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <?php
                                $sql2 = "SELECT id from tblbooking ";
                                $query2 = $dbh->prepare($sql2);
                                $query2->execute();
                                $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                $bookings = $query2->rowCount();
                                ?>
                                <div class="card" style="width: 100%;">
                                    <div class="card-body text-center border">
                                        <h2 class="card-title"><?php echo htmlentities($bookings); ?></h2>
                                        <p class="card-text">Rezervimet totale</p>
                                        <a href="manage-bookings.php" class="btn btn-primary">Detaje të
                                            plota</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <?php
                                $sql3 = "SELECT id from tblbrands ";
                                $query3 = $dbh->prepare($sql3);
                                $query3->execute();
                                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                $brands = $query3->rowCount();
                                ?>
                                <div class="card" style="width: 100%;">
                                    <div class="card-body text-center border">
                                        <h2 class="card-title"><?php echo htmlentities($brands); ?></h2>
                                        <p class="card-text">Markat e listuara</p>
                                        <a href="brands.php" class="btn btn-primary">Detaje të plota</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <?php
                                                $sql4 = "SELECT id from tblsubscribers ";
                                                $query4 = $dbh->prepare($sql4);
                                                $query4->execute();
                                                $results4 = $query4->fetchAll(PDO::FETCH_OBJ);
                                                $subscribers = $query4->rowCount();
                                                ?>
                                                <div class="card" style="width: 100%;">
                                                    <div class="card-body text-center border">
                                                        <h2 class="card-title"><?php echo htmlentities($subscribers); ?></h2>
                                                        <p class="card-text">Abonentët</p>
                                                        <a href="manage-subscribers.php" class="btn btn-primary">Detaje të
                                                            plota</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <?php
                                                $sql6 = "SELECT id from tblcontactusquery ";
                                                $query6 = $dbh->prepare($sql6);;
                                                $query6->execute();
                                                $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                                                $query = $query6->rowCount();
                                                ?>
                                                <div class="card" style="width: 100%;">
                                                    <div class="card-body text-center border">
                                                        <h2 class="card-title"><?php echo htmlentities($query); ?></h2>
                                                        <p class="card-text">Pyetjet</p>
                                                        <a href="manage-conactusquery.php" class="btn btn-primary">Detaje të
                                                            plota</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <?php
                                                $sql5 = "SELECT id from tbltestimonial ";
                                                $query5 = $dbh->prepare($sql5);
                                                $query5->execute();
                                                $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
                                                $testimonials = $query5->rowCount();
                                                ?>
                                                <div class="card" style="width: 100%; ">
                                                    <div class="card-body text-center border">
                                                        <h2 class="card-title"><?php echo htmlentities($testimonials); ?></h2>
                                                        <p class="card-text">Reagimet</p>
                                                        <a href="testimonials.php" class="btn btn-primary">Detaje të
                                                            plota</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>































        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>

    </body>

    </html>
<?php } ?>



<!-- Old Code -->
<!-- <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Paneli</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                    <?php
                                    $sql = "SELECT id from tblusers ";
                                    $query = $dbh->prepare($sql);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $regusers = $query->rowCount();
                                    ?><div class="card" style="width: 100%;">

                                            <div class="card-body text-center">
                                                <h2 class="card-title"><?php echo htmlentities($regusers); ?></h2>
                                                <p class="card-text">Përdorues të regjistruar</p>
                                                <a href="reg-users.php" class="btn btn-primary">Detaje të plota</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                        $sql1 = "SELECT id from tblvehicles ";
                                        $query1 = $dbh->prepare($sql1);;
                                        $query1->execute();
                                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                        $totalvehicle = $query1->rowCount();
                                        ?>
                                        <div class="card" style="width: 100%;">
                                            <div class="card-body text-center">
                                                <h2 class="card-title"><?php echo htmlentities($totalvehicle); ?></h2>
                                                <p class="card-text">Listimi i makinave</p>
                                                <a href="manage-vehicles.php" class="btn btn-primary">Detaje të
                                                    plota</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                        $sql2 = "SELECT id from tblbooking ";
                                        $query2 = $dbh->prepare($sql2);
                                        $query2->execute();
                                        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                        $bookings = $query2->rowCount();
                                        ?>
                                        <div class="card" style="width: 100%;">
                                            <div class="card-body text-center">
                                                <h2 class="card-title"><?php echo htmlentities($bookings); ?></h2>
                                                <p class="card-text">Rezervimet totale</p>
                                                <a href="manage-bookings.php" class="btn btn-primary">Detaje të
                                                    plota</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                        $sql3 = "SELECT id from tblbrands ";
                                        $query3 = $dbh->prepare($sql3);
                                        $query3->execute();
                                        $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                        $brands = $query3->rowCount();
                                        ?>
                                        <div class="card" style="width: 100%;">
                                            <div class="card-body text-center">
                                                <h2 class="card-title"><?php echo htmlentities($brands); ?></h2>
                                                <p class="card-text">Markat e listuara</p>
                                                <a href="manage-brands.php" class="btn btn-primary">Detaje të plota</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php
                                        $sql4 = "SELECT id from tblsubscribers ";
                                        $query4 = $dbh->prepare($sql4);
                                        $query4->execute();
                                        $results4 = $query4->fetchAll(PDO::FETCH_OBJ);
                                        $subscribers = $query4->rowCount();
                                        ?>
                                        <div class="card" style="width: 100%;">
                                            <div class="card-body text-center">
                                                <h2 class="card-title"><?php echo htmlentities($subscribers); ?></h2>
                                                <p class="card-text">Abonentët</p>
                                                <a href="manage-subscribers.php" class="btn btn-primary">Detaje të
                                                    plota</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                        $sql6 = "SELECT id from tblcontactusquery ";
                                        $query6 = $dbh->prepare($sql6);;
                                        $query6->execute();
                                        $results6 = $query6->fetchAll(PDO::FETCH_OBJ);
                                        $query = $query6->rowCount();
                                        ?>
                                        <div class="card" style="width: 100%;">
                                            <div class="card-body text-center">
                                                <h2 class="card-title"><?php echo htmlentities($query); ?></h2>
                                                <p class="card-text">Pyetjet</p>
                                                <a href="manage-conactusquery.php" class="btn btn-primary">Detaje të
                                                    plota</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php
                                        $sql5 = "SELECT id from tbltestimonial ";
                                        $query5 = $dbh->prepare($sql5);
                                        $query5->execute();
                                        $results5 = $query5->fetchAll(PDO::FETCH_OBJ);
                                        $testimonials = $query5->rowCount();
                                        ?>
                                        <div class="card" style="width: 100%;">
                                            <div class="card-body text-center">
                                                <h2 class="card-title"><?php echo htmlentities($testimonials); ?></h2>
                                                <p class="card-text">Reagimet</p>
                                                <a href="testimonials.php" class="btn btn-primary">Detaje të
                                                    plota</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->