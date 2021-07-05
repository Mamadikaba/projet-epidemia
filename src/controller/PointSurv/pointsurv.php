<?php
require_once '../../../bootstrap.php';
require_once '../../../Autoloader.php';


$pts=$entityManager->getRepository(PointSurv::class);
$zo=$entityManager->getRepository(Zone::class);

if(isset($_POST['enregistrer']))
{  
    extract($_POST);
    $pt=new PointSurv();
    $z=$zo->find($zone);
    $pt->setNom($nom);
    $pt->setNbreHabitantSyp($nb_hab_syp);
    $pt->setNbreHabitantPos($nb_hab_pos);
    $pt->setZone($z);
    $entityManager->persist($pt);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/pointSurv/liste.php");
}

if(isset($_GET['id']))
{
    $idp=$_GET['id'];
    $p=$pts->find($idp);
    $entityManager->remove($p);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/pointSurv/liste.php");
}

if(isset($_POST['modifier']))
{
    extract($_POST);  
    $pm=$pts->find($id);
    $pm->setZone(null);
    $pm->setNom($nom);
    $z=$zo->find($zone);
    $pm->setNbreHabitantSyp($nb_hab_syp);
    $pm->setNbreHabitantPos($nb_hab_pos);
    $pm->setZone($z);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/pointSurv/liste.php");

}
/*$pt=new PointSurv();
$z=$zone->find(1);
$pt->setNom("Sougueta");
$pt->setNbreHabitantSyp(200);
$pt->setNbreHabitantPos(1500);
$pt->setZone($z);

$entityManager->persist($pt);
$entityManager->flush();*/
$p=$pt->find(2);

echo " PointSurv : ".$p ."<br>";