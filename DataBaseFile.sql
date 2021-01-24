/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Fabien
 * Created: 7 janv. 2021
 */
CREATE DATABASE cantine2021;
USE cantine2021;


CREATE TABLE etudiants(
    id int(5) not null auto_increment primary key,
    numETU int(4),
    mdp varchar(40),
    nom varchar(50),
    dateNaissance date
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE backupProfil(
    id int not null auto_increment primary key,
    idEtudiant int(5),
    nom varchar(40),
    dateNaissance date,
    dateModification date,
    FOREIGN KEY (idEtudiant) references etudiants(id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE plats(
    id int(4) not null auto_increment primary key,
    nom varchar(40),
    prix int(6)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE commandes(
    id int(7) not null auto_increment primary key,
    idEtudiant int(5),
    dateCommande date
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE commandesXPlats(
    id int(8) not null auto_increment primary key,
    idCommande int(7),
    idPlat int(4),
	quantite int,
    FOREIGN KEY (idCommande) REFERENCES commandes(id),
    FOREIGN KEY (idPlat) REFERENCES plats(id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE menus(
    id int(5) not null auto_increment primary key,
    dateMenu date
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE menusXplats(
    id int (5) not null auto_increment primary key,
    idMenu int(5),
    idPlat int(4),
    FOREIGN KEY (idMenu) references menus(id),
    FOREIGN KEY (idPlat) references plats(id)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE OR REPLACE VIEW menuJoinPlat_Step1 AS SELECT menus.id as idMenu, menus.dateMenu, menusXPlats.idPlat FROM menus LEFT JOIN menusxplats ON menus.id = menusxplats.idMenu;
CREATE OR REPLACE VIEW menuJoinPlat AS SELECT step1.idMenu, step1.datemenu, step1.idPlat, plats.nom, plats.prix FROM menuJoinPlat_Step1 as step1 LEFT JOIN plats ON step1.idPlat = plats.id;

INSERT INTO plats(nom , prix) values('VaryTsotra', 1000), ('Frites', 1500), ('poulet', 1500), ('Salade', 2000), ('Jus', 1000), ('riz au poulet', 5000), ('Soupe', 6000);
INSERT INTO menus(dateMenu) values (now());
INSERT INTO menusXplats(idMenu, idPlat) values (1, 1), (1, 3), (1, 5), (1, 7);

INSERT INTO menus VALUES (last_insert_id(), now());
//CREATE UNIQUE INDEXES