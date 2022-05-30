<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $_SESSION['login'] = $_POST['email'];
    $_SESSION['fname'] = $results->FullName;
    $currentpage = $_SERVER['REQUEST_URI'];
    echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
  } else {

    echo "<script>alert('Invalid Details');</script>";
  }
}

?>



<!-- Modal -->
<div class="modal fade" id="loginform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kyçu në llogarinë tuaj</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" id="floatingInput">
                  <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control" name="password" placeholder="Fjalekalimi" id="floatingInput1">
                  <!-- <input type="password" class="form-control" name="password" placeholder="Fjalekalimi"> -->

                  <label for="floatingInput1">Fjalekalimi</label>
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">

                </div>
                <div class="form-group">
                  <button type="submit" name="login" value="Login" class="btn btn-secondary">Kyçu</button>
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Anulo</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <p>Nuk keni një llogari? <a href="#signupform" class="btn btn-primary" data-bs-toggle="modal" >Regjistrohuni këtu</a></p>
        <p><a href="#forgotpassword" data-bs-toggle="modal" data-bs-dismiss="modal">Keni harruar fjalëkalimin ?</a></p>
      </div>
    </div>
  </div>
</div>

















<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="#signupform" data-bs-toggle="modal" data-bs-dismiss="modal">Signup Here</a></p>
        <p><a href="#forgotpassword" data-bs-toggle="modal" data-bs-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>