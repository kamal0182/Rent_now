<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Rental Listing Details</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <body class="bg-gray-50 font-sans text-gray-800">
        <header class="sticky top-0 z-50 bg-white shadow-md py-4 px-6">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="text-xl font-bold">RentAnything</span>
                </div>
            </div>
        </header>

        <div class="flex min-h-screen max-w-7xl mx-auto">

            <!-- Left Sidebar -->
            <nav class="w-64 bg-gray-50 border-r border-gray-200 flex-shrink-0 flex flex-col pt-12 px-8 hidden md:flex">
                <div href="#" id="details" onclick="changeContenteBasedOnParameter('details')" class="font-semibold text-gray-800 mb-6 cursor-default hover:text-teal-600 transition-colors">Details</div>
            </nav>

            <!-- Main Content -->
            <main class="flex-1 p-6 md:p-10 bg-white">
                <h1 class="text-2xl md:text-3xl font-extrabold text-gray-800 mb-8 border-b pb-4">Your Rental Listing Details</h1>
                <form class="max-w-3xl space-y-8" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-2">
                        <label for="listing-title" class="block font-semibold text-gray-700 mb-2">* Listing title</label>
                        <input id="listing-title" name="titel" type="text" placeholder="What kind of listing is it?" maxlength="60" value="{{$product->title}}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all" />
                        <p class="text-right text-sm text-gray-500 mt-1">Max characters length 60</p>
                    </div>
                    <div class="space-y-2">
                        <label for="quantity" class="block font-semibold text-gray-700 mb-2">* Quantity</label>
                        <input id="quantity" name="quantity" type="number" placeholder="Enter quantity" min="1" max="999" value="{{$product->quantity}}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all" />
                        <p class="text-right text-sm text-gray-500 mt-1">Enter a number between 1 and 999</p>
                    </div>


                    <div class="space-y-2">
                        <label for="listing-description" class="block font-semibold text-gray-700 mb-2">* Listing description</label>
                        <textarea id="listing-description" name="description" rows="5" placeholder="Describe your listing in more detail." value="{{$product->description}}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 placeholder:text-gray-400 resize-none focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all"> {{$product->description}}</textarea>
                    </div>




                    <!-- Country Search -->
                    <div class="space-y-2">
                        <label for="searchInput" class="block font-semibold text-gray-700 mb-2">Country Search</label>
                        <div class="relative">
                            <input name="country"
                                type="text"
                                id="searchInput"
                                placeholder="Search for a country..."
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all" />
                            <div id="suggestions" class="absolute z-10 mt-1 w-full border border-gray-200 rounded-lg shadow-lg bg-white hidden max-h-60 overflow-y-auto">
                            </div>
                        </div>
                    </div>

                    <!-- City Search -->
                    <div class="space-y-2">
                        <label for="searchCity" class="block font-semibold text-gray-700 mb-2">City Search</label>
                        <div class="relative">
                            <input
                                type="text"
                                id="searchCity"
                                name="city"
                                value=""
                                placeholder="Search for a city..."
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all" />
                            <div id="citySuggestions" class="absolute z-10 mt-1 w-full border border-gray-200 rounded-lg shadow-lg bg-white hidden max-h-60 overflow-y-auto">
                                <!-- Suggestions will be inserted here -->
                            </div>
                        </div>
                    </div>

                    <!-- City -->


                    <!-- Category -->
                    <div class="space-y-2">
                        <label for="category" class="block font-semibold text-gray-700 mb-2">Category</label>
                        <select name="categorie" id="category"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all appearance-none bg-white">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->name}}" selected>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tags (Multi-select) -->


                    <!-- Rent Way -->
                    <div class="space-y-2">
                        <label for="rent-way" class="block font-semibold text-gray-700 mb-2">Rent Way</label>
                        <select name="rentway" id="rentway"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all appearance-none bg-white">
                            <option value="">Select Rent Way : </option>
                            @foreach($rentways as $rentway)
                            <option value="{{ $rentway->title }}" selected>{{ $rentway->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Budget -->
                    <div class="space-y-2">
                        <label for="prix" class="block font-semibold text-gray-700 mb-2">Budget ($)</label>
                        <input id="prix" name="prix" type="number" placeholder="Enter your budget" value="{{$product->price}}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm transition-all" />
                    </div>

                    <!-- File Upload -->
                    <div class="space-y-2">
                        <label for="avatars" class="block font-semibold text-gray-700 mb-2">Upload Images</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col w-full h-32 border-2 border-dashed border-gray-300 rounded-lg hover:bg-gray-50 hover:border-teal-500 transition-all cursor-pointer">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 group-hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">Attach images</p>
                                </div>
                                <input type="file" value="products" name="avatars[]" accept="image/*" multiple class="opacity-0" />
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-3 px-8 rounded-lg shadow-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 w-full md:w-auto">
                            Submit Listing
                        </button>
                    </div>
                </form>
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-16">
            <div class="container mx-auto px-6 py-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-2 mb-6 md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span class="text-lg font-bold">RentAnything</span>
                    </div>
                    <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                        <a href="#" class="text-sm text-gray-600 hover:text-teal-600 transition-colors">About Us</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-teal-600 transition-colors">How It Works</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-teal-600 transition-colors">Terms of Service</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-teal-600 transition-colors">Privacy Policy</a>
                        <a href="#" class="text-sm text-gray-600 hover:text-teal-600 transition-colors">Contact Us</a>
                    </div>
                </div>
                <div class="text-center mt-6 text-sm text-gray-500">
                    &copy; <script>document.write(new Date().getFullYear())</script> RentAnything. All rights reserved.
                </div>
            </div>
        </footer>

        <script>
            const suggestionsList = [
                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola",
                "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan",
                "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus",
                "Belgium", "Belize", "Benin", "Bhutan", "Bolivia",
                "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria",
                "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada",
                "Cape Verde", "Central African Republic", "Chad", "Chile", "China",
                "Colombia", "Comoros", "Congo (Brazzaville)", "Congo (Kinshasa)", "Costa Rica",
                "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark",
                "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt",
                "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini",
                "Ethiopia", "Fiji", "Finland", "France", "Gabon",
                "Gambia", "Georgia", "Germany", "Ghana", "Greece",
                "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana",
                "Haiti", "Honduras", "Hungary", "Iceland", "India",
                "Indonesia", "Iran", "Iraq", "Ireland", "Israel",
                "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan",
                "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos",
                "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
                "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi",
                "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands",
                "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova",
                "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique",
                "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands",
                "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea",
                "North Macedonia", "Norway", "Oman", "Pakistan", "Palau",
                "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru",
                "Philippines", "Poland", "Portugal", "Qatar", "Romania",
                "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
                "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal",
                "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia",
                "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea",
                "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname",
                "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan",
                "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga",
                "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu",
                "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
                "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela",
                "Vietnam", "Yemen", "Zambia", "Zimbabwe"
            ];
            const countryCities = {
            "Afghanistan": ["Kabul", "Herat", "Kandahar", "Mazar-i-Sharif", "Jalalabad", "Kunduz", "Bamyan", "Logar", "Ghazni", "Puli Alam"],
            "Albania": ["Tirana", "Durrës", "Shkodër", "Elbasan", "Fier", "Vlorë", "Korçë", "Lushnjë", "Berat", "Shijak"],
            "Algeria": ["Algiers", "Oran", "Constantine", "Annaba", "Blida", "Setif", "Béjaïa", "Tlemcen", "Batna", "Tiaret"],
            "Andorra": ["Andorra la Vella", "Escaldes-Engordany", "Encamp", "Sant Julià de Lòria", "La Massana", "Ordino", "Canillo", "El Tarter"],
            "Angola": ["Luanda", "Huambo", "Benguela", "Lubango", "Lobito", "Kuito", "Malanje", "Namibe", "Soyo", "Cuito"],
            "Argentina": ["Buenos Aires", "Cordoba", "Rosario", "Mendoza", "La Plata", "San Miguel de Tucumán", "Mar del Plata", "Salta", "Santa Fe", "Corrientes"],
            "Armenia": ["Yerevan", "Gyumri", "Vanadzor", "Vagharshapat", "Kapan", "Ijevan", "Gavar", "Stepanakert", "Ararat", "Artashat"],
            "Australia": ["Sydney", "Melbourne", "Brisbane", "Perth", "Adelaide", "Canberra", "Hobart", "Darwin", "Gold Coast", "Newcastle"],
            "Austria": ["Vienna", "Salzburg", "Graz", "Linz", "Innsbruck", "Klagenfurt", "St. Pölten", "Wels", "Dornbirn", "Villach"],
            "Azerbaijan": ["Baku", "Ganja", "Sumqayit", "Mingechevir", "Lankaran", "Mingachevir", "Shaki", "Guba", "Masalli", "Zagatala"],
            "Bahamas": ["Nassau", "Freeport", "West End", "Marsh Harbour", "Andros Town", "Exuma", "Eleuthera", "Harbour Island", "Long Island", "Bimini"],
            "Bahrain": ["Manama", "Riffa", "Muharraq", "Hamad Town", "Isa Town", "Sitra", "Budaiya", "Al Hidd", "Jidhafs", "Zallaq"],
            "Bangladesh": ["Dhaka", "Chittagong", "Khulna", "Rajshahi", "Sylhet", "Barisal", "Mymensingh", "Rangpur", "Narsingdi", "Comilla"],
            "Barbados": ["Bridgetown", "Speightstown", "Oistins", "Holetown", "Saint Lawrence Gap", "Bathsheba", "Dover", "The Garrison", "Rockley"],
            "Belarus": ["Minsk", "Brest", "Gomel", "Vitebsk", "Mogilev", "Grodno", "Bobruisk", "Baranovichi", "Soligorsk", "Pinsk"],
            "Belgium": ["Brussels", "Antwerp", "Ghent", "Liege", "Charleroi", "Bruges", "Leuven", "Namur", "Hasselt", "Mechelen"],
            "Belize": ["Belmopan", "Belize City", "San Ignacio", "Orange Walk", "Corozal", "San Pedro", "Cayo", "Dangriga", "Punta Gorda", "Placencia"],
            "Benin": ["Cotonou", "Porto-Novo", "Parakou", "Djougou", "Abomey", "Kandi", "Bohicon", "Lokossa", "Ouidah", "Natitingou"],
            "Bhutan": ["Thimphu", "Phuntsholing", "Paro", "Punakha", "Wangdue Phodrang", "Jakar", "Samdrup Jongkhar", "Trashigang", "Trongsa", "Lhuentse"],
            "Bolivia": ["La Paz", "Santa Cruz", "Cochabamba", "Sucre", "Oruro", "Potosí", "Tarija", "El Alto", "Trinidad", "Sacaba"],
            "Bosnia and Herzegovina": ["Sarajevo", "Banja Luka", "Tuzla", "Zenica", "Mostar", "Zenica", "Tuzla", "Travnik", "Bijeljina", "Bugojno"],
            "Botswana": ["Gaborone", "Francistown", "Molepolole", "Maun", "Selibe Phikwe", "Lobatse", "Kasane", "Jwaneng", "Ghanzi", "Palapye"],
            "Brazil": ["Brasília", "São Paulo", "Rio de Janeiro", "Salvador", "Fortaleza", "Belo Horizonte", "Manaus", "Curitiba", "Recife", "Porto Alegre"],
            "Brunei": ["Bandar Seri Begawan", "Kuala Belait", "Seria", "Tutong", "Bangar"],
            "Bulgaria": ["Sofia", "Plovdiv", "Varna", "Burgas", "Ruse", "Stara Zagora", "Pleven", "Sliven", "Dobrich", "Shumen"],
            "Burkina Faso": ["Ouagadougou", "Bobo-Dioulasso", "Koudougou", "Banfora", "Tenkodogo", "Kaya", "Fada N'Gourma", "Ouahigouya", "Dori", "Titao"],
            "Burundi": ["Bujumbura", "Gitega", "Ngozi", "Muyinga", "Ruyigi", "Muramvya", "Cibitoke", "Makamba", "Kayanza", "Kirundo"],
            "Cambodia": ["Phnom Penh", "Siem Reap", "Battambang", "Sihanoukville", "Kampong Cham", "Kampot", "Poipet", "Banteay Meanchey", "Kandal", "Svay Rieng"],
            "Cameroon": ["Yaoundé", "Douala", "Bamenda", "Garoua", "Bafoussam", "Maroua", "Kousséri", "Bertoua", "Nkongsamba", "Ebolowa"],
            "Canada": ["Ottawa", "Toronto", "Vancouver", "Montreal", "Calgary", "Edmonton", "Ottawa", "Quebec City", "Winnipeg", "Hamilton"],
            "Cape Verde": ["Praia", "Mindelo", "Santa Maria", "Espargos", "Sao Filipe", "Ribeira Brava", "Tarrafal", "Porto Novo", "Sal Rei", "Nova Sintra"],
            "Central African Republic": ["Bangui", "Bimbo", "Mbaïki", "Carnot", "Berbérati", "Bouar", "Bangassou", "Kaga Bandoro", "Kémo", "Bossangoa"],
            "Chad": ["N'Djamena", "Moundou", "Sarh", "Abéché", "Kelo", "Kassai", "Ati", "Faya-Largeau", "Mongo", "Am Timan"],
            "Chile": ["Santiago", "Valparaíso", "Concepción", "La Serena", "Antofagasta", "Temuco", "Rancagua", "Viña del Mar", "Punta Arenas", "Arica"],
            "China": ["Beijing", "Shanghai", "Guangzhou", "Shenzhen", "Chengdu", "Xi'an", "Hangzhou", "Wuhan", "Tianjin", "Shenyang"],
            "Colombia": ["Bogotá", "Medellín", "Cali", "Cartagena", "Barranquilla", "Cúcuta", "Bucaramanga", "Pereira", "Santa Marta", "Manizales"],
            "Comoros": ["Moroni", "Mutsamudu", "Fomboni", "Domoni", "Sima", "Itsandra", "Baweni"],
            "Congo (Brazzaville)": ["Brazzaville", "Pointe-Noire", "Dolisie", "Nkayi", "Oyo", "Mossendjo", "Kindamba", "Kinkala", "Brazzaville", "Brazza"],
            "Congo (Kinshasa)": ["Kinshasa", "Lubumbashi", "Mbuji-Mayi", "Kisangani", "Goma", "Bukavu", "Kananga", "Tshikapa", "Matadi", "Kikwit"]
            };
            const input = document.getElementById("searchInput");
            const suggestionsBox = document.getElementById("suggestions");
                function chekeA(value1 , suggestionsList) {
                    let matchedCountries = [];
                    let k = 0;
                    console.log(suggestionsList)
                    for (let i = 0; i < suggestionsList.length; i++) {
                        if (suggestionsList[i].toLocaleLowerCase().startsWith(value1.toLowerCase())) {
                            matchedCountries.push(suggestionsList[i]);
                            while (k < matchedCountries.length - 1) {
                                if (matchedCountries[k].length > matchedCountries[k + 1].length) {
                                    let temp = matchedCountries[k];
                                    matchedCountries[k] = matchedCountries[k + 1];
                                    matchedCountries[k + 1] = temp;
                                    k = 0;
                                } else {
                                    k++;
                                }
                            }
                        }
                    }
                    return matchedCountries ;
                }

input.addEventListener('input',function()
{
const value = input.value.trim().toLowerCase();
  suggestionsBox.innerHTML = "";
  if (value === "") {
    suggestionsBox.classList.add("hidden");
    return;
  }
    let countries = chekeA(input.value , suggestionsList );
    updateContent(countries , suggestionsBox , input );

});
let suggestedCities ;
let cityInput = document.getElementById('searchCity');
let citYSuggestBox = document.getElementById('citySuggestions');

function updateContent(countries ,suggestionsBox  , input )
    {
        countries.forEach(item => {
        console.log(item);
        const div = document.createElement("div");
        div.textContent = item ;
        console.log(div);
        div.className = "px-4 py-2 hover:bg-teal-100 cursor-pointer";
        div.addEventListener("click", () => {
            console.log(input.id);
            if(input.id == "searchInput"){
                console.log('ascasc');
                input.value = item ;
                let object = input.value ;
                suggestedCities = countryCities[object] ;
            }
            else if( input.id === "searchCity")
            {
                input.value = item ;
                let object = input.value ;
            }
            suggestionsBox.classList.add("hidden");
        });
        suggestionsBox.appendChild(div);
        });
        suggestionsBox.classList.remove("hidden");
    }

cityInput.addEventListener('input',function()
{
const value = cityInput.value.trim().toLowerCase();
  citYSuggestBox.innerHTML = "";
  if (value === "") {
    citYSuggestBox.classList.add("hidden");
    return;
  }
    let cities = chekeA(value, suggestedCities || []);
    updateContent(cities, citYSuggestBox, cityInput);
});
        </script>
    </body>

    </html>
</body>

</html>
