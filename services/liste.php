<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

$sql = "SELECT * FROM service";
$resultat = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des services</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Gestion des services</h2>

<a href="ajouter.php" class="btn btn-success mb-3">
    Ajouter un service
</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Nom du service</th>
<th>Description</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<?php while($service=mysqli_fetch_assoc($resultat)){ ?>

<tr>

<td><?= $service['id_service']; ?></td>

<td><?= $service['nom_service']; ?></td>

<td><?= $service['description']; ?></td>

<td>

<a href="modifier.php?id=<?= $service['id_service']; ?>" class="btn btn-warning btn-sm">
Modifier
</a>

<a href="supprimer.php?id=<?= $service['id_service']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Voulez-vous supprimer ce service ?')">
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