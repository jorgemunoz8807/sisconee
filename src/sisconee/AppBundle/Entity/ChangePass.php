<?php

namespace sisconee\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChangePass
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="sisconee\AppBundle\Entity\ChangePassRepository")
 */
class ChangePass
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
     * @var string
     *
     * @ORM\Column(name="oldPass", type="string", length=255)
     */
    private $oldPass;

    /**
     * @var string
     *
     * @ORM\Column(name="newPass", type="string", length=255)
     */
    private $newPass;


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
     * Set oldPass
     *
     * @param string $oldPass
     * @return ChangePass
     */
    public function setOldPass($oldPass)
    {
        $this->oldPass = $oldPass;

        return $this;
    }

    /**
     * Get oldPass
     *
     * @return string 
     */
    public function getOldPass()
    {
        return $this->oldPass;
    }

    /**
     * Set newPass
     *
     * @param string $newPass
     * @return ChangePass
     */
    public function setNewPass($newPass)
    {
        $this->newPass = $newPass;

        return $this;
    }

    /**
     * Get newPass
     *
     * @return string 
     */
    public function getNewPass()
    {
        return $this->newPass;
    }
}
