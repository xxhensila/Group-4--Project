<?php require("../layouts/header.php")?>
<?php require("../../config/config.php")?>
<?php

if(!isset($_SESSION['adminname'])){
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";
  }

  $contacts=$conn-> query("SELECT* FROM contact");
  $contacts->execute();
  $allContacts=$contacts->fetchAll(PDO::FETCH_OBJ);

// Count the unread messages


?>

        <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Inbox</h5> <br>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message Details</th>
                    <th scope="col">Date</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $counter=1;
                  foreach($allContacts as $contact):?>
                  <tr>
                    <th scope="row"><?php echo $counter++;?></th>
                    <td><?php echo $contact->fullname;?></td>
                    <!-- <td><?php echo $contact->email;?></td> -->
                    <td><a href="mailto:<?php echo $contact->email;?>"><?php echo $contact->email;?></a></td>
                    <td><?php echo $contact->details;?></td>
                    <td><?php echo $contact->created_at;?></td>
                </tr>
                <?php endforeach;?>
                </tbody>

              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require("../layouts/footer.php")?>
