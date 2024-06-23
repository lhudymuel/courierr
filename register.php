<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){

$system = $conn->query("SELECT * FROM system_settings")->fetch_array();
foreach($system as $k => $v){
  $_SESSION['system'][$k] = $v;
}
// }
ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>
<?php include 'header.php' ?>
<style>
  textarea {
    resize: none;
  }
</style>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b><?php echo $_SESSION['system']['name'] ?> - Customer</b></a>
  </div>
  <!-- /.register-logo -->
  <div class="card card-outline card-primary">
    <div class="card-body register-card-body">
      <form action="" id="manage-staff">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
          <div class="col-md-12">
            <div id="msg" class=""></div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">First Name</label>
                <input type="text" name="firstname" id="" class="form-control form-control-sm" value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
              </div>
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Last Name</label>
                <input type="text" name="lastname" id="" class="form-control form-control-sm" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Location</label>
                
                <input type="text" name="location" id="" class="form-control form-control-sm" value="<?php echo isset($location) ? $location : '' ?>" required>
              </div>
              <div class="col-sm-6 form-group">
                <label>&nbsp;</label>
               <!-- <a href="selectloc.php" class="btn btn-primary btn-block">Your  Location</a>-->
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Email</label>
                <input type="email" name="email" id="" class="form-control form-control-sm" value="<?php echo isset($email) ? $email : '' ?>" required>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-6 form-group ">
                <label for="" class="control-label">Password</label>
                <input type="password" name="password" id="" class="form-control form-control-sm" <?php echo isset($id) ? '' : 'required' ?>>
                <div class="col-sm-6 form-group">
    <label  for="" class="control-label" >Type</label>
    <select name="type" id="" class="form-control form-control-sm" required>
      <option value="2" <?php echo isset($type) && $type == 2 ? "selected" : "" ?>>Customer</option>
    </select>
  </div>
</div>
                <?php if(isset($id)): ?>
                  <small class=""><i>Leave this blank if you don't want to change it</i></small>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
       
          <!-- /.col -->
          <div class="col-4">
            <button class="btn btn-primary btn-block" form="manage-staff">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a href="login.php" class="text-center">I already have an Account</a>
    </div>
    <!-- /.register-card-body -->
  </div>
</div>
<!-- /.register-box -->

<script>
  $('#manage-staff').submit(function(e){
    e.preventDefault()
    start_load()
    $.ajax({
      url: 'ajax.php?action=save_user',
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(resp){
        if(resp == 1){
          alert_toast('Data successfully saved', "success");
          setTimeout(function(){
            location.href = 'index.php?page=staff_list'
          }, 2000)
        }else if(resp == 2){
          $('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Email already exists.</div>')
          end_load()
        }
      }
    })
  })
  function displayImgCover(input, _this) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#cover').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<?php include 'footer.php' ?>
</body>
</html>
