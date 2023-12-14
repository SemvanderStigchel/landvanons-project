// Voeg dit toe aan je JavaScript-bestand
function closePopup() {
    document.getElementById("popup-overlay").classList.remove("active-overlay");
}

// Roep deze functie aan wanneer je de pop-up wilt tonen (bijvoorbeeld na het inschrijven)
function showPopup() {
    document.getElementById("popup-overlay").classList.add("active-overlay");
}
