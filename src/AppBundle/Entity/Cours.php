<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="Title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Introduction", type="string", length=255)
     */
    protected $introduction;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $image;

    /**
     *
     */
    protected $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="cours")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set Category
     *
     * @param Category $category
     *
     * @return Cours
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @var Collection
     *
     * One Cours has Many Contenu.
     * @ORM\OneToMany(targetEntity="Contenu", mappedBy="cours", cascade={"persist"})
     */
    protected $contenus;

    /**
     * Add contenu
     *
     * @param Contenu $contenu
     *
     * @return Cours
     */
    public function addContenu(Contenu $contenu){
        $contenu->setCours($this);
        $this->contenus[] = $contenu;

        return $this;
    }

    /**
     * Remove contenu
     *
     * @param Contenu $contenu
     */
    public function removeContenu(Contenu $contenu){
        $contenu->setCours(null);
        $this->contenus->removeElement($contenu);
    }

    /**
     * Get contenus
     *
     * @return Collection|Contenu[]
     */
    public function getContenu()
    {
        return $this->contenus;
    }

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
     * Set title.
     *
     * @param string $title
     *
     * @return Cours
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set introduction.
     *
     * @param string $introduction
     *
     * @return Cours
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;

        return $this;
    }

    /**
     * Get introduction.
     *
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
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
     * Set image.
     *
     * @param string $image
     *
     * @return Cours
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    public function __construct()
    {
        $this->contenus = new ArrayCollection();
    }
}
