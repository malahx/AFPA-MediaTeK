<?php

namespace App\Entity;

/**
 * Comic
 *
 * @Table(name="comic", indexes={@Index(name="document_id1", columns={"document_id"})})
 * @Entity(repositoryClass="App\Repository\ComicRepository")
 */
class Comic {

    /**
     * @var string
     *
     * @Column(name="cartoonist", type="string", length=255, nullable=false)
     */
    private $cartoonist;

    /**
     * @var \DateTime
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;

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
     * Set cartoonist
     *
     * @param string $cartoonist
     *
     * @return Comic
     */
    public function setCartoonist($cartoonist) {
        $this->cartoonist = $cartoonist;

        return $this;
    }

    /**
     * Get cartoonist
     *
     * @return string
     */
    public function getCartoonist() {
        return $this->cartoonist;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comic
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
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
     * @return Comic
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

    function toArray() {
        return array(
            'id' => $this->id,
            'cartoonist' => $this->cartoonist,
            'date' => $this->date->getTimestamp(),
            'document' => $this->document->toArray(),
            'borrow' => $this->borrow ? $this->borrow->toArray() : null,
            'type' => 3
        );
    }
    
}
