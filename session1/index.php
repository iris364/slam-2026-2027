<?php

$agent = array(
    "nom" => "Samira",
    "compteActif" => true,
    "role" => "support"
);

$journal = array(
    "id" => 501,
    "source" => "pare-feu",
    "etat" => "disponible",
    "niveau" => "standard"
);

$journaux = array(
    array("id" => 501, "source" => "pare-feu",  "etat" => "disponible", "niveau" => "standard"),
    array("id" => 502, "source" => "VPN",       "etat" => "disponible", "niveau" => "sensible"),
    array("id" => 503, "source" => "serveur-web","etat" => "archive",    "niveau" => "standard"),
    array("id" => 504, "source" => "antivirus", "etat" => "disponible", "niveau" => "standard")
);


/*
echo "Agent : " . $agent["nom"];

print_r($journal);

var_dump($agent["compteActif"]);

if (
    $agent["compteActif"]
    && $journal["etat"] === "disponible"
) {
    echo "Contrôle poursuivi";
} else {
    echo "Accès bloqué";
}
    */

function afficherJournal(array $journal): void
{
    echo "<br>Journal #" . $journal["id"]
        . " - " . $journal["source"];
}

//afficherJournal($journal);


function peutConsulterJournal(array $agent, array $journal): bool
{
    if (!$agent["compteActif"]) {
        return false;
    }

    if ($journal["etat"] !== "disponible") {
        return false;
    }

    return $agent["role"] === "analyste"
        || (
            $agent["role"] === "support"
            && $journal["niveau"] === "standard"
        );
}

$autorise = peutConsulterJournal($agent, $journal);
//var_dump($autorise);

echo peutConsulterJournal($agent, $journal)
    ? $agent["nom"] . " oui<br>"
    : $agent["nom"] . " non<br>";


$compteur = 0;

foreach ($journaux as $journalCourant) {
    if ($journalCourant["etat"] === "disponible") {
        $compteur++;
    }
}

echo "Nombre de journal total disponibles : " . $compteur;

function rechercherJournalParId(array $journaux, int $id): ?array
{
    foreach ($journaux as $journalCourant) {
        if ($journalCourant["id"] === $id) {
            return $journalCourant;
        }
    }


    return null;
}

function compterJournauxConsultables(
    array $agent,
    array $journaux
): int
{
    $compteur = 0;

    foreach ($journaux as $journalCourant) {
        if (peutConsulterJournal($agent, $journalCourant)) {
            $compteur++;
        }
    }

    return $compteur;
}

echo "<br> Nombre de journal consultable par " . $agent["nom"] . " : " . compterJournauxConsultables($agent,$journaux);