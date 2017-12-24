<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journal
 *
 * @ORM\Table(name="journal")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\JournalRepository")
 */
class Journal
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
     * @ORM\ManyToOne(targetEntity="FrontBundle\Entity\Utilisateur")
     */
    private $utilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="description", type="string", nullable=true, length=255)
     */
    private $description;
    
    /**
     * @var int
     *
     * @ORM\Column(name="title", type="string", nullable=true, length=255)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime", nullable = true)
     */
    private $date;


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
     * Set description
     *
     * @param string $description
     * @return Journal
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
     * Set title
     *
     * @param string $title
     * @return Journal
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Journal
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Journal
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set utilisateur
     *
     * @param \FrontBundle\Entity\Utilisateur $utilisateur
     * @return Journal
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
