create database voyage;
create table client(
    id_client int(11) AUTO_INCREMENT PRIMARY KEY,
       nom varchar(100) NOT NULL,
       pernom varchar(100) NOT NULL,
       email varchar(150) UNIQUE,
       telephone varchar(150) NOT NULL,
       adresse text NOT NULL,
       date_naissance date NOT NULL
);
CREATE TABLE activite(
      id_activite int(11) AUTO_INCREMENT PRIMARY KEY,
      titre varchar(150) NULL,
       description text NULL ,
       destination varchar(100) NULL,
       prix DECIMAL(10, 2)  NOT NULL,
       dateDebut date NULL,
       dateFin date NULL,
       places_disponibles int(11) NOT NULL
);
CREATE TABLE  reservation(
       id_reservation int(11) AUTO_INCREMENT PRIMARY KEY,
       id_activite int(11) NOT NULL,
       id_client int(11) NOT NULL,
       date_reservation TIMESTAMP ,
       status ENUM('En attente','Confirmée','Annulée') DEFAULT 'En attente',
       FOREIGN KEY (id_client) REFERENCES  client(id_client),
       FOREIGN KEY (id_activite) REFERENCES activite(id_activite)
 );

-- select all data from client table :
SELECT * FROM client;
SELECT * FROM reservation;
-- insert data values using a param into activite table 
INSERT INTO activite (titre, description, destination, prix, date_debut, date_fin, place_disponible)
                VALUES (?, ?, ?, ?, ?, ?, ?);
INSERT INTO client (nom, prenom, email, telephone, adresse, date_naissance) 
                VALUES (?, ?, ?, ?, ?, ?)
-- delete data using id from a reservation table
DELETE FROM `reservation` WHERE id_reservation = $id;
DELETE FROM `client` WHERE id_client = $id;
-- update data using id from a reservation table
UPDATE `client` 
SET nom = '$nom', prenom = '$prenom', email = '$email', telephone = '$telephone', adresse = '$adress', date_naissance = '$date' 
WHERE id_client = $id
UPDATE `reservation` 
SET nom = '$nom', prenom = '$prenom', email = '$email', telephone = '$telephone', adresse = '$adress', date_naissance = '$date' 
WHERE id_client = $id
-- Inner Join
SELECT nom
FROM client
INNER JOIN activite
ON client.id_client = activite.id_activite;