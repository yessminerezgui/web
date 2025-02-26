<?php
class TravelOffer {
    private $id;
    private $title;
    private $destination;
    private $departureDate;
    private $returnDate;
    private $price;
    private $category;

    // Constructeur paramétré
    public function __construct($title, $destination, $departureDate, $returnDate, $price, $category) {
        $this->title = $title;
        $this->destination = $destination;
        $this->departureDate = $departureDate;
        $this->returnDate = $returnDate;
        $this->price = $price;
        $this->category = $category;
    }

    // Getters pour accéder aux attributs privés
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
        echo "<tr><th>Title</th><th>Destination</th><th>Departure Date</th><th>Return Date</th><th>Price (€)</th><th>Category</th></tr>";
        echo "<tr>
                <td>{$this->title}</td>
                <td>{$this->destination}</td>
                <td>{$this->departureDate}</td>
                <td>{$this->returnDate}</td>
                <td>{$this->price}</td>
                <td>{$this->category}</td>
              </tr>";
        echo "</table>";
    }

    // Méthode pour afficher les informations via var_dump()
    public function dump() {
        var_dump($this);
    }
}
?>
