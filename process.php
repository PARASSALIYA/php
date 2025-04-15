<?php
$name = $email = $age = $course = "" ;
$nameErr = $emailErr = "";
include 'config/config.php';

$config = new Config();

$res = $config->fetchData();

// delete
if (isset($_POST['delete_id'])) {
    
    $id = $_POST['deleteId'];
    
    $deleteres = $config->deleteData($id);
    
    if ($deleteres) {
        $res = $config->fetchData();
        echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Deleted Successfully....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
     } else {
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> Record Deletion Failed....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
    }
}
// Edit
if (isset($_POST['edit_id'])) {
    
    $id = $_POST['editId'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
        
    $editres = $config->updateData($id,$name,$age,$course);
    
    if ($editres) {

        $res = $config->fetchData();
    
     } else {
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> Record Deletion Failed....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<div class = "container pt-5 col-4 ">
    <table class="table table-hover table-dark  table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Course</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($result = mysqli_fetch_assoc($res)) { ?>
                    <tr> 
                        <td><?php echo $result['id']?></td>
                        <td><?php echo $result['name']?></td>
                        <td><?php echo $result['age']?></td>
                        <td><?php echo $result['course']?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" value = "<?php echo $result['id'] ?>" name="editId">     
                                <button type="submit" class="btn btn-warning" name="edit_id">Edit</button>
                            </form>
                        </td>    
                          <td>
                              <form method="POST">    
                                  <input type="hidden" value="<?php echo $result['id'] ?>" name="deleteId">     
                                  <button type="submit" class="btn btn-danger" name="delete_id">DELETE</button>
                                </form>
                            </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
 
</body>
</html>