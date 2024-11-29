<div class="container">
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == "Admin"):?>
<a href="?url=creer_equipe" class="btn btn-success">
    Créer une équipe
</a>
<a href="?url=list_user" class="btn btn-info">
    liste des utilisateurs
</a>
<a href="?url=list_team" class="btn btn-info">
    liste des équipes
</a>
<a href="?url=constitution_equipe" class="btn btn-info">
    Constituer une équipe
</a>
<?php else :?>


<?php endif ?>