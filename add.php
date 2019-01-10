<?php

include( 'header.php' );

//connect to DB
$mysqli = new mysqli('localhost','root','root','khs') or die(mysqli_error($mysqli));

//set DB Tables
$adminno = adminno;
$grade = grade;
$learner = learner;
$idnumber = idnumber;


//Set token variable
$token = setToken();

if (isset ($token) && $token == 'addactive'){
    //Add a class to the DB
    if(isset($_POST['submit'])){
        if(isset($_POST['teacherName']) and $_POST['teacherName'] !='' && isset($_POST['subjectName']) and $_POST['subjectName'] !=''){
            $teacher_name = $_POST['teacherName'];
            $subject_name = $_POST['subjectName'];
            $class_code = $_POST['gradeCode'];
            $class_code2 = "";
            if (isset($_POST['gradeCode2'])){
                $class_code2 = $_POST['gradeCode2'];
            }
            if($class_code2 != ""){
                $paste = $teacher_name . " - " . $subject_name . " - " . $class_code2;
            } else {
                $paste = $teacher_name . " - " . $subject_name . " - " . $class_code;
            }
            $sql = "INSERT INTO $class_list (class_key) VALUES ('$paste')";
            if (mysqli_query($link, $sql)){
                echo "<h1>Class added to database - don't forget to add students!</h1>";
            } else {echo "Class not created - probably because it already exists";}
        } else {echo "Not all required fields filled in";}
    } else {echo "Nothing submitted";}
} else if (isset ($token) && $token == 'addeditsubject'){
    //Add or edit a subject
    if(isset($_POST['submit']) || isset($_POST['edit'])){
        if(isset($_POST['submit']) && isset($_POST['newSubjectName']) and $_POST['newSubjectName'] !=''){
            $new_name = $_POST['newSubjectName'];
            $sql = "INSERT INTO $subjects (subject_name) VALUES ('$new_name')";
            mysqli_query($link, $sql);
            echo "<h1>Subject added to database - don't forget to assign them classes and students!</h1>";
        } else if(isset($_POST['edit']) && isset($_POST['editSubjectName'])){
            $r = $_POST['editSubjectName'];//old teacher name
            $q = $_POST['editSubName'];//new teacher name
            //Deal with tbl TEACHER_LIST
            $sql = "SELECT * FROM $subjects WHERE subject_name='$r'";
            if ($result = mysqli_query($link, $sql)){
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
                        break;
                    }//while
                } else {echo "No records matching your query were found.";}//if mysql_num_rows //results >0
            } else {echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}//if $result//if$results
            $sql = "UPDATE $subjects SET subject_name='$q' WHERE id='$id'";
            if ($q != '' && mysqli_query($link, $sql)){
                echo "Subject successfully edited";
            } else {
                echo "Error";
            }
            //Deal with tbl CLASSES
            $sql2 = "SELECT * FROM $classes WHERE class_name='$r'";
            if ($result2 = mysqli_query($link, $sql2)){
                if (mysqli_num_rows($result2) > 0){
                    while($row2 = mysqli_fetch_array($result2)){
                        $id = $row2['id'];
                        $teacher_name = $row2['teacher_name'];
                        $class_id = $row2['class_ID'];
                        $class_key = $row2['unique_class_ID'];
                        $n = $teacher_name . " - " . $q . " - " . $class_id; //unique_class_ID
                        $sql3 = "UPDATE $classes SET class_name='$q' WHERE id='$id'";
                        $sql4 = "UPDATE $classes SET unique_class_ID='$n' WHERE id='$id'";
                        $sql5 = "UPDATE $subjects SET subject_name='$n' WHERE subject_name='$class_key'";
                        if ($q != '' && mysqli_query($link, $sql3) && mysqli_query($link, $sql4) && mysqli_query($link, $sql5)){}
                        else {
                            echo "Error";
                            lines(2);
                        }
                    }//while
                } else {echo "No records matching your query were found.";}//if mysql_num_rows //results >0
            } else {echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}//if $result//if$results
        }//else if
    } else {echo "Nothing submitted";}
} else if (isset ($token) && $token == 'addeditteacher'){
    //Add or edit a teacher
    if(isset($_POST['submit']) || isset($_POST['edit'])){
        if(isset($_POST['submit']) && isset($_POST['newTeacherName']) and $_POST['newTeacherName'] !=''){
            $new_name = $_POST['newTeacherName'];
            $sql = "INSERT INTO $teacher_list (teacher_name) VALUES ('$new_name')";
            mysqli_query($link, $sql);
            echo "<h1>Teacher added to database - don't forget to assign them classes and students!</h1>";
        } else if(isset($_POST['edit']) && isset($_POST['editTeacherName'])){
            $r = $_POST['editTeacherName'];//old teacher name
            $q = $_POST['editTeachName'];//new teacher name
            //Deal with tbl TEACHER_LIST
            $sql = "SELECT * FROM $teacher_list WHERE teacher_name='$r'";
            if ($result = mysqli_query($link, $sql)){
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
                        break;
                    }//while
                } else {echo "No records matching your query were found.";}//if mysql_num_rows //results >0
            } else {echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}//if $result//if$results
            $sql = "UPDATE $teacher_list SET teacher_name='$q' WHERE id='$id'";
            if ($q != '' && mysqli_query($link, $sql)){
                echo "Teacher successfully edited<br><br>";
            } else {
                echo "Error";
            }
            //Deal with tbl CLASSES
            $sql2 = "SELECT * FROM $classes WHERE teacher_name='$r'";
            if ($result2 = mysqli_query($link, $sql2)){
                if (mysqli_num_rows($result2) > 0){
                    while($row2 = mysqli_fetch_array($result2)){
                        $id = $row2['id'];
                        $class_name = $row2['class_name'];
                        $class_id = $row2['class_ID'];
                        $class_key = $row2['unique_class_ID'];
                        $n = $q . " - " . $class_name . " - " . $class_id; //unique_class_ID
                        $sql3 = "UPDATE $classes SET teacher_name='$q' WHERE id='$id'";
                        $sql4 = "UPDATE $classes SET unique_class_ID='$n' WHERE id='$id'";
                        $sql5 = "UPDATE $class_list SET class_key='$n' WHERE class_key='$class_key'";
                        if ($q != '' && mysqli_query($link, $sql3) && mysqli_query($link, $sql4) && mysqli_query($link, $sql5)){}
                        else {
                            echo "Error";
                            lines(2);
                        }
                    }//while
                } else {echo "No Classes assigned to this teacher";}//if mysql_num_rows //results >0
            } else {echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}//if $result//if$results
        }//else if
    } else {echo "Nothing submitted";}
} else if (isset ($token) && $token == 'addstudents'){
    //Add or edit a student
    if(isset($_POST['submit'])){
        if(isset($_POST['schoolNum']) and $_POST['schoolNum'] !='' && isset($_POST['gradeCode']) and $_POST['gradeCode'] !='' && isset($_POST['newSurname'])  and $_POST['newSurname'] !='' && isset($_POST['newFirstName']) and $_POST['newFirstName'] !=''){
            $school_num = $_POST['schoolNum'];
            $class_selected = $_POST['gradeCode'];
            $test = substr($class_selected,0,1);
            switch (substr($class_selected,0,1)){
                case 8:
                    $grade = substr($class_selected,0,1);
                    $grade_code = substr($class_selected,1);
                    break;
                case 9:
                    $grade = substr($class_selected,0,1);
                    $grade_code = substr($class_selected,1);
                    break;
                default:
                    $grade = substr($class_selected,0,2);
                    $grade_code = substr($class_selected,2);
                    break;
            }//switch
            $surname = $_POST['newSurname'];
            $first_name = $_POST['newFirstName'];
            $year = date('Y');
            if (isset($_POST['takesBus'])){
                $bus = $_POST['takesBus'];
                echo $bus;
                $sql = "INSERT INTO $persons (school_num, grade, reg_class, last_name, first_name, year_created, bus_info) VALUES ('$school_num','$grade','$grade_code','$surname','$first_name','$year','$bus')";
            } else {
                $sql = "INSERT INTO $persons (school_num, grade, reg_class, last_name, first_name, year_created) VALUES ('$school_num','$grade','$grade_code','$surname','$first_name','$year')";
            }
            mysqli_query($link, $sql);
            echo "<h1>Student added to database - don't forget to add them to their classes!</h1>";
        } else {echo "Not all required fields filled in";}
    } else {echo "Nothing submitted";}
}

backAdmin();

// Close connection
mysqli_close($link);

//Site footer
footer();
