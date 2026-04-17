document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("registerForm");

    if (!registerForm) return;

    registerForm.addEventListener("submit", function (e) {
        let isValid = true;

        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const passwordConfirmation = document.getElementById("password_confirmation");

        clearErrors();

        if (name.value.trim() === "") {
            showError(name, "Name is required");
            isValid = false;
        }

        if (email.value.trim() === "") {
            showError(email, "Email is required");
            isValid = false;
        } else if (!isValidEmail(email.value.trim())) {
            showError(email, "Please enter a valid email");
            isValid = false;
        }

        if (password.value.trim() === "") {
            showError(password, "Password is required");
            isValid = false;
        } else if (password.value.length < 8) {
            showError(password, "Password must be at least 8 characters");
            isValid = false;
        }

        if (passwordConfirmation.value.trim() === "") {
            showError(passwordConfirmation, "Please confirm your password");
            isValid = false;
        } else if (passwordConfirmation.value !== password.value) {
            showError(passwordConfirmation, "Passwords do not match");
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    function showError(input, message) {
        input.style.border = "1px solid red";
        const errorElement = input.parentElement.querySelector(".error");

        if (errorElement) {
            errorElement.textContent = message;
        }
    }

    function clearErrors() {
        document.querySelectorAll(".error").forEach(error => {
            error.textContent = "";
        });

        document.querySelectorAll("#registerForm input").forEach(input => {
            input.style.border = "";
        });
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    window.togglePassword = function (id) {
    const input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
};
});


document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("registerForm");
    const loginForm = document.getElementById("loginForm");

    if (registerForm) {
        registerForm.addEventListener("submit", function (e) {
            let isValid = true;

            const name = document.getElementById("name");
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const passwordConfirmation = document.getElementById("password_confirmation");

            clearErrors(registerForm);

            if (name.value.trim() === "") {
                showError(name, "Name is required");
                isValid = false;
            }

            if (email.value.trim() === "") {
                showError(email, "Email is required");
                isValid = false;
            } else if (!isValidEmail(email.value.trim())) {
                showError(email, "Please enter a valid email");
                isValid = false;
            }

            if (password.value.trim() === "") {
                showError(password, "Password is required");
                isValid = false;
            } else if (password.value.length < 8) {
                showError(password, "Password must be at least 8 characters");
                isValid = false;
            }

            if (passwordConfirmation.value.trim() === "") {
                showError(passwordConfirmation, "Please confirm your password");
                isValid = false;
            } else if (passwordConfirmation.value !== password.value) {
                showError(passwordConfirmation, "Passwords do not match");
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            let isValid = true;

            const email = document.getElementById("email");
            const password = document.getElementById("password");

            clearErrors(loginForm);

            if (email.value.trim() === "") {
                showError(email, "Email is required");
                isValid = false;
            } else if (!isValidEmail(email.value.trim())) {
                showError(email, "Please enter a valid email");
                isValid = false;
            }

            if (password.value.trim() === "") {
                showError(password, "Password is required");
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });
    }

    function showError(input, message) {
        input.style.border = "1px solid red";
        const errorElement = input.parentElement.querySelector(".error");
        if (errorElement) {
            errorElement.textContent = message;
        }
    }

    function clearErrors(form) {
        form.querySelectorAll(".error").forEach(error => {
            error.textContent = "";
        });

        form.querySelectorAll("input").forEach(input => {
            if (input.type !== "checkbox") {
                input.style.border = "";
            }
        });
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
});

window.togglePassword = function (id) {
    const input = document.getElementById(id);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
};
