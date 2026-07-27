<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}

include '../config/connexion.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM service WHERE id_service = $id";

    mysqli_query($connexion, $sql);
}

header("Location: liste.php");
exit();
?>