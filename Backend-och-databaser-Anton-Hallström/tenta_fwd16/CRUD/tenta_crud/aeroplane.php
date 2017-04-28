 <?php
    include_once("config.php");
     
    session_start();
    
    if(empty($_SESSION['email'])) {
        header("location:index.php");
    }
    
    echo "Welcome ".$_SESSION['name']; 
    /* Call our store procedure */
    $result = $conn->query("call sp_aeroplane");
?>
<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tenta App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <!-- Links to VIEWS -->
        <a href="aeroplaneAdd.php">Add Aeroplane</a><br/><br/>
        <a href="aeroplaneMaker.php">Plane Makers</a><br/><br/>
 
    <table width='100%' border=0>
    <!-- HEADERS -->
    <tr bgcolor='#CCCCCC'>
        <td>Maker Name</td>
        <td>Aeroplane</td>
        <td>Top Speed</td>
        <td>Range</td>
        <td>Update</td>
    </tr>
    <?php
    /* FETCH CONTENT, shall correspond to HEADERS */
    while($row = $result->fetch()) {         
        echo "<tr>"; 
        echo "<td>".$row['planeMakerName']."</td>";
        echo "<td>".$row['aeroplaneName']."</td>";
        echo "<td>".$row['aeroplaneTopSpeed']."</td>";
        echo "<td>".$row['aeroplaneRange']."</td>";
        echo "<td><a  href=\"aeroplaneEdit.php?id=$row[aeroplaneID]\">Edit</a>  <a class='btn--danger' href=\"aeroplaneDelete.php?id=$row[aeroplaneID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
           
    }
    ?>
    <a class="btn--danger" href="logout.php">Logout</a>
    </table>
    </body>
</html>
