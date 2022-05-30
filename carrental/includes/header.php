<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom text-body">
  <div class="container">
    <a class="nav-link text-dark" href="#"><i class="fa-regular fa-circle-play"></i> Meet Us</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Ndrysho <i class="fa-solid fa-caret-down"></i></a>
        </li>

        <!-- <div id="google_translate_element"></div>

        <script type="text/javascript">
          function googleTranslateElementInit() {
            new google.translate.TranslateElement({
              pageLanguage: 'en'
            }, 'google_translate_element');
          }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
      </ul>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom text-body shadow">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Ballina</a> </li>
        <li class="nav-item"><a class="nav-link" href="car-listing.php">Listimi i makinave</a>
        <li class="nav-item"><a class="nav-link" href="product.php">Markat</a></li>
        <li class="nav-item"><a class="nav-link" href="page.php?type=aboutus">Rreth nesh</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="page.php?type=faqs">FAQs</a></li> -->
        <li class="nav-item"><a class="nav-link" href="contact-us.php">Kontaktoni</a></li>
        
      </ul>
      <ul class="navbar-nav me-auto">
        <a class="navbar-brand" href="#"><img src="https://i.ibb.co/q5YL7Br/pngwing-com.png" width="140px" height="40px" style="object-fit: scale-down;" alt=""></a>
      </ul>
      <form class="d-flex" role="search">
        <?php if (strlen($_SESSION['login']) == 0) {
        ?>
          <div class="login_btn"> <a href="#loginform" class="btn btn-sm btn-outline-dark pe-5 ps-5 pt-2 pb-2" data-bs-toggle="modal" data-bs-dismiss="modal">KYQU</a> </div>
        <?php } else {
        } ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

              <?php
              $email = $_SESSION['login'];
              $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
              $query = $dbh->prepare($sql);
              $query->bindParam(':email', $email, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {

                  echo htmlentities($result->FullName) . " <i class='fa-solid fa-caret-down'></i>";
                }
              } ?>

            </a>
            <ul class="dropdown-menu">
              <?php if ($_SESSION['login']) { ?>
                <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-gears"></i> Cilësimet e profilit</a></li>

                <li><a class="dropdown-item" href="my-booking.php"><i class="fa-solid fa-calendar-day"></i> Rezervimet e mia</a></li>

                <li><a class="dropdown-item" href="my-testimonials.php"><i class="fa-solid fa-comment-dots"></i> Dëshmitë e mia</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Dilni</a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav>
<div class="grid ">
  <div class="container border-bottom">
    <div class="row gx-5 mt-2">
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light ">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/800px-Mercedes-Logo.svg.png" alt="" width="40px" style="object-fit:cover ;"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/2048px-BMW.svg.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://i.pinimg.com/originals/a6/1f/36/a61f36fab622f8b33f207295b766ca1b.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://png.monster/wp-content/uploads/2021/03/pngwing.com-5-8e986252.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://logos-world.net/wp-content/uploads/2021/10/SEAT-Logo.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://logos-world.net/wp-content/uploads/2021/04/Opel-Logo.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://www.carlogos.org/logo/Renault-logo-2015-2048x2048.png" alt="" width="40px"></div>
      </div> 
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://cdn.freebiesupply.com/logos/large/2x/fiat-3-logo-png-transparent.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://www.carlogos.org/car-logos/lamborghini-logo-1100x1200.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="http://assets.stickpng.com/images/580b585b2edbce24c47b2cf2.png" alt="" width="40px"></div>
      </div>
      <div class="col-sm-1 mx-auto">
        <div class="p-3 bg-light"><img src="https://vehlogo.com/wp-content/uploads/2021/03/scuderia_ferrari_logo.png" alt="" width="40px"></div>
      </div>
      
    </div>
  </div>
</div>











<!-- <header>

  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
        <a class="navbar-brand mt-2 mt-lg-0 list-unstyled" href="#">
          <div class="container">
            <li> <i class="fa-solid fa-phone"></i> +383 49 389 025 | <i class="fa-solid fa-envelope"></i> info@example.com
            </li>
          </div>
        </a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="#"><i class="fa-brands fa-facebook-square"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-brands fa-instagram"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-brands fa-twitter"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-brands fa-linkedin"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-brands fa-youtube"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</header>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="https://i.ibb.co/q5YL7Br/pngwing-com.png" width="140px" height="80px" style="object-fit: scale-down;" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a> </li>
        <li class="nav-item"><a class="nav-link" href="page.php?type=aboutus">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="car-listing.php">Car Listing</a>
        <li class="nav-item"><a class="nav-link" href="page.php?type=faqs">FAQs</a></li>
        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>




        <?php if (strlen($_SESSION['login']) == 0) {
        ?>
          <div class="login_btn"> <a href="#loginform" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Login / Register</a> </div>
        <?php } else {
        } ?>










      </ul>
      <form class="d-flex" role="search">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
              <?php
              $email = $_SESSION['login'];
              $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
              $query = $dbh->prepare($sql);
              $query->bindParam(':email', $email, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {

                  echo htmlentities($result->FullName);
                }
              } ?>
            </a>
            <ul class="dropdown-menu">
              <?php if ($_SESSION['login']) { ?>
                <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-gears"></i> Cilësimet e profilit</a></li>

                <li><a class="dropdown-item" href="my-booking.php"><i class="fa-solid fa-calendar-day"></i> Rezervimet e mia</a></li>

                <li><a class="dropdown-item" href="my-testimonials.php"><i class="fa-solid fa-comment-dots"></i> Dëshmitë e mia</a></li>
                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Dilni</a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      </form>
    </div>
  </div>
</nav> -->