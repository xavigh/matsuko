<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * MusicApp
 *
 * @ORM\Table(name="music_app")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MusicAppRepository")
 */
class MusicApp 
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
     * @ORM\Column(name="artistName", type="string", length=255)
     */
    private $artistName;

    /**
     * @var string
     *
     * @ORM\Column(name="albumName", type="string", length=255)
     */
    private $albumName;

    /**
     * @var string
     *
     * @ORM\Column(name="trackName", type="string", length=255)
     */
    private $trackName;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetimetz")
     */
    private $creationDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="topFavorite", type="boolean")
     */
    private $topFavorite;

    /**
     * @var string
     *
     * @ORM\Column(name="claveApi", type="string", length=255, nullable=true)
     */
    private $claveApi;

    /**
     * @var string
     *
     * @ORM\Column(name="outh2Token", type="string", length=255, nullable=true)
     */
    private $outh2Token;

    /**
     * @var string
     *
     * @ORM\Column(name="pictureArtist", type="string", length=255, nullable=true)
     */
    private $pictureArtist;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=555, nullable=true)
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="songs")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;


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
     * Set artistName
     *
     * @param string $artistName
     *
     * @return MusicApp
     */
    public function setArtistName($artistName)
    {
        $this->artistName = $artistName;

        return $this;
    }

    /**
     * Get artistName
     *
     * @return string
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * Set albumName
     *
     * @param string $albumName
     *
     * @return MusicApp
     */
    public function setAlbumName($albumName)
    {
        $this->albumName = $albumName;

        return $this;
    }

    /**
     * Get albumName
     *
     * @return string
     */
    public function getAlbumName()
    {
        return $this->albumName;
    }

    /**
     * Set trackName
     *
     * @param string $trackName
     *
     * @return MusicApp
     */
    public function setTrackName($trackName)
    {
        $this->trackName = $trackName;

        return $this;
    }

    /**
     * Get trackName
     *
     * @return string
     */
    public function getTrackName()
    {
        return $this->trackName;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return MusicApp
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return MusicApp
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set topFavorite
     *
     * @param boolean $topFavorite
     *
     * @return MusicApp
     */
    public function setTopFavorite($topFavorite)
    {
        $this->topFavorite = $topFavorite;

        return $this;
    }

    /**
     * Get topFavorite
     *
     * @return bool
     */
    public function getTopFavorite()
    {
        return $this->topFavorite;
    }

    /**
     * Set claveApi
     *
     * @param string $claveApi
     *
     * @return MusicApp
     */
    public function setClaveApi($claveApi)
    {
        $this->claveApi = $claveApi;

        return $this;
    }

    /**
     * Get claveApi
     *
     * @return string
     */
    public function getClaveApi()
    {
        return $this->claveApi;
    }

    /**
     * Set outh2Token
     *
     * @param string $outh2Token
     *
     * @return MusicApp
     */
    public function setOuth2Token($outh2Token)
    {
        $this->outh2Token = $outh2Token;

        return $this;
    }

    /**
     * Get outh2Token
     *
     * @return string
     */
    public function getOuth2Token()
    {
        return $this->outh2Token;
    }

    /**
     * Set pictureArtist
     *
     * @param string $pictureArtist
     *
     * @return MusicApp
     */
    public function setPictureArtist($pictureArtist)
    {
        $this->pictureArtist = $pictureArtist;

        return $this;
    }

    /**
     * Get pictureArtist
     *
     * @return string
     */
    public function getPictureArtist()
    {
        return $this->pictureArtist;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return MusicApp
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
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return MusicApp
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
