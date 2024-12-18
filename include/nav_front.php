<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
    <a class="navbar-brand <?php echo ($currentPage == '/index.php') ? 'active' : ''; ?>" href="/ecommerce/index.php">
    <img src="/ecommerce/upload/produit/439239939_1005289097657000_8251521961820547912_n.jpg" alt="Fatouna Beauty" style="height: 40px; margin-right: 10px; border-radius: 50%; object-fit: cover;">
    Fatouna Beauty
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Liste des catégories</a>
                </li>
            </ul>
        </div>
        <?php
        $productCount = 0;
        if (isset($_SESSION['utilisateur'])) {
            $idUtilisateur = $_SESSION['utilisateur']['id'];
            $productCount = count($_SESSION['panier'][$idUtilisateur] ?? []);
        }
        function calculerRemise($prix, $discount)
        {
            return $prix - (($prix * $discount) / 100);
        }

        ?>
        <a class="btn float-end" href="../"><i
                    class="fa-solid fa-screwdriver-wrench"></i> Backoffice</a>
        <a class="btn float-end" href="panier.php"><i class="fa-solid fa-cart-shopping"></i> Panier
            (<?php echo $productCount; ?>)</a>
    </div>
</nav>