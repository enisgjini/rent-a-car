<?php
//error_reporting(0);
if (isset($_POST['signup'])) {
  $fname = $_POST['fullname'];
  $email = $_POST['emailid'];
  $mobile = $_POST['mobileno'];
  $password = md5($_POST['password']);
  $sql = "INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':fname', $fname, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if ($lastInsertId) {
    echo "<script>alert('Registration successfull. Now you can login');</script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
}

?>


<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'emailid=' + $("#emailid").val(),
        type: "POST",
        success: function(data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {}
    });
}
</script>
<script type="text/javascript">
function valid() {
    if (document.signup.password.value != document.signup.confirmpassword.value) {
        alert("Fjalëkalimi dhe fusha për konfirmimin e fjalekalimit nuk përputhen  !!");
        document.signup.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>
<div class="modal fade" id="signupform">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Regjistrohu</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="signup_wrap">
                        <div class="col-md-12 col-sm-6">
                            <form method="post" name="signup" onSubmit="return valid();">
                                <div class="form-floating mt-1">
                                    <input type="text" class="form-control" name="fullname" placeholder="Emër i plotë"
                                        required="required" id="fullname">
                                    <label for="fullname">Emër i plotë</label>
                                </div>
                                <div class="form-floating mt-1">
                                    <input type="text" class="form-control" name="mobileno"
                                        placeholder="Numri i telefonit" maxlength="10" required="required">
                                    <label for="nrphone">Numri i telefonit</label>
                                </div>
                                <div class="form-floating mt-1">
                                    <input type="email" class="form-control" name="emailid" id="emailid"
                                        onBlur="checkAvailability()" placeholder="Email" required="required">
                                    <span id="user-availability-status" style="font-size:12px;"></span>
                                    <label for="">Email</label>
                                </div>
                                <div class="form-floating mt-1">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Fjalëkalimi" required="required">
                                    <label for="">Fjalëkalimi</label>
                                </div>
                                <div class="form-floating mt-1">
                                    <input type="password" class="form-control" name="confirmpassword"
                                        placeholder="Konfirmoni fjalëkalimin" required="required">
                                    <label for="">Konfirmoni fjalëkalimin</label>
                                </div>
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" id="terms_agree" required="required" checked="">
                                    <label class="form-check-label" for="terms_agree">Pajtohem me <a href="#">termat dhe kushtet</a></label>
                                </div>
                                <div class="form-floating mt-1 text-end">
                                    <input type="submit" value="Sign Up" name="signup" id="submit"
                                        class="btn btn-success">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <p> Tashmë keni një llogari? <a href="#loginform" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Hyni këtu</a>
                </p>
            </div>
        </div>
    </div>
</div>