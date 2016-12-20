MediaTeK
========

Evaluation AFPA - Module Web Gestionnaire de Médiathèque

##Technologies :

* HTML/CSS,
* PHP/Symfony (Twig/Doctrine/FOSUserBundle),
* MySQL,
* Javascript (DOM, AJAX).

##Installation :

* Importer la base de donnée `mediatek.sql`,
* Installer les dépendances par la commande `composer install`
* Renommer le fichier de configuration app/config/parameters.yml.dist par app/config/parameters.yml
* Modifier les paramètres de la configuration
* Lancez le serveur : php bin/console server:start