<?php

namespace Strayobject\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Strayobject\CalendarBundle\Entity\Event;
use Strayobject\CalendarBundle\Entity\Sponsor;
use Strayobject\CalendarBundle\Entity\Ticket;
use Strayobject\CalendarBundle\Entity\Address;

class ListController extends Controller
{
    public function indexAction()
    {
        $events = $this->getDoctrine()
            ->getRepository('StrayobjectCalendarBundle:Event')
            ->createQueryBuilder('e')
            ->where('e.dateStart > :now')
            ->setParameter('now', (new \DateTime())->format('Y-m-d H:i:s'))
            ->orderBy('e.dateStart', 'ASC')
            ->addOrderBy('e.timeStart', 'DESC')
            ->getQuery()
            ->getResult()
        ;

        $dates = $this->getDoctrine()
            ->getRepository('StrayobjectCalendarBundle:Event')
            ->createQueryBuilder('e')
            ->select('DISTINCT e.dateStart')
            ->orderBy('e.dateStart', 'ASC')
            ->getQuery()
            ->getResult()
        ;

        $eventList = [];

        if ($events && $dates) {
            //$events = new \ArrayIterator($events);

            foreach ($dates as $date) {
                $date = $date['dateStart'];
                // could not get callbackfilteriterator to work
                foreach ($events as $event) {
                    if ($event->getDateStart()->format('Y-m-d') == $date->format('Y-m-d')) {
                        $eventList[$date->format('Y-m-d')][] = $event;
                    }
                }
            }
        }

        return $this->render('StrayobjectCalendarBundle:List:index.html.twig', array('eventList' => $eventList, 'news' => range(1,10)));
    }
    /**
     * Temporary route to create new events
     * @todo remove
     * @return [type] [description]
     */
    public function createEventAction($number)
    {
        $event = function ($i) {
            $time = (time() + rand(10, 10000000));
            $ds   = new \DateTime('@'.$time);
            $de   = new \DateTime('@'.($time + rand(10800, 604800)));
            $e    = new Event();
            $e->setName('Event '.$i);
            $e->setDescription('
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Morbi diam nunc, mattis fermentum ultricies quis, tincidunt 
                quis metus. Phasellus vulputate accumsan felis et tincidunt. 
                Suspendisse nec ipsum euismod, condimentum justo eu, imperdiet 
                ante. Nulla facilisi. Aenean sem nulla, volutpat ut massa in, 
                pretium feugiat ipsum. Sed vel fringilla lacus. Suspendisse 
                pulvinar massa in ante hendrerit rutrum. Vestibulum et fermentum 
                orci, ac sodales odio. Integer eleifend interdum risus quis 
                porttitor. Cras malesuada vehicula diam sit amet ultrices. 
                Nullam laoreet cursus felis sit amet tincidunt. Cras scelerisque 
                euismod massa faucibus vulputate. Sed pretium dictum quam quis 
                suscipit. Ut sem ante, mattis dignissim odio sit amet, interdum 
                viverra metus. Nunc eu eleifend ex. 
            ');
            $e->setType(rand(0,1) ? 'meetup' : 'conference');
            $e->setDateStart($ds);
            $e->setTimeStart($ds);
            $e->setDateEnd($de);
            $e->setTimeEnd($de);
            $e->setLink('http://glasgowphp.co.uk');

            return $e;
        };

        $sponsor = function ($i) {
            $s = new Sponsor();
            
            if ($i%3) {
                $s->setName('Plainmotif '.$i);
                $s->setImage('https://plainmotif.co.uk/skin/Munter/images/plainmotif.png');
                $s->setLink('https://plainmotif.co.uk');
            } else {
                $s->setName('Zend '.$i);
                $s->setImage('http://glasgowphp.co.uk/content/media/image/zend-logo.gif');
                $s->setLink('http://www.zend.com');
            }

            return $s;
        };

        $ticket = function ($i) {
            $types    = ['Adult', 'Early Bird', 'Last Minute'];
            $prices   = [150, 200, 10];
            $currency = ['EUR', 'GBP', 'PLN'];
            $t        = new Ticket();
            $t->setType($types[mt_rand(0,2)]);
            $t->setPrice($prices[mt_rand(0,2)]);
            $t->setCurrency($currency[mt_rand(0,2)]);
            $t->setLink('http://glasgowphp.co.uk');
            $t->setAvailableFrom(new \DateTime());
            $t->setAvailableTo(new \DateTime('@'.(time() + mt_rand(10000, 1000000))));

            return $t;
        };

        $address = function ($i) {
            $a = new Address();
            $a->setStreet('Some street '.$i);
            $a->setTown('Some Town '.$i);
            $a->setPostCode('G1 3SJ');
            $a->setCountry('GB');

            return $a;
        };

        $em = $this->getDoctrine()->getManager();

        for ($i = 0; $i < $number; $i++) {
            $t = $ticket($i);
            $s = $sponsor($i);
            $a = $address($i);
            $e = $event($i);

            $e->addSponsor($s);
            $t->setEvent($e);
            $e->setAddress($a);

            $em->persist($s);
            $em->persist($a);
            $em->persist($e);
            $em->persist($t);
        }

        $em->flush();

        return $this->redirect($this->generateUrl('strayobject_calendar_list'));
    }
}
