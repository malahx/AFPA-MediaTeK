<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cd
 *
 * @ORM\Table(name="cd", indexes={@ORM\Index(name="work_id", columns={"document_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CdRepository")
 */
class Cd
{
    /**
     * @var string
     *
     * @ORM\Column(name="composer", type="string", length=255, nullable=false)
     */
    private $composer;

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

    // @int reserved: 1; borrow: 2, default = null
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

}
