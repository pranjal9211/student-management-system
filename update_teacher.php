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

$id=$_GET['teacher_id'];
$sql="SELECT * FROM teacher WHERE id='$id'";

$result = mysqli_query($data, $sql) or die(mysqli_error($data));

while($row=mysqli_fetch_assoc($result)){
    $name = $row["name"];
    $description = $row["description"];
    $image = $row["image"];
}

if (isset($_POST['update'])) {
    $name=$_POST['name'];
    $description=$_POST['description'];
    $new_image = $_FILES['new_image']['name'];
    $dst = "image/" . $new_image;
    $dst_db = "image/" . $new_image;
    move_uploaded_file($_FILES["new_image"]["tmp_name"], $dst); 

    
    // Validate inputs
    if (empty($name) || empty($description)) {
        echo "<script>alert('Please fill in all fields.');</script>";
    } else {
        $query = "UPDATE teacher SET name='$name', description='$description', image='$dst_db' WHERE id='$id'";

    $result2 = mysqli_query($data, $query);
        if (!$result2) {
            echo "Error in updating data: " . mysqli_error($data);
        } else {
            echo "<script>alert('Data updated successfully');</script>";
            echo '<script>window.location.href = "view_teacher.php";</script>'; // Redirect using JavaScript
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
    <title>Teacher update</title>

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
            <h1>Update Student</h1>

            <div class="div_deg"> 
                <form action="#" method="POST" enctype="multipart/form-data">

                <div>
                    <label for="name">Name : </label>
                    <input type="text" placeholder="Enter Your Name"  name="name" value="<?php echo $name; ?>" required />
                </div>
                <div>
                    <label for="description">Description : </label>
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>
                    <!-- <input type="text" id="description" name="description" placeholder="Enter Your Description" 
                    value="<?php echo $description; ?>" required/> -->
                </div>
                <div>
                    <label for="image">Current Image: </label>
                    <img src='<?php echo $image; ?>' alt="teacher_image" width="250px">
                </div>
                <br>
                <div>
                   <label for="new_image">New Image: </label>
                   <input type="file" id="new_image" name="new_image">
                </div>
                <br><br>
                <div>
                    <input type="submit" name="update" value="UPDATE TEACHER" class="btn btn-success">
                </div>
            </div>

        </center>
    </div>

</body>

</html>