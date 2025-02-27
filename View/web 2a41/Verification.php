<?php
session_start();
require_once "C:/xampp/htdocs/travelbooking/Model/TravelOffer.php";
require_once "C:/xampp/htdocs/travelbooking/Controller/TravelOfferController.php";

$controller = new TravelOfferController();
$offre1 = null; // Initialisation de la variable

if ($_SERVER["REQUEST_METHOD"] === "POST" && 
    isset($_POST["title"]) && 
    isset($_POST["destination"]) && 
    isset($_POST["departureDate"]) && 
    isset($_POST["returnDate"]) && 
    isset($_POST["price"]) && 
    isset($_POST["category"])) {  // Récupération des données du formulaire
    
    $title = $_POST["title"];
    $destination = $_POST["destination"];
    $departureDate = $_POST["departureDate"];
    $returnDate = $_POST["returnDate"];
    $price = $_POST["price"];
    $category = $_POST["category"];

    // Création de l'objet TravelOffer
    $offre1 = new TravelOffer($title, $destination, $departureDate, $returnDate, $price, $category);
    
    // Ajout de la structure HTML pour améliorer l'affichage
    echo "<h2>Offre de Voyage :</h2>";
    
    // Application de styles CSS dans un bloc <style>
    echo "<style>
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
            }
            th, td {
                padding: 15px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #03033B;
                color: white;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {
                background-color: #ddd;
            }
          </style>";

    // Affichage du tableau
    echo "<table>";
    echo "<tr>
            <th>Titre</th>
            <th>Destination</th>
            <th>Date de départ</th>
            <th>Date de retour</th>
            <th>Prix (€)</th>
            <th>Catégorie</th>
          </tr>";
    echo "<tr>
            <td>{$offre1->getTitle()}</td>
            <td>{$offre1->getDestination()}</td>
            <td>{$offre1->getDepartureDate()}</td>
            <td>{$offre1->getReturnDate()}</td>
            <td>{$offre1->getPrice()}</td>
            <td>{$offre1->getCategory()}</td>
          </tr>";
    echo "</table>";

} else {
    echo "<h3>Erreur : Les données du formulaire ne sont pas correctement envoyées.</h3>";
    var_dump($_POST); // Debug pour voir ce qui est reçu
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
