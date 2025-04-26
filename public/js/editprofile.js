document.addEventListener('DOMContentLoaded', () => {
    fetch('../json/data.json')
        .then(response => response.json())
        .then(data => {
            document.getElementById('name').textContent = data.name;
            document.getElementById('email').textContent = data.email;
            document.getElementById('phone').textContent = data.phone;
            document.getElementById('address').textContent = data.address;
            document.getElementById('profile-image').src = data.image;
        })
        .catch(error => console.error('Error loading data:', error));
});

function editProfile() {
    alert("Edit Profile feature coming soon!");
}

function toggleMenu() {
    const navMenu = document.querySelector('.nav-menu');
    navMenu.classList.toggle('active');
}
document.addEventListener('DOMContentLoaded', () => {
    fetch('../json/data.json')
        .then(response => response.json())
        .then(data => {
            populateProfile(data);
        })
        .catch(error => console.error('Error loading data:', error));
});

function populateProfile(data) {
    document.getElementById('edit-name').value = data.name;
    document.getElementById('edit-email').value = data.email;
    document.getElementById('edit-phone').value = data.phone;
    document.getElementById('edit-address').value = data.address;
    document.getElementById('profile-image').src = data.image;
}

function saveProfile() {
    const updatedData = {
        name: document.getElementById('edit-name').value,
        email: document.getElementById('edit-email').value,
        phone: document.getElementById('edit-phone').value,
        address: document.getElementById('edit-address').value
    };

    console.log("Saved Data:", updatedData);
    alert("Profile changes saved!");

    // If you have a backend, send `updatedData` to your server to save it.
}

document.addEventListener('DOMContentLoaded', () => {
    fetch('../json/data.json')
        .then(response => response.json())
        .then(data => {
            populateProfile(data);
        })
        .catch(error => console.error('Error loading data:', error));
});

function populateProfile(data) {
    document.getElementById('edit-name').value = data.name;
    document.getElementById('edit-email').value = data.email;
    document.getElementById('edit-phone').value = data.phone;
    document.getElementById('edit-address').value = data.address;
    document.getElementById('profile-image').src = data.image;
}

function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-image').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

function validatePhone(phone) {
    const phonePattern = /^[0-9]{10}$/;
    return phonePattern.test(phone);
}

function validateEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    return emailPattern.test(email);
}

function saveProfile() {
    const name = document.getElementById('edit-name').value;
    const email = document.getElementById('edit-email').value;
    const phone = document.getElementById('edit-phone').value;
    const address = document.getElementById('edit-address').value;

    // Validate email (must be Gmail)
    if (!validateEmail(email)) {
        alert("Please enter a valid Gmail address.");
        return;
    }

    // Validate phone number (must be a 10-digit number)
    if (!validatePhone(phone)) {
        alert("Please enter a valid phone number (10 digits).");
        return;
    }

    const updatedData = {
        name: name,
        email: email,
        phone: phone,
        address: address,
        image: document.getElementById('profile-image').src 
    };

    console.log("Saved Data:", updatedData);
    alert("Profile changes saved!");

}
