# FormTool

FormTool est un outil "Drop-in" ultra-léger pour les développeurs back-end. Il permet de générer instantanément des formulaires de test pour vos scripts de traitement CRUD, avec un remplissage automatique de fausses données intelligentes.

## ✨ Fonctionnalités

- **Zéro configuration :** Un seul fichier autonome, aucune dépendance externe.
- **Auto-remplissage intelligent :** Génère des adresses email, des dates, des nombres et des mots de passe factices.
- **Typage strict :** Code moderne exploitant les nouveautés de PHP 8 (Promotion des propriétés, expression `match`).
- **Interface propre :** Génère un rendu HTML clair et fonctionnel instantanément.

## ⚙️ Prérequis

- PHP 8.0 ou supérieur.

## 📦 Installation

Glissez simplement le fichier `QuickTester.php` à la racine de votre projet ou dans votre dossier de test. Aucune installation via Composer n'est requise.

## 🛠️ Utilisation

Créez un fichier de test (ex: `test_form.php`), incluez la classe et déclarez vos champs. L'outil s'occupe du reste.

```php
<?php
require_once 'QuickTester.php';

// 1. Indiquez le script cible à tester
$formulaire = new FormTool('traitement_crud.php');

// 2. Ajoutez vos champs (le type 'text' est par défaut)
$formulaire->addField('email_utilisateur', 'email');
$formulaire->addField('mot_de_passe', 'password');
$formulaire->addField('age', 'number');
$formulaire->addField('date_inscription', 'date');
$formulaire->addField('description_profil');

// 3. Affichez le formulaire pré-rempli
$formulaire->render();
?>
```
