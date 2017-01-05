<?php

namespace App\Entity;

/**
 * Borrow
 *
 * @Table(name="borrow", indexes={@Index(name="user_id", columns={"user_id", "document_id"}), @Index(name="FK_55DBA8B0C33F7837", columns={"document_id"}), @Index(name="IDX_55DBA8B0A76ED395", columns={"user_id"})})
 * @Entity(repositoryClass="App\Repository\BorrowRepository")
 */
class Borrow {

    /**
     * @var \DateTime
     *
     * @Column(name="borrowing", type="datetime", nullable=true)
     */
    private $borrowing;

    /**
     * @var \DateTime
     *
     * @Column(name="planned_return", type="datetime", nullable=true)
     */
    private $plannedReturn;

    /**
     * @var \DateTime
     *
     * @Column(name="effective_return", type="datetime", nullable=true)
     */
    private $effectiveReturn;

    /**
     * @var \DateTime
     *
     * @Column(name="reservation", type="datetime", nullable=false)
     */
    private $reservation;

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
     * @ManyToOne(targetEntity="App\Entity\Document", cascade={"all"}, fetch="EAGER")
     * @JoinColumns({
     *   @JoinColumn(name="document_id", referencedColumnName="id")
     * })
     */
    private $document;

    /**
     * @var \App\Entity\User
     *
     * @ManyToOne(targetEntity="App\Entity\User", cascade={"all"}, fetch="EAGER")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    function __construct(\DateTime $reservation, \App\Entity\Document $document, \App\Entity\User $user, \DateTime $borrowing = null, \DateTime $plannedReturn = null, \DateTime $effectiveReturn = null) {
        $this->borrowing = $borrowing;
        $this->plannedReturn = $plannedReturn;
        $this->effectiveReturn = $effectiveReturn;
        $this->reservation = $reservation;
        $this->document = $document;
        $this->user = $user;
    }

    /**
     * Set borrowing
     *
     * @param \DateTime $borrowing
     *
     * @return Borrow
     */
    public function setBorrowing($borrowing) {
        $this->borrowing = $borrowing;

        return $this;
    }

    /**
     * Get borrowing
     *
     * @return \DateTime
     */
    public function getBorrowing() {
        return $this->borrowing;
    }

    /**
     * Set plannedReturn
     *
     * @param \DateTime $plannedReturn
     *
     * @return Borrow
     */
    public function setPlannedReturn($plannedReturn) {
        $this->plannedReturn = $plannedReturn;

        return $this;
    }

    /**
     * Get plannedReturn
     *
     * @return \DateTime
     */
    public function getPlannedReturn() {
        return $this->plannedReturn;
    }

    /**
     * Set effectiveReturn
     *
     * @param \DateTime $effectiveReturn
     *
     * @return Borrow
     */
    public function setEffectiveReturn($effectiveReturn) {
        $this->effectiveReturn = $effectiveReturn;

        return $this;
    }

    /**
     * Get effectiveReturn
     *
     * @return \DateTime
     */
    public function getEffectiveReturn() {
        return $this->effectiveReturn;
    }

    /**
     * Set reservation
     *
     * @param \DateTime $reservation
     *
     * @return Borrow
     */
    public function setReservation($reservation) {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \DateTime
     */
    public function getReservation() {
        return $this->reservation;
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
     * @return Borrow
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

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Borrow
     */
    public function setUser(\AppBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Get isCancelled
     *
     * @return bool
     */
    public function isCancelled() {
        return $this->reservation != null && $this->borrowing == null && $this->plannedReturn == null && $this->effectiveReturn != null;
    }

    /**
     * Get isReserved
     *
     * @return bool
     */
    public function isReserved() {
        return $this->reservation != null && $this->borrowing == null && $this->plannedReturn == null && $this->effectiveReturn == null;
    }

    /**
     * Get isBorrowed
     *
     * @return bool
     */
    public function isBorrowed() {
        return $this->reservation != null && $this->borrowing != null && $this->effectiveReturn == null;
    }

    function toArray() {
        return array(
            'id' => $this->id,
            'borrowing' => $this->borrowing ? $this->borrowing->getTimestamp() : null,
            'plannedReturn' => $this->plannedReturn ? $this->plannedReturn->getTimestamp() : null,
            'effectiveReturn' => $this->effectiveReturn ? $this->effectiveReturn->getTimestamp() : null,
            'reservation' => $this->reservation ? $this->reservation->getTimestamp() : null,
            'document' => $this->document->toArray(),
            'user' => $this->user->toArray(),
            'isReserved' => $this->isReserved(),
            'isBorrowed' => $this->isBorrowed(),
            'isCancelled' => $this->isCancelled()
        );
    }

}
