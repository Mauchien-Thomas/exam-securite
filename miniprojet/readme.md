-Pour lancer le mini projet il faut un environnement de travail php (mamp, uwamp,...).

-Il faut place le mini projet dans le dossier www sur mamp ou uwamp.

Avec faille:

XSS:

-Lancer le site avec_faille_xss.php dans le textarea il vous suffit d'écrire 
<script>alert("test")</script> puis d'appuyer sur le bouton valider et la pop-up d'alerte s'affichera.


Injection SQL:

-Lancer le site avec_faille_sql.php, vous pouvez vérifier la connexion avec Identifiant = admin et mot de passe = thomas.
Pour faire apparaitre la faille dans le champs identifiant écriver : 'OR 1 = 1 /* , un mot de passe n'est pas nécessaire,
Vous pouvez constaté que vous ètes bien connectées.


Sans faille:

XSS:

-Lancer le site sans_faille_xss.php vous pouvez écrire <script>alert("test")</script> mais le pop up ne s'affiche pas.
Pour pallier a cette faille j'ai utiliser la fonction php htmlspecialchars qui convertit les caractères spéciaux en entités HTML.


Injection SQL:

-Lancer le site avec_faille_sql.php, vous pouvez vérifier la connexion avec Identifiant = admin et mot de passe = thomas.
Si vous essayer de vous connecter avec identifiant = 'OR 1 = 1 /* et un mot de passe bidon vous n'arriverais pas a vous connecter.
-Pour pallier a cette faille j'ai utilisé une requète préparé de php, et la fonction bindvalue pour associer une valeur a un parametre.
J'ai rajouter la fonction sleep avec comme parametres 1 pour empécher l'attaque par la force brute qui  permet à un pirate de tester des identifiants
 et mots de passe de façon très rapide au moyen d'un script.
