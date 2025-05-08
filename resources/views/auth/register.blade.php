<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - RantAnything</title>
    <meta name="description" content="Create an account on RantAnything - Express Yourself Without Limits">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#e11d48',
                        secondary: '#f43f5e',
                        dark: '#0f172a',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white text-gray-800 font-sans">
    <!-- Header/Navigation -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span class="text-xl font-bold">RantAnything</span>
            </div>

            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Features</a>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">How It Works</a>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Testimonials</a>
            </nav>

            <div class="flex items-center space-x-4">
                <a href="#" class="hidden md:inline-block text-gray-600 hover:text-primary transition-colors">Log in</a>
                <a href="#" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors">Sign up</a>
                <button id="mobile-menu-button" class="md:hidden text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t">
            <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Features</a>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">How It Works</a>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">Testimonials</a>
                <a href="login" class="text-gray-600 hover:text-primary transition-colors">Log in</a>
            </div>
        </div>
    </header>

    <!-- Registration Section -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-white to-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-lg mx-auto">
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold mb-2">Create Your Account</h1>
                    <p class="text-gray-600">Join thousands of users expressing themselves freely</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
                    <div class="mb-6">
                        <div class="flex justify-center space-x-4 mb-6">
                            <button class="flex items-center justify-center py-2.5 px-4 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors w-full">
                                <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                </svg>
                                Sign up with Google
                            </button>
                            <button class="flex items-center justify-center py-2.5 px-4 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors w-full">
                                <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                                </svg>
                                Sign up with Facebook
                            </button>
                        </div>

                        <div class="relative flex items-center justify-center mb-6">
                            <div class="border-t border-gray-300 absolute w-full"></div>
                            <div class="bg-white px-4 text-sm text-gray-500 relative">Or sign up with email</div>
                        </div>
                    </div>

                    <form id="registration-form" method="post">
                        @CSRF
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" id="first-name" name="firstname" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Enter your first name" required>
                                @error('firstname')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                                <div id="first-name-error" class="text-red-500 text-xs mt-2 hidden">First name is required.</div>
                            </div>

                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" id="last-name" name="lastname" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Enter your last name" required>
                                @error('lastname')
                                <div style="color:red">{{ $message }}</div>
                                @enderror
                                <div id="last-name-error" class="text-red-500 text-xs mt-2 hidden">Last name is required.</div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                            <input type="phone" id="phone" name="phone" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Choose a username" required>
                            @error('phone')
                            <div style="color:red">{{ $message }}</div>
                            @enderror
                            <div id="username-error" class="text-red-500 text-xs mt-2 hidden">Username is required.</div>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Enter your email address" required>
                            @error('email')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                            <div id="email-error" class="text-red-500 text-xs mt-2 hidden">Please enter a valid email address.</div>
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" id="password" name="password" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Create a password" required>
                            @error('password')
                            <div style="color:red">{{ $message }}</div>
                            @enderror
                            <div id="password-error" class="text-red-500 text-xs mt-2 hidden">Password must be at least 8 characters and contain a number and a special character.</div>
                        </div>

                        <div class="mb-6">
                            <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>

                            <input type="password" id="confirm-password" name="confirmed" class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Confirm your password" required>
                            @error('confirmed')
                            <div style="color:red">{{ $message }}</div>
                            @enderror
                            <div id="confirm-password-error" class="text-red-500 text-xs mt-2 hidden">Passwords do not match.</div>
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-700">I agree to the <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a></label>
                            </div>
                        </div>

                        <button  type="submit" class="w-full bg-primary text-white py-3 rounded-md hover:bg-secondary transition-colors">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Validation script
        const form = document.getElementById('registration-form');

        form.addEventListener('submit', function(event) {
            let valid = true;

            // First Name Validation
            const firstName = document.getElementById('first-name');
            const firstNameError = document.getElementById('first-name-error');
            if (!firstName.value) {
                valid = false;
                firstNameError.classList.remove('hidden');
            } else {
                firstNameError.classList.add('hidden');
            }

            // Last Name Validation
            const lastName = document.getElementById('last-name');
            const lastNameError = document.getElementById('last-name-error');
            if (!lastName.value) {
                valid = false;
                lastNameError.classList.remove('hidden');
            } else {
                lastNameError.classList.add('hidden');
            }

            const email = document.getElementById('email');
            const emailError = document.getElementById('email-error');
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!email.value || !emailRegex.test(email.value)) {
                valid = false;
                emailError.classList.remove('hidden');
            } else {
                emailError.classList.add('hidden');
            }

            const password = document.getElementById('password');
            const passwordError = document.getElementById('password-error');
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!password.value || !passwordRegex.test(password.value)) {
                valid = false;
                passwordError.classList.remove('hidden');
            } else {
                passwordError.classList.add('hidden');
            }
            const confirmPassword = document.getElementById('confirm-password');
            const confirmPasswordError = document.getElementById('confirm-password-error');
            if (confirmPassword.value !== password.value) {
                valid = false;
                confirmPasswordError.classList.remove('hidden');
            } else {
                confirmPasswordError.classList.add('hidden');
            }
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                valid = false;
            }
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
