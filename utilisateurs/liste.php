<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

$sql = "SELECT * FROM utilisateur";
$resultat = mysqli_query($connexion, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Gestion des utilisateurs</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Gestion des utilisateurs</h2>

<a href="ajouter.php" class="btn btn-success mb-3">
Ajouter un utilisateur
</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Email</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<?php while($utilisateur = mysqli_fetch_assoc($resultat)){ ?>

<tr>

<td><?= $utilisateur['id_utilisateur']; ?></td>

<td><?= $utilisateur['nom']; ?></td>

<td><?= $utilisateur['prenom']; ?></td>

<td><?= $utilisateur['email']; ?></td>

<td>

<a href="modifier.php?id=<?= $utilisateur['id_utilisateur']; ?>" class="btn btn-warning btn-sm">
Modifier
</a>

<a href="supprimer.php?id=<?= $utilisateur['id_utilisateur']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Voulez-vous supprimer cet utilisateur ?')">
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