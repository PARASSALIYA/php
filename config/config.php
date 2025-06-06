<?php

class Config {
  private $HOST = "localhost";
  private $USERNAME = "root";
  private $PASSWORD = "";
  private $DB_NAME = "php";
  public $conn;
  
  public function initDB()
  {
    $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD,$this->DB_NAME);
    return $this->conn;
  }

  public function insertData($name, $age, $course) {
    $conn = $this->initDB();
    $query = "INSERT INTO student (name, age, course) VALUES ('$name', '$age', '$course')";
    return mysqli_query($conn, $query);
  } 
  public function fetchData()
  {
    $this->initDB();
    $query = "SELECT * FROM student";
    return mysqli_query($this->conn,$query);
  }
  public function deleteData($id)
  {
      $this->initDB();
      $query = "DELETE FROM student WHERE id=$id";
    return  mysqli_query($this->conn, $query);
  } 
  public function updateData($id, $name, $age, $course)  
  {
    $this->initDB();
    $query = "UPDATE student SET name='$name', age=$age, course='$course' WHERE id=$id";
    return mysqli_query($this->conn, $query);
  }
  public function fetchSingleData($id)
  {
    $this->initDB();
    $query = "SELECT * FROM student WHERE id=$id";
    return mysqli_query($this->conn,$query);
  }
  
}
?>
