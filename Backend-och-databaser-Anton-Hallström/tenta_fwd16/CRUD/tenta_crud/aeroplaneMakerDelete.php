<?php
// including the database connection file
include_once("config.php");
 
// getting id of the data from url
$id = $_GET['id'];
 
// deleting the row from table
$sql = "DELETE FROM plane_maker WHERE planeMakerID=:planeMakerID";
$query = $conn->prepare($sql);
$query->execute(array(':planeMakerID' => $id));
 
// redirecting to the display page (index.php in our case)
header("Location:aeroplaneMaker.php");

