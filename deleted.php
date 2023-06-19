<?php
require_once "connection.php";

$connection = new mysqli($servername, $username, $password, $dbname);
// // Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

// $mysqli = new mysqli($servername, $username, $password, $dbname);
// // // Check connection
// if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// } 

// Creating the connection by specifying the connection details
$connection = mysqli_connect($servername, $username, $password, $dbname);

//delete all records
$query = "TRUNCATE table testing";


if (mysqli_multi_query($connection, $query)) {
  header('Location:http://localhost/Website%20Irigasi%20Tetes/sistem-irigasi/log.php');

} else {
  echo "Error:" . mysqli_error($connection);
}
//close the connection
mysqli_close($connection);

?>