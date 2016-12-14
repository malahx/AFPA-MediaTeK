<?php

class document {

    public function news($request, $response, $args) {
        $books = bookDAO::getAll();
        return $response->withJson($books,200);
    }

}
