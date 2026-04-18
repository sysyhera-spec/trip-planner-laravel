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
- MySQL
- HTML5 / CSS3

## Installation

```bash
git clone <url-du-repo>
cd trip-planner

composer install
cp .env.example .env
php artisan key:generate

# Configurer la base de données dans .env, puis :
php artisan migrate --seed

php artisan serve
```

## Auteurs

Projet réalisé en groupe dans le cadre du cours de Programmation Web – Master 2 MIASHS DCISS, UGA.
