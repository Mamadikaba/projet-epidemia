<?php
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="pointsurv")
*/
class PointSurv
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
    private $nbreHabitantSyp;
    /**
     * @ORM\Column(type="integer")
    */
    private $nbreHabitantPos;
    /**
     * Many Zones have one Pays. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Zone", inversedBy="pointSurvs")
     */
    private $zone;

    public function __construct()
    {

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

    public function getNbreHabitantSyp()
    {
        return $this->nbreHabitantSyp;
    }

    public function setNbreHabitantSyp($nbreHabitantSyp)
    {
        $this->nbreHabitantSyp=$nbreHabitantSyp;
    }

    public function getNbreHabitantPos()
    {
        return $this->nbreHabitantPos;
    }

    public function setNbreHabitantPos($nbreHabitantPos)
    {
        $this->nbreHabitantPos=$nbreHabitantPos;
    }

    public function getZone()
    {
        return $this->zone;
    }

    public function setZone($zone)
    {
        $this->zone=$zone;
    }

    public function __toString()
    {
        return "Id ".$this->id." Nom ".$this->nom." NbreHabitant Symp "
        .$this->nbreHabitantSyp." NbreHabitant Positif "
        .$this->nbreHabitantPos." Zone ".$this->zone->getNom();
        
    }

    
}