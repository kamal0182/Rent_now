@extends('navbar')
@section('contenu')
    <!-- Main Content -->
    <main id="main" class="container mx-auto px-4 py-8 max-w-7xl">
        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-6">
            <!-- Product Card -->
            @foreach($products as $product)
            <a href="products/rentals/{{$product->id}}" class="group block transition-all duration-300 h-full">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-md hover:border-gray-300 transition-all h-full flex flex-col">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1572177215152-32f247303126?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Professional DSLR Camera" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute top-3 right-3 bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                            ${{$product->price}}/{{$product->rentway->title}}
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex items-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-sm text-gray-600 ml-1 font-medium">4.9 (28 reviews)</span>
                            <span class="mx-2 text-gray-300">|</span>
                            <span class="text-sm text-gray-600 font-medium">2.3 miles away</span>
                        </div>
                        <h3 class="text-lg font-semibold mb-2 text-gray-800 group-hover:text-primary transition-colors">{{$product->title}}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow">{{$product->description}}</p>
                        <div class="flex space-x-3 mt-auto">
                            <button class="flex-1 bg-white border-2 border-primary text-primary hover:bg-primary/5 font-medium py-2 rounded-lg transition-colors flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Call
                            </button>
                            <button class="flex-1 bg-primary hover:bg-primary/90 text-white font-medium py-2 rounded-lg transition-colors">
                                More Details
                            </button>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </main>
    <div class="flex justify-center mt-12 mb-16">
        {{ $products->links() }}
    </div>
    <footer class="bg-white border-t border-gray-200">
        <div class="container mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-6 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="text-xl font-bold text-gray-800">RentAnything</span>
                </div>
                <div class="flex flex-wrap justify-center gap-6 md:gap-8">
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">About Us</a>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">How It Works</a>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Terms of Service</a>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Privacy Policy</a>
                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary transition-colors">Contact Us</a>
                </div>
            </div>
            <div class="text-center mt-8 text-sm text-gray-500">
                &copy; <script>document.write(new Date().getFullYear())</script> RentAnything. All rights reserved.
            </div>
        </div>
    </footer>
    <script>
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu) {
                mobileMenu.classList.toggle('hidden');
            }
        });
        let searchelement =  document.getElementById('search') ;
        async  function getAllProducts(value)
        {

           let response  = await fetch(`http://127.0.0.1:8000/api/home?query=${value}`);
           let data = await  response.json()

        }
        searchelement.addEventListener('keypress' , function (e) {
            if(e.key == "Enter"){

            }
        })
    </script>
@endsection
