<?php

namespace App\Util;

class Serializer {
    static function objToArray($objects) {
        $array = array();
        foreach ($objects as $object) {
            array_push($array, $object->toArray());
        }
        return $array;
    }
}
