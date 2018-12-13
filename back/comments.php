<?php require 'inc/init.inc.php'; 

// insertion d'un loisir
if(isset($_POST['comment'])) { // si on a reçu un nouveau message
    if($_POST['comment']!="") {

        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $subject = addslashes($_POST['subject']);
        $comment = addslashes($_POST['comment']);
        $pdoCV -> exec("INSERT INTO t_comments VALUES (NULL, '$name', '$email', '$subject', '$comment' '1')");

        header("location: comments.php");
            exit();

    } // ferme le if n'est pas vide
} // ferme le if isset

// suppression d'un élément de la BDD
if(isset($_GET['id_comment'])) { // on récupère ce que je supprime dans l'url par son id
    $efface = $_GET['id_comment']; //je passe l'id dans une variable $efface

    $sql = "DELETE FROM t_comments WHERE id_comment = '$efface' "; // delete de la BDD
    $pdoCV -> query($sql); // on peut le faire avec exec également

    header("location: comments.php");
} // ferme le if isset pour la suppression

require_once 'inc/haut.inc.php';

?>


<div class="container"><br><br><br>
    <h1>Messages :</h1>
        <?php
             //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
            $sql = $pdoCV -> prepare("SELECT * FROM t_comments");
            $sql -> execute();
            $nbr_comments = $sql -> rowCount();
        ?>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tboby>
            <?php while($line_comment=$sql ->fetch())
                {
            ?> 
                <tr>
                    <td><?php echo $line_comment['name']; ?></td>
                    <td><?php echo $line_comment['email']; ?></td>
                    <td><?php echo $line_comment['subject']; ?>"></td>
                    <td><?php echo $line_comment['comment']; ?>"></td>
                </tr>
                <?php 
                    }
                ?>
            </tboby>
            <caption><em>La liste des messages : <?php echo $nbr_comments; ?></em></caption>
        </table>
    </div>
    <hr>
</div>  

<?php
require_once 'inc/bas.inc.php';