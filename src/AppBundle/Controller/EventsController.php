<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventsController extends Controller {

    /**
     * @Route("/events", name="events")
     */
    public function eventsAction() {
        
        return $this->render('AppBundle::events.html.twig', array(
                    'title' => 'Evènements'));
    }

    /**
     * @Route("/api/events", name="apiEvents")
     */
    public function apiEventsAction() {
        
        $em = $this->getDoctrine()->getManager();

        $repoEvent = $em->getRepository('AppBundle:Event');

        $events = $repoEvent->findAllNext();
        
        return $this->render('AppBundle:elements:eventList.html.twig', array('events' => $events));
    }
}
