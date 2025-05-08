@extends('navbar')
@section('contenu')

    <!-- Breadcrumbs -->
    <main id="main">
    <div class="bg-white border-b">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center text-sm text-gray-600">
                <a href="#" class="hover:text-primary">Home</a>
                <span class="mx-2">/</span>
                <a href="#" class="hover:text-primary">All Categories</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900">Product Details</span>
            </div>
        </div>
    </div>

    <!-- Main Content with Sidebar Layout -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content Area -->
            <div class="w-full lg:w-2/3">
                <!-- Product Images -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 mb-6">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1572177215152-32f247303126?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80" alt="Product Image" class="w-full h-96 object-cover">
                        <button class="absolute top-4 right-4 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-4 grid grid-cols-5 gap-2">
                        <button class="border-2 border-primary rounded-md overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1572177215152-32f247303126?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Product view 1" class="w-full h-16 object-cover">
                        </button>
                        <button class="border border-gray-200 hover:border-primary rounded-md overflow-hidden transition-colors">
                            <img src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Product view 2" class="w-full h-16 object-cover">
                        </button>
                        <button class="border border-gray-200 hover:border-primary rounded-md overflow-hidden transition-colors">
                            <img src="https://images.unsplash.com/photo-1581591524425-c7e0978865fc?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Product view 3" class="w-full h-16 object-cover">
                        </button>
                        <button class="border border-gray-200 hover:border-primary rounded-md overflow-hidden transition-colors">
                            <img src="https://images.unsplash.com/photo-1616088886430-caaae4274601?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Product view 4" class="w-full h-16 object-cover">
                        </button>
                        <button class="border border-gray-200 hover:border-primary rounded-md overflow-hidden transition-colors">
                            <img src="https://images.unsplash.com/photo-1500634245200-e5245c7574ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Product view 5" class="w-full h-16 object-cover">
                        </button>
                    </div>
                </div>

                <!-- Product Title and Rating -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
                    <div class="flex justify-between items-start mb-4">
                        <h1 class="text-2xl md:text-3xl font-bold">Premium Product for Rent</h1>
                        <div class="bg-primary text-white text-lg font-bold px-3 py-1 rounded">
                            $35/day
                        </div>
                    </div>

                    <div class="flex items-center mb-4">
                        

                    </div>

                    <div class="flex items-center text-sm text-gray-600 mb-6">

                    </div>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Premium</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Like New</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Free Delivery</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Top Rated</span>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
                    <h2 class="text-xl font-bold mb-4">Description</h2>
                    <div class="text-gray-700 space-y-4">
                        <p>{{$product->description}}.</p>
                    </div>
                </div>

                <!-- Owner Information -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
                    <h2 class="text-xl font-bold mb-4">About the Owner</h2>
                    <div class="flex items-start">
                        <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="font-semibold text-gray-600 text-xl">JD</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">{{$user->firstname}} {{$user->lastname}}.</h3>
                            <div class="flex items-center text-sm text-gray-600 mb-2">
                                <span class="text-gray-500">•</span>
                                @php
                                    $date = Carbon\Carbon::parse('2025-05-07 00:00:00');
                                @endphp
                                <span class="ml-2">Member since {{ $date->year }}</span>
                            </div>
                            <p class="text-gray-700 mb-3">I take pride in offering high-quality rentals and providing excellent customer service. I'm responsive and always make sure my items are in perfect condition before renting them out.</p>
                            <button class="text-primary hover:text-secondary font-medium flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Contact Owner
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Reviews -->
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
                    <!-- Review Items -->
                    @foreach($product->comment as $comment)
                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-center mb-2">
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                    <span class="font-semibold text-gray-600">SM</span>
                                </div>
                                <div>
                                    <p class="font-medium">{{$comment->user->firstname}} {{$comment->user->lastname}}.</p>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <div class="flex items-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>
                                        <span>1 week ago</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-700">{{$comment->content}}.</p>
                        </div>
                    </div>
                    @endforeach

                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-center mb-2">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                <span class="font-semibold text-gray-600">MJ</span>
                            </div>
                            <div>
                                <p class="font-medium">Michael J.</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <div class="flex items-center mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <span>2 weeks ago</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">The product was delivered on time and in great condition. The owner provided clear instructions on how to use it. I would definitely recommend renting this item.</p>
                    </div>

                    <!-- Add Comment Form -->
                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-semibold mb-4">Leave a Comment</h3>
                        <form action="/products/{{$product->id}}/comments" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                                <textarea id="comment" name="content" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Share your experience with this product..."></textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-md transition-colors font-medium">
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="text-center mt-6">
                        <a href="{{ url('products/' . $product->id . '/comments') }}" class="text-primary hover:text-secondary font-medium">View all Comments</a>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="mb-6">
                    <iframe
                        id="mapFrame"
                        width="100%"
                        height="350"
                        src="https://www.google.com/maps?q={{ $product->location->latitude }},{{ $product->location->longitude }}&z=14&output=embed"
                        class="border-0 rounded-lg shadow-md"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- Sidebar - Rental Information -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 sticky top-24">
                    @if (session('error'))
                    <div id="error" class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-md">
                        {{ session('error') }}
                        <script>
                            setTimeout(() => {
                                document.getElementById("error").classList.add("hidden");
                            }, 5000);
                        </script>
                    </div>
                    @endif

                    <h2 class="text-xl font-bold mb-4">Rental Information</h2>

                    <!-- Pricing -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">Daily Rate:</span>
                            <span class="font-semibold">${{$product->price}}/day</span>
                        </div>
                    </div>

                    <!-- Date Selection -->
                    <form action="" method="post" class="space-y-6">
                        @csrf
                        <div>
                            <label for="startdate" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                            <input type="date" name="startdate" id="startdate" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div>
                            <label for="enddate" class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                            <input type="date" name="finaledate" id="enddate" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <!-- Delivery Options -->
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-3">Delivery Options</h3>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input id="pickup" name="delivery-option" type="radio" checked class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                    <label for="pickup" class="ml-2 block text-sm text-gray-700">Pickup (Free)</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="delivery" name="delivery-option" type="radio" class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                    <label for="delivery" class="ml-2 block text-sm text-gray-700">Delivery ($10)</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                            <input type="number" name="quantity" id="quantity" min="1" value="1" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <div id="moreinfo">
                            <!-- Price calculation will be inserted here by JavaScript -->
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button type="submit" class="w-full bg-primary hover:bg-secondary text-white py-3 rounded-md transition-colors font-medium flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Reserve Now
                            </button>
                        </div>
                    </form>

                    <form id="product-form" action="/products/add-to-cart/{{$product->id}}" method="post" class="mt-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" id="cartequantity" name="quantity">
                        <input type="hidden" name="startdate" id="cartestartdate">
                        <input type="hidden" name="finaledate" id="cartefinaledate">
                        <button type="submit" class="w-full bg-white border border-primary text-primary hover:bg-primary/5 py-3 rounded-md transition-colors font-medium flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to Cart
                        </button>
                    </form>

                    <div class="text-center text-sm text-gray-600 mt-4">
                        <p>No charge until reservation is confirmed</p>
                    </div>

                    <!-- Similar Items Teaser -->

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="text-lg font-bold">RentAnything</span>
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
                &copy; <script>document.write(new Date().getFullYear())</script> RentAnything. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle and Star Rating -->
    <script>
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu) {
                mobileMenu.classList.toggle('hidden');
            }
        });

        // Date validation
        const startDateInput = document.getElementById('startdate');
        const endDateInput = document.getElementById('enddate');

        if (startDateInput && endDateInput) {
            const today = new Date().toISOString().split('T')[0];
            startDateInput.min = today;

            startDateInput.addEventListener('change', function() {
                endDateInput.min = startDateInput.value;

                if (endDateInput.value && endDateInput.value < startDateInput.value) {
                    endDateInput.value = '';
                }
            });

            endDateInput.addEventListener('change', function() {
                if (endDateInput.value && endDateInput.value < startDateInput.value) {
                    endDateInput.value = '';
                }
            });
        }

        // Star rating functionality
        const starLabels = document.querySelectorAll('label[for^="star"]');
        starLabels.forEach(label => {
            label.addEventListener('click', function() {
                // Reset all stars
                starLabels.forEach(l => {
                    l.querySelector('svg').classList.remove('text-yellow-400');
                    l.querySelector('svg').classList.add('text-gray-300');
                });

                // Fill stars up to the selected one
                const selectedRating = parseInt(this.getAttribute('for').replace('star', ''));
                for (let i = 5; i >= selectedRating; i--) {
                    const star = document.querySelector(`label[for="star${i}"] svg`);
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                }
            });
        });

        // Price calculation
        document.getElementById('quantity').addEventListener("keyup", function(e) {
            let product = {
                price: <?php echo $product->price ?? 35 ?>,
                quantity: <?php echo $product->quantity ?? 10 ?>
            }
            let values = document.getElementById('quantity').value;
            if (values[0] > 0) {
                let totalprice = product.price * document.getElementById('quantity').value;
                let updateelement = `<div class="bg-gray-50 p-4 rounded-md mt-4">
                <div class="flex justify-between items-center mb-2">
                <span class="text-sm text-gray-600">Subtotal:</span>
                <span class="text-sm font-medium">$${totalprice}.00</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                <span class="text-sm text-gray-600">Delivery Fee:</span>
                <span class="text-sm font-medium">$${document.getElementById('delivery').checked ? '10.00' : '0.00'}</span>
                </div>
                <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                <span class="text-base font-medium text-gray-700">Total Price:</span>
                <span class="text-base font-bold text-primary">$${document.getElementById('delivery').checked ? totalprice + 10 : totalprice}.00</span>
                </div>`
                document.getElementById('moreinfo').innerHTML = updateelement;
            } else {
                document.getElementById('moreinfo').innerHTML = "";
            }
        });

        // Cart form submission
        document.getElementById('product-form').addEventListener('submit', function() {
            let quantity = document.getElementById('quantity').value;
            document.getElementById('cartequantity').value = quantity;
            let startdate = document.getElementById("startdate").value;
            let finaldate = document.getElementById('enddate').value;
            document.getElementById('cartestartdate').value = startdate;
            document.getElementById('cartefinaledate').value = finaldate;
        });
    </script>
    </main>
@endsection

<Actions>
  <Action name="Add sticky sidebar" description="Make the sidebar stick to the top when scrolling on mobile devices" />
  <Action name="Add image gallery lightbox" description="Add a lightbox feature for product images" />
  <Action name="Add availability calendar" description="Add an interactive calendar showing available rental dates" />
  <Action name="Add related products carousel" description="Create a carousel of related rental products" />
  <Action name="Add quick checkout" description="Implement a streamlined checkout process for faster rentals" />
</Actions>

