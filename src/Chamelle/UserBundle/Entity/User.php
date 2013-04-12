<?php

namespace Chamelle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Chamelle\UserBundle\Entity\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="Chamelle\UserBundle\Entity\UserThread", mappedBy="user")
     */
    private $userThreads;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=255, unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="user_hash", type="string", length=64)
     * @Assert\MinLength(64)
     * @Assert\MaxLength(64)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="user_salt", type="string", length=64)
     * @Assert\MinLength(64)
     * @Assert\MaxLength(64)
     */
    private $salt;
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userThreads = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get hash
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }
    
    /**
     * Add userThreads
     *
     * @param \Chamelle\User\Entity\UserThread $userThread
     * @return User
     */
    public function addUserThread(\Chamelle\User\Entity\UserThread $userThread)
    {
        $this->userThreads[] = $userThread;
        $userThread->setUser($this);
    
        return $this;
    }

    /**
     * Remove userThreads
     *
     * @param \Chamelle\User\Entity\UserThread $userThread
     */
    public function removeUserThread(\Chamelle\User\Entity\UserThread $userThread)
    {
        $this->userThreads->removeElement($userThread);
    }

    /**
     * Get userThreads
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUserThreads()
    {
        return $this->userThreads;
    }
    
    
    /**************************************************************************
     ****                    AUTHENTICATION MANAGEMENT                     ****
     **************************************************************************/

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
        return array('ROLE_USER'); //we don't manage different roles
    }

    public function eraseCredentials()
    {
        
    }
}