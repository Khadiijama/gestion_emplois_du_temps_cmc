# Système de Gestion des Emplois du Temps - CMC Rabat-Salé-Kénitra

![Bannière](public/images/logo1.png)

## Présentation du Projet
Ce projet est une application web développée en **Laravel 10/11** pour gérer les emplois du temps du **Pôle Digital et Intelligence Artificielle** de la Cité des Métiers et des Compétences (CMC) de Rabat-Salé-Kénitra. 

L'application permet d'informatiser et d'automatiser l'affectation des séances, des formateurs et des salles pour les différents groupes et filières. Elle offre un affichage interactif et gère les conflits de planification en temps réel.

---

## 🚀 Fonctionnalités Principales

Le système est divisé en **3 espaces distincts** selon les rôles :

### 1. Espace Stagiaire (Accès Public)
- Sélection de la filière et du groupe via une interface dynamique.
- Affichage de l'emploi du temps hebdomadaire (4 créneaux par jour, de Lundi à Samedi).
- Informations sur les formateurs et les salles pour chaque séance.
- Impression ou export de l'emploi du temps.

### 2. Espace Formateur (Authentifié)
- Accès par identifiant / mot de passe.
- Tableau de bord personnalisé affichant le planning exclusif du formateur.
- Vue globale de toutes ses séances sur la semaine.
- Gestion du profil (changement d'email, mot de passe).

### 3. Espace Administration (Authentifié)
- **Gestion des ressources** : Création/Modification des Groupes, Salles (Cours ou Multimédia), Formateurs et Filières.
- **Gestion des séances** : Planification des cours avec **vérification stricte des conflits** (un formateur, un groupe ou une salle ne peut pas être assigné à deux endroits au même moment).
- Statistiques globales de l'établissement.

---

## 🛠️ Technologies Utilisées

- **Backend** : PHP 8.2+, Framework Laravel
- **Base de données** : MySQL (via XAMPP recommandé) avec support SQLite pour le prototypage.
- **Frontend** : HTML5, CSS Vanilla, Bootstrap 5.3 (Redesign complet de l'UI).
- **Architecture** : MVC (Modèle-Vue-Contrôleur)
- **Authentification** : Laravel Breeze

---

## ⚙️ Installation en Local

Pour lancer le projet sur votre machine (nécessite PHP 8.2+ et Composer) :

1. **Cloner le dépôt :**
   ```bash
   git clone https://github.com/Khadiijama/gestion_emplois_du_temps_cmc.git
   cd gestion_emplois_du_temps_cmc
   ```

2. **Installer les dépendances PHP :**
   ```bash
   composer install
   ```

3. **Configurer l'environnement :**
   Copiez le fichier `.env.example` en `.env` :
   ```bash
   cp .env.example .env
   ```
   *Note : Le projet est pré-configuré pour utiliser SQLite (par défaut dans Laravel 11).*

4. **Générer la clé de l'application :**
   ```bash
   php artisan key:generate
   ```

5. **Créer la base de données et insérer les données de démonstration (Seeders) :**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Cela va générer les filières du CDC, les salles, une liste de 10 formateurs et des emplois du temps d'exemple.*

6. **Lancer le serveur de développement :**
   ```bash
   php artisan serve
   ```
   L'application sera disponible sur `http://127.0.0.1:8000`.

---

## 🔐 Identifiants de Connexion par Défaut

Le `DatabaseSeeder` génère des comptes prêts à l'emploi :

**Administrateur :**
- Email : `admin@cmc-rsk.ma`
- Mot de passe : `Admin@2025`

**Formateur (Exemple) :**
- Email : `imane.fritet@cmc-rsk.ma`
- Mot de passe : `Formateur@2025`

**Stagiaire (Exemple) :**
- Email : `khadija.maaz@cmc-rsk.ma`
- Mot de passe : `Stagiaire@2025`

---

## 📦 Déploiement en Production

Pour héberger ce projet sur une plateforme PaaS comme Render ou sur un VPS :
1. Définir `APP_ENV=production` et `APP_DEBUG=false` dans le fichier `.env`.
2. Générer le cache pour optimiser les performances :
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
3. Utiliser un serveur web (Nginx/Apache) en pointant le document root vers le dossier `/public`.

---
*Projet réalisé dans le cadre de la formation au sein de la Cité des Métiers et des Compétences (CMC).*
