<?php

namespace TravelBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Category
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
     * @return Category
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->createdAt= new \DateTime();
        $this->updatedAt= new \DateTime();
    }

    
    private $inventories;


    /**
     * Add inventory
     *
     * @param \TravelBundle\Entity\Inventory $inventory
     *
     * @return Category
     */
    public function addInventory(\TravelBundle\Entity\Inventory $inventory)
    {
        $this->inventories[] = $inventory;

        return $this;
    }

    /**
     * Remove inventory
     *
     * @param \TravelBundle\Entity\Inventory $inventory
     */
    public function removeInventory(\TravelBundle\Entity\Inventory $inventory)
    {
        $this->inventories->removeElement($inventory);
    }

    /**
     * Get inventories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInventories()
    {
        return $this->inventories;
    }
}
