<?php
include 'config/config.php';

$name = $email = $age = $course = "" ;
$config = new Config();
$conn = $config->initDB();

if ($conn != null) {
    echo "Connected successfully!";
} else {
    echo "Connection failed!";
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $res = $config->insertData($name, $age, $course);

    if ($res) {
        echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Inserted Successfully....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
        header("Location: process.php");
    } else {
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> Record Insertion Failed....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="mb-3 col-4 ps-5 pt-5">
    <form method="post" action="">
        Name:  
        <input type="text" class="form-control" name="name" placeholder="Enter your Name"><br>

        Age:   
        <input type="number" class="form-control" name="age" placeholder="Enter your age"><br>

        Course: 
        <input type="text" class="form-control" name="course" placeholder="Enter your Course"><br>

        <button type="submit" class="btn btn-success" name="submit">Submit</button> 
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
