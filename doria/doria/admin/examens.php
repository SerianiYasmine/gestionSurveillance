<?php
require_once 'functions.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteExamen($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Examens</title>
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
                        <th>Date</th>
                        <th>Heure</th>
                        <th>DELETE</th>
                        <th>UPDATE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $examens = getExamens();
                    while ($row = mysqli_fetch_assoc($examens)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nom'] . "</td>";
                        echo "<td>" . $row['date_exam'] . "</td>";
                        echo "<td>" . $row['heure_exam'] . "</td>";
                        echo '<td><a href="?delete=' . $row['id'] . '" class="button" onclick="return confirm(\'Are you sure you want to delete this exam?\')">Delete</a></td>';
                        echo '<td><a href="ajoute_examens.php?update=' . $row['id'] . '"  class="button" onclick="return confirm(\'Are you sure you want to update this exam?\')">UpDate</a></td>';
                    
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
