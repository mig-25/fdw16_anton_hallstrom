<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        echo "<h3>Assignment 02</h3>";
        
        require_once ("bank.php");
        require_once ("base.php");
        
        // instaniering av 
      
         
         // Call store procedure
        $sql = "CALL account('Sohail')";
        
        $result = $conn->query($sql); 
            
        if ($result->rowCount()) {
   
        $result->setFetchMode(PDO::FETCH_CLASS, "bank");
    
        while($row = $result->fetch()) {
        
        echo $row->collector, '<br>';
       
   
    }
    
    } else {
         echo "Nothing to fetch";
     }
        ?>
    </body>
</html>
