<?php

class TravelOfferController {
    public function showTravelOffer($offer) {
        if ($offer instanceof TravelOffer) {
            echo "<h2>Offre de voyage :</h2>";
            echo "<p>Titre : " . htmlspecialchars($offer->getTitle()) . "</p>";
            echo "<p>Destination : " . htmlspecialchars($offer->getDestination()) . "</p>";
            echo "<p>Date de départ : " . htmlspecialchars($offer->getDepartureDate()) . "</p>";
            echo "<p>Date de retour : " . htmlspecialchars($offer->getReturnDate()) . "</p>";
            echo "<p>Prix : " . htmlspecialchars($offer->getPrice()) . " €</p>";
            echo "<p>Catégorie : " . htmlspecialchars($offer->getCategory()) . "</p>";
        } else {
            echo "<p>Erreur : l’offre de voyage n'est pas valide.</p>";
        }
    }
}

?>
