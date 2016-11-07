<?php

namespace TulipeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Whoami
 */
class Whoami
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $text;


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
     * Set text
     *
     * @param string $text
     * @return Whoami
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }
    /**
     * @var \TulipeBundle\Entity\Image
     */
    private $image;


    /**
     * Set image
     *
     * @param \TulipeBundle\Entity\Image $image
     * @return Whoami
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
