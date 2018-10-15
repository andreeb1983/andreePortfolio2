<?php require 'connexion.php'; 

// insertion d'une compétence
if(isset($_POST['skill'])) { // si on a reçu une nouvelle compétence
    if($_POST['skill']!='' && $_POST['level']!='' && $_POST['category']!='' ) {

        $skill = addslashes($_POST['skill']);
        $level = addslashes($_POST['level']);
        $category = addslashes($_POST['category']);
        $pdoCV -> exec("INSERT INTO t_skills VALUES (NULL, '$skill', '$level', '$category', '1')");

        header("location: ../back/competences.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

$order = '';

if(isset($_GET['order']) && isset($_GET['column'])){

	if($_GET['column'] == 'skills'){
        $order = ' ORDER BY skill';}
    elseif($_GET['column'] == 'level'){
        $order = ' ORDER BY level';}
    elseif($_GET['column'] == 'category'){
        $order = ' ORDER BY category';}    
	if($_GET['order'] == 'asc'){
        $order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){
        $order.= ' DESC';}
}

// suppression d'un élément de la BDD
if(isset($_GET['id_skill'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_skill']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_skills WHERE id_skill = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: ../back/competences.php");
} // ferme le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : les compétences</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
<div class="container">
    <h1>Les compétences :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_skills".$order);
            $sql -> execute();
            $nbr_skills = $sql -> rowCount();
        ?>
    <div>
    
    <table class="table table-striped">
    <caption>La liste des compétences : <?php echo $nbr_skills; ?></caption>
        <thead>
            <tr>
                <th>Compétences <a href="competences.php?column=skills&order=asc">ASC</a> | <a href="competences.php?column=skills&order=desc">DESC</a></th>
                <th>Niveau <a href="competences.php?column=level&order=asc">ASC</a> | <a href="competences.php?column=level&order=desc">DESC</a></th>
                <th>Catégorie <a href="competences.php?column=category&order=asc">ASC</a> | <a href="competences.php?column=category&order=desc">DESC</a></th>
                <th>Modifier</th>
                <th>Suppression</th>
                   
            </tr>
        </thead>
        <tbody>
        <?php while($line_skill=$sql ->fetch())
            {
        ?> 
            <tr>
                <td><?php echo $line_skill['skill']; ?></td>
                <td><?php echo $line_skill['level']; ?></td>
                <td><?php echo $line_skill['category']; ?></td>
                <td><a href="modif_competence.php?id_skill=<?php echo $line_skill['id_skill']; ?>">Modifier</a></td>
                <td><a href="competences.php?id_skill=<?php echo $line_skill['id_skill']; ?>">Supprimer</a></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    </div>
    <hr>
    <form class="input-group mb-3 mt-4" action="competences.php" method="post">
        <div class="form-group">
            <label for="skill">Compétence </label>
            <input type="text" name="skill" id="skill" placeholder="Nouvelle compétence" required>
        </div>
        <div class="form-group">
            <label for="level">Niveau </label>
            <input type="text" name="level" id="level" placeholder="Niveau en %" required>
        </div>
        <div class="input-group-prepend form-group">        
            <label class="input-group-text" for="category">Catégorie</label>
            <select class="custom-select" name="category" id="category">
                <option selected>Choisis...</option>
                <option value="front">Front</option>
                <option value="back">Back</option>
                <option value="cms framework">CMS / Framework</option>
                <option value="project management">Project management</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-secondary" type="submit">Insérer une compétence</button>
        </div>
    </form>
</div>  
</body>
</html>