<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
    $email = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {

        echo "<script>alert('Invalid Details');</script>";
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

    <title>Car Rental Portal | Admin Login</title>


    <!-- Font awesome - Version 6.1.1 -->
    <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS - Version (5.2.0 - Beta) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">



    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />

    <!-- BOX ICONS CSS-->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css"> -->
</head>

<body class="bg-light">
    <div class="container">
        <p align="center"> </p>
        <a class="btn btn-primary" href="../index.php"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="container text-center border shadow p-3 mt-3">

        <h2>
            Admin | Sign In
        </h2>
        <hr>
        <div class="row">
            <div class="col-6">
                <b>Hello</b>

                <form method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="emriIPerdoruesit" placeholder="Emri juaj i përdoruesit" name="username">
                        <label for="emriIPerdoruesit">Emri juaj i përdoruesit</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="fjalekalimi" placeholder="fjalekalimi" name="password">
                        <label for="fjalekalimi">Fjalekalimi</label>
                    </div>
                    <div class="d-flex align-items-start w-25 mt-2">
                        <button class="btn btn-primary me-3" name="login" type="submit">Kyqu</button>
                        <button class="btn btn-default" name="login" type="reset">Anulo</button>
                    </div>
                </form>

            </div>
            <div class="col-6 border-start">
                <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" width="100%" class="rounded">
            </div>
        </div>
    </div>



    <!-- <div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
        <div class="form-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="text-center text-bold mt-4x" style="color:#fff">Admin | Sign in</h1>
                        <div class="well row pt-2x pb-3x bk-light">
                            <div class="col-md-8 col-md-offset-2">
                                <form method="post">

                                    <label for="" class="text-uppercase text-sm">Your Username </label>
                                    <input type="text" placeholder="Username" name="username" class="form-control mb">

                                    <label for="" class="text-uppercase text-sm">Password</label>
                                    <input type="password" placeholder="Password" name="password" class="form-control mb">


                                    <button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

                                </form>

                                <p style="margin-top: 4%" align="center"><a href="../index.php">Back to Home</a> </p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>

</body>

</html>