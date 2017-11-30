<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(name="Nom", type="string", length=255 , nullable = true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable = true)
     */
    private $prenom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, nullable = true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable = true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable = true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudo", type="string", length=255, unique=true, nullable = true)
     */
    private $pseudo;

    /**
     * @var int
     *
     * @ORM\Column(name="coin", type="integer", nullable = true)
     */
    private $coin;
    
    /**
     * @var int
     *
     * @ORM\Column(name="experience", type="integer", nullable = true)
     */
    private $experience;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="date_nais", type="datetime", nullable = true)
     */
    private $date_nais;
    
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
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
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
     * Set User
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
     * Get User
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateur
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
     * @return Utilisateur
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
     * @return Utilisateur
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
     * @return Utilisateur
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
     * Set coin
     *
     * @param integer $coin
     * @return Utilisateur
     */
    public function setCoin($coin)
    {
        $this->coin = $coin;

        return $this;
    }

    /**
     * Get coin
     *
     * @return integer 
     */
    public function getCoin()
    {
        return $this->experience;
    } 
	/**
     * Set experience
     *
     * @param integer $experience
     * @return Utilisateur
     */
    public function setexperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getexperience()
    {
        return $this->experience;
    }
    
    /**
     * Set cin
     *
     * @param string $cin
     * @return Utilisateur
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string 
     */
    public function getCin()
    {
        return $this->cin;
    }
    
    /**
     * Set date_nais
     *
     * @param datetime $date_nais
     * @return Utilisateur
     */
    public function setDate_nais($date_nais)
    {
        $this->date_nais = $date_nais;

        return $this;
    }

    /**
     * Get date_nais
     *
     * @return datetime 
     */
    public function getDate_nais()
    {
        return $this->date_nais;
    }
}
