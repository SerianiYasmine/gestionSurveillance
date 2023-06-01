<?php 
if (!isset($_COOKIE['auth']) || $_COOKIE['auth'] !== 'true' || $_COOKIE['role'] != 1) {
    header('Location: ../login.php'); // Replace 'login.php' with the actual name of your login page
    exit;
}
?>
<div class="sidebar">
    <a href="enseignant.php">Enseignants</a>
    <a href="salle.php">Salles</a>
    <a href="examens.php">Examens</a>
    <a href="affectation.php">Affectation</a>
    
    <a href="add_salle.php">Ajouter salle</a>
    <a href="ajoute_examens.php">Ajouter Examen</a>
    <a href="ajoute_enseignant.php">Ajouter Enseignant</a>
    <a href="ajoute_affectation.php">Nouvelle Affectatation</a>
    <a href="../logout_unset.php" class="logout-btn">Logout</a>
    
</div>
