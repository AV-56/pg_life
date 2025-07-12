document.addEventListener("DOMContentLoaded", function () {
    // Signup form submit handler
    const signupForm = document.getElementById("signup-form");
    if (signupForm) {
        signupForm.addEventListener("submit", function (e) {
            e.preventDefault();
            showLoader();
            const formData = new FormData(this);
            fetch("api/signup_submit.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                hideLoader();
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Signup Successful!',
                        text: data.message || 'Welcome!',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => window.location.reload());
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Signup Failed',
                        text: data.message || 'Email or phone already exists.'
                    });
                }
            })
            .catch(error => {
                hideLoader();
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Something went wrong. Please try again.'
                });
            });
        });
    }

    // Login form submit handler
    const loginForm = document.getElementById("login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();
            showLoader();
            const formData = new FormData(this);
            fetch("api/login_submit.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                hideLoader();
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        text: data.message || 'You are now logged in.',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => window.location.reload());
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: data.message || 'Invalid email or password.'
                    });
                }
            })
            .catch(error => {
                hideLoader();
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Something went wrong. Please try again.'
                });
            });
        });
    }

    // Interested heart click handler
    document.querySelectorAll(".heart-icon").forEach(icon => {
        icon.addEventListener("click", function () {
            const propertyId = this.getAttribute("data-property-id");

            fetch("api/toggle_interest.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "property_id=" + encodeURIComponent(propertyId)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Toggle heart icon
                    if (data.interested) {
                        this.classList.remove("far");
                        this.classList.add("fas");
                    } else {
                        this.classList.remove("fas");
                        this.classList.add("far");
                    }

                    // Update interested count text next to icon
                    const countText = this.nextElementSibling;
                    if (countText && countText.innerText.includes("interested")) {
                        let match = countText.innerText.match(/\d+/);
                        let current = match ? parseInt(match[0]) : 0;
                        let updated = data.interested ? current + 1 : current - 1;
                        updated = updated < 0 ? 0 : updated;
                        countText.innerText = updated + " interested";
                    }
                } else {
                    Swal.fire('Error', data.message || 'Could not update interest.', 'error');
                }
            })
            .catch(error => {
                console.error(error);
                Swal.fire('Oops!', 'Something went wrong.', 'error');
            });
        });
    });
});

// Loader functions
function showLoader() {
    const loader = document.getElementById('loader');
    if (loader) loader.style.display = 'flex';
}

function hideLoader() {
    const loader = document.getElementById('loader');
    if (loader) loader.style.display = 'none';
}
