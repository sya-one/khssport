<?php
$search_value=$_POST["search"];
$con=new mysqli($localhost,$root,$root,$khs);
if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
    }else{
        $sql="select * FROM all_learner WHERE learner LIKE '%$search_value%'";

        $res=$con->query($sql);

        while($row=$res->fetch_assoc()){
            echo 'Learner:  '.$row["learner"];


            }

        }
?>
