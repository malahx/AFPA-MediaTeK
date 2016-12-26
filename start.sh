#!/bin/bash
echo "Lancement d'AngularJS"
cd app
nohup npm start &
echo "Lancement de l'API REST"
cd ../api
composer dump-autoload -o
php -S localhost:8888 index.php
