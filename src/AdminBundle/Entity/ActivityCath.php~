<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityCath
 *
 * @ORM\Table(name="activity_cath")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ActivityCathRepository")
 */
class ActivityCath
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;
    
    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="activation", type="boolean")
     */
    private $activation;

     /**
     * @var int
     *
     * @ORM\Column(name="nbr_act", type="integer")
     */
    private $nbr_act;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
     /**
     * Get nbr_act
     *
     * @return integer 
     */
    public function getNbrAct()
    {
        return $this->nbr_act;
    }

    /**
     * Set nbr_act
     *
     * @param string $nbr_act
     * @return ActivityCath
     */
    public function setNbrAct($nbr_act)
    {
        $this->nbr_act = $nbr_act;

        return $this;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return ActivityCath
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    
    /**
     * Set status
     *
     * @param string $status
     * @return ActivityCath
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Set img
     *
     * @param string $img
     * @return ActivityCath
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ActivityCath
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set activation
     *
     * @param boolean $activation
     * @return ActivityCath
     */
    public function setActivation($activation)
    {
        $this->activation = $activation;

        return $this;
    }

    /**
     * Get activation
     *
     * @return boolean 
     */
    public function getActivation()
    {
        return $this->activation;
    }
}
