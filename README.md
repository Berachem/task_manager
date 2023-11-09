# 📋 Task Manager 


![](task_manager_Berachem.mp4) 


Made with ❤️ by [Berachem](https://www.berachem.dev/)

## 🎯 Objectif du projet
Ce projet vise à développer une application de gestion de tâches dotée d'un système d'authentification et de gestion de catégories . 
Il a pour but de faire une initation à la programmation web avec le framework PHP **Symfony**.

__⏰ temps de réalisation : 4 jours__

<hr>

# Fonctionnalités de l'application 

## Démarche suivie
 - Toutes les tâches et catégories sont liées à un utilisateur.
    - Les utilisateurs peuvent créer, modifier et supprimer leurs propres tâches et catégories. 
     <code>Ainsi, l'utilisateur A ne peut pas voir les tâches et catégories de l'utilisateur B.</code>
- Les administrateurs (qui sont des sortes d'utilisateurs) peuvent aussi créer, modifier et supprimer des tâches et catégories. 
    - Ils peuvent aussi créer, modifier et supprimer des utilisateurs.
    <code>Ainsi, l'administateur Z peut voir toutes les informations de l'utilisateur A et B. 
    Il peut même créer un utilisateur C.</code>

- Les utilisateurs peuvent importer et exporter des tâches et catégories au format <code>JSON</code>.



## 🔐 Système d'Authentification

- **Page d'Authentification** : Les utilisateurs doivent se connecter via une page d'authentification sécurisée.

- **Gestion des Comptes** : Chaque utilisateur dispose d'un compte qui lui permet d'accéder au site.

- **Page d'Administration des Utilisateurs** : Les administrateurs ont la possibilité de gérer les utilisateurs de l'application.

- **Création d'Utilisateurs** : Il est possible de créer de nouveaux utilisateurs à l'aide d'une page dédiée.

- **Modification d'Utilisateurs** : Les informations des utilisateurs existants peuvent être modifiées, via une page dédiée.

- **Suppression d'Utilisateurs** : Les administrateurs peuvent supprimer des utilisateurs, en utilisant une page dédiée.

## ✅ Système de Tâches

- **Liste des Tâches** : Une page permet aux utilisateurs de consulter la liste des tâches enregistrées.

- **Création de Tâches** : Les utilisateurs ont la possibilité de créer de nouvelles tâches via une page dédiée.

- **Modification de Tâches** : Les informations relatives à une tâche existante peuvent être modifiées sur une page dédiée.

- **Suppression de Tâches** : Les utilisateurs peuvent supprimer des tâches existantes en utilisant une page dédiée.

## 🏷️ Gestion de Catégories

- **Liste des Catégories** : Une page permet aux utilisateurs de consulter la liste des catégories  disponibles.

- **Création de Catégories** : Les utilisateurs peuvent créer de nouveaux catégories en utilisant une page dédiée.

- **Modification de Catégories** : Les informations relatives à un tag existant peuvent être modifiées sur une page dédiée.

- **Suppression de Catégories** : Les utilisateurs ont la possibilité de supprimer des catégories  existants en utilisant une page dédiée

- **Assignation de Catégories aux Tâches** : Les utilisateurs peuvent assigner un ou plusieurs catégories  à une tâche pour une meilleure organisation.

- **Retrait de Catégories des Tâches** : Si nécessaire, les catégories  peuvent être retirés des tâches auxquelles ils ont été précédemment assignés.

## 📤 Export/Import de Tâches (*JSON*)

- **Export de Tâches** : Les utilisateurs ont la possibilité d'exporter toutes les tâches & catégories enregistrées dans un fichier JSON.

- **Import de Tâches** : Il est possible d'importer des tâches à partir d'un fichier, afin de les intégrer dans l'application.

<hr>

# 🚀 Installation du projet

[![My Skills](https://skillicons.dev/icons?i=symfony,php,bootstrap,mysql)](https://skillicons.dev)

## Prérequis

- Git

 - WampServer (ou équivalent)

- PHP (v8.2 de préférence)

- Composer

- npm 


## Installation

- Cloner le projet sur votre machine locale (dans le dossier ``www`` de WampServer par exemple) :

```bash
git clone https://gitlab.zac.web-enedis.fr/berachemENEDIS/symfony_exercice.git
```

- Installer les dépendances du projet : 

```bash
composer install
```

- Installer les dépendances front-end du projet : 

```bash
npm install
```

- Créer la base de données (après avoir configuré le fichier ``.env.locale``) 

```bash
php bin/console doctrine:database:create
```

- Créer les tables de la base de données : 

```bash
php bin/console doctrine:migrations:migrate
```

- Charger les données de test : 

```bash
php bin/console doctrine:fixtures:load
```

- Démarrez votre serveur local et accédez au projet via l'URL suivante : 

```bash
http://localhost/task_manager/public/
```

<hr>

# 👓 Données de test

Après avoir chargé les données de test, vous pouvez vous connecter à l'application avec les comptes suivants :

## Compte Utilisateur

- **email** : ``user@example.com``
- **password** : ``useruser``

## Compte Administrateur

- **email** : ``admin@example.com``
- **password** : ``adminadmin``

## Fichier JSON d'importation de données

Vous pouvez importer les données via le fichier <a href="/example_data_import.json">example_data_import.json</a> situé à la racine du projet.











