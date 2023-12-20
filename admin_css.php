<link rel="stylesheet" href="admin.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<?php
$adminPhotos = [
    'admi.png',
    'shadow_red_bg.png',
    'green_stick_logo.png',
];
$randomPhoto = $adminPhotos[array_rand($adminPhotos)];
?>

<style>
    h1 {
        margin-top:0%; 
        margin-bottom:5%;
    }
    table{
        width: 70%;
        border: 1px solid black;
    }
    th {
        border: 1px solid black;
        padding: 20px;
        font-size: 15px;
        font-weight: bold;
    }
    td {
        padding: 20px;
        border: 1px solid black;
    }

    /* Add custom CSS for button positioning */
    .button-container {
    display: flex;
    justify-content: center;
    margin: 0px 0px 10px 0px; /* Adjust the margin as needed */
    }
    
    #printButton {
        margin-right: 10px; /* Adjust the margin as needed */
    }

    .default-admin-photo {
    background-image: url('image/<?php echo $randomPhoto; ?>');
    background-size: cover;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 15px;
    }

</style>