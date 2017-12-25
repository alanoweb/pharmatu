<?php

namespace EntrepriseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity(repositoryClass="EntrepriseBundle\Repository\EntrepriseRepository")
 */
class Entreprise
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
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable = true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable = true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer",nullable=true)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="portable", type="integer",nullable=true)
     */
    private $portable;

    /**
     * @var int
     *
     * @ORM\Column(name="fax", type="integer",nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=50, unique=true,nullable=true)
     */
    private $siteweb;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagecouverture", type="string", length=255, nullable = true)
     */
    private $imagecouverture;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="date_membre", type="datetime", nullable = true)
     */
    private $date_membre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255 , nullable = true)
     */
    private $description;


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
     * Set user
     *
     * @param string $user
     * @return Activity
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Entreprise
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Entreprise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Entreprise
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set portable
     *
     * @param integer $portable
     * @return Entreprise
     */
    public function setPortable($portable)
    {
        $this->portable = $portable;

        return $this;
    }

    /**
     * Get portable
     *
     * @return integer 
     */
    public function getPortable()
    {
        return $this->portable;
    }

    /**
     * Set fax
     *
     * @param integer $fax
     * @return Entreprise
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return integer 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set siteweb
     *
     * @param string $siteweb
     * @return Entreprise
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb
     *
     * @return string 
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set imagecouverture
     *
     * @param string $imagecouverture
     * @return Entreprise
     */
    public function setImagecouverture($imagecouverture)
    {
        $this->imagecouverture = $imagecouverture;

        return $this;
    }

    /**
     * Get imagecouverture
     *
     * @return string 
     */
    public function getImagecouverture()
    {
        return $this->imagecouverture;
    }

    /**
     * Set date_membre
     *
     * @param \DateTime $dateMembre
     * @return Entreprise
     */
    public function setDateMembre($dateMembre)
    {
        $this->date_membre = $dateMembre;

        return $this;
    }

    /**
     * Get date_membre
     *
     * @return \DateTime 
     */
    public function getDateMembre()
    {
        return $this->date_membre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Entreprise
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
}
