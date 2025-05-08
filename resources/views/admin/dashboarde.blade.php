@extends('admin.pageprincipale')
@section('contenu')
    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-hidden">
      <!-- Top Navbar -->
      <header class="flex items-center justify-between h-16 px-6 bg-white border-b">
        <div class="flex items-center">
          <button class="text-gray-500 md:hidden" id="mobile-menu-button">
            <i class="ri-menu-line text-2xl"></i>
          </button>
          <div class="relative ml-4 md:ml-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
              <i class="ri-search-line text-gray-400"></i>
            </span>
            <input class="w-full py-2 pl-10 pr-4 text-sm bg-gray-100 border border-transparent rounded-md focus:outline-none focus:bg-white focus:border-gray-300" placeholder="Search...">
          </div>
        </div>
        <div class="flex items-center">
          <!-- Notification Button -->
          <div class="relative mr-4">
            <button onclick="getname('{{$user->id}}')" class="p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none" id="notification-button">
              <i class="ri-notification-3-line text-xl"></i>
              <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>

            <!-- Notification Dropdown -->
            <div id="notification-dropdown" class="absolute right-0 z-10 hidden w-80 mt-2 overflow-hidden bg-white rounded-md shadow-lg">
              <div class="px-4 py-3 text-sm font-medium text-gray-700 border-b bg-gray-50">
                <div class="flex items-center justify-between">
                  <span>Notifications</span>
                  <span   class="px-2 py-1 text-xs font-semibold text-primary-800 bg-primary-100 rounded-full"> <span  id="countnotifproducts">{{$count}}</span> New</span>
                </div>
              </div>
              <div class="max-h-96 overflow-y-auto">
                <!-- Notification Item -->
                @foreach($notifications as $notification)
                <a href="#" class="block px-4 py-3 border-b hover:bg-gray-50">
                  <div class="flex">
                    <div class="flex-shrink-0">
                      <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-100">
                        <i class="ri-check-line text-green-600"></i>
                      </div>
                    </div>
                    <div class="ml-3">

                    <a href="/admin/products/{{$notification->data['product_id']}}">
                      <p class="text-sm font-medium text-gray-900">{{$notification->data['title']}}</p>
                      <p class="text-sm text-gray-500">{{$notification->data['user']}}</p>
                      <p class="mt-1 text-xs text-gray-400">10 minutes ago</p></a>

                    </div>
                  </div>
                </a>
                @endforeach

                <!-- Notification Item -->
                <a href="/home" class="block px-4 py-3 border-b hover:bg-gray-50">
                  <div class="flex">
                    <div class="flex-shrink-0">
                      <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100">
                        <i class="ri-user-add-line text-blue-600"></i>
                      </div>
                    </div>
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">New customer registered</p>
                      <p class="text-sm text-gray-500">Sarah Johnson has created an account</p>
                      <p class="mt-1 text-xs text-gray-400">1 hour ago</p>
                    </div>
                  </div>
                </a>

                @foreach($notifications as $notification)
                <a href="/home" class="block px-4 py-3 border-b hover:bg-gray-50">
                  <div class="flex">
                    <div class="flex-shrink-0">
                      <div class="flex items-center justify-center w-10 h-10 rounded-full bg-yellow-100">
                        <i class="ri-alert-line text-yellow-600"></i>
                      </div>
                    </div>
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">{{$notification->data['title']}}</p>
                      <p class="text-sm text-gray-500">{{$notification->data['user']}}</p>
                      <p class="mt-1 text-xs text-gray-400">3 hours ago</p>
                    </div>
                  </div>
                </a>

                <!-- Notification Item -->
                <a href="#" class="block px-4 py-3 border-b hover:bg-gray-50">
                  <div class="flex">
                    <div class="flex-shrink-0">
                      <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-100">
                        <i class="ri-close-circle-line text-red-600"></i>
                      </div>
                    </div>
                    <div class="ml-3">
                      <p class="text-sm font-medium text-gray-900">Rental cancelled</p>
                      <p class="text-sm text-gray-500">Order #5678 has been cancelled by the customer</p>
                      <p class="mt-1 text-xs text-gray-400">5 hours ago</p>
                    </div>
                  </div>
                </a>

                <!-- Notification Item -->

            </div>
          </div>
          <div class="relative ml-3">
            <div>
              <button class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none" id="user-menu-button">
                <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main class="flex-1 overflow-y-auto p-6">
        <div class="mb-6">
          <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2 lg:grid-cols-4">
          <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-center">
              <div class="p-3 bg-primary-100 rounded-full">
                <i class="ri-shopping-cart-line text-xl text-primary-600"></i>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Total Rentals</p>
                <p class="text-2xl font-semibold text-gray-900">2,345</p>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-sm font-medium text-green-600">+14.5%</span>
              <span class="text-sm font-medium text-gray-500"> from last month</span>
            </div>
          </div>

          <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-center">
              <div class="p-3 bg-green-100 rounded-full">
                <i class="ri-money-dollar-circle-line text-xl text-green-600"></i>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Revenue</p>
                <p class="text-2xl font-semibold text-gray-900">$34,245</p>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-sm font-medium text-green-600">+8.2%</span>
              <span class="text-sm font-medium text-gray-500"> from last month</span>
            </div>
          </div>

          <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-center">
              <div class="p-3 bg-yellow-100 rounded-full">
                <i class="ri-user-add-line text-xl text-yellow-600"></i>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">New Customers</p>
                <p class="text-2xl font-semibold text-gray-900">342</p>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-sm font-medium text-green-600">+5.7%</span>
              <span class="text-sm font-medium text-gray-500"> from last month</span>
            </div>
          </div>

          <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-center">
              <div class="p-3 bg-red-100 rounded-full">
                <i class="ri-refund-2-line text-xl text-red-600"></i>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Refunds</p>
                <p class="text-2xl font-semibold text-gray-900">38</p>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-sm font-medium text-red-600">+2.3%</span>
              <span class="text-sm font-medium text-gray-500"> from last month</span>
            </div>
          </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
          <div class="p-6 bg-white rounded-lg shadow">
            <h2 class="mb-4 text-lg font-semibold text-gray-900">Monthly Revenue</h2>
            <div class="h-80">
              <canvas id="revenueChart"></canvas>
            </div>
          </div>
          <div class="p-6 bg-white rounded-lg shadow">
            <h2 class="mb-4 text-lg font-semibold text-gray-900">Category Distribution</h2>
            <div class="h-80">
              <canvas id="categoryChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="p-6 bg-white rounded-lg shadow">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-900">Recent Rentals</h2>
            <a href="#" class="text-sm font-medium text-primary-600 hover:text-primary-700">View all</a>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3">Order ID</th>
                  <th scope="col" class="px-6 py-3">Customer</th>
                  <th scope="col" class="px-6 py-3">Product</th>
                  <th scope="col" class="px-6 py-3">Date</th>
                  <th scope="col" class="px-6 py-3">Amount</th>
                  <th scope="col" class="px-6 py-3">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white border-b">
                  <td class="px-6 py-4">#ORD-001</td>
                  <td class="px-6 py-4">John Smith</td>
                  <td class="px-6 py-4">Mountain Bike</td>
                  <td class="px-6 py-4">Apr 23, 2023</td>
                  <td class="px-6 py-4">$120.00</td>
                  <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span></td>
                </tr>
                <tr class="bg-white border-b">
                  <td class="px-6 py-4">#ORD-002</td>
                  <td class="px-6 py-4">Sarah Johnson</td>
                  <td class="px-6 py-4">DSLR Camera</td>
                  <td class="px-6 py-4">Apr 22, 2023</td>
                  <td class="px-6 py-4">$85.00</td>
                  <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">Pending</span></td>
                </tr>
                <tr class="bg-white border-b">
                  <td class="px-6 py-4">#ORD-003</td>
                  <td class="px-6 py-4">Michael Brown</td>
                  <td class="px-6 py-4">Camping Tent</td>
                  <td class="px-6 py-4">Apr 21, 2023</td>
                  <td class="px-6 py-4">$200.00</td>
                  <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">In Progress</span></td>
                </tr>
                <tr class="bg-white border-b">
                  <td class="px-6 py-4">#ORD-004</td>
                  <td class="px-6 py-4">Emily Davis</td>
                  <td class="px-6 py-4">Projector</td>
                  <td class="px-6 py-4">Apr 20, 2023</td>
                  <td class="px-6 py-4">$75.00</td>
                  <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span></td>
                </tr>
                <tr class="bg-white">
                  <td class="px-6 py-4">#ORD-005</td>
                  <td class="px-6 py-4">Robert Wilson</td>
                  <td class="px-6 py-4">Power Tools Set</td>
                  <td class="px-6 py-4">Apr 19, 2023</td>
                  <td class="px-6 py-4">$150.00</td>
                  <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Cancelled</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Mobile Sidebar (hidden by default) -->
  <div class="fixed inset-0 z-40 hidden bg-black bg-opacity-50" id="mobile-menu-overlay"></div>
  <div class="fixed inset-y-0 left-0 z-50 hidden w-64 bg-white" id="mobile-menu">
    <div class="flex items-center justify-between h-16 px-4 border-b">
      <h1 class="text-xl font-bold">RentAnything</h1>
      <button id="close-mobile-menu">
        <i class="ri-close-line text-2xl"></i>
      </button>
    </div>
    <nav class="px-2 py-4 space-y-1">
      <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-white bg-primary-600 rounded-md">
        <i class="ri-dashboard-line mr-3 text-lg"></i>
        Dashboard
      </a>
      <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
        <i class="ri-store-2-line mr-3 text-lg"></i>
        Products
      </a>
      <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
        <i class="ri-shopping-cart-line mr-3 text-lg"></i>
        Orders
      </a>
      <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
        <i class="ri-user-line mr-3 text-lg"></i>
        Customers
      </a>
      <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
        <i class="ri-settings-line mr-3 text-lg"></i>
        Settings
      </a>
    </nav>
  </div>

  <script>
   
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const closeMobileMenuButton = document.getElementById('close-mobile-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.remove('hidden');
      mobileMenuOverlay.classList.remove('hidden');
    });

    function closeMobileMenu() {
      mobileMenu.classList.add('hidden');
      mobileMenuOverlay.classList.add('hidden');
    }

    closeMobileMenuButton.addEventListener('click', closeMobileMenu);
    mobileMenuOverlay.addEventListener('click', closeMobileMenu);

    // Notification dropdown toggle
    const notificationButton = document.getElementById('notification-button');
    const notificationDropdown = document.getElementById('notification-dropdown');
   async  function getUnreadNotificationNumber(id)
    {
        let response = await fetch(`http://127.0.0.1:8000/api/notification?id=${id}`);
        let data = await response.json();
        console.log(data);
        document.getElementById('countnotifproducts').innerHTML = data.unreadNotifications ;
    }
    notificationButton.addEventListener('click', (e) => {
      e.stopPropagation();

      notificationDropdown.classList.toggle('hidden');
      getUnreadNotificationNumber()

    });
    function getname(id){
        getUnreadNotificationNumber(id)
    }


    // Close notification dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!notificationDropdown.contains(e.target) && e.target !== notificationButton) {
        notificationDropdown.classList.add('hidden');
      }
    });

    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Revenue',
          data: [18500, 22000, 19500, 24000, 27500, 26000, 32000, 38000, 36500, 42000, 45000, 48000],
          borderColor: '#0ea5e9',
          backgroundColor: 'rgba(14, 165, 233, 0.1)',
          borderWidth: 2,
          fill: true,
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              display: true,
              color: 'rgba(0, 0, 0, 0.05)'
            },
            ticks: {
              callback: function(value) {
                return '$' + value.toLocaleString();
              }
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      }
    });

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(categoryCtx, {
      type: 'doughnut',
      data: {
        labels: ['Electronics', 'Outdoor Gear', 'Tools', 'Vehicles', 'Party Supplies', 'Other'],
        datasets: [{
          data: [35, 25, 15, 12, 8, 5],
          backgroundColor: [
            '#0ea5e9',
            '#22c55e',
            '#eab308',
            '#ef4444',
            '#8b5cf6',
            '#94a3b8'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'right'
          }
        },
        cutout: '5%'
      }
    });
  </script>
  @endsection

