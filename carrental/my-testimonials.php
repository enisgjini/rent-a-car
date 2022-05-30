<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
?>
  <!DOCTYPE HTML>
  <html lang="en">

  <head>

    <title>Car Rental Portal | My Testimonials </title>
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
  </head>

  <body>

    <!--Header-->
    <?php include('includes/header.php'); ?>

    <div class="container mt-3 mb-3">
      <section class="page-header profile_page">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ballina</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dëshmitë e mia</li>
          </ol>
          
        </nav>
      </section>
    </div>


    <?php
    ?>


    <div class="container">





      <?php
      $useremail = $_SESSION['login'];
      $sql = "SELECT * from tbltestimonial where UserEmail=:useremail";
      $query = $dbh->prepare($sql);
      $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);

      if ($cnt = $query->rowCount() > 0) {
        foreach ($results as $result) { ?>

          <div class="card mt-3 shadow-lg">
            <div class="card-body">
              <h5 class="card-title">Data e postimit: <?php echo htmlentities($result->PostingDate); ?></h5>
              <p class="card-text"><?php echo htmlentities($result->Testimonial); ?> </p>
              <?php if ($result->status == 1) { ?>
                <button type="button" class="btn btn-success">Aktiv</button>

              <?php } else { ?>
                <button type="button" class="btn btn-primary" disabled>Duke pritur për miratim</button>

              <?php } ?>
            </div>
          </div>

      <?php }
      } ?>
    </div>





    </ul>
    </div>






    <!--Footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap Bundle JS Version 5.2.0 Beta -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

  </body>

  </html>
<?php } ?>