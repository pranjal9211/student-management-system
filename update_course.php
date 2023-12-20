<?php

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

$id=$_GET['course_id'];
$sql="SELECT * FROM course WHERE id='$id'";

$result = mysqli_query($data, $sql) or die(mysqli_error($data));    

while($row=mysqli_fetch_assoc($result)){
    $name = $row["name"];
    $about = $row["about"];
    $image = $row["image"];
}

if (isset($_POST['update'])) {
    $name=$_POST['name'];
    $about=$_POST['about'];
    $new_image = $_FILES['new_image']['name'];
    $dst = "image/" . $new_image;
    $dst_db = "image/" . $new_image;
    move_uploaded_file($_FILES["new_image"]["tmp_name"], $dst); 

    
    // Validate inputs
    if (empty($name) || empty($about)) {
        echo "<script>alert('Please fill in all fields.');</script>";
    } else {
        $query = "UPDATE course SET name='$name', about='$about', image='$dst_db' WHERE id='$id'";

    $result2 = mysqli_query($data, $query);
        if (!$result2) {
            echo "Error in updating data: " . mysqli_error($data);
        } else {
            echo "<script>alert('Data updated successfully');</script>";
            echo '<script>window.location.href = "view_course.php";</script>'; // Redirect using JavaScript
            echo '<meta http-equiv="refresh" content="0">'; // refresh the page after 1 second.
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course update</title>

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
            <h1>Update Course</h1>

            <div class="div_deg"> 
                <form action="#" method="POST" enctype="multipart/form-data">

                <div>
                    <label for="name">Name : </label>
                    <input type="text" placeholder="Enter Your Name"  name="name" value="<?php echo $name; ?>" required />
                </div>
                <div>
                    <label for="about">about : </label>
                    <textarea name="about" id="about" cols="30" rows="10"><?php echo $about; ?></textarea>
                </div>
                <div>
                    <label for="image">Current Image: </label>
                    <img src='<?php echo $image; ?>' alt="course_image" width="250px">
                </div>
                <br>
                <div>
                   <label for="new_image">New Image: </label>
                   <input type="file" id="new_image" name="new_image">
                </div>
                <br><br>
                <div>
                    <input type="submit" name="update" value="UPDATE course" class="btn btn-success">
                </div>
            </div>

        </center>
    </div>

</body>

</html>