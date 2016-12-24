<?php

namespace App\Entity;

/**
 * Cd
 *
 * @Table(name="cd", indexes={@Index(name="document_id2", columns={"document_id"})})
 * @Entity(repositoryClass="App\Repository\CdRepository")
 */
class Cd
{
    /**
     * @var string
     *
     * @Column(name="composer", type="string", length=255, nullable=false)
     */
    private $composer;

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
     * Set composer
     *
     * @param string $composer
     *
     * @return Cd
     */
    public function setComposer($composer)
    {
        $this->composer = $composer;

        return $this;
    }

    /**
     * Get composer
     *
     * @return string
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Cd
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

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
     * Set document
     *
     * @param \AppBundle\Entity\Document $document
     *
     * @return Cd
     */
    public function setDocument(\AppBundle\Entity\Document $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \AppBundle\Entity\Document
     */
    public function getDocument()
    {
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
            'composer' => $this->composer,
            'year' => $this->year,
            'document' => $this->document->toArray(),
            'borrow' => $this->borrow ? $this->borrow->toArray() : null
        );
    }

}
