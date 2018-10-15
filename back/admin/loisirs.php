<?php require 'connexion.php'; 

// insertion d'un loisir
if(isset($_POST['hobby'])) { // si on a reçu un nouveau loisir
    if($_POST['hobby']!="") {

        $hobby = addslashes($_POST['hobby']);
        $pdoCV -> exec("INSERT INTO t_hobbies VALUES (NULL, '$hobby', '1')");

        header("location: ../back/loisirs.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

// suppression d'un élément de la BDD
if(isset($_GET['id_hobby'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_hobby']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_hobbies WHERE id_hobby = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: ../back/loisirs.php");
} // ferme le if isset pour la suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin : les loisirs</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Les loisirs :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_hobbies");
            $sql -> execute();
            $nbr_hobbies = $sql -> rowCount();
        ?>
    <caption>La liste des loisirs : <?php echo $nbr_hobbies; ?></caption>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Loisirs</th>
                    <th>Modifier</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tboby>
            <?php while($line_hobby=$sql ->fetch())
                {
            ?> 
                <tr>
                    <td><?php echo $line_hobby['hobby']; ?></td>
                    <td><a href="modif_loisir.php?id_hobby=<?php echo $line_hobby['id_hobby']; ?>">Modif</a></td>
                    <td><a href="loisirs.php?id_hobby=<?php echo $line_hobby['id_hobby']; ?>">Suppr</a></td>
                </tr>
                <?php 
                    }
                ?>
            </tboby>
        </table>
    </div>
    <hr>
    <form class="mt-4" action="loisirs.php" method="post">
        <div class=" form-group ">
            <label for="hobby">Loisir </label>
            <input type="text" name="hobby" id="hobby" placeholder="Nouveau loisir" required>
        </div>
        <div class="form-group">
            <button class="btn btn-secondary" type="submit">Insérer un loisir</button>
        </div>
    </form>
</div>  
</body>
</html>