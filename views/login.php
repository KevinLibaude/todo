<div class="container">
    <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-body p-5">
                    <!-- Logo ou Titre -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Connexion</h2>
                        <p class="text-muted">Bienvenue ! Connectez-vous à votre compte</p>
                    </div>

                    <!-- Formulaire -->
                    <form action="actions/login.php" method="POST">
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <?php if(isset($_SESSION['login_error'])): ?>
                            <div>
                                <p class="text-danger">
                                <?php 
                                echo $_SESSION['login_error'];
                                unset($_SESSION['login_error']);
                                ?>
                            </div>
                        <?php endif; ?>
                        <!-- Se souvenir de moi -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <!-- Bouton connexion -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" name="connexion">Se connecter</button>
                        </div>
                    </form>

                    <!-- Liens supplémentaires -->
                    <div class="text-center mt-4">
                        <p class="mb-2">
                            <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                        </p>
                        <p class="mb-0">
                            Pas encore de compte ? 
                            <a href="http://localhost/TeamWork/?url=inscription" class="text-decoration-none">S'inscrire</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>