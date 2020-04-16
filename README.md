# Il y a 3 exemples de sites web pages dans ces pages.
Chaque exemple de site contient une page d'accueil et une page de login.

## Site web en multipage php
Ce premier exemple est le plus simple, il contient deux pages php faisant appel à une page commune "inc.php".

C'est de loin l'exemple que je préfère car le plus souple, le plus simple à maintenir et à mettre en oeuvre.

## Site web en mono page php
Ce deuxième exemple a été développé pour faire un essai.

Tout est rassemblé dans une seule page php.
Les frameworks php sont basés sur ce principe mais contiennent plusieurs pages php qui sont incluses en fonction de l'action requise.
J'ai beaucoup de mal à travailler avec ce modèle !

## Site web en javascript
Ce deuxième exemple a été développé en javascript.

Un "gros" javascript contient ce qui est affiché et la plupart des traitements.
Une partie serveur doit être toutefois implémentée pour certains traitements. Par exemple, les login/mots de passe des utilisateurs sont normalement sur le serveur ( enfin, j'espère ) et il faut aller vérifier les connexions sur le serveur.

Un javascript supplémentaire contient quelques exemples trouvés dans svelte.js.
J'étais curieux de voir comment implémenter des fonctions de framowork javascript et je touve que le résultat est assez simple.

## Conclusion
Pour rappel, les 5 technologies de base qui servent à développer des sites, qu'ils soient de type back office ou front office sont :
* Coté serveur : un language, par exemple php, GO, java, node, ...
* Coté serveur : une base de donnée
* Coté client : HTML
* Coté client : javascript
* Coté client : css

Chacune de ces technologie prêche pour sa paroisse et résultat pratique, on peut se trouver avec des usines à gaz qui mélangent "ce qui se fait de mieux" dans chacune des technomogies.

Ce mélange devient une catastrophe quand il faut maintenir un site un peu complexe. Je ne parle pas de sites "simples" tels que les blogs ou les vitrines.
Pour ces derniers, il existe des CMS ( content management system ) qui font très bien l'affaire et permettent à des utilisateurs non informaticiens de gérer leurs pages assez simplement.

Pour les sites un peu plus complexes, vous devez intégrer dans vos équipes des "spécialistes" dans chaque technologie.
Chaque spécialiste verra le site selon son point de vue et je ne parle pas des versions des technologies qui changent plus ou moins régulièrement.

**Conclusion de la conclusion :**

* Commencez par faire des sites en language serveur en multipage.
* Mettez vos composants métier dans les fichiers à inclure en fonction des pages
* Soupoudrez de javascript et de css