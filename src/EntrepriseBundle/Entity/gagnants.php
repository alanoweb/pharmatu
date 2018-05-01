<?php

namespace EntrepriseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * gagnants
 *
 * @ORM\Table(name="gagnants")
 * @ORM\Entity(repositoryClass="EntrepriseBundle\Repository\gagnantsRepository")
 */
class gagnants {

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
     * @ORM\Column(name="section", type="string", length=255)
     */
    private $section;

    /**
     * @ORM\OneToOne(targetEntity="SupAdminBundle\Entity\cadeaux")
     */
    private $cadeaux;

    /**
     *  @ORM\OneToOne(targetEntity="FrontBundle\Entity\Utilisateur")
     */
    private $utilisateur;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="rang", type="string", length=255)
     */
    private $rang;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set Cadeaux
     *
     * @param string $cadeaux
     * @return gagnants
     */
    public function setCadeaux($cadeaux) {
        $this->cadeaux = $cadeaux;

        return $this;
    }

    /**
     * Get Cadeaux
     *
     * @return string 
     */
    public function getCadeaux() {
        return $this->cadeaux;
    }

    /**
     * Set Utilisateur
     *
     * @param string $utilisateur
     * @return gagnants
     */
    public function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    /**
     * Get Utilisateur
     *
     * @return string 
     */
    public function getUtilisateur() {
        return $this->utilisateur;
    }

    /**
     * Set Date
     *
     * @param datetime $date
     * @return gagnants
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get Date
     *
     * @return datetime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set rang
     *
     * @param string $rang
     * @return gagnants
     */
    public function setRang($rang) {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return string 
     */
    public function getRang() {
        return $this->rang;
    }


    /**
     * Set section
     *
     * @param string $section
     * @return gagnants
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return string 
     */
    public function getSection()
    {
        return $this->section;
    }
}
