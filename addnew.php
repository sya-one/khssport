<?php

include("header.php");

?>


  <body>

    <div class="container">
    <div class="panel panel-defualt">

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
    $name = $surname = $grade = $reg = $project = $active = ""; ?>

    <div class="panel-body">

      <form action="process.php" name="sport-whole" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" value="<?php echo $name ?> " placeholder="Joe" required tabindex="1">
        </div>
        <div class="form-group col-md-6">
          <label for="surname">surname</label>
          <input type="text" class="form-control" name="surname" value="<?php echo $surname ?>" placeholder="Doe" required tabindex="2">
        </div>
      <div class="form-group col-md-6">
        <label for="grade">Grade</label>
        <input type="text" required class="form-control" name="grade" value="<?php echo $grade ?>" placeholder="8" tabindex="3">
      </div>
      <div class="form-group col-md-6">
        <label for="reg">Reg</label>
        <input type="text" class="form-control" name="reg" required value="<?php echo $reg ?>" placeholder="GL3" tabindex="4">
      </div>
      </div>


        <div class="form-group col-md-6">
          <label for="project">Project</label>
          <select name="project" value="<?php echo $project ?>" class="form-control" required tabindex="5">
            <option value="0" selected>Choose...</option>
            <option>community Project</option>
            <option>School Project</option>
            <option>Sport</option>
          </select>
          </div>

          <div class="form-group col-md-6">
            <label for="ktime">Time</label>
            <select name="active" value="<?php echo $active ?>" class="form-control" required tabindex="6">
              <option value="0" selected>Choose...</option>
              <option>1hr</option>
              <option>2hrs</option>
              <option>2hrs</option>
              <option>3hrs</option>
              <option>4hrs</option>
              <option>5hrs</option>
            </select>
          </div>
          <div class="form-group col-md-6">
      <button type="submit" class="btn btn-primary" name="submit" tabindex="7">submit</button>
      </div>
    </form>
    </div>
    </div>

    <br>
    <br>
    <br>
<div class="footer">


    <?php


    require('footer.php');


    ?>
    </div>
