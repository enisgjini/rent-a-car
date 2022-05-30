<?php
if (isset($_POST['update'])) {
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $newpassword = md5($_POST['newpassword']);
  $sql = "SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:mobile";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $con = "update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:mobile";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
    $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    echo "<script>alert('Fjalëkalimi juaj ndryshoi me sukses!');</script>";
  } else {
    echo "<script>alert('ID -ja e postës elektronike ose mobile është e pavlefshme!');</script>";
  }
}

?>
<script type="text/javascript">
  function valid() {
    if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
      alert("Fjalëkalimi i ri dhe konfirmoni fushën e fjalëkalimit nuk përputhen!");
      document.chngpwd.confirmpassword.focus();
      return false;
    }
    return true;
  }
</script>
<div class="modal fade" id="forgotpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rikuperimi i fjalëkalimit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


      </div>
      <div class="modal-body">
        <div class="row">
          <div class="forgotpassword_wrap">
            <div class="col-md-12">
              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-floating mb-2">
                  <input type="email" name="email" class="form-control" placeholder="*Email" required="">
                  <label for="email">* Email</label>

                </div>
                <div class="form-floating mb-2">
                  <input type="text" name="mobile" class="form-control" placeholder="*Numri juaj i regjistruar" required="">
                  <label for="number">* Numri juaj i regjistruar</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="password" name="newpassword" class="form-control" placeholder="*Fjalëkalim i ri" required="">
                  <label for="number">* Fjalëkalim i ri</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="password" name="confirmpassword" class="form-control" placeholder="*Konfirmoni fjalëkalimin" required="">
                  <label for="number">* Konfirmoni fjalëkalimin</label>
                </div>
                <div class="form-floating mb-2">
                  <input type="submit" value="Reset My Password" name="update" class="btn btn-primary ">
                </div>
              </form>
              <div class="text-center">
                <p class="gray_text">Për arsye sigurie ne nuk e ruajmë fjalëkalimin tuaj.Fjalëkalimi juaj
                  do të rivendoset dhe një i ri do të dërgohet.</p>
                <p><a href="#loginform" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>