<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityHistory
 *
 * @ORM\Table(name="activity_history")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ActivityHistoryRepository")
 */
class ActivityHistory
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
     * @var \DateTime
     *
     * @ORM\Column(name="dat_deb", type="datetimetz")
     */
    private $datDeb;
	/**
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Activity")
     */
    private $activity;
	/**
     * @ORM\ManyToMany(targetEntity="EntrepriseBundle\Entity\gagnants")
     */
    private $gagnants;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetimetz")
     */
    private $dateFin;


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
     * Set datDeb
     *
     * @param \DateTime $datDeb
     * @return ActivityHistory
     */
    public function setDatDeb($datDeb)
    {
        $this->datDeb = $datDeb;

        return $this;
    }

    /**
     * Get datDeb
     *
     * @return \DateTime 
     */
    public function getDatDeb()
    {
        return $this->datDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return ActivityHistory
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
	
    /**
     * Set activity
     *
     * @param string $activity
     * @return Activity
     */
    public function setactivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string 
     */
    public function getactivity()
    {
        return $this->activity;
    }
	/**
     * Set gagnants
     *
     * @param string $gagnants
     * @return gagnants
     */
    public function setgagnants($gagnants)
    {
        $this->gagnants = $gagnants;

        return $this;
    }

    /**
     * Get gagnants
     *
     * @return string 
     */
    public function getgagnants()
    {
        return $this->gagnants;
    }
}
