<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    // Code for change password	
    if (isset($_POST['update'])) {
        $vimage = $_FILES["img4"]["name"];
        $id = intval($_GET['imgid']);
        move_uploaded_file($_FILES["img4"]["tmp_name"], "img/vehicleimages/" . $_FILES["img4"]["name"]);
        $sql = "update tblvehicles set Vimage4=:vimage where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vimage', $vimage, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        $msg = "Image updated successfully";
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
                        Automjeti - Imazhi 4
                    </h2>
                    <hr>
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">


                        <?php if ($error) { ?><div class="errorWrap">
                                <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                            </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>



                        <div class="form-group">

                            <?php
                            $id = intval($_GET['imgid']);
                            $sql = "SELECT Vimage4 from tblvehicles where tblvehicles.id=:id";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':id', $id, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {    ?>
                                    <div class="card w-50 border">
                                        <img src="img/vehicleimages/<?php echo htmlentities($result->Vimage4); ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <hr>
                                            <button class="btn btn-primary" name="update" type="submit">Përditso</button>

                                            <div class="mb-3 mt-3">
                                                <input class="form-control" type="file" id="formFile" name="img4">
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
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

        <script src="js/main.js"></script>
    </body>

    </html>
<?php } ?>