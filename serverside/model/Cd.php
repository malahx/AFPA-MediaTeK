<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Cd
 *
 * @ORM\Table(name="cd", indexes={@ORM\Index(name="work_id", columns={"document_id"})})
 * @ORM\Entity
 */
class Cd
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
     * @var \Document
     *
     * @ORM\OneToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     * })
     */
    private $document;


}

