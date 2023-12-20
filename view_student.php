<?php

error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
elseif ($_SESSION['usertype']=='student') {
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * from user WHERE usertype= 'student'";
$result = mysqli_query($data, $sql) or die(mysqli_error()); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

            <h1>View Student</h1>

            <?php
            if ( $_SESSION['message']) {
                echo '<p style="color: red;">' . $_SESSION['message'] . '</p>';
            }
            unset( $_SESSION['message']);
            ?>

            <table>

                <tr>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Password</th>
                    <th>Delete Student</th>
                    <th>Update Student</th>
                </tr>

                <?php
                while ($info = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo '<td>' . $info['username'] . '</td>';
                    echo '<td>' . $info['phone'] . '</td>';
                    echo '<td>' . $info['email'] . '</td>';
                    echo '<td>' . $info['course'] . '</td>';
                    echo '<td>' . $info['password'] . '</td>';

                    echo '<td>';
                    echo '<form action="delete.php" method="GET" onsubmit="return confirmDelete(\'' . $info['username'] . '\');">';
                    echo '<input type="hidden" name="student_id" value="' . $info['id'] . '">';
                    echo '<button type="submit" class="btn btn-danger" name="delete_student">DELETE</button>';
                    echo '</form>';
                    echo '</td>';


                    echo '<td>';
                    echo "<form action='update_student.php?student_id={$info['id']}' method='GET'>";
                    echo '<input type="hidden" name="student_id" value="' . $info['id'] . '">';
                    echo '<button type="submit" class="btn btn-success" >UPDATE</button>';
                    echo '</form>';
                    echo '</td>';




                    echo "</tr>";
                }
                ?>
            
            </table>
        </center>
    </div>
    
    <script src="scripts.js"></script>
    
</body>

</html>