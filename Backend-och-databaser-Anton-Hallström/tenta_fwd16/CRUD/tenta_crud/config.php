<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("log_errors", 1);

$servername = '83.168.227.23';
$username = 'u1164707_AntonH';
$password = 'kB8[uus:g{';
$dbname = 'db1164707_AntonH';
     
    
try { 
   
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
   $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
   
} catch (PDOException $e) { 
   
   echo "Connection failed: " . $e->getMessage();
   
   die();
   
}
