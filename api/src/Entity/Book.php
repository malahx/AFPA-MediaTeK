<?php

namespace App\Entity;

/**
 * Book
 *
 * @Table(name="book", indexes={@Index(name="work_id", columns={"document_id"})})
 * @Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book {

    /**
     * @var string
     *
     * @Column(name="author", type="string", length=250, nullable=false)
     */
    private $author;

    /**
     * @var integer
     *
     * @Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Document
     *
     * @OneToOne(targetEntity="App\Entity\Document", cascade={"all"}, fetch="EAGER")
     * @JoinColumns({
     *   @JoinColumn(name="document_id", referencedColumnName="id")
     * })
     */
    private $document;
    
    // @int
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
     * @param \App\Entity\Document $document
     *
     * @return Book
     */
    public function setDocument(\App\Entity\Document $document = null) {
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

    function toArray() {
        return array(
            'id' => $this->id,
            'author' => $this->author,
            'year' => $this->year,
            'document' => $this->document->toArray(),
            'borrow' => $this->borrow ? $this->borrow->toArray() : null
        );
    }
}
