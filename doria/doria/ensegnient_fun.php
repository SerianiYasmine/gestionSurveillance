<?php
require_once 'config/dbcon.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getAffectations($userId) {
    global $con;
    $query = "SELECT affectation.id, examens.date_exam AS exam_date, examens.heure_exam AS exam_heure, salles.nom AS salle_nom, examens.nom AS examen_nom
FROM affectation
INNER JOIN examens ON affectation.examen_id = examens.id
INNER JOIN salles ON affectation.salle_id = salles.id
WHERE affectation.enseignants_id = $userId";
    return mysqli_query($con, $query);
}


?>