<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Comic
 *
 * @ORM\Table(name="comic", indexes={@ORM\Index(name="work_id", columns={"document_id"})})
 * @ORM\Entity
 */
class Comic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cartoonist", type="string", length=255, nullable=false)
     */
    private $cartoonist;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Document
     *
     * @ORM\OneToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     * })
     */
    private $document;


}

