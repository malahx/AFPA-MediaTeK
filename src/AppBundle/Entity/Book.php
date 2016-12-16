<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book", indexes={@ORM\Index(name="work_id", columns={"document_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookRepository")
 */
class Book {

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=250, nullable=false)
     */
    private $author;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Document
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Document", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     * })
     */
    private $document;
    
    // @int reserved: 1; borrow: 2, returned: 3, default = null
    private $borrow;

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor($author) {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Book
     */
    public function setYear($year) {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear() {
        return $this->year;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set document
     *
     * @param \AppBundle\Entity\Document $document
     *
     * @return Book
     */
    public function setDocument(\AppBundle\Entity\Document $document = null) {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \AppBundle\Entity\Document
     */
    public function getDocument() {
        return $this->document;
    }

    function getBorrow() {
        return $this->borrow;
    }

    function setBorrow($borrow) {
        $this->borrow = $borrow;
    }

}
