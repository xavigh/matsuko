<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="picCategory", type="string", length=255, nullable=true)
     */
    private $picCategory;


    /**
     * @ORM\OneToMany(targetEntity="MusicApp", mappedBy="category")
     */
    private $songs;

    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set picCategory
     *
     * @param string $picCategory
     *
     * @return Category
     */
    public function setPicCategory($picCategory)
    {
        $this->picCategory = $picCategory;

        return $this;
    }

    /**
     * Get picCategory
     *
     * @return string
     */
    public function getPicCategory()
    {
        return $this->picCategory;
    }

    /**
     * Add musicAppSong
     *
     * @param \AppBundle\Entity\MusicApp $musicAppSong
     *
     * @return Category
     */
    public function addMusicAppSong(\AppBundle\Entity\MusicApp $musicAppSong)
    {
        $this->musicAppSongs[] = $musicAppSong;

        return $this;
    }

    /**
     * Remove musicAppSong
     *
     * @param \AppBundle\Entity\MusicApp $musicAppSong
     */
    public function removeMusicAppSong(\AppBundle\Entity\MusicApp $musicAppSong)
    {
        $this->musicAppSongs->removeElement($musicAppSong);
    }

    /**
     * Get musicAppSongs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMusicAppSongs()
    {
        return $this->musicAppSongs;
    }

    public function __toString(){
        return $this->name;
    }

    /**
     * Add song
     *
     * @param \AppBundle\Entity\MusicApp $song
     *
     * @return Category
     */
    public function addSong(\AppBundle\Entity\MusicApp $song)
    {
        $this->songs[] = $song;

        return $this;
    }

    /**
     * Remove song
     *
     * @param \AppBundle\Entity\MusicApp $song
     */
    public function removeSong(\AppBundle\Entity\MusicApp $song)
    {
        $this->songs->removeElement($song);
    }

    /**
     * Get songs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSongs()
    {
        return $this->songs;
    }
}
