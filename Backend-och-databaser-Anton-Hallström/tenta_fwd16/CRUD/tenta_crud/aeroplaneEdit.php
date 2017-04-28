<?php 
include_once("config.php");
session_start();
if(empty($_SESSION['email'])) {
   header("location:index.php");
}
echo "Welcome ".$_SESSION['name'];

    $id = $_GET['id']; 
    // FETCH all values from table where the SELECTED ID match the ID in table
    $sql = "SELECT * FROM aeroplane WHERE planeMakerID=:planeMakerID"; 
    $query = $conn->prepare($sql); 
    $query->execute(array(':planeMakerID' => $id)); 

while($row = $query->fetch()) { 
    // cache the values from table in variables
    $aeroplanename = $row['aeroplaneName'];
    $aeroplanetopspeed = $row['aeroplaneTopSpeed'];
    $aeroplanerange = $row['aeroplaneRange'];
    // FK_ in table
    $planemakerid = $row['planeMakerID'];   
}
?> 
<?php 
if(isset($_POST['update'])) { 
    $id = $_POST['id']; 
// Fetch POST Values to pass to UPDATE in table
    $aeroplanename = $_POST['aeroplanename'];
    $aeroplanetopspeed = $_POST['aeroplanetopspeed'];
    $aeroplanerange = $_POST['aeroplanerange'];
// FK_ in table
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
    $sql = "UPDATE aeroplane SET aeroplaneName=:aeroplanename, aeroplaneTopSpeed =:aeroplanetopspeed, aeroplaneRange =:aeroplanerange WHERE planeMakerID=:planemakerid";
 
    $query = $conn->prepare($sql); 

    $query->bindparam(':aeroplanename', $aeroplanename);
    $query->bindparam(':aeroplanetopspeed', $aeroplanetopspeed);
    $query->bindparam(':aeroplanerange', $aeroplanerange);
    $query->bindparam(':planemakerid', $planemakerid);

    $query->execute(); 
 
    header("Location: aeroplane.php"); 
  } 
}  
?> 
<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Edit</title> 
        <link rel="stylesheet" href="main.css"/>
    </head> 
        <body> 
            <a href="aeroplane.php">Back To Aeroplane List</a>
            <br/><br/> 

            <form name="form1" method="post" action="aeroplaneEdit.php"> 
                <table border="0"> 
                    <tr>
                        <td>Aeroplane</td> 
                        <td><input type="text" name="aeroplanename" value="<?php echo $aeroplanename;?>"/></td>
                    </tr>
                    <tr>
                        <td>Top Speed</td> 
                        <td><input type="text" name="aeroplanetopspeed" value="<?php echo $aeroplanetopspeed;?>"/></td>
                    </tr>
                    <tr>
                        <td>Range</td> 
                        <td><input type="text" name="aeroplanerange" value="<?php echo $aeroplanerange;?>"/></td>
                    </tr> 
                    <tr> 
                        <td>Plane Maker</td>
                        <!-- select the ID the ID to Match Table -->
                        <td><select name="planemakerid"> 
<?php 
    // To display ID to Edit
    $planeMakerSql = "SELECT * FROM plane_maker"; 
    $planeMakerQuery = $conn->prepare($planeMakerSql); 
    $planeMakerQuery->execute();

while($planemaker = $planeMakerQuery->fetch()) { 
    if ($planemaker['planeMakerID'] == $planemakerid) { 
        echo "<option value=\"{$planemaker['planeMakerID']}\" selected>{$planemaker['planeMakerName']}</option>"; 
    } else { 
        echo "<option value=\"{$planemaker['planeMakerID']}\">{$planemaker['planeMakerName']}</option>"; 
    } 
}   
?> 
                            </select></td> 
                    </tr> 
                    <tr>  
                        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?></td>
                        <td><button type="submit" name="update" >Update</button></td> 
                    </tr> 
                </table> 
            </form>
            <a  class="btn--danger" href="logout.php">Logout</a>
        </body>
</html>
 


