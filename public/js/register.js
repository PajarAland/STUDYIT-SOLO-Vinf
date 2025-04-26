// API URL for user registration
const apiRegisterUrl = 'http://localhost:3000/api/Accounts';

// Function to handle form submission
async function submitRegister(event) {
    event.preventDefault(); // Prevent default form submission
    console.log("Form submission intercepted"); // Debugging

    // Collect form data
    const username = document.getElementById('username').value;
    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const phone = document.getElementById('phone').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('newPass').value;
    const confirmPassword = document.getElementById('confNewPass').value;

    // Password validation pattern
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Validation checks
    if (!username || !firstname || !lastname || !phone || !email || !password || !confirmPassword) {
        alert("Please fill in all fields.");
        return;
    }

    if (!email.includes('@') || !email.includes('.')) {
        alert("Invalid email address.");
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    if (!passwordPattern.test(password)) {
        alert("Password must be at least 8 characters long and contain letters, numbers, and special characters.");
        return;
    }

    // Preparing the payload for the API
    const payload = {
        username: username,
        firstname: firstname,
        lastname: lastname,
        phonenumber: phone,
        email: email,
        password: password
    };

    try {
        // Making a POST request to the API
        const response = await fetch(apiRegisterUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        // Handling the response
        if (response.ok) {
            alert('Registration successful! Redirecting to login...');
            window.location.href = '/login';
        } else {
            const error = await response.json();
            alert('Registration failed: ' + (error.message || 'Please try again.'));
        }
    } catch (error) {
        // Handle errors during fetch
        console.error('Error during registration:', error);
        alert('Error during registration: ' + error.message);
    }
}

// Add event listener on DOMContentLoaded to attach submit event
document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', submitRegister);
    } else {
        console.error("Register form not found");
    }
});
