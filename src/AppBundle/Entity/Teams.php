<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teams
 *
 * @ORM\Table(name="teams", indexes={@ORM\Index(name="leagueid", columns={"leagueid"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamsRepository")
 */
class Teams
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="strip", type="string", length=20, nullable=false)
     */
    private $strip;

    /**
     * @var integer
     *
     * @ORM\Column(name="leagueid", type="integer", nullable=false)
     */
    private $leagueid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getName()
    {
        return $this->name;
    }
    public function setLeaugeid($leagueid){
        $this->leagueid = $leagueid;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function setStrip($strip){
        $this->strip = $strip;
    }
    public function getLeaugeid(){
         return $this->name;
    }
}

