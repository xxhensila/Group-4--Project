<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Choose feedback's rating</h5>
              <form method="POST" action="filter-feedbacks.php?id=<?php echo $id;?>">
              <a  href="<?php echo ADMINURL;?>/feedbacks-admins/good-feedbacks.php" class="btn btn-primary mt-4 text-center">Good Feedbacks</a> 
              <a  href="<?php echo ADMINURL;?>/feedbacks-admins/bad-feedbacks.php" class="btn btn-primary mt-4 text-center">Bad Feedbacks</a> 
              </form>
            </div>
          </div>
        </div>
   </div>

<?php require("../layouts/footer.php")?>