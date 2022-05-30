<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons CDN - Version 1.8.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <!-- Link to CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->



    <style>
    .centered {

        position: absolute;

        top: 50%;

        left: 50%;

        color: white;

        font-size: 30px;

        transform: translate(-50%, -50%);

    }
    </style>
</head>

<body class="bg-light">
    <!--Header-->
    <?php include('includes/header.php'); ?>

    <!-- Image with text overlay -->
    <section>
        <div class="container-fluid  mb-n5" style="background: rgba(0, 0, 0, 0.8); ">
            <img src="https://i.ibb.co/n6VQgjL/Header-Pic-Mask.png" alt="Snow"
                style="width:100%;opacity: 0.1;height:450px;object-fit:cover;">
            <div class="centered">
                <h1>Markat</h1>
            </div>
        </div>
    </section>

    <!-- Showing car brands  -->
    <div class="container bg-light rounded-5 border p-5 shadow mt-n5">
        <div class="row">
            <div class="col-3">
                <h6 class="fw-bold text-success">#</h6>
                <p>
                    1-Series
                </p>
                <p>
                    2-Series
                </p>
                <p>
                    2002
                </p>
                <p>
                    2800
                </p>
                <p>
                    3-Series
                </p>
                <p>
                    4-Series
                </p>
                <p>
                    5-Series
                </p>
                <p>
                    6-Series
                </p>
                <p>
                    7-Series
                </p>
                <p>
                    8-Series
                </p>
                <p>
                    996 Biposto
                </p>
                <h6 class=" fw-bold  text-success">A</h6>
                <p>
                    Alpina
                </p>
                <p>
                    Alpina B6
                </p>
                <p>
                    Alpina B7
                </p>
                <h6 class="fw-bold  text-success">C</h6>
                <p>
                    C600 Sport
                </p>
                <p>
                    C600T
                </p>
                <p>
                    C650 Sport
                </p>
                <p>
                    C650GT
                </p>
                <h6 class="fw-bold text-success">F</h6>
                <p>
                    F650
                </p>
                <p>
                    F650CS
                </p>
                <p>
                    F650GS
                </p>
                <p>
                    F650GS Dakar
                </p>
                <p>
                    F700GS
                </p>
                <p>
                    F800GS
                </p>
                <p>
                    F800GS Adventure
                </p>
                <p>
                    F800GT
                </p>
                <p>
                    F800R
                </p>
                <p>
                    F800S
                </p>
                <p>
                    F800ST
                </p>
            </div>

            <div class="col-3">
                <h6 class="fw-bold  text-success">G</h6>
                <p>
                    G310GS
                </p>
                <p>
                    G650 Xchallenge
                </p>
                <p>
                    G650 Xcountry
                </p>
                <p>
                    G650 Xcountry
                </p>
                <p>
                    G650 Xmoto
                </p>
                <p>
                    G650GS
                </p>
                <p>
                    G650GS Sertao
                </p>
                <h6 class="fw-bold  text-success">H</h6>
                <p>
                    HP2 Enduro
                </p>
                <p>
                    HP2 Megamoto
                </p>
                <p>
                    HP2 Sport
                </p>
                <h6 class="fw-bold  text-success">I</h6>
                <p>
                    i3
                </p>
                <p>
                    i8
                </p>
                <h6 class="fw-bold text-success">K</h6>
                <p>
                    K1200GT
                </p>
                <p>
                    K1200LT
                </p>
                <p>
                    K1200R
                </p>
                <p>
                    K1200R Sport
                </p>
                <p>
                    K1200RS
                </p>
                <p>
                    K1200S
                </p>
                <p>
                    K1300GT
                </p>

                <p>
                    K1300R
                </p>

                <p>
                    K1300RS
                </p>
                <p>
                    K1600GT
                </p>
                <p>
                    K1600GTL
                </p>
                <h6 class="fw-bold text-success">L</h6>
                <p>
                    L7
                </p>

            </div>

            <div class="col-3">
                <h6 class="fw-bold text-success">M</h6>
                <p>
                    M
                </p>
                <p>
                    M2
                </p>
                <p>
                    M3
                </p>
                <p>
                    M4
                </p>
                <p>
                    M5
                </p>
                <p>
                    M6
                </p>
                <p>
                    Monster 900
                </p>
                <h6 class="fw-bold text-success">R</h6>
                <p>
                    R nineT
                </p>
                <p>
                    R nineT Racer
                </p>
                <p>
                    R nineT Urban
                </p>
                <p>
                    R1100GS
                </p>
                <p>
                    R1100R
                </p>
                <p>
                    R1100RS
                </p>
                <p>
                    R1100RT
                </p>
                <p>
                    R1100S
                </p>
                <p>
                    R1150GS
                </p>
                <p>
                    R1150GS Adventure
                </p>
                <p>
                    R1150R
                </p>
                <p>
                    R1150RS
                </p>
                <p>
                    R1150RT
                </p>
                <p>
                    R1200C
                </p>
                <p>
                    R1200C Classic
                </p>
                <p>
                    R1200C Montauk
                </p>
                <p>
                    R1200C Phoenix
                </p>
                <p>
                    R1200CL
                </p>
                <p>
                    R1200GS
                </p>
                <p>
                    R1200GS Adventure
                </p>
                <p>
                    R1200R
                </p>
                <p>
                    R1200RS
                </p>
                <p>
                    R1200RT
                </p>
                <p>
                    R1200S
                </p>
                <p>
                    R1200ST
                </p>
            </div>

            <div class="col-3">
                <h6 class="fw-bold text-success">S</h6>
                <p>
                    S1000R
                </p>
                <p>
                    S1000RR
                </p>
                <p>
                    S1000XR
                </p>
                <h6 class="fw-bold text-success">X</h6>
                <p>
                    X1
                </p>
                <p>
                    X2
                </p>
                <p>
                    X3
                </p>
                <p>
                    X4
                </p>
                <p>
                    X5
                </p>
                <p>
                    X5 M
                </p>
                <p>
                    X6
                </p>
                <p>
                    X6 M
                </p>
                <h6 class="fw-bold text-success">Z</h6>
                <p>
                    Z3
                </p>
                <p>
                    Z4
                </p>
                <p>
                    Z8
                </p>
            </div>
        </div>
    </div>


    <!--Footer -->
    <?php include('includes/footer.php'); ?>

    <!--Login form -->
    <?php include('includes/login.php'); ?>

    <!--Register form -->
    <?php include('includes/registration.php'); ?>

    <!--Forgot Password form -->
    <?php include('includes/forgotpassword.php'); ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>