<?php
session_start();
require_once "C:/xampp/htdocs/travelbooking/Model/TravelOffer.php"; // Inclure la classe
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des offres de voyage</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: navy;
            color: white;
        }
    </style>
</head>
<body>

<h2>Liste des Offres de Voyage</h2>

<table>
    <tr>
        <th>Titre</th>
        <th>Destination</th>
        <th>Date de départ</th>
        <th>Date de retour</th>
        <th>Prix (€)</th>
        <th>Catégorie</th>
    </tr>

    <?php
    if (!empty($_SESSION["offers"])) {
        foreach ($_SESSION["offers"] as $offerData) {
            if (is_string($offerData)) {
                // Si l'offre est sérialisée, on la désérialise
                $offer = unserialize($offerData);
                if ($offer instanceof TravelOffer) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($offer->getTitle()) . "</td>";
                    echo "<td>" . htmlspecialchars($offer->getDestination()) . "</td>";
                    echo "<td>" . htmlspecialchars($offer->getDepartureDate()) . "</td>";
                    echo "<td>" . htmlspecialchars($offer->getReturnDate()) . "</td>";
                    echo "<td>" . htmlspecialchars($offer->getPrice()) . " €</td>";
                    echo "<td>" . htmlspecialchars($offer->getCategory()) . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='6'>Erreur : Objet non valide</td></tr>";
                }
            } elseif (is_array($offerData)) {
                // Si l'offre est un tableau, on l'affiche directement
                echo "<tr>";
                echo "<td>" . htmlspecialchars($offerData["title"]) . "</td>";
                echo "<td>" . htmlspecialchars($offerData["destination"]) . "</td>";
                echo "<td>" . htmlspecialchars($offerData["departureDate"]) . "</td>";
                echo "<td>" . htmlspecialchars($offerData["returnDate"]) . "</td>";
                echo "<td>" . htmlspecialchars($offerData["price"]) . " €</td>";
                echo "<td>" . htmlspecialchars($offerData["category"]) . "</td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='6'>Erreur de données</td></tr>";
            }
        }
    } else {
        echo "<tr><td colspan='6'>Aucune offre disponible</td></tr>";
    }
    ?>
</table>

</body>
</html>
