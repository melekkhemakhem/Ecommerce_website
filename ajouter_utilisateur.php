<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php'; ?>
    <title>Ajouter utilisateur</title>
    <link rel="stylesheet" href="assets/css/add-user.css">
</head>
<body>
<?php include 'include/nav.php'; ?>

<div class="container py-5">
    <div class="card mx-auto p-4 shadow-sm" style="max-width: 500px;">
        <h2 class="text-center text-primary mb-4">Ajouter Utilisateur</h2>
        <?php
        if (isset($_POST['ajouter'])) {
            $login = $_POST['login'];
            $pwd = $_POST['password'];

            if (!empty($login) && !empty($pwd)) {
                require_once 'include/database.php';
                $date = date('Y-m-d');
                $sqlState = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
                $sqlState->execute([$login, $pwd, $date]);
                // Redirection
                header('location: connexion.php');
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
            <button type="submit" class="btn btn-primary w-100" name="ajouter">
                <i class="fa-solid fa-user-plus"></i> Ajouter utilisateur
            </button>
        </form>
    </div>
</div>

</body>
</html>
