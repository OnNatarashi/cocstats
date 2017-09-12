<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Batiment_hdv
 *
 * @ORM\Table(name="batiment_hdv")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\Batiment_hdvRepository")
 */
class Batiment_hdv
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="level_max", type="integer")
     */
    private $levelMax;

    /**
    * @ORM\ManyToOne(targetEntity="Batiment")
    */
    private $batiment;

    /**
    * @ORM\ManyToOne(targetEntity="Hdv")
    */
    private $hdv;
    



   













    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set levelMax
     *
     * @param integer $levelMax
     *
     * @return Batiment_hdv
     */
    public function setLevelMax($levelMax)
    {
        $this->levelMax = $levelMax;

        return $this;
    }

    /**
     * Get levelMax
     *
     * @return int
     */
    public function getLevelMax()
    {
        return $this->levelMax;
    }

   

    /**
     * Set batiment
     *
     * @param \BackendBundle\Entity\Batiment $batiment
     *
     * @return Batiment_hdv
     */
    public function setBatiment(\BackendBundle\Entity\Batiment $batiment = null)
    {
        $this->batiment = $batiment;

        return $this;
    }

    /**
     * Get batiment
     *
     * @return \BackendBundle\Entity\Batiment
     */
    public function getBatiment()
    {
        return $this->batiment;
    }

    /**
     * Set hdv
     *
     * @param \BackendBundle\Entity\Hdv $hdv
     *
     * @return Batiment_hdv
     */
    public function setHdv(\BackendBundle\Entity\Hdv $hdv = null)
    {
        $this->hdv = $hdv;

        return $this;
    }

    /**
     * Get hdv
     *
     * @return \BackendBundle\Entity\Hdv
     */
    public function getHdv()
    {
        return $this->hdv;
    }
}
