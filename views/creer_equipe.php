<div class="container">
    <div class="form">
        <form action="actions/creer_team.php" method="POST">
            <!-- Email -->
            <div class="mb-3">
                <label for="team_name" class="form-label">Nom de l'équipe</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="team_name" class="form-control" id="team_name" name="team_name" required>
                </div>
            </div>

            <!-- Mot de passe -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                    <textarea type="description" class="form-control" id="description" name="description" ></textarea>
                </div>
            </div>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($_SESSION['error']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($_SESSION['success']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <!-- Bouton connexion -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" name="create_team">Créer l'équipe</button>
            </div>
        </form>
    </div>
</div>