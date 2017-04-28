<?php
// including the database connection file
include_once("config.php");
 
// gett  ing id of the data from url
$id = $_GET['id'];
 
// deleting the row from table
$sql = "DELETE FROM aeroplane WHERE aeroplaneID=:aeroplaneID";
$query = $conn->prepare($sql);
$query->execute(array(':aeroplaneID' => $id)); 
  

header("Location:aeroplane.php");


