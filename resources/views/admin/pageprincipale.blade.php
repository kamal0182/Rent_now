<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              200: '#bae6fd',
              300: '#7dd3fc',
              400: '#38bdf8',
              500: '#0ea5e9',
              600: '#0284c7',
              700: '#0369a1',
              800: '#075985',
              900: '#0c4a6e',
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-100">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-64 bg-white border-r">
        <div class="flex items-center justify-center h-16 px-4 border-b">
          <h1 class="text-xl font-bold">RentAnything</h1>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
          <nav class="flex-1 px-2 py-4 space-y-1">
            <a href="/admin/dashboard" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-primary-600 rounded-md">
              <i class="ri-dashboard-line mr-3 text-lg"></i>
              Dashboard
            </a>
            <a href="/admin/products" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
              <i class="ri-store-2-line mr-3 text-lg"></i>
              Products
            </a>
            <a href="/admin/rentals" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
              <i class="ri-shopping-cart-line mr-3 text-lg"></i>
              Rentals
            </a>
            <a href="/admin/categories" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
              <i class="ri-shopping-cart-line mr-3 text-lg"></i>
              Categories
            </a>
            <a href="/admin/users" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
              <i class="ri-shopping-cart-line mr-3 text-lg"></i>
              Users
            </a>

            <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
              <i class="ri-settings-line mr-3 text-lg"></i>
              Settings
            </a>
          </nav>
        </div>
      </div>
    </aside>
            @yield('contenu')
        </body>
</html>

