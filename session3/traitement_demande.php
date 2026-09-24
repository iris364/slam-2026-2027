<?php
$nom = $_GET["nom"];
$montant = $_GET["montant"];

echo "Nom : " . htmlspecialchars($nom, ENT_QUOTES, "UTF-8");
echo "<br>Montant : " . htmlspecialchars($montant, ENT_QUOTES, "UTF-8");
?>  