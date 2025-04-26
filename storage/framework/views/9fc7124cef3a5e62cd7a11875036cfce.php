<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade Your Package</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/payment.css')); ?>">
</head>
<body>
    <div class="container">
        <h1>Upgrade Your Package</h1>
        <form id="billingForm">
            <div class="form-group payment-method">
                <label>Payment Method</label>
                <div class="payment-logos">
                    <input type="radio" id="visa" name="paymentMethod" value="visa" required>
                    <label for="visa">
                        <img src="<?php echo e(asset('image/visa-logo-svgrepo-com.svg')); ?>" alt="Visa" class="payment-logo">
                    </label>
                    <input type="radio" id="mastercard" name="paymentMethod" value="mastercard" required>
                    <label for="mastercard">
                        <img src="<?php echo e(asset('image/mastercard-svgrepo-com.svg')); ?>" alt="Mastercard" class="payment-logo">
                    </label>
                    <input type="radio" id="amex" name="paymentMethod" value="amex" required>
                    <label for="amex">
                        <img src="<?php echo e(asset('image/american-express-svgrepo-com.svg')); ?>" alt="American Express" class="payment-logo">
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="nameOnCard">Name on card</label>
                <input type="text" id="nameOnCard" placeholder="Alan" required>
            </div>
            <div class="form-group">
                <label for="cardNumber">Card number</label>
                <input type="text" id="cardNumber" inputmode="numeric" pattern="\d*" maxlength="16" placeholder="1234 5678 9012 3456" required>
            </div>
            <div class="form-group">
                <label>Card expiration</label>
                <div class="expiration-inputs">
                    <select id="expirationMonth" required>
                        <option value="">Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select id="expirationYear" required>
                        <option value="">Year</option>
                    </select>
                </div>
            </div>
            <button type="submit">Continue</button>
        </form>
    </div>
    <script src="<?php echo e(asset('js/payment.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Telkom University\Semester 5\Perancangan dan Pemrograman Web\Tubes\WebStudyIT\resources\views/payment/index.blade.php ENDPATH**/ ?>