<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
//including the database connection file.
include_once("config.php");
// call s.p cache in result.
$result = $conn->query("call sp_show_all_books");

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>assignment_crud</title>
    </head>
    <link rel="stylesheet" href="main.css"/>
    <body>
   
       <div class="btn"><a class="btn--link" href="add_book.php">Add New Book</a></div><br/><br/>
      <table class="book-table"> 
          <tr><th class="book-table__title">Book List</th></tr> 
          
        <tr class="book-table__row">   
            <th>Title</th>   
            <th>Author</th>    
            <th>Pages</th>
            <th>Update</th>  
        </tr>  
        <?php
            // echo out the result to table
            while($row = $result->fetch()) {         
                echo "<tr>";
                echo "<td>".$row['booktitle']."</td>";
                echo "<td>".$row['fname']." ".$row['lname']."</td>";
                echo "<td>".$row['bookpages']."</td>";
                echo "<td><a class='btn--link btn--edit' href=\"edit.php?id=$row[book_id]\">Edit</a>  " 
                      . " <a class='btn--link btn--warning' href=\"delete.php?id=$row[book_id]\" "
                      . "onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";   
                }  
        ?>   
       </table> 
    </body>
</html>
