 <?php
include 'config/config.php';
$name = $email = $age = $course = "" ;
$config = new Config();
$conn = $config->initDB();

// if ($conn != null) {
//   echo "Connected successfully!";
// }
// else {
//   echo "Connected not successfully!";

// }
     

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $age = $_POST['age'];
  $course = $_POST['course'];
 $res =  $config->insertData($name,$age,$course);
 echo "$res";  
 if($res){  

  echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Record Inserted Successfully....
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div></div>';

 }
 else {
  echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Failure!</strong> Record Insertion Failed....
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div></div>';

 }
}

?> 


</html>

 <!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
<div class = "mb-3 col-4 ps-5 pt-5">
  
<form method="post">

Name:  
    <input type="text" class="form-control" name="Name" placeholder="Enter your Name">
<br>
    Age:   
    <input type="number" class="form-control" name="age" placeholder="Enter your age"> <br>

    Course: <input type="text" class="form-control" name="age" placeholder="Enter your Course"> <br>
    <button type="button" class="btn btn-success" name ="submit">Success</button> 
 

</form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
 
</body>
</html>

