<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Anything - Find & Rent Items Near You</title>
    <meta name="description" content="Rent anything you need from people in your community. Find tools, equipment, vehicles and more.">

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
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col">

    <!-- Header/Navigation -->
    <header id="header" class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 md:py-4">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <a href="/home">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span class="text-xl font-bold text-gray-800">RentAnything</span>
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="w-full md:w-1/2 max-w-xl">
                    <div class="relative">
                        <input type="text" id="search" placeholder="Search for items to rent..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm transition-all">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Right Side Navigation -->
                <div class="flex items-center space-x-3 md:space-x-6">
                    <div class="relative inline-block">
                        <label for="categories" class="sr-only">Categories</label>
                        <div class="relative">
                            <!-- Custom select wrapper with hamburger icon -->
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </div>

                            <!-- Native select element -->
                            <select onclick="getCategorie()" id="categories" class="block w-full appearance-none bg-white pl-9 pr-8 py-2 text-gray-600 hover:text-primary transition-colors border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary shadow-sm">
                                <option value="" disabled selected class="hidden">
                                    <span class="ml-2 hidden md:inline">Categories</span>
                                </option>
                                @foreach($categories as $categorie)
                                <option value="{{$categorie->name}}">{{$categorie->name}}</option>
                                @endforeach
                            </select>

                            <!-- Custom arrow -->
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <a href="/profile" class="text-gray-600 hover:text-primary transition-colors flex items-center group">
                        <div class="relative p-1 rounded-full group-hover:bg-gray-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <span class="ml-1.5 hidden md:inline font-medium">Account</span>
                    </a>

                    <a href="/products/create" class="bg-primary hover:bg-secondary text-white px-4 py-2.5 rounded-lg transition-colors whitespace-nowrap font-medium shadow-sm hover:shadow">
                        Create Free Listing
                    </a>
                </div>
            </div>
        </div>
    </header>

    @yield('contenu')

    <script>
    let element =  document.getElementById('header').nextElementSibling.id
    console.log(element);
    let products = document.getElementById("products")
    let searchInput = document.getElementById("search")
async  function getAllProducts(v)
{
   let response  = await fetch(`http://127.0.0.1:8000/api/home?content=${v}`);
   let data = await  response.json() ;3
   let products = data.products ;
   if(products.length > 0 ) document.getElementById(element).innerHTML = chargeProducts(products) ;
    else  document.getElementById(element).innerHTML  = `<div class="flex flex-col items-center justify-center h-96 text-center px-4">
  <svg class="w-16 h-16 text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
  </svg>
  <h2 class="text-lg font-semibold text-gray-700 mb-2">No results found</h2>
  <p class="text-gray-500">We couldn’t find anything matching your search. Try adjusting your filters or search terms.</p>
</div>`
}
function chargeProducts(products)
{
    let html = `` ;
    html  += `<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">`
    products.forEach(product => {
        html += `     <a href="/products/rentals/${product.id}" class="group block transition-all duration-300 h-full">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 hover:shadow-md hover:border-gray-300 transition-all h-full flex flex-col">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1572177215152-32f247303126?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Product Image" class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute top-3 right-3 bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                        $${product.price}/day
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
                    <h3 class="text-lg font-semibold mb-2 text-gray-800 group-hover:text-primary transition-colors">
                        ${product.title}
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-grow">
                        ${product.description}
                    </p>
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
    `;
});
      return html  ;
}
searchInput.addEventListener('keypress' , function (e) {
    if(e.key == "Enter"){
        getAllProducts(searchInput.value)
    }
})
let categorieSelect = document.getElementById('categories');
function getCategorie()
{
    getAllCategoriesByName(categorieSelect.value);
}
async function getAllCategoriesByName(params) {
    let response = await fetch(`http://127.0.0.1:8000/api/home?content=${params}`,{
        'method' :  'post'
    });
    let data = await response.json();
    let products  = data.products ;
    console.log(products);
       if(products.length > 0 ) document.getElementById(element).innerHTML = chargeProducts(products) ;
    else  document.getElementById(element).innerHTML  = `<div class="flex flex-col items-center justify-center h-96 text-center px-4">
  <svg class="w-16 h-16 text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
  </svg>
  <h2 class="text-lg font-semibold text-gray-700 mb-2">No results found</h2>
  <p class="text-gray-500">We couldn’t find anything matching your search. Try adjusting your filters or search terms.</p>
</div>`
}

    </script>
</body>
</html>
