document.addEventListener("DOMContentLoaded", function () {
    console.log("Script chargé");

    let form = document.getElementById("offerForm");
    let successMessage = document.getElementById("success-message");

    function validateField(input, errorElement, condition, errorMessage) {
        if (condition) {
            errorElement.innerText = "✅ Correct";
            errorElement.style.color = "green";
        } else {
            errorElement.innerText = errorMessage;
            errorElement.style.color = "red";
        }
    }

    function validateForm() {
        let isValid = true;
        document.querySelectorAll(".error-message").forEach(el => el.innerText = "");
        successMessage.innerText = "";

        let title = document.getElementById("title").value.trim();
        let destination = document.getElementById("destination").value.trim();
        let departureDate = document.getElementById("departureDate").value;
        let returnDate = document.getElementById("returnDate").value;
        let price = parseFloat(document.getElementById("price").value.trim());

        if (title.length < 3) {
            document.getElementById("titleError").innerText = "Le titre doit contenir au moins 3 caractères.";
            isValid = false;
        }

        let destinationRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ ]{3,}$/;
        if (!destinationRegex.test(destination)) {
            document.getElementById("destinationError").innerText = "La destination doit contenir uniquement des lettres et au moins 3 caractères.";
            isValid = false;
        }

        if (!departureDate) {
            document.getElementById("departureDateError").innerText = "Veuillez entrer une date de départ valide.";
            isValid = false;
        }
        if (!returnDate || returnDate <= departureDate) {
            document.getElementById("returnDateError").innerText = "La date de retour doit être ultérieure à la date de départ.";
            isValid = false;
        }

        if (isNaN(price) || price <= 0) {
            document.getElementById("priceError").innerText = "Le prix doit être un nombre positif.";
            isValid = false;
        }

        if (isValid) {
            successMessage.innerText = "✅ Offre ajoutée avec succès !";
            successMessage.style.color = "green";
            form.reset();
        }

        return isValid;
    }

    document.getElementById("title").addEventListener("keyup", function () {
        validateField(this.value.trim(), document.getElementById("titleError"), this.value.trim().length >= 3, "Le titre doit contenir au moins 3 caractères.");
    });

    document.getElementById("destination").addEventListener("keyup", function () {
        let destinationRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ ]{3,}$/;
        validateField(this.value.trim(), document.getElementById("destinationError"), destinationRegex.test(this.value.trim()), "La destination doit contenir uniquement des lettres et au moins 3 caractères.");
    });

    form.addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});
