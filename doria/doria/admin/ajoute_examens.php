<?php
require_once 'functions.php';
$id="";

$nom = "";
$date_exam = "";
$heure_exam = "";
$success_message = '';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $date_exam = $_POST['date_exam'];
    $heure_exam = $_POST['heure_exam'];
    $mod = $_POST['mod'];
    if($mod =="0"){
    addExamen($nom, $date_exam, $heure_exam);
    $success_message = 'Examen ajouté avec succès!';
    $nom = "";
    $date_exam = "";
    $heure_exam = "";
    
    }else {
    
    updateExamen($nom, $date_exam, $heure_exam, $id);
    $success_message = 'Examen modifié avec succès!';
    header("location:examens.php"); 
    }
}
if (isset($_GET['update'])) {
    $id=$_GET['update'];
    $examens = getExamensId($id);
    $row = mysqli_fetch_assoc($examens);
    $nom = $row['nom'];
    $date_exam = $row['date_exam'];
    $heure_exam = $row['heure_exam'];
    $mod="1";
    
    
}else $mod="0";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Examens</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Add Examens</h2>
        <?php if ($success_message): ?>
            <p class="success-message"><?= $success_message ?></p>
        <?php endif; ?>
               <form action="ajoute_examens.php" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required value="<?php echo $nom?>" >
            </div>
            <div class="form-group">
                <label for="date_exam">Date:</label>
                <input type="date" id="date_exam" name="date_exam" required value="<?php echo $date_exam?>">
            </div>
            <div class="form-group">
                <label for="heure_exam">Heure:</label>
                <input type="time" id="heure_exam" name="heure_exam" required value="<?php echo $heure_exam?>">
            </div>
            <input type="hidden" name="mod" value= "<?php echo $mod ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="button-container">
                <input type="submit" name="submit" value= <?php echo ($mod==0?"Ajouter":"modifier") ?> class="button">
            </div>
        </form>
    </div>
</div>
<style>
    .success-message {
        color: green;
        font-weight: bold;
        margin-bottom: 1rem;
    }
</style>

</body>
</html>