


<div class="row">

  <div class="col-9">
    <!--Listing-->
    <section>
      <div class="container">
        <?php
        //Query for Listing count
        $sql = "SELECT id from tblvehicles";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = $query->rowCount();
        ?>
        <h4><?php echo htmlentities($cnt); ?> Listings</h4>
        <hr>
        <div class="row">
          <?php $sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {  ?>
              <div class="col-sm-4 mt-2">
                <div class="card" style="width: 18rem;">
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="card-img-top" src="..." style="width:100%;height:250px;object-fit:scale-down" alt="Card image cap"></a>
                  <div class="card-body">
                    <h6 class="card-title"><a class="text-decoration-none" href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->BrandName); ?> , <?php echo htmlentities($result->VehiclesTitle); ?></a></h6>
                    <hr>
                    <p class="card-text"><i class="fa fa-car" aria-hidden="true"></i> <?php echo htmlentities($result->FuelType); ?></p>
                    <p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo htmlentities($result->ModelYear); ?> model</p>
                    <p class="card-text"><i class="fa fa-user" aria-hidden="true"></i> <?php echo htmlentities($result->SeatingCapacity); ?> ulëse</p>
                  </div>
                </div>
              </div>
              <br>
          <?php }
          } ?>
        </div>
      </div>
    </section>
  </div>
  <div class="col-3 border-end">
    <div class="card text-bg-light mb-3" style="max-width: 18rem;">
      <div class="card-header">
        
      </div>
      <div class="card-body">
        <li><a href="profile.php">Profile Settings</a></li>
        <li><a href="update-password.php">Update Password</a></li>
        <li><a href="my-booking.php">My Booking</a></li>
        <li><a href="post-testimonial.php">Post a Testimonial</a></li>
        <li><a href="my-testimonials.php">My Testimonials</a></li>
        <li><a href="logout.php">Sign Out</a></li>
      </div>
    </div>




    <div class="sidebar_filter">

    </div>
  </div>
</div>