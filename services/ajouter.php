<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

if (isset($_POST['enregistrer'])) {

    $nom_service = mysqli_real_escape_string($connexion, $_POST['nom_service']);
$description = mysqli_real_escape_string($connexion, $_POST['description']);
    $sql = "INSERT INTO service(nom_service, description)
            VALUES('$nom_service', '$description')";

    mysqli_query($connexion, $sql);

    header("Location: liste.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Ajouter un service</h2>

<form method="POST">

    <div class="mb-3">
        <label>Nom du service</label>
        <input type="text" name="nom_service" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
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