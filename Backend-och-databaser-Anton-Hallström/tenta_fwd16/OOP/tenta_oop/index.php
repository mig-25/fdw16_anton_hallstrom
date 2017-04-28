<!DOCTYPE html>
<!-- NOTE! Make sure that the constructor props
     match the order in extended classes
     NOTE! Check for errors on lines -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>tenta_oop</title> 
    </head>
    <body> 
        <?php 
        /* Placeholders for new object s */
        $Interceptor1;   
        $Bomber1;
        
        /* Requires the subClasses and the abstract Class */
        require_once ("subClasses.php");
       
         
        /* Creating new Instanses of Classes */
        /* Applying values to the subClass */
        /* Calling the method, and printing it out */
        $Interceptor1 = new Interceptor(1000, 300, 30000, 24);
        echo "<h4>". " => Interceptor <=" . "</h4>"; 
        echo "CONSTANT => "."<b>".$Interceptor1::CONSTANT."</b>";
        echo "<br><br>";
        echo "PRIVATE STATIC => "."<b>".$Interceptor1->getVariable()."</b>";
        echo  "<br>";
        print_r($Interceptor1->reFuel());

        echo "<pre>". print_r($Interceptor1, TRUE)."</pre>";
        /* echo $Interceptor1->setVariable("New msg");
        echo "SET PRIVATE STATIC => ".$Interceptor1->getVariable(); */
        echo "<br>=====================================================";
        /* Creating new Instanses of Classes */
        /* Applying values to the subClass */
        /* Calling the method, and printing it out */ 
        $Bomber1 = new Bomber(1000, 300, 30000, 12);
        echo "<h4>". "=> Bomber1 <= " . "</h4>"; 
        echo "CONSTANT => "."<b>".$Bomber1::CONSTANT."</b>";
        echo "<br><br>";
        echo "PRIVATE STATIC => "."<b>".$Bomber1->getVariable()."</b>";
        echo  "<br>";
        print_r($Interceptor1->reFuel());
        echo "<pre>". print_r($Bomber1, TRUE)."</pre>";
        
      /*echo $Bomber1->setVariable("New msg");
        echo "SET PRIVATE STATIC => ".$Bomber1->getVariable(); */
        ?>  
    </body>
</html>
