function formSubmitted() {
    var contactForm = document.getElementById("contact-form");

    // Add the "remove-form" class
    contactForm.classList.add("remove-form");

    // Set a timeout to hide the form after 2 seconds
    setTimeout(function () {
        contactForm.style.display = "none";
    }, 2000);
}