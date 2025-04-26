document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('billingForm');
    const yearSelect = document.getElementById('expirationYear');
    const cardNumberInput = document.getElementById('cardNumber');

    // Mencegah input selain angka
    cardNumberInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');
    });

    // Populate year dropdown
    const currentYear = new Date().getFullYear();
    for (let i = 0; i < 10; i++) {
        const option = document.createElement('option');
        option.value = currentYear + i;
        option.textContent = currentYear + i;
        yearSelect.appendChild(option);
    }

    // Ambil UserID dari URL
    const url = window.location.pathname;
    const pathParts = url.split('/');
    const userId = pathParts[2]; // Mengambil UserID
    const baseUrl = '/students/';
    console.log('UserID:', userId); // Debugging untuk memastikan UserID benar

    // Form submission handler
    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked');
        const nameOnCard = document.getElementById('nameOnCard').value;
        const cardNumber = document.getElementById('cardNumber').value;
        const expirationMonth = document.getElementById('expirationMonth').value;
        const expirationYear = yearSelect.value;

        if (!selectedPaymentMethod || !nameOnCard || !cardNumber || !expirationMonth || !expirationYear) {
            alert('Please complete all fields');
            return;
        }

        // Send data to backend
        try {
            const response = await fetch('http://localhost:3000/api/enrolls', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    user_id: userId, // Menggunakan UserID dari URL
                    amount: 100.00, // Example amount
                    payment_date: new Date().toISOString().split('T')[0],
                }),
            });
            
            const response1 = await fetch(`http://localhost:3000/api/Accounts/${userId}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    User_Type: 'Subscriber',
                }),
            });

            const result = await response.json();

            const result1 = await response1.json();

            if (response.ok && response1.ok) {
                alert('Payment successful!');
                console.log(result);
                console.log(result1);
                window.location.href = `/students/${userId}`;
            } else {
                console.error('Error:', result);
                console.error('Error:', result1);
                alert('Payment failed.');
            }

        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred.');
        }

        
    });
});
