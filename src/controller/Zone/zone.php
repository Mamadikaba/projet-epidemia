<?php
require_once '../../../bootstrap.php';
require_once '../../../Autoloader.php';


$pa=$entityManager->getRepository(Pays::class);
$zone=$entityManager->getRepository(Zone::class);

if(isset($_POST['enregistrer']))
{  
    extract($_POST);
    $z=new Zone();
    $p=$pa->find($pays);
    $z->setNom($nom);
    $z->setNbreHabitant($nombre_hab);
    $z->setPay($p);
    $entityManager->persist($z);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/zone/liste.php");
}

if(isset($_GET['id']))
{
    $zr=$zone->find($_GET['id']);
    $entityManager->remove($zr);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/zone/liste.php");
}

if(isset($_POST['modifier']))
{
    extract($_POST);  
    $zm=$zone->find($id);
    $zm->setPay(null);
    $zm->setNom($nom);
    $p=$pa->find($pays);
    $zm->setNbreHabitant($nombre_hab);
    $zm->setPay($p);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/zone/liste.php");
}
/*$p=$pays->find(2);
$z->setNom("Kindia");
$z->setNbreHabitant(200000);
$z->setPay($p);

$entityManager->persist($z);
$entityManager->flush();*/

/*$z=$zone->find(1);

echo " Zone : ".$z ."<br>";;

$zs=$zone->findAll();
echo " listes des Utilisateurs <br>";
foreach ($zs as $zo) {
    echo $zo."<br>";
}*/

/*$z=$zone->find(2);
echo "Utilisateu a supprimer : <br> ".$z;
$entityManager->remove($z);
$entityManager->flush();
echo "<br>Utilisateu supprime. ";*/

/*$zo=$zone->find(4);

echo "Utilisateu a mettre a jour : <br> ".$zo;
$p=$pays->find(2);
$zo->setPay(null);
$zo->setNom("Dakar");
$zo->setNbreHabitant(45200);
$zo->setPay($p);


$entityManager->flush();

echo "<br>Utilisateur mis a jour : <br>".$zo;*/
