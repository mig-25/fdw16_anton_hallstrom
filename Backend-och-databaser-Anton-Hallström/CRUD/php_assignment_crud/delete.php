<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("config.php");
 
//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM books WHERE book_id =:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));

//redirecting to the display page (index.php in our case)
header("Location:index.php");
