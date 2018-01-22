<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\AdminRepository")
 */
class Admin
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
     * @ORM\Column(name="Nom", type="string", length=50, nullable = true)
     */
	 
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=100, nullable = true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=150, nullable = true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", unique=true, nullable = true)
     */
    private $cin;

    /**
     * @var int
     *
     * @ORM\Column(name="Numero", type="integer", nullable = true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=100, unique=true, nullable = true)
     */
    private $pseudo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imageprofil", type="string", length=255, nullable = true)
     */
    private $imageprofil;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagecouverture", type="string", length=255, nullable = true)
     */
    private $imagecouverture;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="date_membre", type="datetime", nullable = true)
     */
    private $date_membre;

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
     * @return Admin
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
     * Set prenom
     *
     * @param string $prenom
     * @return Admin
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Admin
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
     * Set numero
     *
     * @param integer $numero
     * @return Admin
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Admin
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set imageprofil
     *
     * @param string $imageprofil
     * @return Admin
     */
    public function setImageprofil($imageprofil)
    {
        $this->imageprofil = $imageprofil;

        return $this;
    }

    /**
     * Get imageprofil
     *
     * @return string 
     */
    public function getImageprofil()
    {
        return $this->imageprofil;
    }

    /**
     * Set imagecouverture
     *
     * @param string $imagecouverture
     * @return Admin
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
     * Set cin
     *
     * @param integer $cin
     * @return Admin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return integer 
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Admin
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
     * Set date_membre
     *
     * @param \DateTime $dateMembre
     * @return Admin
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
}
