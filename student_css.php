<link rel="stylesheet" href="admin.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php
$studentPhotos = [
    'student.png',
    'shadow_student.png',
    'green_stick_logo.png',
    'golden_student.png',
];
$randomPhoto = $studentPhotos[array_rand($studentPhotos)];
?>

<style>
    h1 {
        margin-top:0%; 
        margin-bottom:5%;
    }
    .default-student-photo {
    background-image: url('image/<?php echo $randomPhoto; ?>');
    background-size: cover;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 15px;
    }
</style>