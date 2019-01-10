<?php
// Include config file
include("header.php");

?>


          <div class="container">
          <div class="panel panel-defualt">
            <div class="panel-heading">
              <h2>
                <a class="btn btn-primary" href="index.php">Home</a>
                <a class="btn btn-primary pull-right" href="add.php"> Add Student</a>
          </h2>
<?php
if (isset($_session['message'])): ?>

<div class="alert alert-primary -<?=$_session['msg_type']?>">

  <?php

      echo $_session['message'];
      unset($_session['message']);

   ?>

</div>

<?php endif ?>

<?php // Define variables and initialize with empty values
$admin_no = $grade = $learner = $idnumber = $project = $active = ""; ?>

<?php
    $mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data")or die($mysqli->error);
    //pre_r($result);
    //pre_r($result->fetch_assoc());
    ?>


    <div class="row justify-content-center">

        <table class="table">
          <thead>
             <tr>
               <th>#</th>
               <th>Name</th>
               <th>Surname</th>
               <th>Grade</th>
               <th>Reg</th>
               <th>Project</th>
               <th>Time</th>
               <th>Action</th>
             </tr>
          </thead>
            <?php
                  while ($row = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo $row['id'] ?> </td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['surname'] ?></td>
                    <td><?php echo $row['grade'] ?></td>
                    <td><?php echo $row['reg'] ?></td>
                    <td><?php echo $row['project'] ?></td>
                    <td><?php echo $row['active'] ?></td>
                    <td>
                      <a href="record.php?edit=<?php echo $row['id']; ?>"
                        class="btn btn-info">Edit</a>
                      <a href="process.php?delete=<?php echo $row['id']; ?>"
                         class="btn btn-danger">Delete</a>
                      </a>
                    </td>
                  </tr>
                <?php endwhile; ?>
        </table>

    </div>
    <?php

      function pre_r( $array ) {
          echo '<pre>';
          print_r($array);
          echo '</pre>';
      }
 ?>

 <footer class="container" footer>

   <?php


   include("footer.php");
   ?>


 </footer>
