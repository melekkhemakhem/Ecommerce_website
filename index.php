<!doctype html>
<html lang="fr">
<head>
    <?php include 'include/head.php'; ?>
    <title>Accueil | Ecommerce</title>
    <!-- Lien vers un fichier CSS avec des améliorations visuelles -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'include/nav.php'; ?>

    <!-- Hero Section -->
    <header class="hero" >
        <div class="container hero-content text-center text-white">
            <!-- <h1 class="hero-title" style="color: #212529;">Bienvenue sur Ecommerce</h1>
            <p class="hero-subtitle mb-4">Découvrez une large gamme de produits de qualité à des prix compétitifs.</p> -->
            <!-- Le bouton "Voir nos produits" est supprimé -->
        </div>
    </header>

    <!-- Features Section -->
    <section class="features py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card p-4 text-center rounded shadow-sm">
                        <i class="fas fa-shipping-fast feature-icon mb-3"></i>
                        <h3>Livraison rapide</h3>
                        <p>Recevez vos commandes dans les meilleurs délais.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card p-4 text-center rounded shadow-sm">
                        <i class="fas fa-lock feature-icon mb-3"></i>
                        <h3>Paiement sécurisé</h3>
                        <p>Profitez d'une expérience d'achat en toute sécurité.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card p-4 text-center rounded shadow-sm">
                        <i class="fas fa-thumbs-up feature-icon mb-3"></i>
                        <h3>Produits de qualité</h3>
                        <p>Satisfaction garantie sur tous nos articles.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Preview Section -->
    <section class="products-preview py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nos produits populaires</h2>
            <div class="row">
                <!-- Exemple de produit -->
                <div class="col-md-4 mb-4">
                    <div class="product-card rounded shadow-sm overflow-hidden">
                        <img src="upload\produit\6377c776dfe8f350-1.webp" alt="Produit 1" class="product-img img-fluid">
                        <div class="product-info p-4">
                            <h3 class="product-title">Produit 1</h3>
                            <p class="product-price">€50.00</p>
                            <a href="#" class="btn btn-outline-primary btn-block">Acheter maintenant</a>
                        </div>
                    </div>
                </div>
                <!-- Répétez pour d'autres produits -->
                <div class="col-md-4 mb-4">
                    <div class="product-card rounded shadow-sm overflow-hidden">
                        <img src="upload\produit\6377c736816d6medium01.webp" alt="Produit 2" class="product-img img-fluid">
                        <div class="product-info p-4">
                            <h3 class="product-title">Produit 2</h3>
                            <p class="product-price">€75.00</p>
                            <a href="#" class="btn btn-outline-primary btn-block">Acheter maintenant</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="product-card rounded shadow-sm overflow-hidden">
                        <img src="upload\produit\6377c71941528medium01.webp" alt="Produit 3" class="product-img img-fluid">
                        <div class="product-info p-4">
                            <h3 class="product-title">Produit 3</h3>
                            <p class="product-price">€100.00</p>
                            <a href="#" class="btn btn-outline-primary btn-block">Acheter maintenant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; <?php echo date('Y'); ?> Ecommerce. Tous droits réservés.</p>
            <p>Développé avec ❤️ par Ameny Ayedi</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="text-white">À propos</a></li>
                <li class="list-inline-item"><a href="#" class="text-white">Contact</a></li>
                <li class="list-inline-item"><a href="#" class="text-white">FAQ</a></li>
            </ul>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
