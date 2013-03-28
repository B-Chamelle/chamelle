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
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Chamelle\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @var Team
     * 
     * @ORM\Column(name="team_id", type="integer")
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Chamelle\UserBundle\Entity\Team")
     */
    private $team;

    /**
     * Set user
     *
     * @param string $user
     * @return UserTeam
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set team
     *
     * @param string $team
     * @return UserTeam
     */
    public function setTeam($team)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return string 
     */
    public function getTeam()
    {
        return $this->team;
    }
}