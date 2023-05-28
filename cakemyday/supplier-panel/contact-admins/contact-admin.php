<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>
<?php

// if(!isset($_SESSION['adminname'])){
//     echo "<script> window.location.href='".SUPPLIERURL."/suppliers/login-suppliers.php'; </script>";
// }

$categories=$conn-> query("SELECT* FROM admins");
$categories->execute();
$allCategories=$categories->fetchAll(PDO::FETCH_OBJ);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Contact emails:</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $counter=1;
                  foreach($allCategories as $category):?>
                  <tr>
                    <th scope="row"><?php echo $counter++;?></th>
                    <td><a href="mailto:<?php echo $category->email;?>" target="_blank"><?php echo $category->email;?></a></td>
                </tr>
                <?php endforeach;?>
                </tbody>

              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require("../layouts/footer.php")?>
