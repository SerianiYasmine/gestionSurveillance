<?php
require_once 'functions.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteSalle($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salles</title>
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
                        <th>Nom</th>
                        <th>Capacite</th>
                        <th>DELETE</th>
                        <th>UPDATE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $salles = getSalles();
                    while ($row = mysqli_fetch_assoc($salles)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nom'] . "</td>";
                        echo "<td>" . $row['capacite'] . "</td>";
                        echo '<td><a href="?delete=' . $row['id'] . '" class="button" onclick="return confirm(\'Are you sure you want to delete this salle?\')">Delete</a></td>';
                        echo '<td><a href="add_salle.php?update=' . $row['id'] . '"  class="button" onclick="return confirm(\'Are you sure you want to update this salle?\')">UpDate</a></td>';
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
