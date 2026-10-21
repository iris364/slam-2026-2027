<?php

$utilisateur = array(
    "nom" => "Nora",
    "actif" => true,
    "role" => "gestionnaire"
);

$demande = array(
    "id" => 101,
    "etat" => "nouvelle",
    "montant" => 250
);


function peutValider(array $utilisateur, array $demande): bool
{
    if (!$utilisateur["actif"]) {
        return false;
    }

    if ($demande["etat"] !== "nouvelle") {
        return false;
    }

    return $utilisateur["role"] === "admin"
        || (
            $utilisateur["role"] === "gestionnaire"
            && $demande["montant"] <= 1000
        );
}

function compterDemandesValidables(array $utilisateur, array $demandes): int
{
    $compteur = 0;

    foreach ($demandes as $demande) {
        if (peutValider($utilisateur, $demande)) {
            $compteur++;
        }
    }

    return $compteur;
}

function idsDemandesValidables(array $utilisateur, array $demandes): array
{
    $ids = array();

    foreach ($demandes as $demande) {
        if (peutValider($utilisateur, $demande)) {
            $ids[] = $demande["id"];
        }
    }

    return $ids;
}

function rechercherDemandeParId(array $demandes, int $id): ?array
{
    foreach ($demandes as $demande) {
        if ($demande["id"] === $id) {
            return $demande;
        }
    }

    return null;
}

?>