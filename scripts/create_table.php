<?php
include('connect.php');
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

include('tables.php');

// Create table
$sql = "CREATE TABLE $table(
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    pid VARCHAR(20),
    fname TEXT,
    lname TEXT,
    dob TEXT,
    phone TEXT,
    emplyee_num INT(5),
    age INT(3)
)";

// Execute query
if (mysqli_query($con,$sql)) {
  echo "Table $table created successfully";
} else {
  echo "Error creating $table: " . mysqli_error($con);
}
?>
