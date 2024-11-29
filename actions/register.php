<?php
session_start();
require_once "../config/database.php";


if(isset($_POST['inscription'])){
    if(
        isset($_POST['lastName']) && !empty($_POST['lastName']) &&
        isset($_POST['firstName']) && !empty($_POST['firstName']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])
    ){
        $connexion = dbConnect();
        
        // Vérification si l'email existe déjà
        $check_email = $connexion->prepare("SELECT email FROM Users WHERE email = :email");
        $check_email->bindParam(":email", $_POST['email']);
        $check_email->execute();

        if($check_email->rowCount() > 0){
            // L'email existe déjà
            $_SESSION['register_error'] = "Cet email est déjà utilisé";
            header("Location: http://localhost/TeamWork/?url=inscription");
            exit();
        } else {
            // L'email n'existe pas, on peut procéder à l'inscription
            $role = "user";
            $password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $registration_date = date("Y-m-d");

            $request = $connexion->prepare("INSERT INTO Users (lastName, firstName, email, password, role, registration_date) 
                VALUES (:lastName, :firstName, :email, :password, :role, :registration_date)");
                
            $request->bindParam(":lastName", $_POST['lastName']);
            $request->bindParam(":firstName", $_POST['firstName']);
            $request->bindParam(":email", $_POST['email']);
            $request->bindParam(":password", $password_hashed);
            $request->bindParam(":role", $role);
            $request->bindParam(":registration_date", $registration_date);

            try{
                $request->execute();
                $_SESSION['register_success'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                header("Location: http://localhost/TeamWork/?url=connexion");
                exit();
            }catch(PDOException $e){
                $_SESSION['register_error'] = "Erreur lors de l'inscription : " . $e->getMessage();
                header("Location: http://localhost/TeamWork/?url=inscription");
                exit();
            }
        }
    } else {
        $_SESSION['register_error'] = "Veuillez remplir tous les champs";
        header("Location: http://localhost/TeamWork/?url=inscription");
        exit();
    }
}