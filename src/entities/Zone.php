<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Colletions\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="zone")
*/
class Zone
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
     * @ORM\Column(type="integer")
    */
    private $nbreHabitant;
    /**
     * Many Zones have one Pays. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Pays", inversedBy="zones")
     */
    private $pay;
     /**
     * One Pays has many Zones. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Zone", mappedBy="zones")
     */
    private $pointSurvs;
    public function __construct()
    {
        $this->pointSurvs=new ArrayCollection();
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

    public function getNbreHabitant()
    {
        return $this->nbreHabitant;
    }

    public function setNbreHabitant($nbreHabitant)
    {
        $this->nbreHabitant=$nbreHabitant;
    }

    public function getPay()
    {
        return $this->pay;
    }

    public function setPay($pay)
    {
        $this->pay=$pay;
    }

    public function __toString()
    {
        return "Id ".$this->id." Nom ".$this->nom." NbreHabitant "
        .$this->nbreHabitant." pays ".$this->pay;
        
    }

}