<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        // Inloggning uppgifter
        $servername = '83.168.227.23';
        $username = 'u1164707_AntonH';
        $password = 'kB8[uus:g{';
        $dbname = 'db1164707_AntonH';
        // Hantering av databas uppgifter
try {
    // skapar en connection till db
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log( 'Connection success' );</script>";
    }
    // error hantering
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }