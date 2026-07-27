<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {

    $mot = $_GET['recherche'];

    $sql = "SELECT * FROM stagiaire
            WHERE nom LIKE '%$mot%'
            OR prenom LIKE '%$mot%'
            OR etablissement LIKE '%$mot%'";

} else {

    $sql = "SELECT * FROM stagiaire";

}

$resultat = mysqli_query($connexion, $sql);
$resultat = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des stagiaires</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Liste des stagiaires</h2>

    <a href="ajouter.php" class="btn btn-success mb-3">
        Ajouter un stagiaire
    </a>

    <form method="GET" class="row mb-3">

    <div class="col-md-8">

        <input
            type="text"
            name="recherche"
            class="form-control"
            placeholder="Rechercher un stagiaire..."
            value="<?php echo isset($_GET['recherche']) ? $_GET['recherche'] : ''; ?>">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary w-100">
            Rechercher
        </button>

    </div>

    <div class="col-md-2">

        <a href="liste.php" class="btn btn-secondary w-100">
            Actualiser
        </a>

    </div>

</form>
    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Établissement</th>
                <th>Filière</th>
                <th>Niveau</th>
                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

        <?php while($stagiaire = mysqli_fetch_assoc($resultat)) { ?>

            <tr>

                <td><?= $stagiaire['id_stagiaire']; ?></td>

                <td><?= $stagiaire['nom']; ?></td>

                <td><?= $stagiaire['prenom']; ?></td>

                <td><?= $stagiaire['etablissement']; ?></td>

                <td><?= $stagiaire['filiere']; ?></td>

                <td><?= $stagiaire['niveau']; ?></td>

                <td>

                    <a href="modifier.php?id=<?= $stagiaire['id_stagiaire']; ?>" class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <a href="supprimer.php?id=<?= $stagiaire['id_stagiaire']; ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Voulez-vous vraiment supprimer ce stagiaire ?')">
                    Supprimer
                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

    <a href="../dashboard.php" class="btn btn-secondary">
        Retour au tableau de bord
    </a>

</div>

</body>
</html>