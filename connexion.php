<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php'; ?>
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/loginn.css">
</head>
<body>
<?php include 'include/nav.php'; ?>

<div class="container py-5">
    <div class="row">
        <!-- Description à gauche -->
        <div class="col-md-6">
            <div class="description">
                <h2>Bienvenue sur notre plateforme</h2>
                <p>Nous offrons une expérience unique et sécurisée pour nos utilisateurs. Connectez-vous dès maintenant pour accéder à vos données et gérer vos préférences.</p>
            </div>
        </div>

        <!-- Formulaire de connexion à droite -->
        <div class="col-md-6">
            <div class="card mx-auto p-4 shadow-sm">
                <h2 class="text-center text-primary mb-4">Connexion</h2>
                <?php
                if (isset($_POST['connexion'])) {
                    $login = $_POST['login'];
                    $pwd = $_POST['password'];

                    if (!empty($login) && !empty($pwd)) {
                        require_once 'include/database.php';
                        $sqlState = $pdo->prepare('SELECT * FROM utilisateur WHERE login=? AND password=?');
                        $sqlState->execute([$login, $pwd]);
                        if ($sqlState->rowCount() >= 1) {
                            $_SESSION['utilisateur'] = $sqlState->fetch();
                            header('location: admin.php');
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Login ou mot de passe incorrects.
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Login et mot de passe sont obligatoires.
                        </div>
                        <?php
                    }
                }
                ?>
                <form method="post" autocomplete="off">
                    <div class="mb-3">
                        <label class="form-label">Login</label>
                        <input type="text" class="form-control" name="login" placeholder="Entrez votre login">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="connexion">
                        <i class="fa-solid fa-right-to-bracket"></i> Connexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
