<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

$id = $_GET['id'];

if (isset($_POST['modifier'])) {

    $nom = mysqli_real_escape_string($connexion, $_POST['nom']);
    $prenom = mysqli_real_escape_string($connexion, $_POST['prenom']);
    $email = mysqli_real_escape_string($connexion, $_POST['email']);
    $mot_de_passe = mysqli_real_escape_string($connexion, $_POST['mot_de_passe']);

    $sql = "UPDATE utilisateur
            SET nom='$nom',
                prenom='$prenom',
                email='$email',
                mot_de_passe='$mot_de_passe'
            WHERE id_utilisateur=$id";

    mysqli_query($connexion, $sql);

    header("Location: liste.php");
    exit();
}

$sql = "SELECT * FROM utilisateur WHERE id_utilisateur=$id";
$resultat = mysqli_query($connexion, $sql);
$utilisateur = mysqli_fetch_assoc($resultat);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier un utilisateur</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Modifier un utilisateur</h2>

<form method="POST">

<div class="mb-3">
<label>Nom</label>
<input type="text" name="nom" class="form-control"
value="<?= $utilisateur['nom']; ?>" required>
</div>

<div class="mb-3">
<label>Prénom</label>
<input type="text" name="prenom" class="form-control"
value="<?= $utilisateur['prenom']; ?>" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control"
value="<?= $utilisateur['email']; ?>" required>
</div>

<div class="mb-3">
<label>Mot de passe</label>
<input type="text" name="mot_de_passe" class="form-control"
value="<?= $utilisateur['mot_de_passe']; ?>" required>
</div>

<button type="submit" name="modifier" class="btn btn-primary">
Enregistrer les modifications
</button>

<a href="liste.php" class="btn btn-secondary">
Annuler
</a>

</form>

</div>

</body>
</html>