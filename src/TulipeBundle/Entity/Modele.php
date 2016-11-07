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
    private $titre;

    /**
     * @var string
     */
    private $contenu;


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
     * Set titre
     *
     * @param string $titre
     * @return Modele
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Modele
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
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
