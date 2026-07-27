<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

$id = $_GET['id'];

if (isset($_POST['modifier'])) {

    $nom_service = mysqli_real_escape_string($connexion, $_POST['nom_service']);
    $description = mysqli_real_escape_string($connexion, $_POST['description']);

    $sql = "UPDATE service
            SET nom_service='$nom_service',
                description='$description'
            WHERE id_service=$id";

    mysqli_query($connexion, $sql);

    header("Location: liste.php");
    exit();
}

$sql = "SELECT * FROM service WHERE id_service=$id";
$resultat = mysqli_query($connexion, $sql);
$service = mysqli_fetch_assoc($resultat);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<h2>Modifier un service</h2>

<form method="POST">

<div class="mb-3">
<label>Nom du service</label>
<input type="text"
       name="nom_service"
       class="form-control"
       value="<?php echo $service['nom_service']; ?>"
       required>
</div>

<div class="mb-3">
<label>Description</label>
<textarea
name="description"
class="form-control"
rows="4"><?php echo $service['description']; ?></textarea>
</div>

<button class="btn btn-primary" name="modifier">
Enregistrer les modifications
</button>

<a href="liste.php" class="btn btn-secondary">
Annuler
</a>

</form>

</div>

</body>
</html>