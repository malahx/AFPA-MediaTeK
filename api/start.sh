#!/bin/bash
composer dump-autoload -o
php -S localhost:8888 index.php
