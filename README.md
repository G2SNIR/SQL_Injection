# Installation

Prérequis : vous devez disposez d'un serveur Apache 2, d'une base de données MariaDB ou MySQL et d'interpréteur PHP. Les étapes d'installations suivantes sont disponibles pour :
1. XAMPP installé sur Windows
2. Une solution LAMP installée sur une machine Linux.

## ETAPE 1 : Installation du site web

### Sur un serveur LAMP

Se déplacer dans le répertoire /var/www/html :

    cd /var/www/html


Puis taper la commande :

    git clone https://github.com/G2SNIR/SQL_Injection.git

### Avec XAMPP sur Windows

Ouvrez un terminal et placez-vous dans le répertoire htdocs de votre application XAMPP. Puis taper la commande :

    git clone https://github.com/G2SNIR/SQL_Injection.git

## Etape 2 : Déploiement de la BDD

Ce site web utilise une base de données sql_injection et un utilisateur hacker_sql_injection. Toutes les informations concernant la structure de cette base de données et de l'utilisateur associé se trouve dans le fichier BDD/BDD.sql.

Il est nécessaire d'exécuter ce script pour mettre en place la base de données du site web.

### Installation de la BDD sur Linux :

Rester dans le répertoire /var/www/html et taper la commande :

    sudo mysql < SQL_Injection/BDD/BDD.sql

### Avec XAMPP sur Windows :

Déplacer vous dans le répertoire d'installation de mysql dans XAMPP, puis tapez les commandes suivantes

    mysql -u root
    mysql> source ../../SQL_Injection/BDD.sql

## ETAPE 3 : Uniquement pour les serveurs sous Linux

Modifier les droits sur le fichier commentaires.json comme suit :

    sudo chmod o+rw SQL_Injection/Modele/commentaires.json

## Accès au site web

Utiliser votre navigateur et connectez-vous au site web en ajoutant /SQL_Injection après votre adresse IP.

