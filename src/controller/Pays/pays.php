<?php
require_once '../../../bootstrap.php';
require_once '../../../Autoloader.php';

$p=$entityManager->getRepository(Pays::class);
$pays=$p->findAll();
if(isset($_POST['enregistrer']))
{
    extract($_POST);
    $p=new Pays();
    $p->setNom($nom);
    $entityManager->persist($p);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/pays/liste.php");
}

if(isset($_GET['id']))
{
    $idp=$_GET['id'];
    $pa=$p->find($idp);
    $entityManager->remove($pa);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/pays/liste.php");
}

if(isset($_POST['modifier']))
{
    extract($_POST);  
    $pm=$p->find($id);
    $pm->setNom($nom);
    $entityManager->flush();
    header("location:http://localhost/PHP/EPIDEMIA/src/views/pays/liste.php");

}
//require_once '../../entities/Pays.php';



/*$py=$p->find(1);

echo "pays ".$py."<br>";


echo " listes des Utilisateurs <br>";
foreach ($pays as $pa) {
    echo $pa."<br>";
}*/

/*$pa=$p->find(2);
echo "Utilisateu a supprimer : <br> ".$pa;
$entityManager->remove($pa);
$entityManager->flush();
echo "<br>Utilisateu supprime. ";*/

/*$pays=$p->find(2);

echo "Utilisateu a mettre a jour : <br> ".$pays;

$pays->setNom("Senegal");


$entityManager->flush();

echo "<br>Utilisateur mis a jour : <br>".$pays;*/
