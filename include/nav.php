<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$connecte = false;
$isAdmin = false;

// Vérifier si l'utilisateur est connecté et si c'est un admin avec le mot de passe correct
if (isset($_SESSION['utilisateur'])) {
    $connecte = true;
    $user = $_SESSION['utilisateur'];
    
    // Vérifier si l'utilisateur est un admin et si le mot de passe est correct
    if ($user['login'] == 'admin' && $user['password'] == '123456789') {
        $isAdmin = true;
    }
}

$currentPage = $_SERVER['PHP_SELF'];
?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" <?php echo ($currentPage == '/index.php') ? 'active' : ''; ?> href="index.php">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Ajouter l'utilisateur uniquement si l'utilisateur n'est pas connecté -->
                <?php if (!$connecte): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == '/ajouter_utilisateur.php') ? 'active' : ''; ?>"
                           href="ajouter_utilisateur.php"><i class="fa-solid fa-user-plus"></i> Ajouter utilisateur</a>
                    </li>
                <?php endif; ?>
                <!-- Afficher les produits et les catégories uniquement si l'utilisateur est admin -->
                <?php if ($connecte && $isAdmin): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == '/categories.php') ? 'active' : ''; ?>"
                           href="categories.php"><i class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == '/produits.php') ? 'active' : ''; ?>"
                           href="produits.php"><i class="fa-solid fa-tag"></i> Liste des produits</a>
                    </li>
                <?php endif; ?>
                <?php if ($connecte): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == '/commandes.php') ? 'active' : ''; ?>"
                           href="commandes.php"><i class="fa-solid fa-barcode"></i> Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php"><i class="fa-solid fa-right-from-bracket"></i>
                            Déconnexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($currentPage == '/connexion.php') ? 'active' : ''; ?>"
                           href="connexion.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Connexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <a class="btn float-end" href="front/"><i class="fa-solid fa-cart-shopping"></i> Site front</a>
    </div>
</nav>
