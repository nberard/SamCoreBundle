<?php

/**
 * Description of class UserSim
 *
 * @author akambi
 */

namespace CanalTP\IussaadCoreBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="t_user")
 */
class User extends BaseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $groups;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $applicationRoles;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->applicationRoles = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set firstname
     *
     * @param  string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param  string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Add applicationRoles
     *
     * @param \CanalTP\IussaadCoreBundle\Entity\ApplicationRole $applicationRoles
     * @return User
     */
    public function addApplicationRole(\CanalTP\IussaadCoreBundle\Entity\ApplicationRole $applicationRoles)
    {
        $this->applicationRoles[] = $applicationRoles;
    
        return $this;
    }

    /**
     * Remove applicationRoles
     *
     * @param \CanalTP\IussaadCoreBundle\Entity\ApplicationRole $applicationRoles
     */
    public function removeApplicationRole(\CanalTP\IussaadCoreBundle\Entity\ApplicationRole $applicationRoles)
    {
        $this->applicationRoles->removeElement($applicationRoles);
    }

    /**
     * Get applicationRoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getApplicationRoles()
    {
        return $this->applicationRoles;
    }
}