<?php
define("HOST","localhost");
define("PORT",3306);
define("DBNAME","team_work");
define("LOGIN","root");
define("PASSWORD","root");
define("CHARSET","utf8mb4");

function dbConnect(){
    try{
        $connexion = new PDO("mysql:host".HOST.";port=".PORT.";dbname=".DBNAME.";charset=".CHARSET,LOGIN,PASSWORD);
        return $connexion;
    }catch(PDOException $e){
        echo $e->getMessage();
        return null;
    }
    
}