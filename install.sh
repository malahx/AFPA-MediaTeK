#!/bin/bash
echo 'Installation des dépendances JavaScript'
npm install
echo 'Installation des dépendances PHP'
cd api
composer install
echo 'Modification de la configuration'
nano config.inc.php
echo 'Installation finie, si vous avez garder la configuration par défaut'
echo 'Penser à charger extension=pdo_sqlite.so dans /etc/php/php.ini'
