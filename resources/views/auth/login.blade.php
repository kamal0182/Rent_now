<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RantAnything</title>
    <meta name="description" content="Login to RantAnything - Express Yourself Without Limits">

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
                <a href="login" class="hidden md:inline-block text-primary font-medium hover:text-secondary transition-colors">Log in</a>
                <a href="register" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors">Sign up</a>
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
                <a href="/login" class="text-primary font-medium hover:text-secondary transition-colors">Log in</a>
            </div>
        </div>
    </header>

    <!-- Login Section -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-white to-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold mb-2">Welcome Back</h1>
                    <p class="text-gray-600">Log in to continue your journey of expression</p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
                    <form id="login-form" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email or Username</label>
                            <input type="text" id="email" name="email"
                                value="{{ old('email') }}"
                                class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent @error('email') border-red-500 @enderror"
                                placeholder="Enter your email or username" required>
                            @error('email')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <a href="#" class="text-sm text-primary hover:text-secondary">Forgot password?</a>
                            </div>

                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent @error('password') border-red-500 @enderror"
                                placeholder="Enter your password" required>
                            @error('password')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center mb-6">
                            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>

                        <button type="submit" class="w-full bg-primary hover:bg-secondary text-white py-3 rounded-md transition-colors font-medium">
                            Log In
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">
                            Don't have an account?
                            <a href="/register" class="text-primary hover:text-secondary font-medium">Sign up</a>
                        </p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-center text-sm text-gray-600 mb-4">Or continue with</p>
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Google and Facebook login buttons go here -->
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center text-sm text-gray-600">
                    <p>By logging in, you agree to our <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a>.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="text-lg font-bold">RantAnything</span>
                </div>
                <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">Community Guidelines</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">Contact Us</a>
                </div>
            </div>
            <div class="text-center mt-6 text-sm text-gray-500">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> RantAnything. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Validation script
        const form = document.getElementById('login-form');
        form.addEventListener('submit', function(event) {
            let valid = true;

            // Email or Username Validation
            const email = document.getElementById('email');
            const emailError = document.getElementById('email-error');
            if (!email.value) {
                valid = false;
                emailError.classList.remove('hidden');
            } else {
                emailError.classList.add('hidden');
            }

            // Password Validation
            const password = document.getElementById('password');
            const passwordError = document.getElementById('password-error');
            if (!password.value) {
                valid = false;
                passwordError.classList.remove('hidden');
            } else {
                passwordError.classList.add('hidden');
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
