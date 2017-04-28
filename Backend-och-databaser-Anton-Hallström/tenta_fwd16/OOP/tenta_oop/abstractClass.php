<?php

/* creating a abstract class */
/* with a constructor passing the protected properties */

abstract class Aircraft {
        
    const CONSTANT = "Refueling charter";
    public static $pubstaticvariable = "example public static";
    private static $staticvariable = "WARNING!!! Boogie 9 oclock, Angels 5";
    
    protected $speed; 
    protected $range;
    protected $payload;
    
    
    
    public function getVariable() {
        
        return self::$staticvariable;
        
    }
    
    public function setVariable($value){
        
        self::$staticvariable = $value;
        
    }
     
    public function __construct($spe, $ran, $pay) {
       
        $this->speed = $spe;
        $this->range = $ran;
        $this->payload = $pay;
        
        
   }
   
}
           