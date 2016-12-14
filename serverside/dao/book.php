<?php

require_once dirname(__FILE__) . '/dao.inc.php';
require_once dirname(__FILE__) . '/../model/Book.class.php';

class bookDAO {

    static function getAll() {
        $bdd = dao::connect();
        $select = $bdd->prepare('SELECT * FROM book b INNER JOIN document d ON b.document_id = d.id');
        $select->execute();
        return self::toArray($select);
    }

    private static function toArray($select) {
        if (!$select) {
            return -1;
        }
        $books = array();
        while ($data = $select->fetch()) {
            $book = new Book($data);
            array_push($books, $book->toArray());
        }
        return $books;
    }

}
