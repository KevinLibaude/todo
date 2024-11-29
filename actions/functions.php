<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/TeamWork/config/database.php';

function getUsers(){
    $connexion = dbConnect();
    $request = $connexion->prepare("SELECT * FROM users");
    try{
        $request->execute();
        $users = $request->fetchAll();
        return $users;
    }catch(PDOException $e){
        $e->getMessage();
    }
}

function getTeams(){
    $connexion = dbConnect();
    $request = $connexion->prepare("SELECT * FROM Teams");
    try{
        $request->execute();
        $teams = $request->fetchAll();
        return $teams;
    }catch(PDOException $e){
        $e->getMessage();
    }
}