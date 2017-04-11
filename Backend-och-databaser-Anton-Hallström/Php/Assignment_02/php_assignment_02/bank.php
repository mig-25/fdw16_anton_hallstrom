<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<p><b>required bank - success</b></p>";


// bank class med constructor
class bank {
    public $accountFname;
    public $accountLname;
    public $accountName;
    protected $accountBalance;
    public $collector;
    
    // constructorn sköter instansieringen av uppgifterna från db
     public function __construct() {
         // översätter float till integer
        $this->accountBalance = round($this->accountBalance);
        // colloctor sammlar ihop alla värden till önskad string resultat
        $this->collector = "{$this->accountFname} {$this->accountLname} has: {$this->accountName} with {$this->accountBalance} balance";
    }
}


