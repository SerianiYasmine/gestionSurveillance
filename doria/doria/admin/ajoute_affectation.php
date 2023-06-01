<?php
require_once 'functions.php';
$id="";
$examen = "";
$salle = "";
$enseignant = "";
$success_message = '';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $examen = $_POST['examen_id'];
    $salle = $_POST['salle_id'];
    $enseignant = $_POST['enseignants_id'];
    $mod = $_POST['mod'];
    if($mod =="0"){
    addAffectation($examen, $salle, $enseignant);
    $success_message = 'Affectation ajouté avec succès!';

    
    }else {
    updateAffectation($examen, $salle, $enseignant,$id);
    $success_message = 'Affectation modifié avec succès!';
    header("location:affectation.php");
    }
}
if (isset($_GET['update'])) {
    $id=$_GET['update'];
    $affectation = getAffectationId($id);
    $row = mysqli_fetch_assoc($affectation);
    $examenId = $row['examen_id'];
    $salleId = $row['salle_id'];
    $enseignantId = $row['enseignants_id'];
    $mod="1";
    
    
}else $mod="0";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Affectation</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h1>Add Affectation</h1>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="ajoute_affectation.php" method="post">
            <div class="form-group">
                <label for="examen_id">Examen</label>
                <select name="examen_id" id="examen_id">
                    <?php
                    $examens = getExamens();
                    while ($row = mysqli_fetch_assoc($examens)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                    }
                    ?>
                </select>
                <script>
                    Examenselect=document.getElementById('examen_id');

                    for (i=0;Examenselect.options.length;i++)
                    {
                        var option=Examenselect.options[i];
                        if(option.value=="<?php echo $examenId?>"){option.selected=true;
                        break;}
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="salle_id">Salle</label>
                <select name="salle_id" id="salle_id">
                    <?php
                    $salles = getSalles();
                    while ($row = mysqli_fetch_assoc($salles)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                    }
                    ?>
                </select>
                <script>
                    salleselect=document.getElementById('salle_id');
                    for (i=0;salleselect.options.length;i++)
                    {
                        var option=salleselect.options[i];
                        if(option.value=="<?php echo $salleId?>"){option.selected=true;
                        break;}
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="enseignants_id">Enseignant</label>
                <select name="enseignants_id" id="enseignants_id">
                    <?php
                    $enseignants = getEnseignants();
                    while ($row = mysqli_fetch_assoc($enseignants)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . ' ' . $row['prenom'] . '</option>';
                    }
                    ?>
                </select>
                <script>
                    enseignantselect=document.getElementById('enseignants_id');
                    for (i=0;Examenselect.options.length;i++)
                    {
                        var option=enseignantselect.options[i];
                        if(option.value=="<?php echo $enseignantId?>"){option.selected=true;
                        break;}
                    }
                </script>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="mod" value="<?php echo $mod ?>">
            <div class="button-container">
                <input type="submit" name="submit" value= <?php echo ($mod=="1"?"modifier":"Ajouter") ?> class="button">
            </div>
        </form>
    </div>
</div>
</body>
</html>
