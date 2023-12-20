<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_teacher'])) {
    $t_name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $dst = "image/" . $image;
    $dst_db = "image/" . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $dst); 

    // Validate inputs
    if (empty($t_name) || empty($description) || empty($image)) {
        $_SESSION['validation_message'] = 'Please fill in all fields.';
    } else {
        $sql = "INSERT INTO teacher(name, image, description) VALUES('$t_name','$dst_db','$description')";

        $result = mysqli_query($data, $sql) or die(mysqli_error($data));

        if ($result) {
            $_SESSION['success_message'] = 'Teacher Added Successfully';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($data);
        }
    }
    // Redirect after processing the form
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Display validation and success messages
if (isset($_SESSION['validation_message'])) {
    echo "<script>alert('".$_SESSION['validation_message']."');</script>";
    unset($_SESSION['validation_message']); // Clear the session variable
}

if (isset($_SESSION['success_message'])) {
    echo "<script>alert('".$_SESSION['success_message']."');</script>";
    unset($_SESSION['success_message']); // Clear the session variable
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <link rel="stylesheet" href="form.css">

    <?php
    include 'admin_css.php';
    ?>

</head>

<body>

    <?php
    include 'admin_sidebar.php';
    ?>

    <div class="content">
        <center>

            <h1>Add Teacher</h1>

            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="name">Name : </label>
                        <input type="text" id="name" name="name" 
                        placeholder="Enter teacher name" required>
                    </div>
                    <br><br>
                    <div>
                        <label for="description">Description : </label>
                        <textarea type="text" id="description" name="description" placeholder="About teacher" required></textarea>
                    </div>
                    <div>
                        <label for="image">Image : </label>
                        <input type="file" id="image" name="image" required>
                    </div>
                    <br><br>
                    <div>
                        <input type="submit" value="ADD" class="btn btn-success" name="add_teacher">
                    </div>
                </form>
            </div>

        </center>
    </div>

</body>

</html>
