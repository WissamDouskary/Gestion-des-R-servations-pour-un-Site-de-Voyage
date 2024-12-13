# Instructions pour configurer l’environnement et exécuter le projet
## Contexte du projet
L’objectif est de développer un site web de réservation pour une agence de voyages. Ce site permet de gérer les clients, d’afficher les offres d’activités disponibles (vols, hôtels, circuits touristiques, etc.), et de permettre aux clients de réserver et de personnaliser leurs choix.
Fonctionnalités principales
#### 1.	Gestion des activités
o	Affichage des activités disponibles.
o	Ajout d’une nouvelle activité via un formulaire.
o	Les activités sont affichées dynamiquement et enregistrées dans la base de données.
#### 2.	Gestion des clients
o	Ajout de clients via un formulaire (nom, email, etc.).
o	Affichage des informations des clients dans un tableau avec options : Modifier, Supprimer.
#### 3.	Réservations
o	Les clients peuvent réserver des activités.
o	Une réservation inclut : ID client, ID activité, date, et statut initial ("En attente").
o	Possibilité de gérer les réservations (modifier, supprimer).
________________________________________
## Instructions pour la configuration de l’environnement
### 1.	Installation des outils
o	Téléchargez et installez XAMPP.
o	Configurez le serveur Apache et MySQL en activant les modules via le panneau de contrôle XAMPP.
o	Installez un éditeur de code (ex. Visual Studio Code).
### 2.	Création de la base de données
o	Lancez phpMyAdmin via XAMPP.
o	Créez une base de données nommée travel_agency.
o	Importez ou exécutez les scripts SQL suivants pour créer les tables : 
 	Clients : client_id, nom, prenom,  email, telephone, adress, date de naissance .
 	Activités : activity_id, titre, description, distination , prix, date_debut, date_fin , place_disponible.
 	Réservations : id_reservation, id_client, id_activite, date_reservation, statut.
### 3.	Structure des fichiers du projet
o	index.php : Page d’accueil (HTML, Tailwind pour le style).
o	Reservation.php : Page des activités avec formulaire d’ajout et affichage dynamique.
o	add.php : Page de gestion des clients.
o	addactivitie.php : Page de gestion des réservations.
o	conn.php : Fichier de configuration pour la connexion à la base de données.
### 4.	Installation des dépendances
o	Téléchargez Tailwind CSS et incluez-le dans vos fichiers HTML.
o	Assurez-vous que PHP est activé pour l’exécution de scripts backend.
________________________________________
## Instructions pour l’exécution du projet
1.	Démarrez XAMPP et activez Apache et MySQL.
2.	Placez le dossier de votre projet dans le répertoire htdocs de XAMPP.
3.	Accédez au site via http://localhost/<nom_du_projet>/.
4.	Naviguez entre les pages : 
o	Accueil : Présentation du site.
o	Activités : Gestion des activités.
o	Clients : Gestion des clients.
o	Réservations : Gestion des réservations.
________________________________________
## Résumé des actions réalisées
•	Configuration : XAMPP installé et environnement configuré.
•	Pages créées : 
o	Accueil avec logo (HTML + Tailwind).
o	Page activités avec ajout via formulaire (pop-up) et enregistrement dans la base.
o	Gestion des clients avec ajout, modification, suppression.
o	Gestion des réservations avec affichage, ajout, et suppression.
•	Base de données : Création et gestion via MySQL et intégration via PHP.
