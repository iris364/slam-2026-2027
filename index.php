<?php

$utilisateur = [
    "nom" => "Nora",
    "actif" => true,
    "role" => "gestionnaire"
];

$tickets = [
    ["id" => 1, "statut" => "ouvert", "priorite" => 2],
    ["id" => 2, "statut" => "ferme",  "priorite" => 1],
    ["id" => 4, "statut" => "ouvert", "priorite" => 3]
];

function compterTicketsOuverts(array $tickets): int
{
    $compteur = 0;

    foreach ($tickets as $ticket) {
        if ($ticket["statut"] === "ouvert") {
            $compteur++;
        }
    }

    return $compteur;
}

function peutClore(array $utilisateur, array $ticket): bool
{
    return $utilisateur["actif"]
        && (
            $utilisateur["role"] === "admin"
            || $utilisateur["role"] === "gestionnaire"
        )
        && $ticket["statut"] === "ouvert";
}

function compterTicketsCloturables(array $utilisateur, array $tickets): int
{
    $compteur = 0;

    foreach ($tickets as $ticket) {
        if (peutClore($utilisateur, $ticket)) {
            $compteur++;
        }
    }

    return $compteur;
}

echo compterTicketsCloturables($utilisateur, $tickets); // 2

?>
