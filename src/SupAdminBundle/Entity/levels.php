<?php

namespace SupAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * levels
 *
 * @ORM\Table(name="levels")
 * @ORM\Entity(repositoryClass="SupAdminBundle\Repository\levelsRepository")
 */
class levels
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
     * @ORM\Column(name="experience", type="integer")
     */
    private $experience;

    /**
     * @var int
     *
     * @ORM\Column(name="GainCoin", type="integer")
     */
    private $gainCoin;


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
     * Set experience
     *
     * @param integer $experience
     * @return levels
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set gainCoin
     *
     * @param integer $gainCoin
     * @return levels
     */
    public function setGainCoin($gainCoin)
    {
        $this->gainCoin = $gainCoin;

        return $this;
    }

    /**
     * Get gainCoin
     *
     * @return integer 
     */
    public function getGainCoin()
    {
        return $this->gainCoin;
    }
}
