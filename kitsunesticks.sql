drop database if exists kitsunesticks;
create database kitsunesticks;
use kitsunesticks;

DROP TABLE IF EXISTS tbl_users;
CREATE TABLE IF NOT EXISTS Users (
  id 		int(11) NOT NULL AUTO_INCREMENT,
  username	varchar(255) NOT NULL,
  passwort	varchar(45) NOT NULL,
  vorname	varchar(255) NOT NULL,
  nachname	varchar(255) NOT NULL,
  email		varchar(255) NOT NULL,
  strasse	varchar(255) NOT NULL,
  wohnort	varchar(255) NOT NULL,
  plz		varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS tbl_userabos;
CREATE TABLE IF NOT EXISTS Userabos (
  id 				int(11) NOT NULL AUTO_INCREMENT,
  zahlungstand		varchar(255) NOT NULL,
  fk_lootboxesUser	int(11) NOT NULL,
  fk_users			int(11) NOT NULL,
  fk_abos			int(11) NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS tbl_abos;
CREATE TABLE IF NOT EXISTS Abos (
  id 			int(11) NOT NULL AUTO_INCREMENT,
  monat1		bit NOT NULL,
  monat3		bit NOT NULL,
  monat6		bit NOT NULL,
  fk_userabos 	int(11) NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS tbl_lootboxesUser;
CREATE TABLE IF NOT EXISTS LootboxesUser (
  id 			int(11) NOT NULL AUTO_INCREMENT,
  sendestatus	varchar(255) NOT NULL,
  fk_lootboxes	int(11) NOT NULL,
  fk_userabos 	int(11) NOT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS tbl_lootboxes;
CREATE TABLE IF NOT EXISTS Lootboxes (
  id 			int(11) NOT NULL AUTO_INCREMENT,
  Lootboxname	varchar(255) NOT NULL,
  Lootboxmonat	varchar(255) NOT NULL,
  Artikel1		varchar(255) NOT NULL,
  Artikel2		varchar(255) NOT NULL,
  Artikel3		varchar(255) NOT NULL,
  Artikel4		varchar(255) NOT NULL,
  Artikel5		varchar(255) NOT NULL,
  fk_lootboxes	int(11) NOT NULL,
  fk_userabos 	int(11) NOT NULL,
  PRIMARY KEY (id)
);

ALTER TABLE `tbl_userabos`
 ADD CONSTRAINT  FOREIGN KEY (`fk_lootboxesUser`) REFERENCES `tbl_lootboxesUser` (`id`),
  ADD CONSTRAINT  FOREIGN KEY (`fk_users`) REFERENCES `tbl_users` (`id`),
   ADD CONSTRAINT  FOREIGN KEY (`fk_abos`) REFERENCES `tbl_abos` (`id`);
   
ALTER TABLE `tbl_abos`
 ADD CONSTRAINT  FOREIGN KEY (`fk_userabos`) REFERENCES `tbl_userabos` (`id`);
 
ALTER TABLE `tbl_lootboxesUser`
 ADD CONSTRAINT  FOREIGN KEY (`fk_lootboxes`) REFERENCES `tbl_lootboxes` (`id`),
  ADD CONSTRAINT  FOREIGN KEY (`fk_userabos`) REFERENCES `tbl_userabos` (`id`);
  
ALTER TABLE `tbl_lootboxes`
 ADD CONSTRAINT  FOREIGN KEY (`fk_lootboxes`) REFERENCES `tbl_lootboxes` (`id`),
  ADD CONSTRAINT  FOREIGN KEY (`fk_userabos`) REFERENCES `tbl_userabos` (`id`);