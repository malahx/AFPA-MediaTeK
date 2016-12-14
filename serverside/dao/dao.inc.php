<?php

require_once(dirname(__FILE__).'/book.php');

use \PDO as PDO;

class dao {
    static function connect() {
        return new PDO(BDD_DSN, BDD_USERNAME, BDD_PASSWORD);
    }
}
