<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

$sql = "SELECT * FROM encadrant";
$resultat = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Gestion des encadrants</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Gestion des encadrants</h2>

<a href="ajouter.php" class="btn btn-success mb-3">
Ajouter un encadrant
</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Fonction</th>
<th>Téléphone</th>
<th>Email</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<?php while($encadrant=mysqli_fetch_assoc($resultat)){ ?>

<tr>

<td><?= $encadrant['id_encadrant']; ?></td>

<td><?= $encadrant['nom']; ?></td>

<td><?= $encadrant['prenom']; ?></td>

<td><?= $encadrant['fonction']; ?></td>

<td><?= $encadrant['telephone']; ?></td>

<td><?= $encadrant['email']; ?></td>

<td>

<a href="modifier.php?id=<?= $encadrant['id_encadrant']; ?>" class="btn btn-warning btn-sm">
Modifier
</a>

<a href="supprimer.php?id=<?= $encadrant['id_encadrant']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Voulez-vous supprimer cet encadrant ?')">
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
