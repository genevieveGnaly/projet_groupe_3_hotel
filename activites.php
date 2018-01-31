<?php
session_start();
include('connexion.php');
?>  

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="stylemenuslide.css">
	<title>Activités</title>
</head>
<body>

<div class="container">
		<div class="row">

      <div class="col-lg-3 logo"></div>
      <div class="menuu col-lg-7 pull-right">
        
        <ul class="menu">
          

              <li><a href="accueil.php">Accueil</a></li>
              <li>Prestations


                <ul class="menu1">
                  
                  <li><a href="services.php">Services</a></li>
                  <li><a href="activites.php">Activités</a></li>

 
                </ul>

 
              </li>
              <li>Reservations




                <ul class="menu1">
                  
                  <li><a href="Chambre.php">Chambres</a></li>
                  <li><a href="formulaire restaurant.php">Restaurants</a></li>

 
                </ul>

 
              </li>

 
        </ul>
 
      </div>




		<!--div class="col-sm-12">
	<ul class="nav nav-pills" role="navigation">
		<li role="navigation""><img src="img/lo.jpg" alt="La vie est belle à Dream House" style="width:300px;height:100px;"></li>
		    <li role="navigation" style="float: right;"><a href="accueil.php">Accueil</a></li>
			<li role="navigation" style="float: right;"><a href="prestation.php">Prestation</a></li>
			<li role="navigation" style="float: right;"><a href="réservation.php">Réservation</a></li>

		</ul>
	</div-->
	<br>
	<br>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <div class="slidee">

        <div class="slideee">
      <figure> 
        <img src="img/po4.jpg" alt="Life is good" style="width: 1500px;height: 600px;z-index: 80">
      </figure>
      <figure>
        <img src="img/po5.jpg" alt="Life is good" style="width: 1500px;height: 600px;z-index: 80">
      </figure>
      <figure>
        <img src="img/po3.jpg" alt="Life is good" style="width: 1500px;height: 600px;z-index: 80">
      </figure>
    </div>

     </div>
      <div class="carousel-caption">
          <p><strong>ACTIVITES TOURISTIQUE</strong></p>
      </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <br>
<hr>
<br><br>
<h1><strong>Activités</strong></h1>


<hr>
  <div class="row">
   <?php
   $i=0; 
  while($affiche=$prepa-> fetch()){
    $i++;
   ?>

  <div class="col-sm-4">
    <p>

      <strong>

    <?php echo $affiche['titre_activite']; ?>
    

  </strong>

  </p>
    <a href="formulaire activite.php?cle=<?php echo $affiche['id_act'] ?>">
    <img src="img/<?php echo $affiche['image_act']; ?>.jpg" style="width: 360px;height: 220px;">
    </a>

    <br>

    <strong>

    <?php echo $affiche['description_act']; ?>
      
    </strong> 
  </div>
   
  
  <?php 
  if($i == 3){
    echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
   }
  }
  ?>


  </div>
  
  <hr>

  

  <br>

  <hr>
<br>
<br>

<br>
<div class="container">
<div class="row">
<div id="footer" style="position:absolute; width:100%;bottom:0;background-color: #2B2B21;height:110px;color: greenyellow;">
  <div class="col-sm-4"><img src="img/lo.jpg" alt="La vie est belle à Dream House" style="width:100px;height:50px;"></div>
   <div class="col-sm-4">Contacter nous</div>
    <div class="col-sm-4">vos reves prennent vie chez nous</div>
  

    </div>


  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>
</html>