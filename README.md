# Trip Planner

Application web de planification de voyages développée avec Laravel, dans le cadre du cours de Programmation Web (Master 2 MIASHS – Université Grenoble Alpes, 2025-2026).

## Description

Trip Planner permet de consulter et gérer des voyages avec leurs destinations, activités, hébergements et transports. L'application propose une interface publique de consultation et un espace d'administration.

## Fonctionnalités

- Listing des voyages avec tri par date
- Page de détail d'un voyage : destinations, activités, hébergements, transports
- Calcul automatique du coût total d'un voyage (activités + hébergements + transports)
- Formulaire de contact avec validation et enregistrement en base
- Espace admin : liste et détail des voyages

## Architecture

Structure MVC Laravel :

```
app/
├── Http/Controllers/
│   ├── HomeController.php        # Page d'accueil
│   ├── TripController.php        # Liste et détail des voyages
│   ├── ContactController.php     # Formulaire de contact
│   └── Admin/
│       └── TripController.php    # Gestion admin des voyages
├── Models/
│   ├── Trip.php                  # Modèle voyage + calcul du coût total
│   ├── Destination.php           # Destinations liées à un voyage
│   ├── Activity.php              # Activités par destination
│   ├── Accommodation.php         # Hébergements par destination
│   ├── Transport.php             # Transports d'un voyage
│   ├── Contact.php               # Messages de contact
│   └── User.php
database/
├── migrations/                   # Création des tables
├── factories/                    # Génération de données de test
└── seeders/                      # Peuplement de la base
resources/views/                  # Vues Blade
routes/web.php                    # Définition des routes
```

## Technologies

- PHP / Laravel
- Blade (moteur de templates)
- SQLite
- HTML5 / CSS3

## Installation

```bash
git clone https://github.com/sysyhera-spec/trip-planner-laravel.git
cd trip-planner-laravel

composer run setup
```

Si la commande `setup` n'est pas disponible, tu peux lancer manuellement :

```bash
cp .env.example .env
composer install
npm install && npm run build
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
```

Lancer le serveur :

```bash
composer run dev
```

L'application est accessible sur : http://localhost:8000

## Authentification

L'espace admin est protégé par authentification. Après `composer run setup`, un utilisateur de test est disponible :
- **Email** : test@example.com
- **Mot de passe** : testtest

## Auteurs

Projet réalisé en groupe dans le cadre du cours de Programmation Web – Master 2 MIASHS DCISS, UGA.
