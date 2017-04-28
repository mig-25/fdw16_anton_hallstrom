<?php

include_once("config.php");

session_start();
            
if(empty($_SESSION['email'])) {
    header("location:index.php");
}

echo "Welcome ".$_SESSION['name'];
 
/* IF POST IS SUBMITED */

if(isset($_POST['Submit'])) { 
    /* Valvues to be submitted */
    $aeroplanename = $_POST['aeroplanename'];
    $aeroplanetopspeed = $_POST['aeroplanetopspeed'];
    $aeroplanerange = $_POST['aeroplanerange'];
    $planemakerid = $_POST['planemakerid'];
       
    
if(empty($aeroplanename) || empty($planemakerid) || empty($aeroplanetopspeed) || empty($aeroplanerange)) {
                
        if(empty($aeroplanename)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($planemakerid)) {
            echo "<font color='red'>Maker field is empty.</font><br/>";
        }
        
        if(empty($aeroplanetopspeed)) {
            echo "<font color='red'>Topspeed field is empty.</font><br/>";
        }
        
        if(empty($aeroplanerange)) {
            echo "<font color='red'>Range field is empty.</font><br/>";
        }
        } else {         
        $sql = "INSERT INTO aeroplane (aeroplaneName, aeroplaneTopSpeed, aeroplaneRange, planeMakerID) "
                . "VALUES(:aeroplanename, :aeroplanetopspeed, :aeroplanerange, :planemakerid)";
        $query = $conn->prepare($sql);
                
        $query->bindparam(':aeroplanename', $aeroplanename);
        $query->bindparam(':aeroplanetopspeed', $aeroplanetopspeed);
        $query->bindparam(':aeroplanerange', $aeroplanerange);
        $query->bindparam(':planemakerid', $planemakerid);
        $query->execute();


        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='aeroplane.php'>View Result</a>";
    }
}       
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Aeroplane List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css"/>
    </head>
    <body>
        <a href="aeroplane.php">Back to Aeroplane List</a>
         
    <br/><br/>

    <form action="aeroplaneAdd.php" method="post" name="form1">
        <table width="25%" border="0">
            <!-- HEADER name= is the POST -->
            <tr> 
                <th>Aeroplane</th>              
                <td><input type="text" name="aeroplanename"  /></td>
            </tr>
            <tr>
                <th>Top Speed</th>             
                <td><input type="text" name="aeroplanetopspeed" /></td>
            </tr>
            <tr>
                <th>Range</th>             
                <td><input type="text" name="aeroplanerange" /></td>
            </tr>
            
             <!-- HEADER of ID to Select -->
            <tr> 
                <th>Plane Maker</th>  
            <td>
                <select name="planemakerid"> 
<?php
     // Fills the options with the IDs to the select menu
    $planeMakerSql = "SELECT * FROM plane_maker"; 
    $planeMakerQuery = $conn->prepare($planeMakerSql); 
    $planeMakerQuery->execute();  
    
    while($planemaker = $planeMakerQuery->fetch()) { 
        if ($planemaker['planeMakerID'] == $ownerid) { 
           /* Match ID in categories table, to display the data in select dropbox */ 
          echo "<option value=\"{$planemaker['planeMakerID']}\" selected>{$planemaker['planeMakerName']}</option>"; 
           
        } else {  
          /* Match ID in categories table, to display the data in select dropbox */
          echo "<option value=\"{$planemaker['planeMakerID']}\">{$planemaker['planeMakerName']}</option>"; 
    }  
} 
?>  
                </select> 
            </td> 
        </tr> 
        <tr>
            <td></td><td><button type="submit" name="Submit">Submit</button></td>
        </tr>
        </table> 
    </form>
        <a class="btn--danger" href="logout.php">Logout</a>
    </body>
</html> 

