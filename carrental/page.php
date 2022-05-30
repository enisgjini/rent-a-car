<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<?php 
$pagetype = $_GET['type'];
$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
$query = $dbh->prepare($sql);
$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

?>
<!DOCTYPE HTML>
<html lang="en">

<head>

    <title>Emri i kompanis | Detajet e faqes</title>

    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons CDN - Version 1.8.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">


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

    <!--Page Header-->
    <section>
        <div class="container-fluid" style="background: rgba(0, 0, 0, 0.8); ">
            <img src="https://images.unsplash.com/photo-1494481524892-b1bf38423fd1?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170" alt="Snow" style="width:100%;opacity: 0.1;height:450px;object-fit:cover;">
            <div class="centered">
                <h1>Rreth nesh</h1>
            </div>
        </div>
    </section>

    <?php
  $pagetype = $_GET['type'];
  $sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
  $query = $dbh->prepare($sql);
  $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  $cnt = 1;
  if ($query->rowCount() > 0) {
    foreach ($results as $result) { ?>
    <section class="about_us section-padding">
    <div class="container bg-light rounded-5 border p-5 shadow mt-n5">
            <div class="section-header text-center">
                <h2></h2>
                <p><?php echo $result->detail; ?> </p>
            </div>
            <?php }
  } ?>




            <div class="row mt-5">
                <div class="col-3 text-center border-end ">
                    <h2>
                        <img
                            src="data:image/png;base64,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">
                    </h2>
                    <p class="mt-4 ">Gati për të dërguar në 24 orë pasi të arrijë porosia juaj</p>
                </div>
                <div class="col-3 text-center border-end">
                    <h2>
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAFQklEQVRoge2YXWyTZRTHf+ftunbCQCQxaNRww0cs7YCVRDKMm3wk7oIgQZQRvzB+hAvTdyBwQ1KjhkBkbDEKEhNJFFCG0cQAcmEYOlFZu4yOQeYHQUCRC2MWhK1r+x4vaEdb2rXbOiDa390553me9/x7zvM871soUqRIkSJFiiAVbeb7tzIBSzjf6d325kjXKVHhpUIkNFwEOoARCzEKkMttQUmavUOgZ7QfqsoUhKWFXDNFiGHTzR2zGs8W8gGZcAd8SwQpqJD/bGvdCia6g+aQDxxRDYS8je0Je1SFeNrMLaDHQ3Ma9w8y7H5Rhn4FiBwCahPmqLWWO2BuQngNkU/cAbOu4A9QFriOmXclzFGpiDvg2ypQHzdtAuurj/j3tdT4oxmGX0b4Me/FFS9wJ2A3HLIY2AV5CnF1rR5ru1r6RuyO/o1drvf+yS1C6pNcp62otSiLCIBfQ5XbFuaTB0BF0GxQxQQQ1SeIC8nZWp4Ta8cYvY4vEfHZeh1fTWtdV55dhLkpTUS3HZ1/8qGmS/kmmgtLtDnJXJhor5xCJBJbI1AdN6sczsgBV9fqsenjKoJmg8CGJNdpK2o9EvQ2XhxR5ml0zmr8ATgXNxPtlVvI1DMX3hJkd5Lr4fTKuAPmpkS54xS8EgMICgxUJd5euYU0L2+OTT1z/tk0MVUOZ+TQtNZ15dfaKaUS3Xa0ptCVSMW6ob3yOn6blzfHJlwe95zCviR3Vakz0n0z2imdUGXTceC3uGk3HLI473ukpcYfnX7mQl1yZQTuSRoyeu2UjqAgKe01pAsxS2XgJlUiBeGzJGvhkG/2lhp/dOLl8SsTYhROWVGr5qZUIgnDsP5MMu3DekVJtBkqr5cY0eqbLSITw35FaV7eHAP8BcxlRPy/vkdcXavHGn3OFaJajXC3qFyyhKNSYuwJVbx9pZAJuQOmG6gTmAEYqP6kNvZ1zm78frB5OYW428wF0stHoJMAUFAUUVYSifo97fXPhGY3fD1SAa4uf6mtt6cJeBmQgYBIrVj4PAFzf7jPvqp73pbLmeYP2lqeoO9REQ4AkzKPkHux9ODMNl915nieKGLr7dkNvEKyiFSWOZz9B11d/tJMwaxC5h4zy1DZBSQm9oFuF/RVYAcQjvtLLZFdk4/4ncNTAe52Xx2wLMnVqbBRVdeLcOy6W+aV9PbUp88HEE/A1IQRM2SmUVJ6DkDC4aUIHySJqEr+RnYH11SKWt8BDgBRfcFyOD/PK/NIX62ofJxIGiWM4AVQOGCVjV/a5fL3A6B+wxPs2QG8GI9fjMT63Ta74z6bpR0ZhWRHt4e8javTvZ6AuZ1r7VA41JoemtPUneya1rqu3OGM/AXYs03L6/hVlVOZ/XQNKcncRELeCT+nO69tcD2XaUKCvISI4Mo8W2fklV7+2D2Bv6ekO699+8gDg00Ud2jDhIyB1D0SVjGqOiu3BhPxGe2m17BoJb5HVFiF3fHFsNKP9B8W1Tlx62CsbPzjufaIvazcSsk329qTj/id48p7uoHELxEGPhT0lCIPAs8nRABnr46PTv9lyjvhTGvlwtPmW4HInusePanIp6j2C7IEYe5ABNnQ6W3YnL5GViEAM9t81ZbIYa4fwZkIq2Et6pzd9M3QJVzPzhPw7UXkyRwjv7VzZX7QuzOSHhh0j3TMaWzBkFrQP7IM+V2Qx0YkAkBQu1x9WlTeBTKeogLNsbJwbSYR8XhuPCfWjqE/9pRCtRhMAi5icdQuV/YGvTuvDl/BjVQcN10q1AFuFQzQbkH3hbxN+f+JV6RIkSK3Pf8C+XwE8onFIIoAAAAASUVORK5CYII=">
                    </h2>
                    <p class="mt-4 ">Dorëzimi i korrierit të klasit të parë në derën tuaj në 3 ditë në të gjithë
                        botën</p>
                </div>
                <div class="col-3 text-center border-end">
                    <h2>
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABm0lEQVRoge3ZzTLDYBTG8f8bLQtcAK6B+gj2tlwC95B2YaM2akON9hoMV2DchKa+ZtwC1tgYlWPRxEQraM0kaZzfKj15F8/pSdPMG1BKKaUUprNQaJbWRKQILAOj8Uf61jNwbiGHV3b9LHziUyMzTWcXMVuxRuuTgd1ru7Yd+tzmT+IUeAEp5+GkadfvE0kZYcF1Jl6NWUeoACMWshZMJhcsEpGSf1S+sesHiST9gf/FVqcbjjHG7HmYEnAGYIXWLQK8efnjBDL2xJP8kX+4GNTCjYwB3C5VH+IM1Y9QxvGgZkWsHTi5zsKMW5QkgvxVZiaijaRNZhrp+rHf2LWu56806rwpZWYimWmk69L6yl//W+K4XP/XRAbhBpCZiWgjaaONpI02kjbaSNqEG3mC9iZYQll+rXBVnAIQeAxq4UYaAK/GrMecq2deq53RgBvUPp61LOTQw6wgVKYbjskNDR9fzu/fJRE0ytzF5mTLa20YZAfamYNznx4GC26xIlCOO2A/IjexA7Ous+rvqS7h7z6mSORrBaWUUkoB76pzdEj87Ag0AAAAAElFTkSuQmCC">
                    </h2>
                    <p class="mt-4 ">Ndërgjegjësimi optimal i blerjes: Nuk ka tarifa të fshehura</p>
                </div>
                <div class="col-3 text-center">
                    <h2>
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACuElEQVRoge2Yv09TURSAv/NeEVt+GcEFY6JhJLbadikbiY4YZzUuGga2txBMNGiiJJJI3Zg1/gMmbCImRjGBItJEZ39EFiWKIjVg33FoIW1pq5Db9mnetzS9955z79dzbvpa8PHx8fHx2TtSOhCZc3rV1jFU+oG2BpypGt8RfWKLfWUxeudN4USRSGTO6XUtZgXa63u+3aHwLWBZiUKZQNECW8dEpR14aFtNQ4vR8eW6n7IKJ18Od2d1Y1JUzmRddww4uzVnFa3MtRNelABYjI4viy1DAAr9hXNWydq2rYA6nW3XLJ1IfgQobf9SkX8WX8Rr+CJewxfxGr6I1/BFvIYv4jX+G5HAn5fUj1hqMLRB64jgngM5AvoBtR60bOrtF33JTLVYz1QkMesEN7VlWtBrID3APpAeREfXm5lOzDrBavGeEVnbxwhCAniLJadosltVOQ28U6XvR7MOV4v3TGsJeh4ERC+lo8mZ/PD08XnnsgiPROUCcKNSvGdEQI4CZPcfeFY46oY6ntqZVRSObY2l48kdf2N5prUAG+B17/WNwsGC93a14CKzcMpRKG9sknDKWQeqXt6/JJOOJ0OwsyJfACKvnMMGNilLLDUYwowEQDCfb4fIYwDdZLJWMj8JdtUiXyCy4DxXpa9oVhjQXwyEU47JPRfS8WTcRoyK5PO9t1QJm0xcGfkMIIZFXLU7Idda8yYTV0ZXAFS102RWi2wXgCUiEyYTV0KRlfyrURERciJLsYkpRG+ZTF4OC61Ja6la261FOnb3qogMADPAmsmNtjeEnIhltrWEXEW2H1GWYhNTwJTJTcqhrh5CzH3fav6Dqf8jimX2jpCvSP1FFKN3BKVBFcGwSMMqAgcN52tURfSr4YSfoAEiityvRb66/0J0gx2jVmYVQS+CdO89ky4D99xgx02A36maxljiX7VfAAAAAElFTkSuQmCC">
                    </h2>
                    <p class="mt-4 ">Ndjekja e porosive në internet</p>
                </div>
            </div>


        </div>
    </section>

    <div class="container bg-light rounded-5 border mt-5 p-5 shadow">
        <h3 class="text-center"> Partnerët tanë të biznesit</h3>
        <p class="text-center">We supply thousands of kilograms of raw materials and products. All our suppliers must
            comply with our high procurement standards. In this way, we ensure that we supply high quality raw materials
            from first-class suppliers.</p>
        <div class="row mt-3">
            <div class="col-6 border-end ">
                <div class="container text-center">
                    <img
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAADdElEQVR4nO2bTWhUVxTHf+dNM/ULKS0oFKKCm6DkDe1k8GOTFkrtotkogx8gWSjdlKovcZFFF7OroPiixY3bYAvJQiGlhWz8WCiSp5gZIokEP6CIiKJCqjXRd7pwDMM4oxDm3jtl3m/z3uXde8+fP++ceffNu9DiiIlJ/WtBD3CgwdOeLGbD0QbPyUeNnhAApR34psGznm3wfIApAypRuYSnc4sc3YbS3VA9VZg3IO3li5ljDxcztOPqj5+lU+lHjZZUiWdy8v8DLW+A8RSQ+dc/dUZ9syJ6s5gNRzPjh/YirEO5O5EbHALwxw/tVvHWvDtal5nWZ9wAhZ8FBeU3YFQ92YfSjcdFYAhARX4Q9CvTWmrR8ilgHD8Kpv0oUD8KzgCgBS8/nE+hhbrm+1Fwpjxm2rQ+8z+D1UghHgFgxHroWrR8CiQGuBbgmsQA1wJckxjgWoBrEgNcC3BNYoBrAa6xuRbY40fBnrcNhQulrvBrgM4oOC+QLIddYO0OULjpwcJ7fRVuL1wUfhfl6ttmDD0CG2zosmaAwI2JrnCg1rVSNjxd2fajoB1LBrR8CiQGuBbgGuuvxDJRMKDQITA10RUesR2/Gut3gArfAb3lo3Psp0CsD4B75aNzrKdAMTe4y3bM95EUQdsBkyLY8kWwyUgMcC3ANfb/HK1BJgqOqOCLUqy3YjRFUxigwmaUbhWMfxFSTcunQGKAawGusV4DXsP+tlhXzKdk1nbsWlg3YDIbztiO+T5aPgUSA1wLcE1TPAjNvZrbsbRt+ccv5v95aTt2UxgwtenUY1exm8KAzLW+72P0cw+5P5E9/ofN2E1hgKKHRelW0YuAVQOSImg6gIo8E1WAT+r1eacIKp+W97M9Ma3PwqYpvQPkgCxa8JBCXN2lsgjmh/OpaeFLAIQ7puWZTwGRv8pnq/3o6c4Pdb+1vn03sAqAeGGsMYwbkNbZYdD7AIj82hn1d9Tr+8X1/g2qeqLc/Hv5vBr/pt7IztFq/PG+HYiOlOM9UWFgxUuGrmwNXwBsuRwsfZ6mV+EX3tQKVXR7qWvwnGltVgwAyERBv8LRipjPganyeQcsvA6LVTlcyoWhDV3WDIA3Dzyq8SDI+jpiZmKVg6Xc8T9tabJqAMDGyUI69e+zbQLfasxaABW56wljr5asHJvcWFjsNtuExfAfUesHCP80zYoAAAAASUVORK5CYII=">
                    <h6 class="mt-3 border-bottom">Chemistry</h6>
                </div>

                <div class="container pe-2">
                    <div class="row ">
                        <div class="col-4">
                            <i class="fa-brands fa-dhl fa-5x"></i>
                        </div>
                        <div class="col-4">
                            <i class="fa-brands fa-dhl fa-5x"></i>
                        </div>
                        <div class="col-4">
                            <i class="fa-brands fa-dhl fa-5x"></i>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-6">
                <div class="container text-center">
                    <img src="data:image/png;base64,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"
                        width="65px">
                    <h6 class="mt-3 border-bottom">Transport</h6>
                </div>
                <div class="container pe-2">
                    <div class="row ">
                        <div class="col-4">
                            <i class="fa-brands fa-dhl fa-5x"></i>
                        </div>
                        <div class="col-4">
                            <i class="fa-brands fa-dhl fa-5x"></i>
                        </div>
                        <div class="col-4">
                            <i class="fa-brands fa-dhl fa-5x"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--Footer -->
    <?php include('includes/footer.php'); ?>
    <!--Login-Form -->
    <?php include('includes/login.php'); ?>
    <!--Register-Form -->
    <?php include('includes/registration.php'); ?>
    <!--Forgot-password-Form -->
    <?php include('includes/forgotpassword.php'); ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


</body>


</html>




<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->