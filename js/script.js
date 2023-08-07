function openPopup() {
    const overlay = document.getElementById("overlay");
    const popup = document.getElementById("popup");
    const button = document.getElementById("openButton");

    overlay.style.display = "block";
    popup.style.display = "block";
    button.style.display = "none";

}

function closePopup() {
    const overlay = document.getElementById("overlay");
    const popup = document.getElementById("popup");
    const button = document.getElementById("openButton");

    overlay.style.display = "none";
    popup.style.display = "none";
    button.style.display = "block";

}













