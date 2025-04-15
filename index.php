<?php
include 'config/config.php';

$name = $email = $age = $course = "" ;
$config = new Config();
$conn = $config->initDB();

$fetch_data = $config->fetchData();
// insert Data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $res = $config->insertData($name, $age, $course);
    $fetch_data = $config->fetchData();
    if ($res) {
        echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Inserted Successfully....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
        $fetch_data = $config->fetchData();
        // header("Location: process.php");
    } else {
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> Record Insertion Failed....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
    }
 }
$fetch_data = $config->fetchData();

// delete Data
if (isset($_POST['delete_id'])) {
    
    $id = $_POST['deleteId'];
    
    $deleteres = $config->deleteData($id);
    
    if ($deleteres) {
        echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Deleted Successfully....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
        $fetch_data = $config->fetchData();
     } else {
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> Record Deletion Failed....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>';
    }
}
// Edit Data


$edit_data = null;

if(isset($_POST['edit_id']))
{
    $edit_id = $_POST['editId'];

    $res = $config->fetchSingleData($edit_id);

   $edit_data =  mysqli_fetch_assoc($res);
}

if (isset($_POST['update'])) {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
        
    $editres = $config->updateData($id,$name,$age,$course);
    
    if ($editres) {

        $fetch_data = $config->fetchData();
    
     } else {
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> Record Deletion Failed....
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
    <form method="post">
    <input type="hidden" name="id" value="<?php if($edit_data != null) { echo $edit_data['id'];}?>">
        Name:  
        <input type="text" class="form-control" name="name" placeholder="Enter your Name" value = "<?php if($edit_data != null){echo $edit_data['name'];} ?>" required><br>

        Age:   
        <input type="number" class="form-control" name="age" placeholder="Enter your age" value = "<?php if($edit_data != null){echo $edit_data['age'];} ?>" required><br>

        Course: 
        <input type="text" class="form-control" name="course" placeholder="Enter your Course" value = "<?php if($edit_data != null){echo $edit_data['course'];} ?>" required><br>
        <button  class="btn <?php if($edit_data==null) { echo "btn-primary";} else { echo "btn-warning";}?>" name="<?php if($edit_data==null) { echo "submit";} else { echo "update";}?>">
                    <?php if($edit_data==null) {?>Add Data<?php }else {?>Update Data<?php }?>
                </button>
    </form>
</div>
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
        <?php while ($result = mysqli_fetch_assoc($fetch_data)) { ?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
