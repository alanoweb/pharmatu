<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="FrontBundle\Entity\Utilisateur")
     */
    private $utilisateur;

    /**
     * @ORM\OneToOne(targetEntity="EntrepriseBundle\Entity\Entreprise")
     */
    private $entreprise;

    /**
     * @ORM\OneToOne(targetEntity="AdminBundle\Entity\Admin")
     */
    private $admin;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set Utilisateur
     *
     * @param string $utilisateur
     * @return User
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
     * Set Entreprise
     *
     * @param string $entreprise
     * @return User
     */
    public function setEntreprise($entreprise) {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get Admin
     *
     * @return string 
     */
    public function getAdmin() {
        return $this->admin;
    }

    /**
     * Set Admin
     *
     * @param string $admin
     * @return User
     */
    public function setAdmin($admin) {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get Entreprise
     *
     * @return string 
     */
    public function getEntreprise() {
        return $this->entreprise;
    }

    public function __construct() {
        parent::__construct();
        // your own logic
        $this->roles = array('ROLE_USER');
    }

}
