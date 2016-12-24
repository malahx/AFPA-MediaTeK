#!/bin/bash
nohup npm start >/dev/null 2>&1 &
cd ../api
composer dump-autoload -o
php -S localhost:8888 index.php
