<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Comments - Rent Anything</title>
    <meta name="description" content="View and manage comments for this product on Rent Anything.">

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
<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="text-xl font-bold">RentAnything</span>
                </div>
                <a href="#" class="text-gray-600 hover:text-primary transition-colors">
                    Back to All Products
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Product Description -->
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Product Image -->
                <div class="md:w-1/3">
                    <img src="https://images.unsplash.com/photo-1572177215152-32f247303126?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                         alt="Professional Camera Kit"
                         class="w-full h-auto object-cover rounded-md">
                </div>

                <!-- Product Details -->
                <div class="md:w-2/3">
                    <div class="flex justify-between items-start mb-2">
                        <h1 class="text-2xl font-bold">{{$product->title}}</h1>
                        <div class="bg-primary text-white text-lg font-bold px-3 py-1 rounded">
                            ${{$product->price}}
                        </div>
                    </div>

                    <div class="flex items-center mb-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="ml-1 text-gray-700">4.9 (28 reviews)</span>
                        </div>
                        <span class="mx-2 text-gray-300">|</span>
                        <span class="text-gray-700">Available Now</span>
                    </div>

                    <div class="mb-4">
                        <h2 class="text-lg font-semibold mb-2">Product Description</h2>
                        <p class="text-gray-700 mb-3">{{$product->description}}</p>

                    </div>



                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Professional Grade</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Free Delivery</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Beginner Friendly</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Insurance Available</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold">Comments</h2>
                <button onclick="showform()"  class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md transition-colors text-sm font-medium">
                    Add New Comment
                </button>
            </div>
            <div id="addnewcomment" class="mt-8 pt-6 border-t border-gray-200">

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
                                                    {{$rental->product->title}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">  {{$rental->start_date}} ,  {{$rental->end_date}}  </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">${{$rental->quantity * $rental->product->price}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span id="status" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{$rental->status}}
                                        </span>
                                    </td>
<form action="" method="post">
@csrf
    @method('patch')
<input type="hidden" name="id"value="{{$rental->id}}">
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
    <select id="statusOfRenatal" name="status" onchange="getSelectedValue('{{$rental->id}}')"  class="border rounded px-2 py-1 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary">
        <option value="" selected disabled>Select an option</option>
        <option value="accept">Accept</option>
        <option value="refuse">Refuse</option>
    </select>
    <button type="submit" >Update Status</button>
</td>
</form>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Comments List -->

                <!-- Comment 2 -->


            <!-- Add Comment Form -->
            <div id="addcomment" class="mt-8 pt-6 border-t border-gray-200">

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-8">
        <div class="container mx-auto px-4 py-4">
            <div class="text-center text-sm text-gray-500">
                &copy; <script>document.write(new Date().getFullYear())</script> RentAnything. All rights reserved.
            </div>
        </div>
    </footer>
    <script>
        function getSelectedValue(id)
        {

            ChangeTheStatus(document.getElementById("statusOfRenatal").value , id)
        }
        async function ChangeTheStatus(params , id) {
            let response = await fetch(`http://127.0.0.1:8000/api/rental?status=${params}&id=${id}`,{
                'method' :  'post'
            });
            let data = await response.json();
            // console.log(data.status);
            document.getElementById('status').innerHTML = data.status

        }
    </script>
</body>
</html>
