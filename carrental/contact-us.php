<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['send'])) {
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $message = $_POST['message'];
  $sql = "INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    $msg = "Ne do t'ju kontaktojmë së shpejti";
  } else {
    $error = "Dicka shkoi keq.Ju lutem provoni përsëri";
  }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>

  <title>Car Rental|| Contact Us Page</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a1927a49ea.js" crossorigin="anonymous"></script>

  <!-- Bootstrap Icons CDN - Version 1.8.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

  <!-- Link to CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

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
      <img src="https://i.ibb.co/gDK6VDs/Header-Pic-Mask.png" alt="Snow" style="width:100%;opacity: 0.1;height:450px;object-fit:cover;">
      <div class="centered">
        <h1>Kontaktoni</h1>
      </div>
    </div>
  </section>











  <section class="contact_us section-padding">
    <div class="container bg-light rounded-5 border mt-n5 p-5 shadow">
      <form method="post">
        <div class="row">
          <h3>Merrni në kontakt duke përdorur formularin më poshtë</h3>
          <div class="col-3">


            <div class="contact_form gray-bg">

              <div class="form-floating mt-1">

                <input type="text" name="fullname" class="form-control white_bg" id="fullname" placeholder="Emër i plotë" required>
                <label for="fullname"><span>*</span> Emër i plotë </label>
              </div>

              <div class="form-floating mt-1">

                <input type="text" name="contactno" class="form-control white_bg" id="phonenumber" placeholder="Numri i telefonit" required maxlength="10" pattern="[0-9]+">
                <label for="phonenumber"><span>*</span> Numri i telefonit</label>
              </div>

            </div>
          </div>
          <div class="col-3">
            <div class="form-floating mt-1">

              <input type="email" name="email" class="form-control white_bg" id="emailaddress" placeholder="Email" required>
              <label class="control-label"><span>*</span> Email</label>
            </div>
          </div>
          <div class="col-6">




            <div class="form-floating mt-1">

              <textarea class="form-control white_bg" id="messagee" name="message" rows="4" placeholder="Mesazh" required style="height: 115px"></textarea>
              <label for="messagee">Mesazh <span>*</span></label>
            </div>
            <div class="form-floating mt-1 text-end">
              <button class="btn btn-success btn-lg" type="submit" name="send" type="submit">Dërgo
              </button>
            </div>
          </div>

        </div>

      </form>
      <hr>
      <?php if ($error) { ?>
          
      



        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Formulari është plotësuar me sukses!</strong> <br><?php echo htmlentities($msg); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <hr>
      <?php } ?>





      <h5 class="fw-bold mt-5 mb-5">Company Information</h5>
      <div class="container">
        <div class="row">
          <?php
          $pagetype = $_GET['type'];
          $sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
              <div class="col-4 ">

                <h2 class="text-center"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAJnklEQVRogbWaf3BU1RXHP+e93QQEE0GLgIwCRWsnuxtgN8AIiGI7WOoPHAe1M+A4ToeWCpqNUME6mqpUrZAN0Iql1trBdlRsERWR1oK/KJDdjexu4q+CaKcKKAgIAZPd907/eBsM2Q3J202/Mzt3Zs89536/991737n3PqGXEdixYIQa1gyEyQJDgfOypk8VPhORN8kY65Pjl+7pzXaltwIF4tVTUVkCTOhkSmdL7yn/KttE5BeJUN2W3mi/aCG+7Xeca3iMJ4Hp2b9SCusE+xU7w8dN45d/DuDbcccgw2uOUGW6YF8H4gNQ2CBe89Zk5dLPi+FRlBBf/I6AocZ6YDjwviL3poJ1zyNod77+aPh7IiwDAsB/VYwZqeCyeKFcChYyuqF6tG3IW0B/UVZ7pGVePLQ63a1jB1Q015aYJ776LeiPgaOWIZObx9YlCuFTkJDscGoAzhdYnAhFHi4kTjsCsZrFoL8CPsFrjitkmBmFNJydE+cDvy9WBEAyVPcQyBPABbRZTxTEya1DIF49FZiu8K6XltsKaTQfrL5ltwHvI1w9Olp9mVt/j+sWnSUWUVkcr8o/J/zJRQMk3ToX5RpgRPbvPSDrDdNetXNM/eHOPs0VtW2V8fDdqvxNDVkCTHRDy9Uc8UfDI0XYDaSSoUggf52a6SK6BhjYRZiDqjo7VVW/MZ8xEAs3ARWGqSN2jqn/uKfcXA0tMeQaAIV1+exZES/iiPiLKOOtvuWlVt/yUrAnIDwDnC0iLwXi4SvztpGNbVtyrRturoaWql4qgIjk9KY/uWiAtLWuAUzgtmQo8linKjuAH/mj4a0irERZE4zdNSoeeuRIx0qWLRsNQ+9BmAws7yk3d0+kPW/yGB/l2NKtc8k+iTwiTiJVFfkNqs8C52Rom5tTwbZ2A6AMc8PN7ao1BEgnA/0P5FiUq7NMVnQXRM1sT0u7zzdoGj/gC5z8bKgbYm6FlAA2UmvnsY0C1MuJxu6C2KVnxQFV5cIcoxPbVpfD3q2Qw0Dp8C21ffLYFODrvkO7XQlbSw6218nJyYKxOWcApeK01WO4FXIAoOyMY0Py2HYDYp44NKa7IH2PmmMBEWFXZ5tl9nHmocoXboi5FCLvAeCxfHlsLzqFUd1to7aEAWzN+nSA2obfiaPvumHmUog2AahSmRPItFcBB1Fu8kfD87qKEIjV3K4wEzhQgvfx3Cak/Ymm3DBzNaFE2aYCApcDD3a07RxTf9gfrZ4tIi+JsDIQrZ6EYdRbfcoaAYzWw0HDlrCiMwFLxJ4VD576DnEaYSoKliFbXXFzU3nmczPND0YOOwiU9mtj4LZLIic61wnEw1eirAHO6SLMARF7ViK4fFNnw/jt88tOeDwHgS+TwcjgnmzQ2uFqaK29Ya2lsBnoc6xEp+WrkwxGXvVSMkqRRSjbgP3AfhH+pcgiLyWj8okAOO7xXAV4EDa5EQEFZL+iuhaR6wTjBuCFfHWyaccj2V/PY4veiArAWre8XO9HrDPaXgKOg14djN1V7ta/KwQSCwahMg04crws83e3/q6FNFc8dkyVZ4H+adpucevfFSSd+QlQCjy168KVrW79C9rqCladUzIPrS0oRkcEY3O8iswBVCzpMuE8HQoikaxa0YTKmwqj/LGv8u4r3CCt/a4HhgEbEuPrPiwkRjG9uQJA0PlFxHAgzHMKVhYaomAhA4+VrQf+gzCtMlrTbX7VFfwN4SnARIV3E8HIPwqNU7CQ1y+vzQg8BIgt+kChccTklwCGyP1u3x0dUdRE9dDyB4FdAj/M9qwr+KM101GmAKnE2DLX746OKEpIPLQ6bcN9AGLog93VPwWKYFDrkNDFXWzWeoyil85UsPwZgQTIJH+0Znr3Hg4qG2tuENUqYOvOUP2GYnkULQSptW3VxQAiWt/F7vEUVDT/rL+qLgVUMBYVzQE3uZYivsbqiwWZYIAfVZ8iZeLh+sToyMZAvPpFVK4pKzt8FzgTuCuYJ/rcBzpMkD8nQsveDmyfPwyP56+CHrEhhUiTotubxta/39MF4LRp/Oh3qs9S27hKVa8FpgDf6lTFUjHGp4LL4oEdC0ZgWs2AWIK/ORjJ2cYCBKK3+xCzEfjaNLwXvzP215/5GsMhw2YHuSPkC+ANFX3BNNiQ76j1tEIqo+FxNswXYSZO/nMysCBbVeyd2EaTaUrsnbHLPjlJMl59Hyq1IJuSobrcN74igVjN64heCrowGapf2m4a03jnBZalIQzbJ2qMVnRip45rVWWtASsTVZGG0wrxxRZ+28RaquiM7F82sFWQFyyxNzYF69/rqkcAhm+p7VN+5pGUwigRbkwEI891tAeiNTcj+ifQJi/Hx3Z3MeSLV3/XVOMHWT4TyT4xhXWKZ2FT6NHdOUKyO7tngHKgBWSVqq5KVUVyThVPB39DeIoYbAbdZ7WJv/mSyJeQTdPTVgo4G+yJydDyHa7iRsMjRWQu6FygH3AE4aZkMPIq7QoD0dt9KOuAcoV1puG9KBmqW+hWBEBqXOQNUVkFMtRTwsnDBUnbvwMGKbrcrQiAVFXko2SobqF4+E72EL0cZV1lQ7gCsk8kEA2/hnCFKKsTochPi0kVwFlezROlKWC4qN5sG4Ypqn8U2OWhpTIeWn28mPgoUhkLP67CHITXksHI951VQrgEIJNmcbEiwNl8CcZswFKRlaJaD2RUZHbRIgAEbbXb7gZAnQuh9uVuP4DZRwrOYjsjEVr2tsISnDlXjsqSZLBue2/F9xol7Vz3QbsQFecC0tbnK2N3Tuqtxs4+Wv6Awgbg5YHHytzlYqdBZezOSSLZAwrhCacALttS6/nyzCPrcb5esFXkqRK174mH6vf2VuO9gTGNPx+a0cwDonoLzkN4ZeDR8muzWwoHwdgcbxv97heowbk+SCu8bIg86dFjm9x+DNBbCMbmeDPSf5qteqvAVTjftLQqREpoubedV86bvSIeHmUqDwEz+CYXOwa8KbAZ5S0tMZuTlUtb/h/EA4kF/aTNqlDRSxGZijIZ6J81ZwTWZYS7O6dAXeZaFQ0LB5tGepYgs5ScQ2sbdA9IE8i/ET7F1n0YfIptf64YaUpLDwGkAg8fAueOEYDW1gGC7cUwBmHrMAzjXJTzQC8E9YGMoFPOJZBQ9GnL9j7dPO7Rffn49ujst6Jh4WDDyExF5IrsHuJiOn+21HtoAz4AGhQ2a8b+Z9OE5fu7cyroW5RgbI43Y/e7CFN8qowEHSwwRNEhIOfi3OwOyFZvLw91KC3Q/YLsVdgrsBeRPVja5DFaPixkPv4PPJemkEWbankAAAAASUVORK5CYII=">
                </h2>
                <br>
                <p class="text-center"><?php echo htmlentities($result->Address); ?></p>

              </div>
              <div class="col-4 border-start border-end">
                <h2 class="text-center"><img src="data:image/png;base64,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">
                </h2>
                <br>
                <p class="text-center"><?php echo htmlentities($result->EmailId); ?></p>

              </div>
              <div class="col-4">

                <h2 class="text-center"><img src="data:image/png;base64,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">
                </h2>
                <br>
                <p class="text-center"><?php echo htmlentities($result->ContactNo); ?></p>

              </div>

          <?php }
          } ?>



        </div>
      </div>
    </div>
  </section>



  <!-- <h3>Contact Info</h3>
          <div class="contact_detail">
            <?php
            $pagetype = $_GET['type'];
            $sql = "SELECT Address,EmailId,ContactNo from tblcontactusinfo";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $result) { ?>
                <ul>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><?php echo htmlentities($result->Address); ?></div>
                  </li>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php echo htmlentities($result->EmailId); ?></a></div>
                  </li>
                  <li>
                    <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="contact_info_m"><a href="mailto:contact@exampleurl.com"><?php echo htmlentities($result->ContactNo); ?></a></div>
                  </li>
                </ul>
            <?php }
            } ?>
          </div> -->



  <!-- /Contact-us-->


  <!--Footer -->
  <?php include('includes/footer.php'); ?>
  <!-- /Footer-->



  <!--Login-Form -->
  <?php include('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include('includes/registration.php'); ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include('includes/forgotpassword.php'); ?>
  <!--/Forgot-password-Form -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>


</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:55 GMT -->

</html>