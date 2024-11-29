<?php
session_start();
$connecte = false;
$user_id = null;
$isAdmin = false; // Ajouter une variable pour vérifier si l'utilisateur est admin

if (isset($_SESSION['utilisateur'])) {
    $connecte = true;
    $user_id = $_SESSION['utilisateur']['id'];  // L'ID de l'utilisateur est stocké dans la session
    $isAdmin = ($_SESSION['utilisateur']['login'] === 'admin'); // Vérifie si l'utilisateur est admin
}

if (!$connecte) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

require_once 'include/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/commande.css">
    <?php include 'include/head.php' ?>
    <title>Liste des Commandes</title>
</head>
<body>
<?php include 'include/nav.php' ?>
<div class="container py-2">
    <h2>Liste des Commandes</h2>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Client</th>
            <th>Total</th>
            <th>Date</th>
            <th>Opérations</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Si l'utilisateur est un admin, il peut voir toutes les commandes, sinon il voit uniquement les siennes
        if ($isAdmin) {
            // Si l'utilisateur est admin, afficher toutes les commandes
            $commandes = $pdo->prepare('
                SELECT commande.*, utilisateur.login as "login" 
                FROM commande 
                INNER JOIN utilisateur ON commande.id_client = utilisateur.id 
                ORDER BY commande.date_creation DESC
            ');
        } else {
            // Sinon, afficher uniquement les commandes de l'utilisateur connecté
            $commandes = $pdo->prepare('
                SELECT commande.*, utilisateur.login as "login" 
                FROM commande 
                INNER JOIN utilisateur ON commande.id_client = utilisateur.id 
                WHERE commande.id_client = :user_id 
                ORDER BY commande.date_creation DESC
            ');
            $commandes->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        }
        $commandes->execute();

        // Récupère les commandes filtrées
        $commandes = $commandes->fetchAll(PDO::FETCH_ASSOC);

        foreach ($commandes as $commande) {
            ?>
            <tr>
                <td><?php echo $commande['id'] ?></td>
                <td><?php echo $commande['login'] ?></td>
                <td><?php echo $commande['total'] ?> <i class="fa fa-solid fa-dollar"></i></td>
                <td><?php echo $commande['date_creation'] ?></td>
                <td><a class="btn btn-primary btn-sm" href="commande.php?id=<?php echo $commande['id']?>">Afficher détails</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
