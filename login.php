<?php

session_start();
include 'config/connexion.php';

if (isset($_POST['connexion'])) {

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM utilisateur
            WHERE email='$email'
            AND mot_de_passe='$mot_de_passe'";

    $resultat = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($resultat) == 1) {

    
$utilisateur = mysqli_fetch_assoc($resultat);


$_SESSION['id_utilisateur'] = $utilisateur['id_utilisateur'];
$_SESSION['nom'] = $utilisateur['nom'];
$_SESSION['prenom'] = $utilisateur['prenom'];
$_SESSION['email'] = $utilisateur['email'];

        header("Location: dashboard.php");
        exit();

    } else {

        $erreur = "Email ou mot de passe incorrect.";

    }

}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

           <div class="card shadow-lg border-0">

    <div class="card-header text-center bg-primary text-white">

        <img src="assets/images/logo.png"
             width="70"
             class="mb-2">

        <h3>
            Connexion
        </h3>

        <p class="mb-0">
            Gestion des stagiaires - ASECNA Ivato
        </p>

    </div>

                <div class="card-body">
                    <?php
if (isset($erreur)) {
    echo '<div class="alert alert-danger">'.$erreur.'</div>';
}
?>

                    <form method="POST">

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Mot de passe</label>
                            <input type="password" name="mot_de_passe" class="form-control" required>
                        </div>

                        <button type="submit" name="connexion" class="btn btn-primary w-100">
                            Se connecter
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>