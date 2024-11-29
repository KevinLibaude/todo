<?php
session_start();
require_once "../config/database.php";

if(isset($_POST['create_team'])){
    if(
        isset($_POST['team_name']) && !empty($_POST['team_name']) &&
        isset($_POST['description']) && !empty($_POST['description'])
    ){
        $connexion = dbConnect();
        $request = $connexion->prepare("INSERT INTO teams (team_name, description, creation_date) VALUES (:name, :description, :date)");
        $creation_date = date('Y-m-d H:i:s');

        $request->bindParam(":name", $_POST['team_name']);
        $request->bindParam(":description", $_POST['description']);
        $request->bindParam(":date", $creation_date);

        try{
            $request->execute();
            $_SESSION['success'] = "L'équipe a été créée avec succès !";
            header("Location: ../index.php?url=dashboard");
            exit();
        }catch(PDOException $e){
            $_SESSION['error'] = "Erreur lors de la création de l'équipe : " . $e->getMessage();
            header("Location: ../index.php?url=creer_equipe");
            exit();
        }
    } else {
        $_SESSION['error'] = "Veuillez remplir tous les champs";
        header("Location: ../index.php?url=creer_equipe");
        exit();
    }
} else {
    $_SESSION['error'] = "Accès non autorisé";
    header("Location: ../index.php?url=creer_equipe");
    exit();
}