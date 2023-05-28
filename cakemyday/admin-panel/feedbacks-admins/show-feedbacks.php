<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>
<?php

if(!isset($_SESSION['adminname'])){
  echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
}

$feedbacks=$conn-> query("SELECT* FROM feedbacks");
$feedbacks->execute();
$allFeedbacks=$feedbacks->fetchAll(PDO::FETCH_OBJ);

?>

        <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Feedbacks</h5>
              <a  href="<?php echo ADMINURL;?>/feedbacks-admins/filter-feedbacks.php" class="btn btn-primary mb-4 text-center float-right">Filter Feedbacks</a> 
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Visit</th>
                    <th scope="col">Service</th>
                    <th scope="col">Ordering</th>
                    <th scope="col">Order Again</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $counter=1;
                  foreach($allFeedbacks as $feedback):?>
                  <tr>
                    <th scope="row"><?php echo $counter++;?></th>
                    <td><?php echo $feedback->username;?></td>
                    <td><?php echo $feedback->email;?></td>
                    <td><?php echo $feedback->visit;?></td>
                    <td><?php echo $feedback->service;?></td>
                    <td><?php echo $feedback->ordering;?></td>
                    <td><?php echo $feedback->order_again;?></td>
                    <td><?php echo $feedback->rate;?></td>
                    <td><?php echo $feedback->created_at;?></td>

                </tr>
                <?php endforeach;?>
                </tbody>

              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require("../layouts/footer.php")?>
