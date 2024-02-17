var loginModal = null;
var registerModal = null;

function openLoginModal() {
    if (!loginModal) {
        loginModal = createModal("Login");
        document.body.appendChild(loginModal);
    }
}

function openRegisterModal() {
    if (!registerModal) {
        registerModal = createModal("Register");
        document.body.appendChild(registerModal);
    }
}

function createModal(title) {
    var modal = document.createElement("div");
    modal.className = "modal";
    modal.innerHTML = `
        <div class="modal-content">
            <span class="close" onclick="closeModal(this)">&times;</span>
            <h2>${title}</h2>
            <form action="${title.toLowerCase()}_process.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                ${title === "Register" ? '<input type="email" name="email" placeholder="Email" required>' : ''}
                <button type="submit">${title}</button>
            </form>
        </div>
    `;
    return modal;
}

function closeModal(closeBtn) {
    var modal = closeBtn.parentElement.parentElement;
    modal.parentNode.removeChild(modal);
    if (modal === loginModal) {
        loginModal = null;
    } else if (modal === registerModal) {
        registerModal = null;
    }
}
