<?php 

if (!isset($_COOKIE['auth']) || $_COOKIE['auth'] !== 'true') {
    header('Location: login.php');
    exit;
}

require_once 'ensegnient_fun.php';

$user_id = $_COOKIE['user_id'];
$affectations = getAffectations($user_id);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="cs.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="UBMA ANNABA.png" alt="Logo de l'entreprise">
    </div>
    <h1>Page d'accueil</h1>
    <a href="logout_unset.php" class="lgo">Logout</a>
</header>

<main>
    <table>
        <thead>
            <tr>
			<th>Examen</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Salle</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($affectations)) { ?>
                <tr>
				<td><?php echo $row['examen_nom']; ?></td>  
				<td><?php echo $row['exam_date']; ?></td>
            <td><?php echo $row['exam_heure']; ?></td>
            <td><?php echo $row['salle_nom']; ?></td>
            
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<footer>
    <p>&copy; </p>
</footer>
</body>
</html>
