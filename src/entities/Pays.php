<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Colletions\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="pays")
*/
class Pays
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string")
    */
    private $nom;
     /**
     * One Pays has many Zones. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Zone", mappedBy="pay")
     */
    private $zones;
    #$this->zones=new ArrayCollection();
    public function __construct()
    {
         $this->zones=new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id=$id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom=$nom;
    }

    public function __toString()
     {
        return "Id ".$this->id." Nom ".$this->nom;
        
    }
}