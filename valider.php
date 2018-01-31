<?php
session_start();
$conn=new PDO("mysql:host=localhost;dbname=db_hotel","root","");
$idi=$_GET["clei"];
if(isset($_POST['val'])){
	
	if($_POST['noms']!=""){
	$nom=$_POST['noms'];
	$pre=$_POST['prenoms'];
	$arrive=$_POST['arrive'];
	$depart=$_POST['depart'];
	$prix=$_POST['prix'];
	$nbrechamb=$_POST['nbrechamb'];
	$nbreperson=$_POST['nbreperson'];
	$contact=$_POST['contact'];
	

$requet_insert="INSERT INTO form_chambre (nom,prenom,date_arrivee,date_depart,prix_cham,nombre_chambre,nombre_persone,contact) VALUES(?,?,?,?,?,?,?,?)";

$prepar=$conn->prepare($requet_insert);
$repons=$prepar->execute(array($nom,$pre,$arrive,$depart,$prix,$nbrechamb,$nbreperson,$contact));

if($repons){
	header("location:chambre.php");
	
	}
	else{
		echo"erreur";
	}


}else{
	
$message=" Remplir correctement les champs SVP !" 	;
	
	}







$requete_sup="DELETE FROM chambre_temp WHERE id_temp=?";
$prepare1= $conn->prepare($requete_sup);
 
 $reponse1=$prepare1->execute(array($id));








	
}


if(isset($_POST['annuler'])){
     header("location:formulaire chambre.php?cle=$idi");
}











$id=$_GET["clee"];

$requete_liste="SELECT * FROM chambre_temp WHERE id_temp=?";

$prepare=$conn->prepare($requete_liste);
$reponse=$prepare->execute(array($id));
$affiche=$prepare->FETCH();





?>  

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="stylemenuslide.css">
	<title>Chambre</title>
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
	<div class="col-sm-6 col-sm-offset-3" style="box-shadow: 5px 5px 5px rgba(0,0,0,0.4)">
		<legend><strong>Voulez_vous valider votre reservation?</strong></legend>
		<form method="post">

	<div class="form-group">
         <!--div class="form-group">
		<label>Numero de reservation</label>
		<input type="text" name="num" placeholder="Entrer votre ville ici" class="form-control">
	</div-->

		<label>Noms</label>
		<input type="text" name="noms" class="form-control form" value="<?php echo $affiche['nom_temp'] ?>"  readonly/>
	</div>

	<div class="form-group">
		<label>Prénoms</label>
		<input type="text" name="prenoms" value="<?php echo $affiche['prenoms_temp'] ?>" class="form-control form"  readonly/>
	</div>

<div class="form-group">
		<label>Date d'arrivée</label>
		<input type="date" name="arrive" min="01/01/2018" max="31/12/2020" class="form-control form" value="<?php echo $affiche['date_arrive_temp'] ?>" readonly/>
	</div>
	<div class="form-group">
		<label>Date de départ</label>
		<input type="date" name="depart"  min="01/01/2018" max="31/12/2020" class="form-control form" value="<?php echo $affiche['date_depart_temp'] ?>"  readonly/>
	</div>
<div class="form-group">
		<label>Prix de la chambre</label>
		<input type="number" name="prix" value="<?php echo $affiche['prix_temp']; ?>" class="form-control form"  readonly/>
	</div>
<div class="form-group">
	<label>Nombre de chambre</label>
		<input type="number" name="nbrechamb" value="<?php echo $affiche['nbre_chambre'] ?>" class="form-control form" min="1" max="100" readonly/>
	</div>


<div class="form-group">
	<label>Nombre de personne</label>
		<input type="number" name="nbreperson" value="<?php echo $affiche['nbre_person'] ?>" class="form-control form" min="1" max="50" readonly/>
	</div>
<div class="form-group">
	<label>Contacts</label>
		<input type="text" name="contact" value="<?php echo $affiche['contact_temp'] ?>" class="form-control form"  readonly/>
	</div>




















	<button  name="val" class="btn btn-success" style="margin-left:190px">Valider</button>

	<button  name="annuler" class="btn btn-danger" style="margin-left:20px">Annuler</button>

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