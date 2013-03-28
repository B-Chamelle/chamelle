<?php

namespace Chamelle\ThreadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="Chamelle\ThreadBundle\Entity\MessageRepository")
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="msg_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var \Chamelle\ThreadBundle\Entity\Thread
     *
     * @ORM\ManyToOne(targetEntity="Chamelle\ThreadBundle\Entity\Thread", inversedBy="messages")
     * @ORM\JoinColumn(name="thread_id", referencedColumnName="thread_id", nullable=false)
     */
    private $thread;

    /**
     * @var string
     *
     * @ORM\Column(name="msg_body", type="text")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="msg_date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="msg_length", type="integer")
     */
    private $length;


    /**
     * Set body
     *
     * @param string $body
     * @return Message
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
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
     * Set date
     *
     * @param \DateTime $date
     * @return Message
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
     * Set length
     *
     * @param integer $length
     * @return Message
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set thread
     *
     * @param integer $thread
     * @return Message
     */
    public function setThread($thread)
    {
        $this->thread = $thread;
    
        return $this;
    }

    /**
     * Get thread
     *
     * @return \Chamelle\ThreadBundle\Entity\Thread
     */
    public function getThread()
    {
        return $this->thread;
    }
}