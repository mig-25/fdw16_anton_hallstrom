<?php
include_once("config.php");
session_start();
if(empty($_SESSION['email'])) {
    header("location:index.php");
}
echo "Welcome ".$_SESSION['name'];
  
    $id = $_GET['id'];
    // FETCH all values from table where the SELECTED ID match the ID in table
    $sql = "SELECT * FROM plane_maker WHERE planeMakerID=:planeMakerID";
    $query = $conn->prepare($sql);
    $query->execute(array(':planeMakerID' => $id));
    
while($row = $query->fetch()) {
    // cache the values from table in variables
    $planeMakername = $row['planeMakerName'];
    // PK_ in table
    $planemakerid = $row['planeMakerID'];
}
/* MIGHT NOT NEED THIS CALL */
$planeMakerSql = "SELECT * FROM plane_maker";
$planeMakerQuery = $conn->prepare($planeMakerSql);
$planeMakerQuery->execute();

?>
<?php
if(isset($_POST['update'])) {
    
    $id = $_POST['id'];
    $planeMakername = $_POST['planeMakername'];

if(empty($planeMakername)) {
    echo "<font color='red'>Plane Maker Name field is empty.</font><br/>";
} else {
    // UPDATE TABLE, Bind the SELECTED ID, and Table value to UPDATE
    $sql = "UPDATE plane_maker SET planeMakerName =:planeMakerName WHERE planeMakerID=:planeMakerID";

    $query = $conn->prepare($sql);

    $query->bindparam(':planeMakerName', $planeMakername);
    $query->bindparam(':planeMakerID', $id);

    $query->execute();

    header("Location: aeroplaneMaker.php");
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
        <a href="aeroplaneMaker.php">Back To Plane Makers</a>
        <br/><br/>
 
        <form name="form1" method="post" action="aeroplaneMakerEdit.php">
            <table border="0">
                <!-- HEADER TITLES of VALUES-->
                <tr>
                    <td>Plane Makers</td>
                    <td><input type="text" name="planeMakername" value="<?php echo $planeMakername;?>"/></td>
                </tr>
                <!-- SUBMIT UPDATE, AND THE Where is the ID-->
                <tr>  
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?></td>
                    <td><button type="submit" name="update">Update</button></td>
                </tr>
            </table> 
        </form>  
        <a class="btn--danger" href="logout.php">Logout</a> 
   </body>
</html>



