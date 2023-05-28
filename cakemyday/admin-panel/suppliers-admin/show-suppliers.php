<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>
<?php

if(!isset($_SESSION['adminname'])){
  echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
}

$categories=$conn-> query("SELECT* FROM suppliers");
$categories->execute();
$allCategories=$categories->fetchAll(PDO::FETCH_OBJ);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Suppliers</h5>
             <a  href="<?php echo ADMINURL;?>/suppliers-admin/create-supplier.php" class="btn btn-primary mb-4 text-center float-right">Create a new supplier account:</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $counter=1;
                  foreach($allCategories as $category):?>
                  <tr>
                    <th scope="row"><?php echo $counter++;?></th>
                    <td><?php echo $category->suppliername;?></td>
                    <td><a href="mailto:<?php echo $category->email;?>" target="_blank"><?php echo $category->email;?></a></td>
                    <td><a href="delete-supplier.php?id=<?php echo $category->id;?>" class="btn btn-danger  text-center ">Delete </a></td>
                </tr>
                <?php endforeach;?>
                </tbody>

              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require("../layouts/footer.php")?>
