<?php
session_start();
require_once "../config/database.php";

if(isset($_POST['connexion'])){
    if(isset($_POST['email']) && !empty($_POST['email'])&& isset($_POST['password']) && !empty($_POST['password'])){
        $connexion = dbConnect();
        $request = $connexion->prepare("SELECT * FROM Users WHERE email=:email");
        $request->bindParam(":email",$_POST['email']);

        try{
            $request->execute();
            $user = $request->fetch();
            if(empty($user)){
                $_SESSION['login_error'] = "Utilisateur ou mot de passe inconnu";
                header("Location: http://localhost/TeamWork/?url=connexion");
            }else{
                if(password_verify($_POST['password'],$user['password'])){
                    $_SESSION['user'] = $user['lastName'];
                    $_SESSION['role'] = $user['role'];
                    header("Location: http://localhost/TeamWork/?url=dashboard");
                }else{
                    $_SESSION['login_error'] = "Utilisateur ou mot de passe inconnu";
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        echo 'Le mail ne corresponds à aucun enregistrement de la base';
    }
}else{
    echo 'erreur un des champs est vide ou incorrect';
}
