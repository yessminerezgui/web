<?php
session_start();
require_once "C:/xampp/htdocs/travelbooking/Model/TravelOffer.php"; // Inclure la classe
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Offres de Voyage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .table-container {
            width: 90%;
            margin: auto;
            overflow-x: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .empty-message {
            text-align: center;
            font-size: 18px;
            color: #888;
            padding: 20px;
        }
    </style>
</head>
<body>

<h2>🌍 Liste des Offres de Voyage ✈️</h2>

<div class="table-container">
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
                    // Désérialisation si l'offre est stockée sous forme de chaîne
                    $offer = unserialize($offerData);
                    if ($offer instanceof TravelOffer) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($offer->getTitle()) . "</td>";
                        echo "<td>" . htmlspecialchars($offer->getDestination()) . "</td>";
                        echo "<td>" . htmlspecialchars($offer->getDepartureDate()) . "</td>";
                        echo "<td>" . htmlspecialchars($offer->getReturnDate()) . "</td>";
                        echo "<td><strong>" . htmlspecialchars($offer->getPrice()) . " €</strong></td>";
                        echo "<td>" . htmlspecialchars($offer->getCategory()) . "</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr><td colspan='6'>❌ Erreur : Objet non valide</td></tr>";
                    }
                } elseif (is_array($offerData)) {
                    // Affichage si l'offre est stockée sous forme de tableau
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($offerData["title"]) . "</td>";
                    echo "<td>" . htmlspecialchars($offerData["destination"]) . "</td>";
                    echo "<td>" . htmlspecialchars($offerData["departureDate"]) . "</td>";
                    echo "<td>" . htmlspecialchars($offerData["returnDate"]) . "</td>";
                    echo "<td><strong>" . htmlspecialchars($offerData["price"]) . " €</strong></td>";
                    echo "<td>" . htmlspecialchars($offerData["category"]) . "</td>";
                    echo "</tr>";
                } else {
                    echo "<tr><td colspan='6'>❌ Erreur de données</td></tr>";
                }
            }
        } else {
            echo "<tr><td colspan='6' class='empty-message'>Aucune offre disponible 🏝️</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
