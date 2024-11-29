<!doctype html>
<html lang="en">
<head>
    <?php include 'include/head.php'; ?>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
<?php include 'include/nav.php'; ?>

<div class="container py-5">
    <?php
    if (!isset($_SESSION['utilisateur'])) {
        header('location: connexion.php');
        exit();
    }

    // Vérification si l'utilisateur est un administrateur
    $isAdmin = ($_SESSION['utilisateur']['login'] === 'admin'); // Assurez-vous que vous avez un champ 'role' dans la session utilisateur
    ?>  

    <div class="welcome-box text-center">
        <h1 class="display-4">Bienvenue, <span><?php echo htmlspecialchars($_SESSION['utilisateur']['login']); ?></span>!</h1>
        <p class="lead">Vous êtes connecté en tant que <?php echo $isAdmin ? 'administrateur' : 'utilisateur'; ?>.</p>
        <div class="action-buttons mt-4">
            <?php if ($isAdmin): ?>
                <a href="categories.php" class="btn btn-primary">
                    <i class="fa-brands fa-dropbox"></i> Gérer les catégories
                </a>
                <a href="produits.php" class="btn btn-secondary">
                    <i class="fa-solid fa-tag"></i> Gérer les produits
                </a>
            <?php endif; ?>
            <a href="commandes.php" class="btn btn-success">
                <i class="fa-solid fa-barcode"></i> Voir les commandes
            </a>
        </div>
    </div>
</div>

</body>
</html>
