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
     * @ORM\ManyToOne(targetEntity="Chamelle\UserBundle\Entity\User")
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
    private $team;

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
     * Set team
     *
     * @param \Chamelle\ThreadBundle\Entity\Thread $team
     * @return UserThread
     */
    public function setTeam(\Chamelle\ThreadBundle\Entity\Thread $team)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return \Chamelle\ThreadBundle\Entity\Thread 
     */
    public function getTeam()
    {
        return $this->team;
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