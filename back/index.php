<?php require 'inc/init.inc.php';

?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title style="font-size: 9vh;">Andrée Baptiste | Développeur & Intégrateur Web</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/mystyle-admin.css">
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">

      <ul class="sidebar-nav">

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#competences">Compétences</a>
        </li>

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="admin/AndreeB_Int_Dev.pdf" target="_blank">CV</a>
        </li>

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#parcours">Parcours</a>
        </li>        

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#loisirs">Loisirs</a>
        </li>

        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#contact">Contact</a> 
        </li>
        <!-- <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#admin">Admin</a>
        </li> -->
      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h4 class="mb-1">Andrée Baptiste</h4>
        <h1 class="mb-2">Intégrateur Développeur Web</h1>
        <h5 class="mb-6"><em>en formation</em></h5>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#competences">Compétences</a>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="competences">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Mes compétences</h2>

<div class="container">

  <?php
    //requête pour compter et chercher plusieurs enregistrements, on ne peut compter que si on a un prepare
    $resultat = $pdoCV->query("SELECT * FROM t_skills");
    // debug($resultat);
    $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($_POST);
    // debug($donnees);
  ?>

  <div class="row">
    <div class="col-md-6"> 

      <h3 class="progress-title"><?php echo $donnees[0]['skill'];?></h3>
        <div class="progress">
          <div class="progress1">
            <div class="progress-bar" style="width: <?php echo $donnees[0]['level']?>%; background: #008080;">
              <div class="progress-value"><?php echo $donnees[0]['level']?>%</div>
            </div>
          </div>
          <div class="progress2">
            <div class="progress-bar2" style="width:<?php echo $donnees[0]['level']?>%; background: #00a79c;"></div>
          </div>
        </div>
 
        <h3 class="progress-title"><?php echo $donnees[1]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[1]['level']?>%; background: #008080;">
                <div class="progress-value"><?php echo $donnees[1]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[1]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>
        
        <h3 class="progress-title"><?php echo $donnees[2]['skill'];?></h3>
        <div class="progress">
          <div class="progress1">
            <div class="progress-bar" style="width: <?php echo $donnees[2]['level']?>%; background: #008080;">
              <div class="progress-value"><?php echo $donnees[2]['level']?>%</div>
            </div>
          </div>
          <div class="progress2">
            <div class="progress-bar2" style="width:<?php echo $donnees[2]['level']?>%; background: #ff794a;"></div>
          </div>
        </div>

        <h3 class="progress-title"><?php echo $donnees[3]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[3]['level']?>%; background: #008080;">
                <div class="progress-value"><?php echo $donnees[3]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[3]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

          <h3 class="progress-title"><?php echo $donnees[4]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[4]['level']?>%; background: #008080;">
                <div class="progress-value"><?php echo $donnees[4]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[4]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

          <h3 class="progress-title"><?php echo $donnees[6]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[6]['level']?>%; background: #008080;">
                <div class="progress-value"><?php echo $donnees[6]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[6]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

          <h3 class="progress-title"><?php echo $donnees[6]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[6]['level']?>%; background: #008080;">
                <div class="progress-value"><?php echo $donnees[6]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[6]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

    </div><!-- fin div class -->
    
    <div class="col-md-6">      

      <h3 class="progress-title"><?php echo $donnees[7]['skill'];?></h3>
        <div class="progress">
          <div class="progress1">
            <div class="progress-bar" style="width: <?php echo $donnees[7]['level']?>%; background: #00a79c;">
              <div class="progress-value"><?php echo $donnees[7]['level']?>%</div>
            </div>
          </div>
          <div class="progress2">
            <div class="progress-bar2" style="width:<?php echo $donnees[7]['level']?>%; background: #00a79c;"></div>
          </div>
        </div>
 
        <h3 class="progress-title"><?php echo $donnees[8]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[8]['level']?>%; background: #ff794a;">
                <div class="progress-value"><?php echo $donnees[8]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[8]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>
        
        <h3 class="progress-title"><?php echo $donnees[9]['skill'];?></h3>
        <div class="progress">
          <div class="progress1">
            <div class="progress-bar" style="width: <?php echo $donnees[9]['level']?>%; background: #ff794a;">
              <div class="progress-value"><?php echo $donnees[9]['level']?>%</div>
            </div>
          </div>
          <div class="progress2">
            <div class="progress-bar2" style="width:<?php echo $donnees[9]['level']?>%; background: #ff794a;"></div>
          </div>
        </div>

        <h3 class="progress-title"><?php echo $donnees[10]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[10]['level']?>%; background: #ff794a;">
                <div class="progress-value"><?php echo $donnees[10]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[10]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

          <h3 class="progress-title"><?php echo $donnees[11]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[11]['level']?>%; background: #ff794a;">
                <div class="progress-value"><?php echo $donnees[11]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[11]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

          <h3 class="progress-title"><?php echo $donnees[12]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[12]['level']?>%; background: #ff794a;">
                <div class="progress-value"><?php echo $donnees[12]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[12]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

          <h3 class="progress-title"><?php echo $donnees[13]['skill'];?></h3>
          <div class="progress">
            <div class="progress1">
              <div class="progress-bar" style="width: <?php echo $donnees[13]['level']?>%; background: #ff794a;">
                <div class="progress-value"><?php echo $donnees[13]['level']?>%</div>
              </div>
            </div>
            <div class="progress2">
              <div class="progress-bar2" style="width:<?php echo $donnees[13]['level']?>%; background: #ff794a;"></div>
            </div>
          </div>

    </div><!-- fin div class -->

  </div> <!-- fin div row --> 
  <!-- http://bestjquery.com/tutorial/progress-bar/demo39/    -->

  <div class="row">         
    <div class="col-md-12 col-md-offset-3">
        <p class="lead mb-5">Forte d'expériences multiples et variées je suis l'atout manquant à votre équipe.
        <!-- <a href="https://unsplash.com/">Unsplash</a>!--></p> 
        <a class="btn btn-dark btn-xl js-scroll-trigger" href="admin/AndreeB_Int_Dev.pdf" target="_blank">Mon CV</a>
    </div>
  </div> 

        </div>
      </div>
    </section>

    <!-- Callout -->
    <section class="callout">
      <div class="container text-center">
        <h2 class="mx-auto mb-5">Mes expériences professionnelles</h2>

        <a class="btn btn-primary btn-xl" href="#formations">Formations</a>
      </div>
    </section>

    <section class="content-section bg-light" id="formations">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Mes formations</h2>
            <p class="lead mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos maxime provident vitae optio rerum eligendi repellendus illum, nihil minima ducimus cum deserunt magnam expedita, libero dolorum. Harum aliquam ipsa praesentium..
              <!-- <a href="https://unsplash.com/">Unsplash</a>!--></p> 
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="#loisirs">Mes loisirs</a>
          </div>
        </div>
      </div>
    </section>


    </section> -->
    <section class="callout">
      <div class="container text-center">
        <h2 class="mx-auto mb-5">Mes loisirs</h2>

        <a class="btn btn-primary btn-xl" href="#contact">Contact</a>
      </div>
    </section>

    <!-- Call to Action -->
    <!-- <section class="content-section bg-primary text-white">
      <div class="container text-center">
        <h2 class="mb-4">The buttons below are impossible to resist...</h2>
        <a href="#" class="btn btn-xl btn-light mr-4">Click Me!</a>
        <a href="#" class="btn btn-xl btn-dark">Look at Me!</a>
      </div>
    </section> -->

    <!-- Map -->
    <!-- <section id="contact" class="map">
      <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
      <br/>
      <small>
        <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
      </small>
    </section> -->

        <!-- Services -->
        <section class="content-section bg-primary text-white text-center" id="contact">
        <div class="container">
          <div class="content-section-heading">
            <!-- <h3 class="text-secondary mb-0">Services</h3> -->
            <h2 class="mb-5">Contactez-moi :</h2>
              <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions? N'hésitez pas à me contacter. Je  vous recontacterai dans les plus brefs délais.</p>
          </div>
          <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          </div>
          </div>
        </section>
        

</div> <!-- fin div container -->

</section>
<
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>

  </body>

</html>
