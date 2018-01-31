<?php
session_start();
$conn=new PDO("mysql:host=localhost;dbname=db_hotel","root","");


$id=$_GET["cle"];

$requete_liste="SELECT * FROM chambre WHERE id_cham=?";

$prepare=$conn->prepare($requete_liste);
$reponse=$prepare->execute(array($id));
$affiche=$prepare->FETCH();
 

if(isset($_POST['enre'])){
	
	if($_POST['noms']!=""){
	$nom=$_POST['noms'];
	$pre=$_POST['prenoms'];
	$arrive=$_POST['arrive'];
	$depart=$_POST['depart'];
	$prix=$_POST['prix'];
	$nbrechamb=$_POST['nbrechamb'];
	$nbreperson=$_POST['nbreperson'];
	$contact=$_POST['contact'];
	$idd = rand();

$requet_insert="INSERT INTO chambre_temp (id_temp,nom_temp,prenoms_temp,date_arrive_temp,date_depart_temp,prix_temp,nbre_chambre,nbre_person,contact_temp) VALUES(?,?,?,?,?,?,?,?,?)";

$prepar=$conn->prepare($requet_insert);
$repons=$prepar->execute(array($idd,$nom,$pre,$arrive,$depart,$prix,$nbrechamb,$nbreperson,$contact));
 

 
 
if($repons){
	  
	 header("location:valider.php?clee=$idd&clei=$id");
  
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
	<title>RESERVATION DE CHAMBRE</title>
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
		<legend><strong>Réservation de chambre</strong></legend>
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
		<label>Date d'arrivée</label>
		<input type="date" name="arrive" min="01/01/2018" max="31/12/2020" class="form-control">
	</div>
	<div class="form-group">
		<label>Date de départ</label>
		<input type="date" name="depart"  min="01/01/2018" max="31/12/2020" class="form-control">
	</div>
<div class="form-group">
		<label>Prix de la chambre</label>
		<input type="number" name="prix" value="<?php echo $affiche['prix_cham']; ?>" class="form-control" readonly/>
	</div>
<div class="form-group">
	<label>Nombre de chambre</label>
		<input type="number" name="nbrechamb" placeholder="chambre de lux" class="form-control" min="1" max="100">
	</div>


<div class="form-group">
	<label>Nombre de personne</label>
		<input type="number" name="nbreperson" placeholder="indiquer le nombre de personne" class="form-control" min="1" max="50">
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