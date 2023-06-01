<?php

require_once '../config/dbcon.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getEnseignants() {
    global $con;
    $sql = "SELECT * FROM enseignants";
    return mysqli_query($con, $sql);
}

function getEnseignantId($id) {
    global $con;
    $sql = "SELECT * FROM enseignants where id= $id";
    return mysqli_query($con, $sql);
}

function deleteEnseignant($id) {
    global $con;
    $sql = "DELETE FROM enseignants WHERE id = '$id'";
    return mysqli_query($con, $sql);
}
function addEnseignant($nom, $prenom, $email, $password) {
    global $con;
    $sql = "INSERT INTO enseignants (nom, prenom, email, password) VALUES ('$nom', '$prenom', '$email', '$password')";
    return mysqli_query($con, $sql);
}

function getSalles() {
    global $con;
    $sql = "SELECT * FROM salles";
    return mysqli_query($con, $sql);
}

function deleteSalle($id) {
    global $con;
    $sql = "DELETE FROM salles WHERE id = '$id'";
    return mysqli_query($con, $sql);
}

function getSallesId($id) {
    global $con;
    $sql = "SELECT * FROM salles where id= '$id'";
    return mysqli_query($con, $sql);
}
function addExamen($nom, $date_exam, $heure_exam) {
    global $con;
    $sql = "INSERT INTO examens (nom, date_exam, heure_exam) VALUES ('$nom', '$date_exam', '$heure_exam')";
    return mysqli_query($con, $sql);
}

function getExamens() {
    global $con;
    $sql = "SELECT * FROM examens";
    return mysqli_query($con, $sql);
}

function getExamensId($id) {
    global $con;
    $sql = "SELECT * FROM examens where id= $id";
    return mysqli_query($con, $sql);
}
function deleteExamen($id) {
    global $con;
    $sql = "DELETE FROM examens WHERE id = $id";
    return mysqli_query($con, $sql);
}
function addAffectation($examen_id, $salle_id, $enseignants_id) {
    global $con;
    $sql = "INSERT INTO affectation (examen_id, salle_id, enseignants_id) VALUES ('$examen_id', '$salle_id', '$enseignants_id')";
    return mysqli_query($con, $sql);
}
function getAffectations() {
    global $con;
    $sql = "SELECT a.id, e.nom AS examen_nom, s.nom AS salle_nom, CONCAT(ens.nom, ' ', ens.prenom) AS enseignant_nom
            FROM affectation a 
            JOIN examens e ON a.examen_id = e.id 
            JOIN salles s ON a.salle_id = s.id 
            JOIN enseignants ens ON a.enseignants_id = ens.id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($con));
    }
    return $result;
}

function getAffectationId($id) {
    global $con;
    $sql = "SELECT * from affectation where id= $id";
    $result = mysqli_query($con, $sql);
    return $result;
}


function deleteAffectation($id) {
    global $con;
    $sql = "DELETE FROM affectation WHERE id = '$id'";
    return mysqli_query($con, $sql);
}


function updateExamen($nom, $date_exam, $heure_exam, $id){
    global $con;
    $sql = "update examens set nom='$nom', date_exam='$date_exam', heure_exam='$heure_exam' WHERE id = '$id' ";
    return mysqli_query($con, $sql);

}

function updateSalle($nom, $capacite,$id){
    global $con;
    $sql = "update salles set  nom='$nom', capacite='$capacite' WHERE id = '$id' ";
    return mysqli_query($con, $sql);

}

function updateAffectation($examen, $salle, $enseignant, $id){
    global $con;
    $sql = "update affectation set  examen_id='$examen', salle_id='$salle', enseignants_id='$enseignant' WHERE id = '$id' ";
    return mysqli_query($con, $sql);

}

function updateEnseignant($nom, $prenom, $email, $password, $id){
    global $con;
    $sql = "update enseignants set  nom='$nom', prenom='$prenom', email='$email', password='$password' WHERE id = '$id' ";
    return mysqli_query($con, $sql);

}
function addSalle($nom, $capacite) {
    global $con;
    $sql = "INSERT INTO salles (nom, capacite) VALUES ('$nom', '$capacite')";
    return mysqli_query($con, $sql);
}

?>


