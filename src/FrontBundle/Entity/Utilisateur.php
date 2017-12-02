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
     * @ORM\Column(name="nom", type="string", length=255 , nullable = true)
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
     * @ORM\Column(name="sexe", type="string", length=255 , nullable = true)
     */
    private $sexe;
    
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
     * @var string
     *
     * @ORM\Column(name="metier", type="string", length=255 , nullable = true)
     */
    private $metier;
    
    /**
     * @var string
     *
     * @ORM\Column(name="lieutravail", type="string", length=255 , nullable = true)
     */
    private $lieutravail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="niveauscolaire", type="string", length=255 , nullable = true)
     */
    private $niveauscolaire;
    
    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255 , nullable = true)
     */
    private $diplome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="situation", type="string", length=255 , nullable = true)
     */
    private $situation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255 , nullable = true)
     */
    private $pays;
    
    /**
     * @var string
     *
     * @ORM\Column(name="siteweb", type="string", length=255 , nullable = true)
     */
    private $siteweb;
    
    /**
     * @var string
     *
     * @ORM\Column(name="langues", type="string", length=255 , nullable = true)
     */
    private $langues;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255 , nullable = true)
     */
    private $description;
    
    /**
     * @var string
     *
     * @ORM\Column(name="datavalider", type="string", length=255 , nullable = true)
     */
    private $datavalider;
    
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
    
    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Utilisateur
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }
    
    /**
     * Set metier
     *
     * @param string $metier
     * @return Utilisateur
     */
    public function setMetier($metier)
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * Get metier
     *
     * @return string 
     */
    public function getMetier()
    {
        return $this->metier;
    }
    
    /**
     * Set lieutravail
     *
     * @param string $lieutravail
     * @return Utilisateur
     */
    public function setLieutravail($lieutravail)
    {
        $this->lieutravail = $lieutravail;

        return $this;
    }

    /**
     * Get lieutravail
     *
     * @return string 
     */
    public function getLieutravail()
    {
        return $this->lieutravail;
    }
    
    /**
     * Set niveauscolaire
     *
     * @param string $niveauscolaire
     * @return Utilisateur
     */
    public function setNiveauscolaire($niveauscolaire)
    {
        $this->niveauscolaire = $niveauscolaire;

        return $this;
    }

    /**
     * Get niveauscolaire
     *
     * @return string 
     */
    public function getNiveauscolaire()
    {
        return $this->niveauscolaire;
    }
    
    /**
     * Set diplome
     *
     * @param string $diplome
     * @return Utilisateur
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string 
     */
    public function getDiplome()
    {
        return $this->diplome;
    }
    
    /**
     * Set pays
     *
     * @param string $pays
     * @return Utilisateur
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }
    
    /**
     * Set situation
     *
     * @param string $situation
     * @return Utilisateur
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Get situation
     *
     * @return string 
     */
    public function getSituation()
    {
        return $this->situation;
    }
    
    /**
     * Set siteweb
     *
     * @param string $siteweb
     * @return Utilisateur
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
     * Set langues
     *
     * @param string $langues
     * @return Utilisateur
     */
    public function setLangues($langues)
    {
        $this->langues = $langues;

        return $this;
    }

    /**
     * Get langues
     *
     * @return string 
     */
    public function getLangues()
    {
        return $this->langues;
    }
    
    /**
     * Set description
     *
     * @param string $description
     * @return Utilisateur
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
     * Set datavalider
     *
     * @param string $datavalider
     * @return Utilisateur
     */
    public function setDatavalider($datavalider)
    {
        $this->datavalider = $datavalider;

        return $this;
    }

    /**
     * Get datavalider
     *
     * @return string 
     */
    public function getDatavalider()
    {
        return $this->datavalider;
    }
}
