
# BTS SIO 2 SLAM


## Étudiant



Diagnostic technique

Question    Correction / point observé

Q1	3

Q2	return $actif && ($role === "admin" || $role === "gestionnaire");

Q3	Utiliser $i < count($utilisateurs) et non <=.

Q4	$_POST["email"], puis validation/contrôle de la valeur.

Q5	Risque d’injection SQL ; utiliser une requête préparée.

Q6	WHERE filtre les lignes avant agrégation ; HAVING filtre notamment des groupes après agrégation.

Q7	git status → git add → git commit → git push.

Q8	Authentification = établir l’identité ; autorisation = déterminer les droits.

Q9	Disponibilité et intégrité. Ne pas inventer une exfiltration non mentionnée.

Q10	Le mot de passe n’a normalement pas à être récupéré en clair ; on vérifie sa correspondance avec une empreinte adaptée.

Q11	Méthode estActif ; retour boolean ; retourne la valeur de actif.

Q12	Parcourir la liste, comparer chaque droit à DELETE, retourner vrai si trouvé, sinon faux en fin de parcours.


Q12 détaillée 


POUR CHAQUE droit DANS droits FAIRE

    SI droit = "DELETE" ALORS

        RETOURNER VRAI

    FIN SI

FIN POUR

        RETOURNER FAUX

ou

Version formalisée

ALGORITHME contientDroitDelete

ENTRÉE

    droits : liste de chaînes de caractères

SORTIE

    booléen

DÉBUT

    POUR CHAQUE droit DANS droits FAIRE

        SI droit = "DELETE" ALORS

            RETOURNER VRAI

        FIN SI

    FIN POUR

    RETOURNER FAUX
FIN






