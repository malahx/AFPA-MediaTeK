<?php

namespace App\Controller;

use App\Util\Serializer;

class Event {
    public function events($request, $response, $args) {
        
        global $em;

        $repoEvent = $em->getRepository('App\Entity\Event');

        $events = $repoEvent->findAllNext();

        return $response->withJson(Serializer::objToArray($events), 200);
    }
}
