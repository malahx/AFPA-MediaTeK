<?php

namespace App\Entity;

/**
 * Events
 *
 * @Table(name="event")
 * @Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event {

    /**
     * @var \DateTime
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Events
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
     * Set title
     *
     * @param string $title
     *
     * @return Events
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Events
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
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
     * Get day
     *
     * @return string
     */
    public function getDay() {
        return $this->date->format('d F Y');
    }

    /**
     * Get hour
     *
     * @return string
     */
    public function getHour() {
        return $this->date->format('H:i');
    }

    function toArray() {
        return array(
            'id' => $this->id,
            'date' => $this->date->getTimestamp(),
            'title' => $this->title,
            'description' => $this->description
        );
    }

}
