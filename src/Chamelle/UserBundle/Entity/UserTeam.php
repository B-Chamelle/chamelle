<?php
 
namespace Chamelle\UserBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * UserTeam
 *
 * @ORM\Table(name="user_team")
 * @ORM\Entity
 */
class UserTeam
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
     * @var Team
     * 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Chamelle\UserBundle\Entity\Team")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="team_id", nullable=false)
     */
    private $team;

    /**
     * Set user
     *
     * @param \Chamelle\UserBundle\Entity\User $user
     * @return UserTeam
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
     * @param \Chamelle\UserBundle\Entity\Team $team
     * @return UserTeam
     */
    public function setTeam(\Chamelle\UserBundle\Entity\Team $team)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return \Chamelle\UserBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }
}