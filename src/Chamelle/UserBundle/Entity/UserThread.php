<?php
 
namespace Chamelle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
 
/**
 * UserThread
 *
 * @ORM\Table(name="user_thread")
 * @ORM\Entity
 */
class UserThread
{
    /**
     * @var User
     * 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Chamelle\UserBundle\Entity\User", inversedBy="userThreads")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id", nullable=false)
     */
    private $user;

    /**
     * @var Thread
     * 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Chamelle\ThreadBundle\Entity\Thread")
     * @ORM\JoinColumn(name="thread_id", referencedColumnName="thread_id", nullable=false)
     */
    private $thread;

    /**
     * @var Thread
     * 
     * @ORM\ManyToOne(targetEntity="Chamelle\ThreadBundle\Entity\Message")
     * @ORM\JoinColumn(name="msg_id", referencedColumnName="msg_id", nullable=true)
     */
    private $lastMsgRead;
    

    /**
     * Set user
     *
     * @param \Chamelle\UserBundle\Entity\User $user
     * @return UserThread
     */
    public function setUser(\Chamelle\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Chamelle\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set thread
     *
     * @param \Chamelle\ThreadBundle\Entity\Thread $thread
     * @return UserThread
     */
    public function setThread(\Chamelle\ThreadBundle\Entity\Thread $thread)
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

    /**
     * Set lastMsgRead
     *
     * @param \Chamelle\ThreadBundle\Entity\Message $lastMsgRead
     * @return UserThread
     */
    public function setLastMsgRead(\Chamelle\ThreadBundle\Entity\Message $lastMsgRead = null)
    {
        $this->lastMsgRead = $lastMsgRead;
    
        return $this;
    }

    /**
     * Get lastMsgRead
     *
     * @return \Chamelle\ThreadBundle\Entity\Message 
     */
    public function getLastMsgRead()
    {
        return $this->lastMsgRead;
    }
}