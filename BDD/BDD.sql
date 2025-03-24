-- Création de la Base de Données
CREATE DATABASE IF NOT EXISTS sql_injection;

-- Création de l utilisateur et attribution des droits
CREATE USER IF NOT EXISTS 'hacker_sql_injection'@'%' IDENTIFIED BY 'hacker';
GRANT ALL PRIVILEGES ON sql_injection.* TO 'hacker_sql_injection'@'%'; 

USE sql_injection;

-- On supprime toutes les tables si elles existent
DROP TABLE IF EXISTS utilisateur;

-- Création des tables
CREATE TABLE IF NOT EXISTS utilisateur (
    id_utilisateur INT NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(50),
    mdp VARCHAR(50),
    PRIMARY KEY(id_utilisateur)
);

INSERT INTO utilisateur(pseudo, mdp) VALUES ('jean','jean1');
