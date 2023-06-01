<?php
require_once 'db_config.php';

$titre = $_POST["titre"];

$sql = "SELECT * FROM Recette WHERE TITRE = '$titre'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $recette = $result->fetch_assoc();
    echo json_encode($recette);
} else {
    echo "No recette found";
}

$conn->close();
?>
