<?php require 'connexion.php'; 

// insertion d'une formation
if(isset($_POST['dates_training'])) { // si on a reçu une nouvelle compétence
    if($_POST['dates_training']!='' && $_POST['title_training']!='' && $_POST['subtitle_training']!='' && $_POST['training_establishment']!='') {

        $dates_training = addslashes($_POST['dates_training']);
        $title_training = addslashes($_POST['title_training']);
        $subtitle_training= addslashes($_POST['subtitle_training']);
        $training_establishment= addslashes($_POST['training_establishment']);
        $pdoCV -> exec("INSERT INTO t_trainings VALUES (NULL, '$dates_training', '$title_training', '$subtitle_training', $training_establishment, '1')");

        header("location: formations.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

$order = '';

if(isset($_GET['order']) && isset($_GET['column'])){

	if($_GET['column'] == 'dates_trainings'){
        $order = ' ORDER BY dates_exp';} 
	if($_GET['order'] == 'asc'){
        $order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){
        $order.= ' DESC';}
}

// suppression d'un élément de la BDD
if(isset($_GET['id_training'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_training']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_trainings WHERE id_training = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: formations.php");
} // ferme le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : les formations</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
<div class="container">
    <h1>Les Formations :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_trainings".$order);
            $sql -> execute();
            $nbr_trainings = $sql -> rowCount();
        ?>
    <div>
    
    <table class="table table-striped">
    <caption>La liste des formations : <?php echo $nbr_trainings; ?></caption>
        <thead>
            <tr>
                <th>Dates <a href="formations.php?column=dates_trainings&order=asc">ASC</a> | <a href="formations.php?column=dates_trainings&order=desc">DESC</a></th>
                <th>Titre formation</th>
                <th>Sous-titre formation</th>
                <th>Etablissement de formation</th>
                <th>Actions</th>
                   
            </tr>
        </thead>
        <tbody>
        <?php while($line_training=$sql ->fetch())
            {
        ?> 
            <tr>
                <td><?php echo $line_training['id_training']; ?></td>
                <td><?php echo $line_training['dates_training']; ?></td>
                <td><?php echo $line_training['title_training']; ?></td>
                <td><?php echo $line_training['subtitle_training']; ?></td>
                <td><?php echo $line_training['training_establishment']; ?></td>
                <td><a href="modif_formation.php?id_training=<?php echo $line_training['id_training']; ?>">Modifier</a>
                <a href="formations.php?id_training=<?php echo $line_training['id_training']; ?>">Supprimer</a></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    </div>
    <hr>
    <form class="input-group mb-3 mt-4" action="formations.php" method="post">

        <div class="form-group">
            <label for="dates_traning">Dates </label>
            <input type="text" name="dates_traning" id="dates_training" placeholder="Date" required>
        </div>

        <div class="form-group">
            <label for="title_training">Titre de la formation </label>
            <input type="text" name="title_training" id="title_training" placeholder="Titre de la formation" required>
        </div>

        <div class="form-group">
            <label for=sub"title_training">Sous-titre de la formation </label>
            <input type="text" name="subtitle_training" id="subtitle_training" placeholder="Sous-titre de la formation" required>
        </div>

        <div class="input-group-prepend form-group">        
            <label class="input-group-text" for="training_establishment">Etablissement de formation</label>
            <textarea name="training_establishment" id="training_establishment" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-secondary" type="submit">Insérer une formation</button>
        </div>
    </form>
</div>  
</body>
</html>