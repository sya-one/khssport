<?php

session_start();

$mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));

$name = "";
$surname = "";
$grade = "";
$reg = "";
$project = "";
$active = "";

// Define variables and initialize with empty values
$name = $surname = $grade = $reg = $project = $active = "";

if (isset($_POST['submit'])){
    $admin_no = $_POST['admin_no'];
    $grade = $_POST['grade'];
    $learner =   $_POST['learner'];
    $project = $_POST['project'];
    $active =  $_POST['active'];
    $comments = $_POST['comments'];
    $last_updated = $_POST['timestamp'];
    $date_created = $_POST['timestamp'];

    $_session['message'] = "Record has been Saved!";
    $_session['msg_type'] = "success";

    header("location: index.php");

    $mysqli->query("INSERT INTO all_learner (admin_no, grade, learner, project, active, comments, now(), now()) VALUES('$admin_no','$grade', '$learner','$project','$active','$comments', '$last_updated','$date_created')") or
            die($mysqli->error);

}


        if (isset($_GET['delete'])){
          $id = $_GET['delete'];
          $mysqli->query("DELETE FROM data WHERE id= '$id'") or die($mysqli->error());

          $_session['message'] = "Record has been Deleted!";
          $_session['msg_type'] = "danger";

          header("location: record.php");
}

  /*  if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM data WHERE id='". $id . '") or die $mysqli->error());
    $result = mysqli_query($query);
    if (count($result)==1){
        $row  =$result->fetch_array();
        $name1 =$row['name'];
        $surname = $row['surname'];
        $grade = $row['grade'];
        $reg = $row['reg'];
        $project = $row['project'];
        $active = $row['active'];

      }

    }*/


 ?>
