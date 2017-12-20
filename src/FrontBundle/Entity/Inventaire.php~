<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventaire
 *
 * @ORM\Table(name="inventaire")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\InventaireRepository")
 */
class Inventaire
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
     * @ORM\ManyToOne(targetEntity="SupAdminBundle\Entity\cadeaux")
     */
    private $cadeau;
    
    /**
     * @ORM\ManyToOne(targetEntity="FrontBundle\Entity\Utilisateur")
     */
    private $utilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer", nullable=true)
     */
    private $nombre;


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
     * @return Inventaire
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
     * Set cadeau
     *
     * @param \SupAdminBundle\Entity\cadeaux $cadeau
     * @return Inventaire
     */
    public function setCadeau(\SupAdminBundle\Entity\cadeaux $cadeau = null)
    {
        $this->cadeau = $cadeau;

        return $this;
    }

    /**
     * Get cadeau
     *
     * @return \SupAdminBundle\Entity\cadeaux 
     */
    public function getCadeau()
    {
        return $this->cadeau;
    }

    /**
     * Set utilisateur
     *
     * @param \FrontBundle\Entity\Utilisateur $utilisateur
     * @return Inventaire
     */
    public function setUtilisateur(\FrontBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \FrontBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
