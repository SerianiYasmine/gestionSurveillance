<?php
require_once 'functions.php';
$id="";
$nom = "";
$prenom = "";
$email = "";
$password = "";
$success_message = '';

if (isset($_POST['submit'])) {
    
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mod = $_POST['mod'];
   
    if($mod =="0"){
    addEnseignant($nom, $prenom, $email,$password);
    $success_message = 'Enseignant ajouté avec succès!';
    $nom = "";
    $prenom = "";
    $email = "";
    $password = "";
    }else {
    updateEnseignant($nom, $prenom, $email, $password,$id);
    $success_message = 'Enseignant modifié avec succès!';
    header("location:enseignant.php"); 
    }
}
if (isset($_GET['update'])) {
    
    $id=$_GET['update'];
    $enseignant= getEnseignantId($id);
    $row = mysqli_fetch_assoc($enseignant);
    $nom = $row['nom'];
    $prenom = $row['prenom'];
    $email = $row['email'];
    $password = $row['password'];
    $mod="1";
    
    
}else $mod="0";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Enseignant</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Add Enseignant</h2>
        <?php if ($success_message): ?>
            <p class="success-message"><?= $success_message ?></p>
        <?php endif; ?>
               <form action="ajoute_enseignant.php" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required value="<?php echo $nom?>" >
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required value="<?php echo $prenom?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="<?php echo $email?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" required value="<?php echo $password?>">
            </div>
            <input type="hidden" name="mod" value= "<?php echo $mod ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="button-container">
                <input type="submit" name="submit" value= <?php echo ($mod=="1"?"modifier":"Ajouter") ?> class="button">
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