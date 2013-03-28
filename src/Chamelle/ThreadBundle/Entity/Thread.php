<?php

namespace Chamelle\ThreadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thread
 *
 * @ORM\Table(name="thread")
 * @ORM\Entity(repositoryClass="Chamelle\ThreadBundle\Entity\ThreadRepository")
 */
class Thread
{
    /**
     * @var integer
     *
     * @ORM\Column(name="thread_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Chamelle\ThreadBundle\Entity\Message", mappedBy="thread")
     */
    private $messages;

    /**
     * @var string
     *
     * @ORM\Column(name="thread_name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return Thread
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
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add messages
     *
     * @param \Chamelle\ThreadBundle\Entity\Message $messages
     * @return Thread
     */
    public function addMessage(\Chamelle\ThreadBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Chamelle\ThreadBundle\Entity\Message $messages
     */
    public function removeMessage(\Chamelle\ThreadBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }
}