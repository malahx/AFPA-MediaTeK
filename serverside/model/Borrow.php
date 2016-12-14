<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Borrow
 *
 * @ORM\Table(name="borrow", indexes={@ORM\Index(name="user_id", columns={"user_id", "document_id"}), @ORM\Index(name="Delete from work4", columns={"document_id"}), @ORM\Index(name="IDX_55DBA8B0A76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class Borrow
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
     * @var \DateTime
     *
     * @ORM\Column(name="borrowing", type="date", nullable=false)
     */
    private $borrowing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="planned_return", type="date", nullable=false)
     */
    private $plannedReturn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="effective_return", type="date", nullable=false)
     */
    private $effectiveReturn;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     * })
     */
    private $document;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


}

