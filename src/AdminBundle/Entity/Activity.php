<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ActivityRepository")
 */
class Activity
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
     * @ORM\Column(name="Nom", type="string", length=100, unique=true)
     */
    private $nom;
	/**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=100)
     */
    private $img;
    /**
     * @var string
     *
     * @ORM\Column(name="descrp", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\ActivityCath")
     */
    private $categorie;
     /**
     * @ORM\ManyToMany(targetEntity="SupAdminBundle\Entity\cadeaux")
     */
    private $cadeaux;

    /**
     * @var int
     *
     * @ORM\Column(name="Nbr_point", type="integer")
     */
    private $nbrPoint;
    /**
     * @var int
     *
     * @ORM\Column(name="experience", type="integer")
     */
    private $experience; 
	/**
     * @var datetime
     *
     * @ORM\Column(name="dat_deb", type="datetime")
     */
    private $dat_deb;
	/**
     * @var datetime
     *
     * @ORM\Column(name="dat_fin", type="datetime")
     */
    private $dat_fin;


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
     * @return Activity
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
     * Set img
     *
     * @param string $img
     * @return Activity
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
     * @return Activity
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
     * Set categorie
     *
     * @param string $categorie
     * @return Activity
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
 /**
     * Set cadeaux
     *
     * @param string $cadeaux
     * @return Activity
     */
    public function setcadeaux($cadeaux)
    {
        $this->cadeaux = $cadeaux;

        return $this;
    }

    /**
     * Get cadeaux
     *
     * @return string 
     */
    public function getcadeaux()
    {
        return $this->cadeaux;
    }

    /**
     * Set nbrPoint
     *
     * @param integer $nbrPoint
     * @return Activity
     */
    public function setNbrPoint($nbrPoint)
    {
        $this->nbrPoint = $nbrPoint;

        return $this;
    }

    /**
     * Get nbrPoint
     *
     * @return integer 
     */
    public function getNbrPoint()
    {
        return $this->nbrPoint;
    } 
	/**
     * Set experience
     *
     * @param integer $experience
     * @return Activity
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
     * Set dat_deb
     *
     * @param datetime $dat_deb
     * @return Activity
     */
    public function setdat_deb($dat_deb)
    {
        $this->dat_deb = $dat_deb;

        return $this;
    }

    /**
     * Get dat_deb
     *
     * @return datetime 
     */
    public function getdat_deb()
    {
        return $this->dat_deb;
    }
	/**
     * Set dat_fin
     *
     * @param datetime $dat_fin
     * @return Activity
     */
    public function setdat_fin($dat_fin)
    {
        $this->dat_fin = $dat_fin;

        return $this;
    }

    /**
     * Get dat_fin
     *
     * @return datetime 
     */
    public function getdat_fin()
    {
        return $this->dat_fin;
    }
}
