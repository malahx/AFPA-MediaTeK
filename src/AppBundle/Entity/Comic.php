<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comic
 *
 * @ORM\Table(name="comic", indexes={@ORM\Index(name="work_id", columns={"document_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ComicRepository")
 */
class Comic
{
    /**
     * @var string
     *
     * @ORM\Column(name="cartoonist", type="string", length=255, nullable=false)
     */
    private $cartoonist;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

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
     * Set cartoonist
     *
     * @param string $cartoonist
     *
     * @return Comic
     */
    public function setCartoonist($cartoonist)
    {
        $this->cartoonist = $cartoonist;

        return $this;
    }

    /**
     * Get cartoonist
     *
     * @return string
     */
    public function getCartoonist()
    {
        return $this->cartoonist;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comic
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
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
     * @return Comic
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
