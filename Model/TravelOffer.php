<?php
class TravelOffer {
    private $id;
    private $title;
    private $destination;
    private $departureDate;
    private $returnDate;
    private $price;
    private $category;

    public function __construct($title, $destination, $departureDate, $returnDate, $price, $category) {
        $this->title = $title;
        $this->destination = $destination;
        $this->departureDate = $departureDate;
        $this->returnDate = $returnDate;
        $this->price = $price;
        $this->category = $category;
    }

    // Getters
    public function getTitle() {
        return $this->title;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function getDepartureDate() {
        return $this->departureDate;
    }

    public function getReturnDate() {
        return $this->returnDate;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }

    // Méthode pour afficher les informations sous forme de tableau HTML
    public function show() {
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr><th>Titre</th><th>Destination</th><th>Date de départ</th><th>Date de retour</th><th>Prix (€)</th><th>Catégorie</th></tr>";
        echo "<tr>
                <td>{$this->getTitle()}</td>
                <td>{$this->getDestination()}</td>
                <td>{$this->getDepartureDate()}</td>
                <td>{$this->getReturnDate()}</td>
                <td>{$this->getPrice()}</td>
                <td>{$this->getCategory()}</td>
              </tr>";
        echo "</table>";
    }

    // Méthode pour afficher les informations via var_dump()
    public function dump() {
        var_dump($this);
    }
}
?>