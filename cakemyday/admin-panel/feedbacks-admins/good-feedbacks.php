<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<?php
if(!isset($_SESSION['adminname'])){
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
  }
  
  $feedback=$conn-> query("SELECT* FROM feedbacks WHERE rate>=3 AND rate<=5");
  $feedback->execute();
  $goodFeedbacks=$feedback->fetchAll(PDO::FETCH_OBJ);
  
  ?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline"> Good Feedbacks</h5>   
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
                  foreach($goodFeedbacks as $good):?>
                  <tr>
                    <th scope="row"><?php echo $counter++;?></th>
                    <td><?php echo $good->username;?></td>
                    <td><?php echo $good->email;?></td>
                    <td><?php echo $good->visit;?></td>
                    <td><?php echo $good->service;?></td>
                    <td><?php echo $good->ordering;?></td>
                    <td><?php echo $good->order_again;?></td>
                    <td><?php echo $good->rate;?></td>
                    <td><?php echo $good->created_at;?></td>

                </tr>
                <?php endforeach;?>
                </tbody>

              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require("../layouts/footer.php")?>