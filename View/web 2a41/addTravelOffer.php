<?php
session_start(); // Démarrer la session
require_once "C:/xampp/htdocs/travelbooking/Model/TravelOffer.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["title"], $_POST["destination"], $_POST["departureDate"], 
              $_POST["returnDate"], $_POST["price"], $_POST["category"])
    ) {
        $title = trim($_POST["title"]);
        $destination = trim($_POST["destination"]);
        $departureDate = $_POST["departureDate"];
        $returnDate = $_POST["returnDate"];
        $price = floatval($_POST["price"]);
        $category = trim($_POST["category"]);

        // Créer l'offre
        $offer = new TravelOffer($title, $destination, $departureDate, $returnDate, $price, $category);

        // Stocker dans la session après sérialisation
        if (!isset($_SESSION["offers"])) {
            $_SESSION["offers"] = [];
        }
        $_SESSION["offers"][] = serialize($offer); // Sérialisation de l'objet

        // Sauvegarder et rediriger
        session_write_close();
        header("Location: showTravelOffer.php");
        exit();
    } else {
        $errorMessage = "Tous les champs sont requis.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Offre de Voyage</title>
    <style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    max-width: 900px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

form div {
    display: flex;
    flex-direction: column;
}

input, select, button {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #082567;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #041c48;
}

footer {
    margin-top: 20px;
}
</style>
</head>
<body>

    <nav style="background-color: #082567; padding: 15px 20px;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <a href="#" style="color: white; font-size: 24px; font-weight: bold; text-decoration: none;">TRAVEL BOOKING</a>
            <ul style="list-style-type: none; margin: 0; padding: 0; display: flex; gap: 20px;">
                <li><a href="index.html" style="color: white; text-decoration: none; font-size: 18px;">Accueil</a></li>
                <li><a href="index.html#travel-offers" style="color: white; text-decoration: none; font-size: 18px;">Offres</a></li>
                <li><a href="index.html#about" style="color: white; text-decoration: none; font-size: 18px;">À propos</a></li>
                <li><a href="index.html#contact" style="color: white; text-decoration: none; font-size: 18px;">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div style="margin-top: 50px; width: 80%; margin: auto;">
        <h2 style="text-align: center; color: #082567;">Ajouter une Offre de Voyage</h2>

        <?php if (isset($errorMessage)) : ?>
            <p style="color: red; text-align: center;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <form id="offerForm" action="Verification.php" method="post">
    <div>
        <label for="title">Titre de l'offre *</label>
        <input type="text" id="title" name="title" required>
    </div>

    <div>
        <label for="destination">Destination *</label>
        <input type="text" id="destination" name="destination" required>
    </div>

    <div>
        <label for="departureDate">Date de départ *</label>
        <input type="date" id="departureDate" name="departureDate" required>
    </div>

    <div>
        <label for="returnDate">Date de retour *</label>
        <input type="date" id="returnDate" name="returnDate" required>
    </div>

    <div>
        <label for="price">Prix (€) *</label>
        <input type="number" id="price" name="price" step="0.01" required>
    </div>

    <div>
        <label for="category">Catégorie *</label>
        <select id="category" name="category" required>
            <option value="">-- Choisissez une catégorie --</option>
            <option value="family">Family Trips</option>
            <option value="couples">Couples' Trips</option>
            <option value="adventure">Adventure and Sports Trips</option>
        </select>
    </div>

    <div>
        <button type="submit">Ajouter l'offre</button>
    </div>
</form>

    </div>

    <footer style="background-color: #082567; color: white; text-align: center; padding: 20px;">
        <p>📍 13 avenue de la liberté, 2083</p>
        <p>✉️ <a href="mailto:yassmine.rezgui@esprit.tn" style="color: #50C878; text-decoration: none;">yassmine.rezgui@esprit.tn</a></p>
        <p>© 2024 Your Website. All Rights Reserved.</p>
    </footer>

    <script src="addOffer.js"></script>

</body>
</html>
