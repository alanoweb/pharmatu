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
     * @ORM\Column(name="nbr_de_coin", type="integer", unique=true)
     */
    private $nbrDeCoin;

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
     * @ORM\Column(name="Chemin", type="string", length=255)
     */
    private $chemin;

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
     * Set nbrDeCoin
     *
     * @param integer $nbrDeCoin
     * @return cadeaux
     */
    public function setNbrDeCoin($nbrDeCoin)
    {
        $this->nbrDeCoin = $nbrDeCoin;

        return $this;
    }

    /**
     * Get nbrDeCoin
     *
     * @return integer 
     */
    public function getNbrDeCoin()
    {
        return $this->nbrDeCoin;
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
}
