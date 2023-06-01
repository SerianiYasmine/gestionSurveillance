<?php
require_once 'functions.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteEnseignant($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enseignants</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="container">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $enseignants = getEnseignants();
                    while ($row = mysqli_fetch_assoc($enseignants)) {
                        echo "<tr>";
                        echo "<td> ".$row['id']." </td>";
                        echo "<td> ".$row['nom']." </td>";
                        echo "<td> ".$row['prenom']." </td>";
                        echo "<td> ".$row['email']." </td>";
                        echo "<td> ".$row['password']." </td>";
                        echo '<td><a href="?delete=' . $row['id'] . '" class="button" onclick="return confirm(\'Are you sure you want to delete this Prof?\')">Delete</a></td>';
                        echo '<td><a href="ajoute_enseignant.php?update=' . $row['id'] . '"  class="button" onclick="return confirm(\'Are you sure you want to update this Prof?\')">UpDate</a></td>';
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
