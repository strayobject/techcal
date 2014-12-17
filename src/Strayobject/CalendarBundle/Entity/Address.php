<?php

namespace Strayobject\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="address")
 */
class Address
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=200)
     * @var string
     */
    private $street;
    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @var string
     */
    private $street2 = null;
    /**
     * @ORM\Column(type="string", length=80)
     * @var string
     */
    private $town;
    /**
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $postCode;
    /**
     * @ORM\Column(type="string", length=2)
     * @var string
     */
    private $country;
    /**
     * @ORM\OneToOne(targetEntity="Event", mappedBy="address")
     * @var \Strayobject\CalendarBundle\Entity\Event
     */
    private $event;

    /**
     * Gets the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param int $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of street.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the value of street.
     *
     * @param string $street the street
     *
     * @return self
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Gets the value of street2.
     *
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * Sets the value of street2.
     *
     * @param string $street2 the street2
     *
     * @return self
     */
    public function setStreet2($street2)
    {
        $this->street2 = $street2;

        return $this;
    }

    /**
     * Gets the value of town.
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Sets the value of town.
     *
     * @param string $town the town
     *
     * @return self
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Gets the value of postCode.
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Sets the value of postCode.
     *
     * @param string $postCode the post code
     *
     * @return self
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Gets the value of country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the value of country.
     *
     * @param string $country the country
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Gets the value of event.
     *
     * @return Strayobject\CalendarBundle\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets the value of event.
     *
     * @param \Strayobject\CalendarBundle\Entity\Event $event the event
     *
     * @return self
     */
    public function setEvent(\Strayobject\CalendarBundle\Entity\Event $event)
    {
        $this->event = $event;

        return $this;
    }
}