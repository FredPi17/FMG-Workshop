<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenu
 *
 * @ORM\Table(name="contenu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContenuRepository")
 */
class Contenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Info", type="string", length=255, nullable=true)
     */
    protected $info;

    /**
     * @var string
     *
     * @ORM\Column(name="SousTitre", type="string", length=255, nullable=true)
     */
    protected $sousTitre;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $image;

    /**
     *
     */
    protected $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="Cours", inversedBy="contenus")
     * @ORM\JoinColumn(name="cours_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $cours;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return Contenu
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set contenu.
     *
     * @param string $info
     *
     * @return Contenu
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info.
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @return mixed
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * @param mixed $sousTitre
     */
    public function setSousTitre($sousTitre)
    {
        $this->sousTitre = $sousTitre;
    }

    /**
     * @return mixed
     */
    public function getImage(){
        return $this->image;
    }

    /**
     * @return mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImageFile(){
        return $this->imageFile;
    }

    /**
     * @param mixed $imageFile
     */
    public function setImageFile($imageFile){
        $this->imageFile = $imageFile;
    }

    /**
     * Get cours
     *
     * @return Cours
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set cours
     *
     * @param Cours $cours
     *
     * @return Contenu
     */
    public function setCours(Cours $cours = null)
    {
        $this->cours = $cours;
        return $this;
    }
}
