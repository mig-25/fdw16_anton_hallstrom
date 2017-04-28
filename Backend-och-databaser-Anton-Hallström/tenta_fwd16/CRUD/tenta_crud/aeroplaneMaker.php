<!DOCTYPE html>
 <?php
        include_once("config.php");
        
        session_start();
         
        if(empty($_SESSION['email'])) {
            header("location:index.php");
        }
 
        echo "Welcome ".$_SESSION['name']; 
         /* Call our store procedure */
        $result = $conn->query("call sp_plane_maker");
?>  
<html> 
    <head>
        <meta charset="UTF-8">
        <title>Aeroplane App</title>
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <!-- LINKS TO pages -->
        <a href="aeroplaneMakerAdd.php">Add Plane Maker</a><br/><br/>
        <a href="aeroplane.php">Aeroplane</a><br/><br/>
 
    <table width='100%' border=0>
     <!-- HEADERS to match Fetch Result -->
    <tr bgcolor='#CCCCCC'>
        <td>Plane Maker Name</td>
        <td>Update</td>
    </tr> 
    <?php 
     // Display result to Match Headers from row match name
    while($row = $result->fetch()) {         
        echo "<tr>";
        echo "<td>".$row['planeMakerName']."</td>";
         // NOTE! CHANGE href paths to match *.php
        echo "<td><a href=\"aeroplaneMakerEdit.php?id=$row[planeMakerID]\">Edit</a>  <a class='btn--danger' href=\"aeroplaneMakerDelete.php?id=$row[planeMakerID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    } 
    ?> 
    <a class="btn--danger" href="logout.php">Logout</a> 
    </table>  
    </body>
</html>