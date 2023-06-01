<?php
require_once 'functions.php';
$id="";

$nom = "";
$capacite = "";
$success_message = '';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $capacite = $_POST['capacite'];
    $mod = $_POST['mod'];
    if($mod =="0"){
    addSalle($nom, $capacite);
    $success_message = 'Examen ajouté avec succès!';
    $nom = "";
    $capacite = "";
    
    }else {
    
    updateSalle($nom, $capacite, $id);
    $success_message = 'salle modifié avec succès!';
    header("location:salle.php"); 
    }
}
if (isset($_GET['update'])) {
    $id=$_GET['update'];
    $salle = getSallesId($id);
    $row = mysqli_fetch_assoc($salle);
    $nom = $row['nom'];
    $capacite = $row['capacite'];
    $mod=1;
}else $mod="0"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une salle</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="container">
        <div class="table-wrapper">
        <h1>Ajouter une salle</h1>
        <?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
            <div class="alert alert-success">Salle ajoutée avec succès!</div>
        <?php } ?>
        <div class="form-box">
            <form method="post" action="add_salle.php">
                <div class="form-group">
                    <label for="nom"><strong>Nom :</strong></label>
                    <input type="text" id="nom" name="nom" required value="<?php echo $nom?>">
                </div>

                <div class="form-group">
                    <label for="capacite"><strong>Capacité :</strong></label>
                    <input type="number" id="capacite" name="capacite" required value=<?php echo $capacite?>>
                </div>

                <input type="hidden" name="mod" value="<?php echo $mod ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="button-container">
                <input type="submit" name="submit" value= <?php echo ($mod==0?"Ajouter":"modifier") ?> class="button">
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
