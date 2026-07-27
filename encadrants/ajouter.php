<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

if (isset($_POST['enregistrer'])) {

    $nom = mysqli_real_escape_string($connexion, $_POST['nom']);
    $prenom = mysqli_real_escape_string($connexion, $_POST['prenom']);
    $fonction = mysqli_real_escape_string($connexion, $_POST['fonction']);
    $telephone = mysqli_real_escape_string($connexion, $_POST['telephone']);
    $email = mysqli_real_escape_string($connexion, $_POST['email']);

    $sql = "INSERT INTO encadrant(nom, prenom, fonction, telephone, email)
            VALUES('$nom', '$prenom', '$fonction', '$telephone', '$email')";

    mysqli_query($connexion, $sql);

    header("Location: liste.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter un encadrant</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Ajouter un encadrant</h2>

<form method="POST">

<div class="mb-3">
<label>Nom</label>
<input type="text" name="nom" class="form-control" required>
</div>

<div class="mb-3">
<label>Prénom</label>
<input type="text" name="prenom" class="form-control" required>
</div>

<div class="mb-3">
<label>Fonction</label>
<input type="text" name="fonction" class="form-control" required>
</div>

<div class="mb-3">
<label>Téléphone</label>
<input type="text" name="telephone" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<button type="submit" name="enregistrer" class="btn btn-success">
Enregistrer
</button>

<a href="liste.php" class="btn btn-secondary">
Annuler
</a>

</form>

</div>

</body>
</html>