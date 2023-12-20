<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// session_destroy();
if (isset($_SESSION['message'])) {
    $message=$_SESSION['message'];
    echo"<script> alert('$message') </script>";
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * from teacher";
$result = mysqli_query($data, $sql) or die(mysqli_error()); 
// mysqli_close($data);

$sql2="SELECT * from course";
$result2 = mysqli_query($data, $sql2) or die(mysqli_error()); 
mysqli_close($data);


// $mainPhotos = [
//     'school_management.jpg',
//     'school_management1.jpg',
//     'school_management2.jpg',
//     'school_management3.jpg',
//     'school_management4.jpg',
//     'school_management5.jpg',
//     'school_management6.jpg',
//     'school_management7.jpg',
//     'school_management8.jpg',
//     'school_management9.jpg',
// ];
// $randomPhoto = $mainPhotos[array_rand($mainPhotos)];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head> 

<body>

    <div id="preloader">
        <div class="load_container">
            <div class="loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <nav>
        <label class="logo" for="SMS-nav">NULL college</label>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="mailto:pranjalmodanwal9211@gmail.com"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#admis">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>


    <div class="section1">
        <label class="img_text">We Teach students with care</label>
        <!-- <img class="main_img" src="project_Image/<?php echo $randomPhoto; ?>" alt="school"> -->
        <img class="main_img" src="https://source.unsplash.com/1600x300/?lecture" alt="school">
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- <img class="welcome_img" src="project_Image\school3.jpg" alt="school" srcset=""> -->
                <img class="welcome_img" src="https://source.unsplash.com/600x400/?school" alt="school" srcset="">
            </div>
            <div class="col-md-8">
                <h1>Welcome to NULL</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis illum expedita alias et dolorum
                    modi sapiente corrupti, libero nesciunt consequuntur perspiciatis aspernatur harum maiores eos
                    impedit, voluptatem ratione dignissimos minus tempora doloribus sequi dolor eveniet molestias. Eaque
                    consequuntur ullam sequi, in itaque modi a ipsam beatae eligendi esse atque corrupti! Repudiandae
                    officiis quos esse ut inventore distinctio, maiores consequuntur! Repudiandae alias eveniet quisquam
                    facere tempora nemo pariatur omnis ab ad sint sunt aliquid, possimus aperiam atque repellat soluta
                    libero autem, in quos voluptate neque tenetur ipsa. Vero vel consequatur eius est hic ratione quia
                    eaque pariatur, explicabo unde dignissimos ad!</p>
            </div>
        </div>
    </div>

    <div class="container">
        <center>
            <h1>Our Teachers</h1>
            <br>
        </center>
        <div class="row">

        <?php
        while($info=mysqli_fetch_assoc($result)){
            $name = $info["name"];
            $description = $info["description"];
            $image = $info["image"];
        ?>

        <div class="col-md-4 d-flex flex-column align-items-center">
            <img class="teacher_img" src="<?php echo $image ?>" alt="teacher" srcset="">
            <h4><?php echo $name ?></h4>
            <p class="justified-text"><?php echo $description ?></p>
        </div>

        <?php
        }
        ?>

        </div>
    </div>


    <div class="container">
        <center>
            <h1>Our Courses</h1>
            <br>
        </center>
        <div class="row">
            
        <?php
        while($info=mysqli_fetch_assoc($result2)){
            $name = $info["name"];
            $about = $info["about"];
            $image = $info["image"];
        ?>

        <div class="col-md-4 d-flex flex-column align-items-center">
            <img class="course_img" src="<?php echo $image ?>" alt="course" srcset="">
            <h4><?php echo $name ?></h4>
            <p><?php echo $about ?></p>
        </div>

        <?php
        }
        ?>        
        
        </div>
    </div>


    <center>
        <h1 class="adm" id="admis">Admission Form</h1>
    </center>
    <div align="center" class="amission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label for="name" class="label_text">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name" class="input_design">
            </div>
            <div class="adm_int">
                <label for="email" class="label_text">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Enter Your E-mail" class="input_design">
            </div>
            <div class="adm_int">
                <label for="phone" class="label_text">Phone</label>
                <input type="tel" name="phone" id="phone" placeholder="Enter Phone Number" class="input_design">
            </div>
            <div class="adm_int">
                <label for="message" class="label_text">Message</label>
                <textarea name="message" id="message" class="input_txt"></textarea>
            </div>
            <div class="adm_int">
                <button type="submit" class="btn btn-primary" id="submit" name="apply">Apply</button>
            </div>
        </form>
    </div>


    <footer>
        <h2 class="footer_txt">Copyright &copy; Creative. All rights reserved</h2>
    </footer>

    <script src="scripts.js"></script>

</body>

</html>