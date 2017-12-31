<?php

namespace SupAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cadeaux
 *
 * @ORM\Table(name="cadeaux")
 * @ORM\Entity(repositoryClass="SupAdminBundle\Repository\cadeauxRepository")
 */
class cadeaux
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
     * @ORM\Column(name="nombre", type="integer", unique=true)
     */
    private $nombre;

	/**
     * @var string
     *
     * @ORM\Column(name="Libelle", type="string", length=100)
     */
    private $libelle;
	
    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=100)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

	/**
     * @var string
     *
     * @ORM\Column(name="Chemin", type="string", length=255, nullable=true)
     */
    private $chemin;
	
    /**
     * @var string
     *
     * @ORM\Column(name="rang", type="string", length=255)
     */
    private $rang;
    
    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Activity")
     */
    private $activity;

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
     * Set nombre
     *
     * @param integer $nombre
     * @return cadeaux
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return integer 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

	 /**
     * Set libelle
     *
     * @param string $libelle
     * @return cadeaux
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $libelle;
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
     * Set type
     *
     * @param string $type
     * @return cadeaux
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return cadeaux
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }
	
	 /**
     * Set chemin
     *
     * @param string $chemin
     * @return cadeaux
     */
    public function setChemin($chemin)
    {
        $this->chemin = $chemin;

        return $chemin;
    }

    /**
     * Get chemin
     *
     * @return string 
     */
    public function getChemin()
    {
        return $this->chemin;
    }

    /**
     * Set rang
     *
     * @param string $rang
     * @return cadeaux
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return string 
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set activity
     *
     * @param \AdminBundle\Entity\Activity $activity
     * @return cadeaux
     */
    public function setActivity(\AdminBundle\Entity\Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \AdminBundle\Entity\Activity 
     */
    public function getActivity()
    {
        return $this->activity;
    }
}
