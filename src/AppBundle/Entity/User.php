<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->cours = new ArrayCollection();
    }

    /**
     * @var Collection
     *
     * Many User have Many Cours.
     * @ORM\ManyToMany(targetEntity="Cours", inversedBy="usercours", cascade={"persist"})
     * @ORM\JoinTable(name="user_cours")
     */
    protected $cours;

    /**
     * @return Collection
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * @param Collection $cours
     */
    public function setCours($cours)
    {
        $this->cours = $cours;
    }
}