<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_GET['student_id'])) {

    $user_id = $_GET['student_id'];

    // Fetch the user's data before deletion
    $select_sql = "SELECT username FROM user WHERE id='$user_id'";
    $select_result = mysqli_query($data, $select_sql);
    $user_data = mysqli_fetch_assoc($select_result);

    // Perform deletion
    $delete_sql = "DELETE FROM user WHERE id='$user_id'";
    $result = mysqli_query($data, $delete_sql);

    if ($result) {
        $_SESSION['message'] = $user_data['username'] . " deleted successfully";
        header("location: view_student.php");
        exit();
    } else {
        $_SESSION['message'] = "Error deleting student: " . mysqli_error($data);
        // Handle or log the error as needed
    }
}

elseif (isset($_GET['teacher_id'])) {

    $teach_id = $_GET['teacher_id'];

    // Fetch the user's data before deletion
    $select_sql = "SELECT name FROM teacher WHERE id='$teach_id'";
    $select_result = mysqli_query($data, $select_sql);
    $user_data = mysqli_fetch_assoc($select_result);

    // Perform deletion
    $delete_sql = "DELETE FROM teacher WHERE id='$teach_id'";
    $result = mysqli_query($data, $delete_sql);

    if ($result) {
        $_SESSION['message'] = $user_data['name'] . " deleted successfully";
        header("location: view_teacher.php");
        exit();
    } else {
        $_SESSION['message'] = "Error deleting teacher: " . mysqli_error($data);
        // Handle or log the error as needed
    }
    
}

elseif (isset($_GET['course_id'])) {

    $id = $_GET['course_id'];

    // Fetch the user's data before deletion
    $select_sql = "SELECT name FROM course WHERE id='$id'";
    $select_result = mysqli_query($data, $select_sql);
    $user_data = mysqli_fetch_assoc($select_result);

    // Perform deletion
    $delete_sql = "DELETE FROM course WHERE id='$id'";
    $result = mysqli_query($data, $delete_sql);

    if ($result) {
        $_SESSION['message'] = $user_data['name'] . " deleted successfully";
        header("location: view_course.php");
        exit();
    } else {
        $_SESSION['message'] = "Error deleting course: " . mysqli_error($data);
        // Handle or log the error as needed
    }
    
}

elseif (isset($_GET['admission_delete'])) {

    // Handle the deletion of admission data
    $deleteQuery = "DELETE FROM admission";
    $deleteResult = mysqli_query($data, $deleteQuery);

    if ($deleteResult) {
        $_SESSION['message'] = "All admission data deleted successfully";
        header("location: admission.php");
        exit();
    } else {
        $_SESSION['message'] = "Error deleting admission data: " . mysqli_error($data);
        // Handle or log the error as needed
    }
}

else {
    // Handle the case when neither student_id nor teacher_id is set
    $_SESSION['message'] = "Invalid request";
    // You may choose to redirect or handle the error in another way
}

?>
