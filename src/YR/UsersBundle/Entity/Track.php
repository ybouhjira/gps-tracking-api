<?php

namespace YR\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Track
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="tracks")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    protected $user;

    /**
    * @ORM\OneToMany(targetEntity="Position", mappedBy="track")
    */
    protected $positions;


    public function __construct() {
      $this->positions = new ArrayCollection();
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
     * Set user
     *
     * @param \YR\UsersBundle\Entity\User $user
     * @return Track
     */
    public function setUser(\YR\UsersBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \YR\UsersBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add positions
     *
     * @param \YR\UsersBundle\Entity\Position $positions
     * @return Track
     */
    public function addPosition(\YR\UsersBundle\Entity\Position $positions)
    {
        $this->positions[] = $positions;

        return $this;
    }

    /**
     * Remove positions
     *
     * @param \YR\UsersBundle\Entity\Position $positions
     */
    public function removePosition(\YR\UsersBundle\Entity\Position $positions)
    {
        $this->positions->removeElement($positions);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPositions()
    {
        return $this->positions;
    }
}
