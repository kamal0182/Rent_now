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
                <a href="/home" class="text-gray-600 hover:text-primary transition-colors">
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
            <!-- Comments List -->
            <div class="space-y-4">
                <!-- Comment 1 -->
                 @foreach($product->comment as $comment)
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-sm transition-shadow">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-semibold text-gray-800">{{$comment->user->firstname}}</h3>
                        <div class="flex space-x-2">
                            @if(Auth::user()->id == $comment->user->id)
                            <button onclick="updateComment('{{$comment->content}}','{{$comment->id}}')" class="text-gray-500 hover:text-primary transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <form action="" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                             <button type="submit" class="text-gray-500 hover:text-red-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            </form>
                            @endif
                        </div>
                    </div>
                    <p class="text-gray-700">{{$comment->content}}</p>
                </div>
                @endforeach
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
        function updateComment(contente , id)
        {
            document.getElementById('addnewcomment').innerHTML =  `  <h3 class="text-lg font-semibold mb-4">Update Your Comment</h3>
                <form class="space-y-4" method="post">
                @csrf
                @method("put")
                    <div>
                    <input id="idcomment" type="hidden" name="comment_id" >
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Your Comment</label>
                        <textarea id="comment" name="comment_content" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Write your comment here..." required></textarea>
                    </div>

                    <div>
                        <button type="submit" class="bg-primary hover:bg-secondary text-white px-6 py-2 rounded-md transition-colors font-medium">
                            Submit Comment
                        </button>
                    </div>
                </form>`
            document.getElementById('comment').value = contente ;
            document.getElementById('idcomment').value = id ;
        }
        function showform()
        {
            document.getElementById('addnewcomment').innerHTML = `
              <div class="mt-8 border-t border-gray-200 pt-6">

                            <form action="" method="post">
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
                        </div>`
        }

    </script>
</body>
</html>
