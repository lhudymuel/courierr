<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM branches")->num_rows; ?></h3>

                <p>Total Branches</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?></h3>

                <p>Total Parcels</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <hr>
          <?php 
              $status_arr = array("Item Accepted by Courier","Collected","Shipped","In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessfull Delivery Attempt");
               foreach($status_arr as $k =>$v):
          ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels where status = {$k} ")->num_rows; ?></h3>

                <p><?php echo $v ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
            <?php endforeach; ?>
      </div>

      <?php else: ?>
 <div class="col-12">
  <div class="card">
    <div class="card-body">
      <?php if ($_SESSION['login_type'] == 1): ?>
        <p>Welcome Admin: <?php echo $_SESSION['login_name'] ?></p>
      <?php elseif ($_SESSION['login_type'] == 2): ?>
        <p>Welcome Customer: <?php echo $_SESSION['login_name'] ?></p>
      <?php elseif ($_SESSION['login_type'] == 3): ?>
        <p>Welcome Staff: <?php echo $_SESSION['login_name'] ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>

  <?php
    // Fetch the logged-in user's first name and last name
    $user_id = $_SESSION['login_id'];
    $user = $conn->query("SELECT firstname, lastname FROM users WHERE id = '$user_id'")->fetch_assoc();
    $fullname = $user['firstname'] . ' ' . $user['lastname'];

    // Fetch the parcels with matching recipient_name
    $parcels = $conn->query("SELECT reference_number FROM parcels WHERE recipient_name = '$fullname'");
  ?>


<?php if ($_SESSION['login_type'] == 2): ?>
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Your Order List</h3>
      </div>
      <div class="card-body">
        <?php
          // Fetch the logged-in user's first name and last name
          $user_id = $_SESSION['login_id'];
          $user = $conn->query("SELECT firstname, lastname FROM users WHERE id = '$user_id'")->fetch_assoc();
          $fullname = $user['firstname'] . ' ' . $user['lastname'];

          // Fetch the parcels with matching sender_name
          $parcels = $conn->query("SELECT reference_number FROM parcels WHERE recipient_name = '$fullname'");
        ?>
        <?php if ($parcels->num_rows > 0): ?>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Reference Number (Copy this and Enter it to tracking number to track your order!)</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = $parcels->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $row['reference_number'] ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>Order is not processed or you don't have any orders yet.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php endif; ?>


