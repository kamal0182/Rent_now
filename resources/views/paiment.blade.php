<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            background-color: white;
        }

        .StripeElement--focus {
            border-color: #4f46e5;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        .StripeElement--invalid {
            border-color: #ef4444;
        }

        #card-errors {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .spinner {
            border: 3px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top: 3px solid #4f46e5;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-right: 8px;
            vertical-align: middle;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Complete Payment</h2>

        <div class="mb-6">
            <div class="flex justify-between mb-2">
                <span class="text-gray-600">Amount:</span>
                <span class="font-semibold text-gray-800">$<span id="payment-amount">${{$rental->quantity * $rental->product->price}}</span></span>
            </div>
            <div class="h-px bg-gray-200"></div>
        </div>

        <form id="payment-form" class="space-y-4">
            <div class="space-y-2">
                <label for="card-element" class="block text-sm font-medium text-gray-700">
                    Credit or debit card
                </label>
                <div id="card-element" class="StripeElement"></div>
                <div id="card-errors" role="alert"></div>
            </div>

            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Name on card</label>
                <input type="text" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            <button type="submit" id="submit-button" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                Pay $<span class="payment-button-amount">99.99</span>
            </button>
        </form>

        <div id="payment-success" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-md">
            <div class="flex">
                <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-green-800">Payment successful!</h3>
                    <div class="mt-2 text-sm text-green-700">
                        <p>Thank you for your payment. A confirmation has been sent to your email.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Secured by <span class="font-semibold">Stripe</span></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Stripe with your publishable key
            // Replace with your actual publishable key from the Stripe dashboard
            const stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
            const elements = stripe.elements();

            // Create card element
            const cardElement = elements.create('card', {
                style: {
                    base: {
                        color: '#32325d',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                }
            });

            // Mount the card element
            cardElement.mount('#card-element');

            // Handle real-time validation errors from the card element
            cardElement.on('change', function(event) {
                const displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission
            const form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable the submit button to prevent repeated clicks
                const submitButton = document.getElementById('submit-button');
                const originalButtonText = submitButton.innerHTML;
                submitButton.disabled = true;
                submitButton.innerHTML = '<div class="spinner"></div> Processing...';

                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;

                // Create a payment method and confirm payment intent
                createPaymentMethod(stripe, cardElement, name, email);
            });

            function createPaymentMethod(stripe, cardElement, name, email) {
                stripe.createPaymentMethod({
                    type: 'card',
                    card: cardElement,
                    billing_details: {
                        name: name,
                        email: email
                    },
                }).then(function(result) {
                    if (result.error) {
                        // Show error in payment form
                        const errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        // Re-enable the submit button
                        const submitButton = document.getElementById('submit-button');
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Pay $<span class="payment-button-amount">99.99</span>';
                    } else {
                        // Send the payment method ID to your server
                        // Normally you would make an API call to your backend here
                        // For demo purposes, we'll simulate a successful payment

                        // In a real implementation, you would do:
                        // fetch('/create-payment', {
                        //     method: 'POST',
                        //     headers: { 'Content-Type': 'application/json' },
                        //     body: JSON.stringify({
                        //         payment_method_id: result.paymentMethod.id,
                        //         amount: document.getElementById('payment-amount').textContent,
                        //         email: email
                        //     })
                        // }).then(function(response) {
                        //     return response.json();
                        // }).then(handleServerResponse);

                        // Simulate a server response (for demo)
                        setTimeout(function() {
                            handleServerResponse({
                                success: true
                            });
                        }, 2000);
                    }
                });
            }

            function handleServerResponse(response) {
                const submitButton = document.getElementById('submit-button');

                if (response.success) {
                    // Show the success message, hide the form
                    document.getElementById('payment-form').classList.add('hidden');
                    document.getElementById('payment-success').classList.remove('hidden');
                } else {
                    // Show error from server response
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = response.error;

                    // Re-enable the submit button
                    submitButton.disabled = false;
                    submitButton.innerHTML = 'Pay $<span class="payment-button-amount">99.99</span>';
                }
            }

            // Update price displays if needed
            function updatePrice(price) {
                document.getElementById('payment-amount').textContent = price;
                document.querySelectorAll('.payment-button-amount').forEach(el => {
                    el.textContent = price;
                });
            }

            // Example of how you might update the price dynamically
            // updatePrice('149.99');
        });
    </script>
</body>
</html>
