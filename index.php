<?php

include("header.php");




    $mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));
    ?>

 <div class="container">
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#sportbtn">Sport Whole Year</button>
      <div id="sportbtn" class="collapse">

           <h2><div class="text-center">Sport Whole Year Records</h2>

<div class="container">

          <form class="" action="process.php" method="post" id="sportwholeyear" enctype="multipart/form-data">
            <br>
            <br>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#grade8">Grade 8</button>
              <div id="grade8" class="collapse">

                <?php
                    $mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));
                    $result = $mysqli->query("SELECT * FROM all_learner where grade = 8")or die($mysqli->error);
                    //pre_r($result);
                    //pre_r($result->fetch_assoc());
                    // Define variables and initialize with empty values
                    $admin_no = $grade = $learner = $project = $active = ""
                    ?>


                    <div class="row justify-content-center">

                        <table class="table">
                          <thead>
                             <tr>
                               <th>Admin No</th>
                               <th>Grade</th>
                               <th>Learner</th>
                               <th>Project</th>
                               <th>Time</th>
                               <th>Comment</th>


                             </tr>


                          </thead>
                            <?php
                                  while ($row = $result->fetch_assoc()): ?>
                                  <tr>
                                    <td><?php echo $row['admin_no'] ?></td>
                                    <td><?php echo $row['grade'] ?></td>
                                    <td><?php echo $row['learner'] ?></td>
                                    <td><label for="project">Project</label>
                                    <select name="project" value="<?php echo $project ?>" class="form-control" required>
                                      <option selected>Choose...</option>
                                      <option>community Project</option>
                                      <option>School Project</option>
                                      <option>Sport</option>
                                    </select></td>
                                    <td><label for="ktime">Time</label>
                                    <select name="active" value="<?php echo $active ?>" class="form-control" required>
                                      <option selected>Choose...</option>
                                      <option>1hr</option>
                                      <option>2hrs</option>
                                      <option>2hrs</option>
                                      <option>3hrs</option>
                                      <option>4hrs</option>
                                      <option>5hrs</option>
                                    </select></td>
                                    <td><div class="form-group col-md-6">
                                      <label for="comments">Comments</label>
                                      <input type="text" class="form-control" name="comments" value=""  required tabindex="2">
                                    </div></td>

                                  </tr>
                                <?php endwhile; ?>
                        </table>
                      <div>
                    <button type="submit" class="btn btn-primary" name="submit">submit</button></div>
           </div>
      </div>

          </form>
<br>
  <form class="" action="process.php" method="post" id="sportwholeyear" enctype="multipart/form-data">
    <br>
    <br>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#grade9">Grade 9</button>
      <div id="grade9" class="collapse">

        <?php
            $mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM all_learner where grade = 9")or die($mysqli->error);
            //pre_r($result);
            //pre_r($result->fetch_assoc());
            // Define variables and initialize with empty values
            $admin_no = $grade = $learner = $idnumber = $project = $active = ""
            ?>


            <div class="row justify-content-center">

                <table class="table">
                  <thead>
                     <tr>
                       <th>Admin No</th>
                       <th>Grade</th>
                       <th>Learner</th>
                       <th>ID Number</th>
                       <th>Project</th>
                       <th>Time</th>


                     </tr>


                  </thead>
                    <?php
                          while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <td><?php echo $row['admin_no'] ?></td>
                            <td><?php echo $row['grade'] ?></td>
                            <td><?php echo $row['learner'] ?></td>
                            <td><?php echo $row['idnumber'] ?></td>
                            <td><label for="project">Project</label>
                            <select name="project" value="<?php echo $project ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>community Project</option>
                              <option>School Project</option>
                              <option>Sport</option>
                            </select></td>
                            <td><label for="ktime">Time</label>
                            <select name="active" value="<?php echo $active ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>1hr</option>
                              <option>2hrs</option>
                              <option>2hrs</option>
                              <option>3hrs</option>
                              <option>4hrs</option>
                              <option>5hrs</option>
                            </select></td>
                            <div>

                          </tr>

                        <?php endwhile; ?>

                </table>
                <div>
                <button type="submit" class="btn btn-primary btn-lg" name="submit">submit</button>
              </div>

      </div>
  </div>


  </form>

  <form class="" action="sport.php" method="post" id="sportwholeyear" enctype="multipart/form-data">
    <br>
    <br>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#grade10">Grade 10</button>
      <div id="grade10" class="collapse">

        <?php
            $mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM all_learner where grade = 10")or die($mysqli->error);
            //pre_r($result);
            //pre_r($result->fetch_assoc());
            // Define variables and initialize with empty values
            $admin_no = $grade = $learner = $idnumber = $project = $active = ""
            ?>


            <div class="row justify-content-center">

                <table class="table">
                  <thead>
                     <tr>
                       <th>Admin No</th>
                       <th>Grade</th>
                       <th>Learner</th>
                       <th>ID Number</th>
                       <th>Project</th>
                       <th>Time</th>


                     </tr>


                  </thead>
                    <?php
                          while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <td><?php echo $row['admin_no'] ?></td>
                            <td><?php echo $row['grade'] ?></td>
                            <td><?php echo $row['learner'] ?></td>
                            <td><?php echo $row['idnumber'] ?></td>
                            <td><label for="project">Project</label>
                            <select name="project" value="<?php echo $project ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>community Project</option>
                              <option>School Project</option>
                              <option>Sport</option>
                            </select></td>
                            <td><label for="ktime">Time</label>
                            <select name="active" value="<?php echo $active ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>1hr</option>
                              <option>2hrs</option>
                              <option>2hrs</option>
                              <option>3hrs</option>
                              <option>4hrs</option>
                              <option>5hrs</option>
                            </select></td>
                          </tr>
                        <?php endwhile; ?>
                </table>
                <div>
                <button type="submit" class="btn btn-primary btn-lg" name="submit">submit</button>
                </div>
      </div>
  </div>


  </form>

  <form class="" action="sport.php" method="post" id="sportwholeyear" enctype="multipart/form-data">
    <br>
    <br>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#grade11">Grade 11</button>
      <div id="grade11" class="collapse">

        <?php
            $mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM all_learner where grade = 11")or die($mysqli->error);
            //pre_r($result);
            //pre_r($result->fetch_assoc());
            // Define variables and initialize with empty values
            $admin_no = $grade = $learner = $idnumber = $project = $active = ""
            ?>


            <div class="row justify-content-center">

                <table class="table">
                  <thead>
                     <tr>
                       <th>Admin No</th>
                       <th>Grade</th>
                       <th>Learner</th>
                       <th>ID Number</th>
                       <th>Project</th>
                       <th>Time</th>


                     </tr>


                  </thead>
                    <?php
                          while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <td><?php echo $row['admin_no'] ?></td>
                            <td><?php echo $row['grade'] ?></td>
                            <td><?php echo $row['learner'] ?></td>
                            <td><?php echo $row['idnumber'] ?></td>
                            <td><label for="project">Project</label>
                            <select name="project" value="<?php echo $project ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>community Project</option>
                              <option>School Project</option>
                              <option>Sport</option>
                            </select></td>
                            <td><label for="ktime">Time</label>
                            <select name="active" value="<?php echo $active ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>1hr</option>
                              <option>2hrs</option>
                              <option>2hrs</option>
                              <option>3hrs</option>
                              <option>4hrs</option>
                              <option>5hrs</option>
                            </select></td>
                          </tr>
                        <?php endwhile; ?>
                </table>
                <div>
                <button type="submit" class="btn btn-primary btn-lg" name="submit">submit</button>
                </div>
      </div>
  </div>


  </form>

  <form class="" action="sport.php" method="post" id="sportwholeyear" enctype="multipart/form-data">
    <br>
    <br>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="collapse" data-target="#grade12">Grade 12</button>
      <div id="grade12" class="collapse">

        <?php
            $mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM all_learner where grade = 12")or die($mysqli->error);
            //pre_r($result);
            //pre_r($result->fetch_assoc());
            // Define variables and initialize with empty values
            $admin_no = $grade = $learner = $idnumber = $project = $active = ""
            ?>


            <div class="row justify-content-center">

                <table class="table">
                  <thead>
                     <tr>
                       <th>Admin No</th>
                       <th>Grade</th>
                       <th>Learner</th>
                       <th>ID Number</th>
                       <th>Project</th>
                       <th>Time</th>


                     </tr>


                  </thead>
                    <?php
                          while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <td><?php echo $row['admin_no'] ?></td>
                            <td><?php echo $row['grade'] ?></td>
                            <td><?php echo $row['learner'] ?></td>
                            <td><?php echo $row['idnumber'] ?></td>
                            <td><label for="project">Project</label>
                            <select name="project" value="<?php echo $project ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>community Project</option>
                              <option>School Project</option>
                              <option>Sport</option>
                            </select></td>
                            <td><label for="ktime">Time</label>
                            <select name="active" value="<?php echo $active ?>" class="form-control" required>
                              <option selected>Choose...</option>
                              <option>1hr</option>
                              <option>2hrs</option>
                              <option>2hrs</option>
                              <option>3hrs</option>
                              <option>4hrs</option>
                              <option>5hrs</option>
                            </select></td>
                          </tr>
                        <?php endwhile; ?>
                </table>

              <div>

              </div>  <button type="submit" class="btn btn-primary btn-lg" name="submit">submit</button>
                </div>
      </div>
  </div>

  </form>

</div>
</div>
</div>
<br>
<br>

<div class="container">
<form class="form-inline" method="post" target="_blank" action="generate_pdf.php">
<button class="btn btn-primary btn-lg" type="submit" id="pdf"  name="generate_pdf""><i class="fa fa-pdf"" aria-hidden="true"></i> Generate PDF</button>

</form>
</fieldset>


<br>
<br>
<br>

</div>
