<?php

namespace Strayobject\CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cfp")
 */
class Cfp
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $openFrom;
    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $openTo;
    /**
     * @ORM\Column(type="string", length=500)
     * @var string
     */
    private $link;
    /**
     * @ORM\OneToOne(targetEntity="Event", mappedBy="cfp")
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
     * Gets the value of openFrom.
     *
     * @return \DateTime
     */
    public function getOpenFrom()
    {
        return $this->openFrom;
    }

    /**
     * Sets the value of openFrom.
     *
     * @param \DateTime $openFrom the open from
     *
     * @return self
     */
    public function setOpenFrom(\DateTime $openFrom)
    {
        $this->openFrom = $openFrom;

        return $this;
    }

    /**
     * Gets the value of openTo.
     *
     * @return \DateTime
     */
    public function getOpenTo()
    {
        return $this->openTo;
    }

    /**
     * Sets the value of openTo.
     *
     * @param \DateTime $openTo the open to
     *
     * @return self
     */
    public function setOpenTo(\DateTime $openTo)
    {
        $this->openTo = $openTo;

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
     * Gets the value of event.
     *
     * @return \Strayobject\CalendarBundle\Entity\Event
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