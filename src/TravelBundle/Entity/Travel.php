<?php

namespace TravelBundle\Entity;

/**
 * Travel
 */
class Travel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $link;

    /**
     * @var int
     */
    private $webPrice;

    /**
     * @var int
     */
    private $targetPrice;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var bool
     */
    private $roundTrip;

    /**
     * @var \DateTime
     */
    private $returnDate;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return Travel
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Travel
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set webPrice
     *
     * @param integer $webPrice
     *
     * @return Travel
     */
    public function setWebPrice($webPrice)
    {
        $this->webPrice = $webPrice;

        return $this;
    }

    /**
     * Get webPrice
     *
     * @return int
     */
    public function getWebPrice()
    {
        return $this->webPrice;
    }

    /**
     * Set targetPrice
     *
     * @param integer $targetPrice
     *
     * @return Travel
     */
    public function setTargetPrice($targetPrice)
    {
        $this->targetPrice = $targetPrice;

        return $this;
    }

    /**
     * Get targetPrice
     *
     * @return int
     */
    public function getTargetPrice()
    {
        return $this->targetPrice;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Travel
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
     * Set roundTrip
     *
     * @param boolean $roundTrip
     *
     * @return Travel
     */
    public function setRoundTrip($roundTrip)
    {
        $this->roundTrip = $roundTrip;

        return $this;
    }

    /**
     * Get roundTrip
     *
     * @return bool
     */
    public function getRoundTrip()
    {
        return $this->roundTrip;
    }

    /**
     * Set returnDate
     *
     * @param \DateTime $returnDate
     *
     * @return Travel
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    /**
     * Get returnDate
     *
     * @return \DateTime
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Travel
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Travel
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
