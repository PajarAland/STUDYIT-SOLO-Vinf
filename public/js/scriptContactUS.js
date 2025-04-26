// URL API endpoint
const apiBaseUrl = 'http://your-laravel-app-domain/api/contact-us';

// Fungsi untuk menyimpan data form ke API
async function saveFormData() {
    // Ambil data dari form
    const firstName = document.getElementById('First_name').value.trim();
    const lastName = document.getElementById('Last_name').value.trim();
    const email = document.getElementById('Email').value.trim();
    const phoneNumber = document.getElementById('Phone_number').value.trim();
    const message = document.getElementById('message').value.trim();

    // Validasi data
    if (!firstName || !lastName || !email || !message) {
        alert('Please fill out all required fields.');
        return;
    }

    // Data yang akan dikirim ke API
    const formData = {
        First_name: firstName,
        Last_name: lastName,
        Email: email,
        Phone_number: phoneNumber,
        Message: message,
    };

    try {
        // Kirim data ke API menggunakan fetch
        const response = await fetch(apiBaseUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData),
        });

        // Parsing response
        const result = await response.json();

        if (response.ok) {
            // Jika berhasil
            alert('Message sent successfully!');
            // Reset form
            document.getElementById('contactForm').reset();
        } else {
            // Jika ada error dari server
            alert(`Error: ${result.error || 'Failed to send message.'}`);
        }
    } catch (error) {
        // Jika ada error dalam jaringan atau script
        alert(`Error: ${error.message}`);
        console.error('Error:', error);
    }
}
