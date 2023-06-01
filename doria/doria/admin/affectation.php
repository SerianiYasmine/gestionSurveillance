<?php
require_once 'functions.php';


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteAffectation($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Affectations</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Examen </th>
                        <th>Salle </th>
                        <th>Enseignant </th>
                        <th>DELETE</th>
                        <th>UPDATE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $affectations = getAffectations();
                    foreach ($affectations as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['examen_nom'] . "</td>";
                        echo "<td>" . $row['salle_nom'] . "</td>";
                        echo "<td>" . $row['enseignant_nom'] . "</td>";
                        echo '<td><a href="?delete=' . $row['id'] . '" class="button" onclick="return confirm(\'Are you sure you want to delete this affectation?\')">Delete</a></td>';
                        echo '<td><a href="ajoute_affectation.php?update=' . $row['id'] . '"  class="button" onclick="return confirm(\'Are you sure you want to update this affectation?\')">UpDate</a></td>';
                        echo "</tr>";
                    }
                    
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
