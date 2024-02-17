document.addEventListener('DOMContentLoaded', function() {
    // Get the modals
    var loginModal = document.getElementById("loginModal");
    var registerModal = document.getElementById("registerModal");

    // Get the buttons that open the modals
    var loginBtn = document.getElementById("loginBtn");
    var registerBtn = document.getElementById("registerBtn");

    // Get the <span> element that closes the modals
    var closeBtns = document.getElementsByClassName("close");

    // Function to close all modals
    function closeModals() {
        loginModal.style.display = "none";
        registerModal.style.display = "none";
    }

    // When the user clicks the buttons, open the modals 
    loginBtn.onclick = function() {
        closeModals(); // Close all modals
        loginModal.style.display = "block"; // Open login modal
    }

    registerBtn.onclick = function() {
        closeModals(); // Close all modals
        registerModal.style.display = "block"; // Open register modal
    }

    // When the user clicks on <span> (x), close the modals
    for (var i = 0; i < closeBtns.length; i++) {
        closeBtns[i].onclick = function() {
            closeModals(); // Close all modals
        }
    }

    // When the user clicks anywhere outside of the modals, close them
    window.onclick = function(event) {
        if (event.target == loginModal || event.target == registerModal) {
            closeModals(); // Close all modals
        }
    }
});
