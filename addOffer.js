/*// Fonction de validation du formulaire
function validerFormulaire() {
    let title = document.getElementById("title").value.trim();
    let destination = document.getElementById("destination").value.trim();
    let departureDate = document.getElementById("departureDate").value;
    let returnDate = document.getElementById("returnDate").value;
    let price = document.getElementById("price").value.trim();
    
    // Validation du titre (au moins 3 caractères)
    if (title.length < 3) {
        alert("Le titre doit contenir au moins 3 caractères.");
        return false;
    }
    
    // Validation de la destination (uniquement des lettres et espaces, au moins 3 caractères)
    let destinationRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ ]{3,}$/;
    if (!destinationRegex.test(destination)) {
        alert("La destination doit contenir uniquement des lettres et des espaces, et au moins 3 caractères.");
        return false;
    }
    
    // Validation des dates
    if (departureDate >= returnDate) {
        alert("La date de retour doit être ultérieure à la date de départ.");
        return false;
    }
    
    // Validation du prix (nombre positif)
    if (isNaN(price) || price <= 0) {
        alert("Le prix doit être un nombre positif.");
        return false;
    }
    
    alert("Offre ajoutée avec succès !");
    return true;
}

// Ajout de l'événement onClick sur le bouton
window.addEventListener("DOMContentLoaded", function() {
    let addButton = document.querySelector("button[type='submit']");
    if (addButton) {
        addButton.addEventListener("click", function(event) {
            if (!validerFormulaire()) {
                event.preventDefault(); // Empêcher l'envoi du formulaire si la validation échoue
            }
        });
    }
});*/
/*document.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("offerForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Empêche l'envoi du formulaire si invalide
        let isValid = true;

        // Réinitialisation des messages d'erreur et de succès
        document.querySelectorAll(".error-message").forEach(el => el.innerText = "");
        let successMessage = document.getElementById("success-message");
        successMessage.innerText = "";

        // Récupération des valeurs des champs
        let title = document.getElementById("title").value.trim();
        let destination = document.getElementById("destination").value.trim();
        let departureDate = document.getElementById("departureDate").value;
        let returnDate = document.getElementById("returnDate").value;
        let price = document.getElementById("price").value.trim();

        // Vérification du titre (min 3 caractères)
        if (title.length < 3) {
            document.getElementById("titleError").innerText = "Le titre doit contenir au moins 3 caractères.";
            isValid = false;
        }

        // Vérification de la destination (uniquement lettres + espaces, min 3 caractères)
        let destinationRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ ]{3,}$/;
        if (!destinationRegex.test(destination)) {
            document.getElementById("destinationError").innerText = "La destination doit contenir uniquement des lettres et au moins 3 caractères.";
            isValid = false;
        }

        // Vérification des dates (returnDate > departureDate)
        if (!departureDate) {
            document.getElementById("departureDateError").innerText = "Veuillez entrer une date de départ valide.";
            isValid = false;
        }
        if (!returnDate || returnDate <= departureDate) {
            document.getElementById("returnDateError").innerText = "La date de retour doit être ultérieure à la date de départ.";
            isValid = false;
        }

        // Vérification du prix (positif)
        if (isNaN(price) || price <= 0) {
            document.getElementById("priceError").innerText = "Le prix doit être un nombre positif.";
            isValid = false;
        }

        // Si tout est valide, afficher un message de succès
        if (isValid) {
            successMessage.innerText = "✅ Offre ajoutée avec succès !";
            successMessage.style.color = "green";
            form.reset(); // Réinitialisation du formulaire après soumission
        }
    });
});*/
document.addEventListener("DOMContentLoaded", function () {
    console.log("Script chargé");

    let form = document.getElementById("offerForm");

    // Fonction de validation des champs
    function validateField(input, errorElement, condition, errorMessage) {
        if (condition) {
            errorElement.innerText = "✅ Correct";
            errorElement.style.color = "green";
        } else {
            errorElement.innerText = errorMessage;
            errorElement.style.color = "red";
        }
    }

    // Ajout des événements keyup sur les champs
    document.getElementById("title").addEventListener("keyup", function () {
        let title = this.value.trim();
        let errorElement = document.getElementById("titleError");
        validateField(title, errorElement, title.length >= 3, "Le titre doit contenir au moins 3 caractères.");
    });

    document.getElementById("destination").addEventListener("keyup", function () {
        let destination = this.value.trim();
        let errorElement = document.getElementById("destinationError");
        let destinationRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ ]{3,}$/;
        validateField(destination, errorElement, destinationRegex.test(destination), "La destination doit contenir uniquement des lettres et au moins 3 caractères.");
    });

    // Validation lors de la soumission du formulaire
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        let isValid = true;

        document.querySelectorAll(".error-message").forEach(el => el.innerText = "");
        let successMessage = document.getElementById("success-message");
        successMessage.innerText = "";

        let title = document.getElementById("title").value.trim();
        let destination = document.getElementById("destination").value.trim();
        let departureDate = document.getElementById("departureDate").value;
        let returnDate = document.getElementById("returnDate").value;
        let price = parseFloat(document.getElementById("price").value.trim());

        if (title.length < 3) {
            document.getElementById("titleError").innerText = "Le titre doit contenir au moins 3 caractères.";
            document.getElementById("titleError").style.color = "red";
            isValid = false;
        }

        let destinationRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ ]{3,}$/;
        if (!destinationRegex.test(destination)) {
            document.getElementById("destinationError").innerText = "La destination doit contenir uniquement des lettres et au moins 3 caractères.";
            document.getElementById("destinationError").style.color = "red";
            isValid = false;
        }

        if (!departureDate) {
            document.getElementById("departureDateError").innerText = "Veuillez entrer une date de départ valide.";
            document.getElementById("departureDateError").style.color = "red";
            isValid = false;
        }
        if (!returnDate || returnDate <= departureDate) {
            document.getElementById("returnDateError").innerText = "La date de retour doit être ultérieure à la date de départ.";
            document.getElementById("returnDateError").style.color = "red";
            isValid = false;
        }

        if (isNaN(price) || price <= 0) {
            document.getElementById("priceError").innerText = "Le prix doit être un nombre positif.";
            document.getElementById("priceError").style.color = "red";
            isValid = false;
        }

        if (isValid) {
            successMessage.innerText = "✅ Offre ajoutée avec succès !";
            successMessage.style.color = "green";
            form.reset();
        }
    });
});

