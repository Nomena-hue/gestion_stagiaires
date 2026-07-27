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
    $fonction = mysqli_real_escape_string($connexion, $_POST['fonction']);
    $telephone = mysqli_real_escape_string($connexion, $_POST['telephone']);
    $email = mysqli_real_escape_string($connexion, $_POST['email']);

    $sql = "UPDATE encadrant SET
            nom='$nom',
            prenom='$prenom',
            fonction='$fonction',
            telephone='$telephone',
            email='$email'
            WHERE id_encadrant=$id";

    mysqli_query($connexion, $sql);

    header("Location: liste.php");
    exit();
}


$sql = "SELECT * FROM encadrant WHERE id_encadrant=$id";

$resultat = mysqli_query($connexion, $sql);

$encadrant = mysqli_fetch_assoc($resultat);

?>


<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Modifier un encadrant</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>

<div class="container mt-5">


<h2>Modifier un encadrant</h2>


<form method="POST">


<div class="mb-3">
<label>Nom</label>

<input type="text"
name="nom"
class="form-control"
value="<?= $encadrant['nom']; ?>"
required>

</div>


<div class="mb-3">
<label>Prénom</label>

<input type="text"
name="prenom"
class="form-control"
value="<?= $encadrant['prenom']; ?>"
required>

</div>


<div class="mb-3">
<label>Fonction</label>

<input type="text"
name="fonction"
class="form-control"
value="<?= $encadrant['fonction']; ?>"
required>

</div>


<div class="mb-3">
<label>Téléphone</label>

<input type="text"
name="telephone"
class="form-control"
value="<?= $encadrant['telephone']; ?>">

</div>


<div class="mb-3">
<label>Email</label>

<input type="email"
name="email"
class="form-control"
value="<?= $encadrant['email']; ?>"
required>

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