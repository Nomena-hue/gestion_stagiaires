<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

if (isset($_POST['enregistrer'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $etablissement = $_POST['etablissement'];
    $filiere = $_POST['filiere'];
    $niveau = $_POST['niveau'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $id_service = $_POST['id_service'];
    $id_encadrant = $_POST['id_encadrant'];

    $sql = "INSERT INTO stagiaire
    (nom, prenom, sexe, date_naissance, telephone, email, etablissement,
    filiere, niveau, date_debut, date_fin, id_service, id_encadrant)

    VALUES
    ('$nom','$prenom','$sexe','$date_naissance','$telephone','$email',
    '$etablissement','$filiere','$niveau','$date_debut','$date_fin',
    '$id_service','$id_encadrant')";

    mysqli_query($connexion, $sql);

    header("Location: liste.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un stagiaire</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<h2>Ajouter un stagiaire</h2>

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
    <label>Sexe</label>

    <select name="sexe" class="form-control">

        <option value="Masculin">Masculin</option>

        <option value="Féminin">Féminin</option>

    </select>

</div>
<div class="mb-3">
    <label>Date de naissance</label>
    <input type="date" name="date_naissance" class="form-control" required>
</div>

<div class="mb-3">
    <label>Téléphone</label>
    <input type="text" name="telephone" class="form-control">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
    <label>Établissement</label>
    <input type="text" name="etablissement" class="form-control" required>
</div>

<div class="mb-3">
    <label>Filière</label>
    <input type="text" name="filiere" class="form-control" required>
</div>

<div class="mb-3">
    <label>Niveau</label>
    <input type="text" name="niveau" class="form-control" required>
</div>

<div class="mb-3">
    <label>Date de début</label>
    <input type="date" name="date_debut" class="form-control" required>
</div>

<div class="mb-3">
    <label>Date de fin</label>
    <input type="date" name="date_fin" class="form-control" required>
</div>
<div class="mb-3">
    <label>Service</label>

<select name="id_service" class="form-control">

<?php

$sqlService = "SELECT * FROM service";
$resultService = mysqli_query($connexion, $sqlService);

while($service = mysqli_fetch_assoc($resultService)){

?>

<option value="<?= $service['id_service']; ?>">
    <?= $service['nom_service']; ?>
</option>

<?php } ?>

</select>
</div>

<div class="mb-3">
   <label>Encadrant</label>

<select name="id_encadrant" class="form-control">

<?php

$sqlEncadrant = "SELECT * FROM encadrant";
$resultEncadrant = mysqli_query($connexion, $sqlEncadrant);

while($encadrant = mysqli_fetch_assoc($resultEncadrant)){

?>

<option value="<?= $encadrant['id_encadrant']; ?>">
    <?= $encadrant['nom'] . " " . $encadrant['prenom']; ?>
</option>

<?php } ?>

</select>
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