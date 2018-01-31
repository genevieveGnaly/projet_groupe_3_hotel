<?php
session_start();
$conn=new PDO("mysql:host=localhost;dbname=db_hotel","root","");

 

if(isset($_POST['enre'])){
	
	if($_POST['noms']!=""){
	$nom=$_POST['noms'];
	$pre=$_POST['prenoms'];
	$sexe=$_POST['sexe'];
	$dureabon=$_POST['dureabon'];
	$contact=$_POST['contact'];
	$idd = rand();

$requet_insert="INSERT INTO form_spa (id_spa,nom_spa,prenom_spa,sexe_spa,durabo_spa,cont_spa) VALUES(?,?,?,?,?,?)";

$prepar=$conn->prepare($requet_insert);
$repons=$prepar->execute(array($idd,$nom,$pre,$sexe,$dureabon,$contact));
 

 
 
if($repons){
	  
	 header("location:accueil.php");
  
	}
	else{
		$message="erreur";
	}


}else{
	
$message=" Remplir correctement les champs SVP !" 	;
	
	}
}




?>  


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="stylemenuslide.css">
	<title>Abonnement SPA</title>
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
                  
                  <li><a href="chambre.php">Chambres</a></li>
                  <li><a href="formulaire restaurant.php">Restaurants</a></li>

 
                </ul>

 
              </li>

 
        </ul>
 
      </div>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<legend><strong>Abonnement SPA</strong></legend>
		<form method="post">

	<div class="form-group">
         <!--div class="form-group">
		<label>Numero de reservation</label>
		<input type="text" name="num" placeholder="Entrer votre ville ici" class="form-control">
	</div-->

		<label>Noms</label>
		<input type="text" name="noms" class="form-control" placeholder="Entrer votre nom ici">
	</div>

	<div class="form-group">
		<label>Prénoms</label>
		<input type="text" name="prenoms" placeholder="Entrer votre prenoms ici" class="form-control">
	</div>


	<div class="form-group">
		<label>Sexe</label>
		<select name="sexe">
			<option name="feminin">F</option>
			<option name="masculin">M</option>
		</select>
	</div>

	<div class="form-group">
		<label>Durée abonnement</label>
		<input type="number" name="dureabon" placeholder="Durée d'abonnement mensuel" class="form-control" min="1" max="50">
	</div>

	<div class="form-group">
		<label>Contacts</label>
		<input type="text" name="contact" placeholder="Entrer vos contacts ici" class="form-control" >
	</div>




















	<button type="submit" name="enre" class="btn btn-success">Enregistrer</button>
	

<?php
   if(isset($message)){
   	echo "<h4 style='color: red; font-size:20px;'>".$message."</h4>";
   }
   ?>

	</form>

</div>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>





</body>
</html>