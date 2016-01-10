<?php

namespace Chitaika\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chitaika\AppBundle\Entity\BookRepository")
 */
class Book
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="originalName", type="string", length=255)
     */
    private $originalName;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="series", type="string", length=255)
     */
    private $series;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="imgSrc", type="string", length=255)
     */
    private $imgSrc;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=4)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceLanguage", type="string", length=255)
     */
    private $sourceLanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=255)
     */
    private $publisher;

    /**
     * @var string
     *
     * @ORM\Column(name="ISBN", type="string", length=255)
     */
    private $iSBN;


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
     * Set name
     *
     * @param string $name
     * @return Book
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
     * Set originalName
     *
     * @param string $originalName
     * @return Book
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * Get originalName
     *
     * @return string 
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Book
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set series
     *
     * @param string $series
     * @return Book
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return string 
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
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
     * Set imgSrc
     *
     * @param string $imgSrc
     * @return Book
     */
    public function setImgSrc($imgSrc)
    {
        $this->imgSrc = $imgSrc;

        return $this;
    }

    /**
     * Get imgSrc
     *
     * @return string 
     */
    public function getImgSrc()
    {
        return $this->imgSrc;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Book
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set sourceLanguage
     *
     * @param string $sourceLanguage
     * @return Book
     */
    public function setSourceLanguage($sourceLanguage)
    {
        $this->sourceLanguage = $sourceLanguage;

        return $this;
    }

    /**
     * Get sourceLanguage
     *
     * @return string 
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     * @return Book
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string 
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set iSBN
     *
     * @param string $iSBN
     * @return Book
     */
    public function setISBN($iSBN)
    {
        $this->iSBN = $iSBN;

        return $this;
    }

    /**
     * Get iSBN
     *
     * @return string 
     */
    public function getISBN()
    {
        return $this->iSBN;
    }
}
