<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='admin') {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student home</title>

    <?php
    include 'student_css.php';
    ?>

</head>

<body>

    <?php
    include'student_sidebar.php';
    ?>

<div class="content">
    <div class="container-fluid">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

        <div class="default-student-photo"></div>
        
        <!-- Add your student dashboard content here -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Your Student Dashboard
                    </div>
                    <div class="card-body">
                        <!-- Add your content here -->
                        <p>This is the student dashboard content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>