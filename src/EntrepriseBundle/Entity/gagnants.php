<?php

namespace EntrepriseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * gagnants
 *
 * @ORM\Table(name="gagnants")
 * @ORM\Entity(repositoryClass="EntrepriseBundle\Repository\gagnantsRepository")
 */
class gagnants
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
   * @ORM\OneToOne(targetEntity="SupAdminBundle\Entity\cadeaux")
   */
  private $cadeaux;
/**
   *  @ORM\OneToOne(targetEntity="FrontBundle\Entity\Utilisateur")
   */
  private $Utilisateur;

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
        return $this->$cadeaux;
    }
	/**
     * Set Utilisateur
     *
     * @param string $Utilisateur
     * @return Activity
     */
    public function setUtilisateur($Utilisateur)
    {
        $this->Utilisateur = $Utilisateur;
        return $this;
    }

    /**
     * Get Utilisateur
     *
     * @return string 
     */
    public function getUtilisateur()
    {
        return $this->$Utilisateur;
    }
}
