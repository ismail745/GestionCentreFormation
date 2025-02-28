# Gestion de Centre de Formation - Symfony

## 📌 Description
Ce projet est une application web développée avec **Symfony** pour la gestion d’un centre de formation. Il permet d’administrer les formations, les formateurs, les stagiaires, les inscriptions et la gestion financière du centre.

## 🚀 Fonctionnalités principales
- **Gestion des formations** : CRUD complet des formations
- **Gestion des formateurs** : Création, affectation et suivi
- **Gestion des stagiaires** : Inscriptions, formations suivies, certificats
- **Gestion des inscriptions** : Interface d’inscription et suivi des paiements
- **Gestion des salles** : Planification des formations
- **Paiements et facturation** : Génération de factures et suivi financier
- **Tableau de bord** : Vue globale des statistiques du centre
- **Authentification et rôles** : Gestion sécurisée des accès (Admin, Formateur, Stagiaire)

## 🛠 Technologies utilisées
- **Symfony** (Framework PHP)
- **Twig** (Moteur de templates)
- **Doctrine** (ORM pour la base de données)
- **Bootstrap** (Interface utilisateur)
- **API Platform** (Exposition des données en REST API)
- **JWT Authentication** (Sécurité et gestion des sessions)

## ⚙️ Installation et Configuration
1. **Cloner le projet** :
   ```bash
   git clone https://github.com/utilisateur/gestion-centre-formation.git
   cd gestion-centre-formation
   ```
2. **Installer les dépendances** :
   ```bash
   composer install
   npm install
   ```
3. **Configurer la base de données** : Modifier `.env`
4. **Exécuter les migrations** :
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
5. **Lancer le serveur Symfony** :
   ```bash
   symfony server:start
   ```
6. **Accéder à l’application** via `http://127.0.0.1:8000`

## 🏗 Améliorations futures
- 📅 **Ajout d’un calendrier interactif**
- 📱 **Développement d’une application mobile**
- 🎓 **Module e-learning avec vidéos et quiz**

## 📜 Licence
Ce projet est sous licence MIT.

---
**Auteur :** ismail kchibal (https://github.com/ismail745)
