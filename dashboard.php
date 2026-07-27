<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

include 'config/connexion.php';

// Nombre de stagiaires
$sql_stagiaire = "SELECT COUNT(*) AS total FROM stagiaire";
$resultat_stagiaire = mysqli_query($connexion, $sql_stagiaire);
$total_stagiaire = mysqli_fetch_assoc($resultat_stagiaire)['total'];

// Nombre de services
$sql_service = "SELECT COUNT(*) AS total FROM service";
$resultat_service = mysqli_query($connexion, $sql_service);
$total_service = mysqli_fetch_assoc($resultat_service)['total'];

// Nombre d'encadrants
$sql_encadrant = "SELECT COUNT(*) AS total FROM encadrant";
$resultat_encadrant = mysqli_query($connexion, $sql_encadrant);
$total_encadrant = mysqli_fetch_assoc($resultat_encadrant)['total'];

// Nombre d'utilisateurs
$sql_utilisateur = "SELECT COUNT(*) AS total FROM utilisateur";
$resultat_utilisateur = mysqli_query($connexion, $sql_utilisateur);
$total_utilisateur = mysqli_fetch_assoc($resultat_utilisateur)['total'];
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container mt-4">

    <div class="alert alert-light border shadow-sm">
        <h4 class="mb-1">
           Bienvenue, <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?> 👋
        </h4>
        <p class="text-muted mb-0">
    Aujourd'hui : <?php echo date('d/m/Y'); ?>
</p>

        <p class="mb-0">
            Vous êtes connecté à l'application de gestion des stagiaires de l'ASECNA Ivato.
        </p>

    </div>

</div>
<div class="container mt-5">

    <h2 class="text-center mb-4">
        Application de gestion des stagiaires
    </h2>

<div class="row g-4">

    <!-- Stagiaires -->
    <div class="col-md-3">
        <div class="card bg-primary text-white shadow h-100">
            <div class="card-body text-center">
                <i class="bi bi-people-fill display-3"></i>
                <h4 class="mt-3">Stagiaires</h4>
                <h1><?php echo $total_stagiaire; ?></h1>
            </div>
        </div>
    </div>

    <!-- Services -->
    <div class="col-md-3">
        <div class="card bg-success text-white shadow h-100">
            <div class="card-body text-center">
                <i class="bi bi-building-fill display-3"></i>
                <h4 class="mt-3">Services</h4>
                <h1><?php echo $total_service; ?></h1>
            </div>
        </div>
    </div>

    <!-- Encadrants -->
    <div class="col-md-3">
        <div class="card bg-warning text-dark shadow h-100">
            <div class="card-body text-center">
                <i class="bi bi-person-badge-fill display-3"></i>
                <h4 class="mt-3">Encadrants</h4>
                <h1><?php echo $total_encadrant; ?></h1>
            </div>
        </div>
    </div>

    <!-- Utilisateurs -->
    <div class="col-md-3">
    <div class="card bg-info text-white shadow h-100">
            <div class="card-body text-center">
                <i class="bi bi-person-circle display-3"></i>
                <h4 class="mt-3">Utilisateurs</h4>
                <h1><?php echo $total_utilisateur; ?></h1>
            </div>
        </div>
    </div>

</div>

    <div class="text-center mt-5">

    <a href="stagiaires/liste.php" class="btn btn-primary m-2">
        Gestion des stagiaires
    </a>

    <a href="services/liste.php" class="btn btn-success m-2">
        Gestion des services
    </a>

    <a href="encadrants/liste.php" class="btn btn-warning m-2">
        Gestion des encadrants
    </a>

     <a href="utilisateurs/liste.php" class="btn btn-info m-2">
    Gestion des utilisateurs
    </a>

    <a href="logout.php" class="btn btn-danger m-2">
        Déconnexion
    </a>



</div>

</div>

<?php include 'includes/footer.php'; ?>