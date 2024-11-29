<?php
require_once "actions/functions.php";

$users = getUsers();
$teams = getTeams();
?>

<div class="container">
    <div class="form">
        <form action="" method="post">
            <div class="d-flex justify-content-between">
                <select class="form-select" aria-label="Default select example">
                <option value="" selected>Selectionner une équipe</option>
                <?php foreach($teams as $team): ?>
                    <option value="<?= $team['id'] ?>"><?= $team['team_name'] ?></option>
                <?php endforeach ?>
                </select>

                <select class="form-select" aria-label="Default select example" id="user">
                <option selected>Selectionner un utilisateur</option>
                <?php foreach($users as $user): ?>
                    <option value="<?= $user['id'] ?>"><?= $user['firstName'] ?> <?= $user['lastName'] ?></option>
                <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="users" id="users" value="">
            </div>
            <button name="valider" class="btn btn-success">Valider</button> 
        </form>
    </div>
</div>