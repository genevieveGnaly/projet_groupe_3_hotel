<?php
session_start();
$conn=new PDO("mysql:host=localhost;dbname=db_hotel","root","");

$id=$_GET["cle"];

$requete_liste="SELECT * FROM activite WHERE id_act=?";

$prepare=$conn->prepare($requete_liste);
$reponse=$prepare->execute(array($id));
$affiche=$prepare->FETCH();
 

if(isset($_POST['enre'])){
  
  if($_POST['noms']!=""){
  $nom=$_POST['noms'];
  $pre=$_POST['prenoms'];
  $titre=$_POST['titre'];
  $date=$_POST['date'];
  $heure=$_POST['heure'];
  $nbreperson=$_POST['nbreperson'];
  $contact=$_POST['contact'];
  $idd = rand();

$requet_insert="INSERT INTO form_activite /*(id_formact,nom_act,prenom_act,titre_act,date_act,heure_act,nombre_personne,contact)*/ VALUES(?,?,?,?,?,?,?,?)";

$prepar=$conn->prepare($requet_insert);
$repons=$prepar->execute(array($idd,$nom,$pre,$titre,$date,$heure,$nbreperson,$contact));


 

 
 
if($repons){
    
  header("location:activites.php");
  
  }
  else{
    $message="erreur";
  }


}else{
  
$message=" Remplir correctement les champs SVP !"   ;
  
  }
}




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
                  
                  <li><a href="chambre.php">Chambres</a></li>
                  <li><a href="formulaire restaurant.php">Restaurants</a></li>

 
                </ul>

 
              </li>

 
        </ul>
 
      </div>

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





<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
    <legend><strong>Activités</strong></legend>
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
    <label>Titre</label>
    <input type="text" name="titre" value="<?php echo $affiche['titre_activite']; ?>" placeholder="Entrer le titre ici" class="form-control" readonly/>
  </div>

  <div class="form-group">
    <label>Date</label>
    <input type="date" name="date" min="01/01/2018" max="31/12/2020" class="form-control">
  </div>

  <div class="form-group">
    <label>Heure</label>
    <input type="time" name="heure"  min="0" max="23" class="form-control">
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