# Projet de réservation de tickets de transport

## 1. Présentation du projet

Ce projet est une application web de réservation de tickets de transport
développée dans le cadre d'un projet scolaire. Elle permet aux clients
de rechercher des voyages, de consulter les informations disponibles, de
réserver des places et d'obtenir un ticket au format PDF. Une partie
administrateur permet de gérer les voyages proposés.

L'application fonctionne localement avec XAMPP et utilise PHP pour le
traitement côté serveur ainsi que MySQL/MariaDB pour stocker les
données.

## 2. Objectifs

-   Faciliter la recherche de voyages selon la ville de départ, la
    destination et la date.
-   Afficher les informations essentielles d'un voyage : heure de
    départ, durée, prix et places disponibles.
-   Permettre aux utilisateurs de créer un compte et de se connecter.
-   Enregistrer les réservations et mettre à jour le nombre de places
    disponibles.
-   Générer un ticket de réservation en PDF.
-   Fournir une interface d'administration pour gérer les voyages.

## 3. Technologies utilisées

-   **PHP** : logique côté serveur, sessions, authentification et
    réservations.
-   **MySQL / MariaDB** : stockage des utilisateurs, voyages et
    réservations.
-   **HTML et CSS** : structure et mise en forme des pages.
-   **JavaScript** : interactions côté navigateur, fenêtres modales et
    confirmations.
-   **XAMPP** : serveur local Apache et base de données.
-   **phpMyAdmin** : création et gestion de la base de données.
-   **FPDF** : génération des tickets PDF.

## 4. Fonctionnalités principales

### Espace client

1.  **Inscription** : création d'un compte client.
2.  **Connexion et déconnexion** : ouverture d'une session et fermeture
    de celle-ci.
3.  **Recherche de voyages** : choix de la ville de départ, de la
    destination, de la date et du nombre de passagers.
4.  **Consultation des résultats** : affichage des horaires, de la
    durée, du prix et des places restantes.
5.  **Réservation** : confirmation de la réservation et enregistrement
    des informations dans la base de données.
6.  **Mise à jour des places** : diminution du nombre de sièges
    disponibles après une réservation.
7.  **Ticket PDF** : génération d'un document contenant les informations
    principales du voyage réservé.

### Espace administrateur

-   Ajouter un voyage.
-   Consulter et filtrer la liste des voyages.
-   Modifier les informations d'un voyage.
-   Supprimer un voyage après confirmation.
-   Parcourir les résultats avec une pagination.

## 5. Base de données

La base de données utilisée dans le projet s'appelle `cdb`. Elle
contient principalement les tables suivantes.

### Table `client`

Stocke les informations des clients :

-   `id_client` : identifiant unique du client.
-   `nom` : nom du client.
-   `email` : adresse électronique.
-   `telephone` : numéro de téléphone, facultatif.
-   `mot_de_passe` : mot de passe utilisé pour la connexion dans la
    version du projet.
-   `date_naissance` : date de naissance, facultative.

### Table `voyage`

Contient les informations sur les voyages :

-   `id_voyage` : identifiant unique du voyage.
-   `lieu_depart` : ville de départ.
-   `destination` : ville d'arrivée.
-   `date` : date du voyage.
-   `heure_depart` : heure de départ.
-   `duree` : durée estimée du trajet.
-   `siege_disp` : nombre de places disponibles.
-   `prix` : prix du voyage.

### Table `reservation`

Enregistre les réservations réalisées par les clients :

-   `id_res` : identifiant de la réservation.
-   `id_client` : client ayant effectué la réservation.
-   `id_voyage` : voyage concerné.
-   `date` : date associée à la réservation ou au voyage selon
    l'implémentation.
-   `destination` : destination.
-   `lieu_depart` : ville de départ.
-   `passagers` : nombre de passagers réservés.

Les relations entre les tables permettent d'associer chaque réservation
à un client et à un voyage. Les contraintes de clés étrangères doivent
être configurées selon les règles de suppression souhaitées.

## 6. Fonctionnement général

1.  Le client crée un compte ou se connecte.
2.  Il ouvre la page de recherche et saisit les critères du voyage.
3.  L'application recherche les voyages correspondants dans la base de
    données.
4.  Le client choisit un voyage et confirme sa réservation.
5.  La réservation est enregistrée et le nombre de places disponibles
    est actualisé.
6.  Un ticket PDF peut être généré pour le client.
7.  L'administrateur peut gérer les voyages depuis le back-office.

## 7. Organisation indicative des fichiers

Les noms ci-dessous correspondent aux fichiers utilisés ou évoqués
pendant le développement. L'organisation exacte peut varier selon la
version du projet.

-   `database.php` : connexion à la base de données.
-   `database2.php` : autre fichier de connexion utilisé notamment pour
    l'authentification.
-   `Se_connecter.php` : formulaire de connexion.
-   `users.php` : espace utilisateur et gestion de certaines actions de
    session.
-   `reservation.php` : formulaire de recherche ou processus de
    réservation.
-   `voyage.php` : affichage des voyages correspondant à la recherche.
-   `admin_voyage.php` : interface d'administration des voyages.
-   `add_voyage.php` : ajout d'un voyage.
-   `edit_voyage.php` : modification d'un voyage.
-   `delete_voyage.php` : suppression d'un voyage.
-   `get_voyages.php` : récupération des voyages pour l'affichage.
-   `util.php` : fonctions utilitaires liées aux sessions.
-   Les fichiers associés à **FPDF** servent à produire le ticket PDF.

Vérifiez les noms et la présence des fichiers dans la version finale du
dossier du projet.

## 8. Installation et lancement

1.  Installer et démarrer **XAMPP**.
2.  Démarrer les services **Apache** et **MySQL**.
3.  Copier le dossier du projet dans le répertoire `htdocs` de XAMPP,
    par exemple `C:\\xampp\\htdocs\\idea\\`.
4.  Ouvrir phpMyAdmin à l'adresse `http://localhost/phpmyadmin`.
5.  Créer la base de données `cdb`, puis importer le fichier SQL du
    projet s'il est disponible. Sinon, créer les tables en respectant le
    schéma décrit ci-dessus.
6.  Vérifier les paramètres de connexion dans `database.php` et, si
    nécessaire, `database2.php` : hôte, nom de la base, utilisateur et
    mot de passe.
7.  Vérifier que la bibliothèque FPDF est présente et que son chemin
    d'inclusion correspond au code.
8.  Ouvrir le projet dans le navigateur, par exemple à l'adresse
    `http://localhost/idea/` si le fichier d'accueil se trouve à la
    racine de ce dossier.

## 9. Sécurité et limites

Ce projet est principalement destiné à l'apprentissage et à une
démonstration locale. Avant toute utilisation réelle, il est nécessaire
de renforcer plusieurs aspects :

-   Stocker les mots de passe avec `password_hash()` et les vérifier
    avec `password_verify()`.
-   Utiliser des requêtes préparées pour les entrées utilisateur.
-   Vérifier côté serveur les places disponibles et le nombre de
    passagers avant chaque réservation.
-   Mettre à jour la réservation et les places dans une transaction SQL
    afin d'éviter les incohérences.
-   Protéger les pages d'administration avec un contrôle d'accès dédié.
-   Ajouter une protection CSRF, valider les données et gérer
    correctement les erreurs.
-   Ne pas se fier uniquement aux contrôles JavaScript ou à l'affichage
    du navigateur.

## 10. Conclusion

Cette application met en pratique les bases du développement web
dynamique : formulaires, traitement PHP, sessions, accès à une base de
données relationnelle, gestion CRUD et génération de documents PDF. Elle
peut être améliorée par l'ajout du paiement en ligne, de l'annulation
des réservations, de l'historique des tickets et d'une interface
d'administration avec des rôles plus stricts.
