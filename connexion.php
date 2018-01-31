<?php 
    $conn=new PDO("mysql:host=localhost;dbname=db_hotel","root","");

    $requert="SELECT * FROM services ";

    $prepare=$conn->prepare($requert);
    $reponse=$prepare->execute();



$requer="SELECT * FROM activite ";

    $prepa=$conn->prepare($requer);
    $repons=$prepa->execute();

$req="SELECT * FROM chambre ";

    $prep=$conn->prepare($req);
    $rep=$prep->execute();




    

 ?>