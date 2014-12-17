<?php

namespace Strayobject\CalendarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('StrayobjectCalendarBundle:Default:index.html.twig', array('name' => $name));
    }
}
