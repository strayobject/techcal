<?php

namespace Strayobject\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="ticket")
 */
class Ticket
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=20)
     * @var string
     */
    private $type;
    /**
     * @ORM\Column(type="string", length=10)
     * @var string
     */
    private $price;
    /**
     * @ORM\Column(type="string", length=3)
     * @var string
     */
    private $currency;
    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $link;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $availableFrom;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $availableTo;
    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="tickets")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     * @var
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
     * Gets the value of type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param string $type the type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Gets the value of price.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the value of price.
     *
     * @param string $price the price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets the value of currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets the value of currency.
     *
     * @param string $currency the currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Gets the value of link.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the value of link.
     *
     * @param string $link the link
     *
     * @return self
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Gets the value of availableFrom.
     *
     * @return DateTime
     */
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * Sets the value of availableFrom.
     *
     * @param DateTime $availableFrom the available from
     *
     * @return self
     */
    public function setAvailableFrom(\DateTime $availableFrom)
    {
        $this->availableFrom = $availableFrom;

        return $this;
    }

    /**
     * Gets the value of availableTo.
     *
     * @return DateTime
     */
    public function getAvailableTo()
    {
        return $this->availableTo;
    }

    /**
     * Sets the value of availableTo.
     *
     * @param DateTime $availableTo the available to
     *
     * @return self
     */
    public function setAvailableTo(\DateTime $availableTo)
    {
        $this->availableTo = $availableTo;

        return $this;
    }

    /**
     * Gets the value of event.
     *
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Sets the value of event.
     *
     * @param mixed $event the event
     *
     * @return self
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }
}