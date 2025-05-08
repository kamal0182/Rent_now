<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Profile - Rent Anything</title>
    <meta name="description" content="Manage your profile, view rental history, and update account settings on Rent Anything.">

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
    <style>
        /* CSS for dropdown functionality without JavaScript */
        .notification-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            width: 320px;
            z-index: 50;
            margin-top: 0.5rem;
        }

        .notification-container:focus-within .notification-dropdown {
            display: block;
        }

        /* Add a subtle animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .notification-dropdown {
            animation: fadeIn 0.2s ease-out;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header/Navigation -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                <a href="/home">

<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
</svg>

</a>
                </div>

                <!-- Search Bar -->


                <!-- Right Side Navigation -->
                <div class="flex items-center space-x-5">

                <a href="/paneer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v18H3V3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v18" />
                        </svg>
                </a>
                    <div class="notification-container relative">
                        <button class="text-gray-600 hover:text-primary transition-colors flex items-center focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>

                            <div class="absolute -top-1 -right-1 bg-primary text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                {{$count}}
                            </div>
                        </button>

                        <!-- Notification Dropdown -->
                        <div class="notification-dropdown bg-white rounded-lg shadow-lg border border-gray-200">
                            <div class="p-3 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="font-semibold text-gray-800">Notifications</h3>
                                    <button class="text-xs text-primary hover:text-secondary transition-colors">
                                        Mark all as read
                                    </button>
                                </div>
                            </div>

                            <div class="max-h-80 overflow-y-auto">
                                <!-- Notification 1 -->
                                @foreach($notifications as $notification)
                                @if($notification->data['title'] == 'new Rental')
                                <a href="/rental/{{ $notification->data['rental_id'] }}">
                                    <div class="p-3 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 bg-blue-100 rounded-full p-2 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between items-start">
                                                    <p class="font-medium text-sm text-gray-800">{{$notification->data['title']}}</p>
                                                    <span class="text-xs text-gray-500">5 min ago</span>
                                                </div>
                                                <p class="text-xs text-gray-600 mt-1">{{$notification->data['user']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @elseif($notification->data['title'] == 'your  Rental has Ben')
                                <a href="/rental/{{ $notification->data['rental_id'] }}/payment">
                                    <div class="p-3 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 bg-blue-100 rounded-full p-2 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex justify-between items-start">
                                                    <p class="font-medium text-sm text-gray-800">{{$notification->data['title']}}</p>
                                                    <span class="text-xs text-gray-500">5 min ago</span>
                                                </div>
                                                <p class="text-xs text-gray-600 mt-1">{{$notification->data['user']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endif




                                @endforeach
                                <!-- Notification 2 -->
                                <div class="p-3 border-b border-gray-100 hover:bg-gray-50">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-green-100 rounded-full p-2 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex justify-between items-start">
                                                <p class="font-medium text-sm text-gray-800">Rental Request Approved</p>
                                                <span class="text-xs text-gray-500">2 hours ago</span>
                                            </div>
                                            <p class="text-xs text-gray-600 mt-1">Your request to rent the DSLR Camera has been approved. You can pick it up on May 15.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notification 3 -->
                                <div class="p-3 hover:bg-gray-50">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 bg-purple-100 rounded-full p-2 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex justify-between items-start">
                                                <p class="font-medium text-sm text-gray-800">Payment Received</p>
                                                <span class="text-xs text-gray-500">Yesterday</span>
                                            </div>
                                            <p class="text-xs text-gray-600 mt-1">You've received a payment of $175 for your camping equipment rental.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2 border-t border-gray-200 text-center">
                                <a href="#" class="text-sm text-primary hover:text-secondary transition-colors">
                                    View all notifications
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="text-primary hover:text-secondary transition-colors flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="ml-2 hidden md:inline">Account</span>
                    </a>
                    <a href="#" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors whitespace-nowrap">
                        Create Free Listing
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Notifications Section -->

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0 relative">
                    <span class="font-semibold text-gray-600 text-4xl">JD</span>
                    <button class="absolute bottom-0 right-0 bg-primary text-white p-2 rounded-full shadow-md hover:bg-secondary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2-2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-2xl md:text-3xl font-bold mb-2">{{$user->firstname}} {{$user->lastname}}</h1>
                    <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-4">
                        <div class="flex items-center text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{$user->email}}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{$user->phone}}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Member since Jan 2022</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-center md:justify-start gap-6 mb-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary">{{$numberOfRentals}}</div>
                            <div class="text-sm text-gray-600">Rentals</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary">{{$numberOfProducts}}
                            </div>
                            <div class="text-sm text-gray-600">Listings</div>
                        </div>

                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary">15</div>
                            <div class="text-sm text-gray-600">Reviews</div>
                        </div>
                    </div>
                    <p class="text-gray-700 max-w-2xl">
                        I love renting items instead of buying them for occasional use. I also enjoy sharing my own items with others in the community. Let's make the world more sustainable together!
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <button class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors">
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>

        <!-- Profile Tabs -->
        <div class="mb-6">
            <div class="border-b border-gray-200">
                <nav class="flex flex-wrap -mb-px">
                    <button class="inline-block p-4 border-b-2 border-primary text-primary font-medium" id="tab-rentals">
                        My Rentals
                    </button>
                    <button class="inline-block p-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 font-medium" id="tab-listings">
                        My Listings
                    </button>


                    <button class="inline-block p-4 border-b-2 border-transparent hover:border-gray-300 text-gray-600 hover:text-gray-800 font-medium" id="tab-settings">
                        Account Settings
                    </button>
                </nav>
            </div>
        </div>

        <!-- Tab Content -->
        <div id="tab-content">
            <!-- My Rentals Tab (Active by Default) -->
            <div id="content-rentals" class="block">
                <div class="mb-6">
                    <h2 class="text-xl font-bold mb-4">Current Rentals</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Current Rental Item 1 -->
                        @foreach($user->rental as $rental)
                        <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1572177215152-32f247303126?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Rental Item" class="w-full h-48 object-cover">
                                <div class="absolute top-0 right-0 bg-primary text-white text-sm font-bold px-2 py-1 m-2 rounded">
                                    Active
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-lg mb-2">{{$rental->product->title}}</h3>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600 text-sm">Rental Period:</span>
                                    @php
                                            $date = Carbon\Carbon::parse($rental->start_date);
                                            $datefin = Carbon\Carbon::parse($rental->start_date);
                                        @endphp


                                    <span class="font-medium text-sm"> {{ $date->day }}/ {{ $date->month }}/{{ $date->year }} - {{ $datefin->day }}/ {{ $datefin->month }}/{{ $datefin->year }}</span>
                                </div>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-gray-600 text-sm">Total Cost:</span>
                                    <span class="font-medium text-sm">${{$rental->quantity * $rental->product->price}}</span>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="flex-1 bg-primary hover:bg-secondary text-white py-2 rounded-md transition-colors text-sm">
                                        Extend
                                    </button>
                                    <button class="flex-1 border border-primary text-primary hover:bg-primary/5 py-2 rounded-md transition-colors text-sm">
                                        Return
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Current Rental Item 2 -->

                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-bold mb-4">Rental History</h2>
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Item
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rental Period
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cost
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1616088886430-caaae4274601?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    Drone with Camera
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Feb 15 - Feb 22, 2025</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$350.00</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-primary hover:text-secondary">Rent Again</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    Mountain Bike
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Jan 20 - Jan 27, 2025</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$175.00</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-primary hover:text-secondary">Rent Again</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1500634245200-e5245c7574ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    Camping Equipment
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Dec 10 - Dec 17, 2024</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">$210.00</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <button class="text-primary hover:text-secondary">Rent Again</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Other Tab Contents (Hidden by Default) -->
            <div id="content-listings" class="hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">My Listings</h2>
                    <button class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors">
                        Create New Listing
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Placeholder for listings content -->
                    @foreach($user->products as $product)
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1616088886430-caaae4274601?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Listing Item" class="w-full h-48 object-cover">
                            <div class="absolute top-0 right-0 bg-green-500 text-white text-sm font-bold px-2 py-1 m-2 rounded">
                                Available
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{$product->title}}</h3>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600 text-sm">Daily Rate:</span>
                                <span class="font-medium text-sm">MAD{{$product->price}}</span>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600 text-sm">Total Rentals:</span>
                                <span class="font-medium text-sm">{{count($product->rental)}}</span>
                            </div>
                            <div class="flex space-x-2">
                                <a href="products/edit/{{$product->id}}">
                                <button class="flex-1 bg-primary hover:bg-secondary text-white py-2 rounded-md transition-colors text-sm">
                                    Edit
                                </button>
                                </a>


                            </div>
                        </div>
                    </div>
                    @endforeach







            <div id="content-settings" class="hidden">
                <h2 class="text-xl font-bold mb-6">Account Settings</h2>
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Personal Information</h3>
                    <form class="space-y-4" method="post">
                        @csrf
                        @method('patch')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text" id="first-name" name="firstname" value="{{$user->firstname}}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text" id="last-name" name="lastname" value="{{$user->lastname}}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" value="{{$user->email}}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="({{$user->phone}}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                            <textarea id="bio" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">I love renting items instead of buying them for occasional use. I also enjoy sharing my own items with others in the community. Let's make the world more sustainable together!</textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Password</h3>
                    <form class="space-y-4">
                        <div>
                            <label for="current-password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                            <input type="password" id="current-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" id="new-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                            <input type="password" id="confirm-password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Payment Methods</h3>
                    <div class="mb-4">
                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-md mb-2">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                <div>
                                    <p class="font-medium">Visa ending in 4242</p>
                                    <p class="text-sm text-gray-600">Expires 12/2025</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2">Default</span>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button class="flex items-center text-primary hover:text-secondary font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Payment Method
                    </button>
                </div>

                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold mb-4">Notifications</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">Email Notifications</p>
                                <p class="text-sm text-gray-600">Receive emails about your account activity</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">SMS Notifications</p>
                                <p class="text-sm text-gray-600">Receive text messages for important updates</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">Marketing Communications</p>
                                <p class="text-sm text-gray-600">Receive emails about promotions and news</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/25 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                <a href="/home">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="text-xl font-bold text-gray-800">Rent_Now</span>
                </a>
                </div>
                <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">About Us</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">How It Works</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">Terms of Service</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">Privacy Policy</a>
                    <a href="#" class="text-sm text-gray-600 hover:text-primary transition-colors">Contact Us</a>
                </div>
            </div>
            <div class="text-center mt-6 text-sm text-gray-500">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> RentAnything. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- JavaScript for Tab Switching -->
    <script>
        // Tab switching functionality
        const tabs = ['rentals', 'listings',  'settings'];

        tabs.forEach(tab => {
            document.getElementById(`tab-${tab}`)?.addEventListener('click', function() {


                tabs.forEach(t => {
                   
                    document.getElementById(`content-${t}`).classList.add('hidden');
                    document.getElementById(`tab-${t}`).classList.remove('border-primary', 'text-primary');
                    document.getElementById(`tab-${t}`).classList.add('border-transparent', 'hover:border-gray-300', 'text-gray-600', 'hover:text-gray-800');
                });


                document.getElementById(`content-${tab}`).classList.remove('hidden');
                document.getElementById(`tab-${tab}`).classList.add('border-primary', 'text-primary');
                document.getElementById(`tab-${tab}`).classList.remove('border-transparent', 'hover:border-gray-300', 'text-gray-600', 'hover:text-gray-800');
            });
        });
        async function changeTheStaus(params) {


            let response = await fetch(`http://127.0.0.1:8000/api/home?content=${params}`, {
                'method': 'post'
            });
            let data = await response.json();
            let products = data.products;
        }

        // Panel button functionality
    </script>
</body>

</html>
