<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class EventsController extends Controller {

    static function serializeJSON($obj, $ignore = false) {
        $encoders = array(new JsonEncoder());

        $normalizer = new ObjectNormalizer();

        if ($ignore) {
            $normalizer->setIgnoredAttributes($ignore);
        }

        $normalizers = array($normalizer);

        $serializer = new Serializer($normalizers, $encoders);

        $json = $serializer->serialize($obj, 'json');

        $response = new Response($json);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/events", name="events")
     */
    public function eventsAction(Request $request) {
        return $this->render('AppBundle::events.html.twig', array(
                    'title' => 'Evènements'));
    }

    /**
     * @Route("/api/events/json", name="apiEventsJson")
     */
    public function apiEventsJsonAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $repoEvent = $em->getRepository('AppBundle:Event');

        $events = $repoEvent->findAllNext();
        
        return EventsController::serializeJSON($events);
    }

    /**
     * @Route("/api/events", name="apiEvents")
     */
    public function apiEventsAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $repoEvent = $em->getRepository('AppBundle:Event');

        $events = $repoEvent->findAllNext();
        
        return $this->render('AppBundle::eventList.html.twig', array('events' => $events));
    }
}
