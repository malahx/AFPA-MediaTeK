MediaTeK
========

Evaluation AFPA - Module Web Gestionnaire de Médiathèque

##Technologies :

* HTML/CSS,
* PHP/Slim/Doctrine,
* MySQL/SQLite,
* AngularJS 1.6.

##Installation :

* Par défaut le projet est configuré sur SQLite, si vous souhaitez utiliser MySQL :
    * Importer la base de donnée `api/mediatek.sql`,
    * Modifier la configuration `api/config.inc.php`,
* Installer les dépendances JS et PHP : `./install.sh`,
* Lancez l'application : `./start.sh`

##Problème possible :

Dans le cas où vous utilisiez des ports différents, pensez à changer le CORS Origin : `api/common.inc.php`
Le CORS Origin ne peut pas être * lorsque l'on active les Credentials (nécessaire pour les cookies de la session php). 