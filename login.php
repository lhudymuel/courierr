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
        .domain-restricted {
            border: 2px solid red;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><?php echo $_SESSION['system']['name'] ?> - Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
        <div class="card-body login-card-body">
        <div class="error-message" id="error-message"></div>
            <form action="" id="login-form">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" required placeholder="Email" id="email-input">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" id="sign-in-button">Sign In</button>
                    </div>
                </div>
               
            </form>
        </div>
    </div>

          <div class="card-tools">
			
			</div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>


<script>
        document.getElementById('email-input').addEventListener('input', function(event) {
            const emailInput = event.target;
            const errorMessage = document.getElementById('error-message');
            const signInButton = document.getElementById('sign-in-button');
            
            if (!emailInput.value.toLowerCase().endsWith('@admin.com')) {
                emailInput.classList.add('domain-restricted');
                errorMessage.textContent = 'wrong credential for admin';
                signInButton.disabled = true; // Disable the button
            } else {
                emailInput.classList.remove('domain-restricted');
                errorMessage.textContent = '';
                signInButton.disabled = false; // Enable the button
            }
        });
    </script>
<?php include 'footer.php' ?>

</body>
</html>
