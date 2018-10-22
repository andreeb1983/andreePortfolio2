<?php require 'connexion.php'; 

// insertion d'une compétence
if(isset($_POST['dates_exp'])) { // si on a reçu une nouvelle compétence
    if($_POST['dates_exp']!='' && $_POST['function_exp']!='' && $_POST['description_exp']!='' ) {

        $dates_exp = addslashes($_POST['dates_exp']);
        $function_exp = addslashes($_POST['function_exp']);
        $description_exp= addslashes($_POST['description_exp']);
        $pdoCV -> exec("INSERT INTO t_experiences VALUES (NULL, '$dates_exp', '$function_exp', '$description_exp', '1')");

        header("location: experiences.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

$order = '';

if(isset($_GET['order']) && isset($_GET['column'])){

	if($_GET['column'] == 'dates_exps'){
        $order = ' ORDER BY dates_exp';} 
	if($_GET['order'] == 'asc'){
        $order.= ' ASC';}
	elseif($_GET['order'] == 'desc'){
        $order.= ' DESC';}
}

// suppression d'un élément de la BDD
if(isset($_GET['id_experience'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_experience']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_experiences WHERE id_experience = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: experiences.php");
} // ferme le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : les expériences</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
<div class="container">
    <h1>Les expériences :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_experiences".$order);
            $sql -> execute();
            $nbr_experiences = $sql -> rowCount();
        ?>
    <div>
    
    <table class="table table-striped">
    <caption>La liste des expériences : <?php echo $nbr_experiences; ?></caption>
        <thead>
            <tr>
                <th>Dates <a href="experiences.php?column=dates_exps&order=asc">ASC</a> | <a href="experiences.php?column=dates_exps&order=desc">DESC</a></th>
                <th>Fonction du poste</th>
                <th>Description</th>
                <th>Actions</th>
                   
            </tr>
        </thead>
        <tbody>
        <?php while($line_experience=$sql ->fetch())
            {
        ?> 
            <tr>
                <td><?php echo $line_experience['id_experience']; ?></td>
                <td><?php echo $line_experience['function_exp']; ?></td>
                <td><?php echo $line_experience['description_exp']; ?></td>
                <td><a href="modif_experience.php?id_experience=<?php echo $line_experience['id_experience']; ?>">Modifier</a>
                <a href="experiences.php?id_experience=<?php echo $line_experience['id_experience']; ?>">Supprimer</a></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    </div>
    <hr>
    <form class="input-group mb-3 mt-4" action="experiences.php" method="post">

        <div class="form-group">
            <label for="dates_exp">Dates </label>
            <input type="text" name="dates_exp" id="dates_exp" placeholder="Dates" required>
        </div>

        <div class="form-group">
            <label for="function_exp">Fonctions du poste </label>
            <input type="text" name="function_exp" id="function_exp" placeholder="Fonction du poste" required>
        </div>

        <div class="input-group-prepend form-group">        
            <label class="input-group-text" for="description_exp">Description</label>
            <textarea name="description_exp" id="description_exp" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-secondary" type="submit">Insérer une expérience pro</button>
        </div>
    </form>
</div>  
</body>
</html>