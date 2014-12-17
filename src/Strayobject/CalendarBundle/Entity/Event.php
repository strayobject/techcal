<?php

namespace Strayobject\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Strayobject\CalendarBundle\Entity\Ticket;
use Strayobject\CalendarBundle\Entity\Sponsor;

/**
 * @ORM\Entity
 * @ORM\Table(name="event")
 */
class Event
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=50)
     * @var string
     * @todo  separate
     */
    private $type;
    /**
     * @ORM\Column(type="string", length=2000)
     * @var string
     */
    private $description;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $dateStart;
    /**
     * @ORM\Column(type="time")
     * @var \DateTime
     */
    private $timeStart;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $dateEnd;
    /**
     * @ORM\Column(type="time")
     * @var \DateTime
     */
    private $timeEnd;
    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $link;
    /**
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="event")
     * @var 
     */
    private $tickets;
    /**
     * @ORM\OneToOne(targetEntity="Address", mappedBy="event")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     * @var 
     */
    private $address;
    /**
     * @ORM\ManyToMany(targetEntity="Sponsor", inversedBy="event")
     * @ORM\JoinColumn(name="events_sponsors")
     * @var
     */
    private $sponsors;

    public function __construct()
    {
        $this->tickets  = new ArrayCollection();
        $this->sponsors = new ArrayCollection();
    }

    public function addTicket(Ticket $ticket)
    {
        $this->tickets->add($ticket);
    }

    public function addSponsor(Sponsor $sponsor)
    {
        $this->sponsors->add($sponsor);
    }

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
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param string $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Gets the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param string $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of dateStart.
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Sets the value of dateStart.
     *
     * @param \DateTime $dateStart the date start
     *
     * @return self
     */
    public function setDateStart(\DateTime $dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Gets the value of timeStart.
     *
     * @return \DateTime
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Sets the value of timeStart.
     *
     * @param \DateTime $timeStart the time start
     *
     * @return self
     */
    public function setTimeStart(\DateTime $timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Gets the value of dateEnd.
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Sets the value of dateEnd.
     *
     * @param \DateTime $dateEnd the date end
     *
     * @return self
     */
    public function setDateEnd(\DateTime $dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Gets the value of timeEnd.
     *
     * @return \DateTime
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * Sets the value of timeEnd.
     *
     * @param \DateTime $timeEnd the time end
     *
     * @return self
     */
    public function setTimeEnd(\DateTime $timeEnd)
    {
        $this->timeEnd = $timeEnd;

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
     * Gets the value of tickets.
     *
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Sets the value of tickets.
     *
     * @param mixed $tickets the tickets
     *
     * @return self
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;

        return $this;
    }

    /**
     * Gets the value of address.
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param mixed $address the address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Gets the value of sponsors.
     *
     * @return mixed
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }

    /**
     * Sets the value of sponsors.
     *
     * @param mixed $sponsors the sponsors
     *
     * @return self
     */
    public function setSponsors($sponsors)
    {
        $this->sponsors = $sponsors;

        return $this;
    }
}
