<?php
/* Requires abstract Class, interface, with matching trait */
require_once ("abstractClass.php");
require_once ("interface.php");
require_once ("trait.php"); 

/* Create a class that extends abstract class which implements a interface  */
/* using the trait matching the interface with the use TexampleTraitName.   */
/* Setting a public attribute to the class and using the magic constructor  */
/* to set up some values, and also using the parent::__construct to access  */
/* it's the extended abstract classes values                                */
  
class Interceptor extends Aircraft implements Itexaco  {
   
    use TreFuel;
     
    public $missiles;
    
    
    public function __construct($mis, $spe, $ran, $pay) {
         
        $this->missiles = $mis;
        
       
        parent::__construct($spe, $ran, $pay);
    }   
} 

class Bomber extends Aircraft implements Itexaco  {
   
    use TreFuel;
    
    public $bombs;
    
    
    public function __construct($mis, $spe, $ran, $pay) {
         
        $this->bombs = $mis;
        
        
        parent::__construct($spe, $ran, $pay);
    }
} 


