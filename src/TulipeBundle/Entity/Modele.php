<?php

namespace TulipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele
 */
class Modele
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;


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
     * Set title
     *
     * @param string $title
     * @return Modele
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Modele
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @var \TulipeBundle\Entity\Categorie
     */
    private $categorie;

    /**
     * @var \TulipeBundle\Entity\Image
     */
    private $image;


    /**
     * Set categorie
     *
     * @param \TulipeBundle\Entity\Categorie $categorie
     * @return Modele
     */
    public function setCategorie(\TulipeBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \TulipeBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set image
     *
     * @param \TulipeBundle\Entity\Image $image
     * @return Modele
     */
    public function setImage(\TulipeBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \TulipeBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
}
