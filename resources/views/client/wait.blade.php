<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Please Wait</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes spin {
      from {
        transform: rotate(0deg);
      }
      to {
        transform: rotate(360deg);
      }
    }
    .custom-spin {
      animation: spin 1.5s linear infinite;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full text-center">
    <div class="flex justify-center mb-6">
      <div class="custom-spin h-16 w-16 border-4 border-gray-200 border-t-blue-500 rounded-full"></div>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-2">Please Wait</h1>
    <p class="text-gray-600 mb-4">Your request is being processed...</p>
    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
      <div class="bg-blue-500 h-2.5 rounded-full animate-pulse" style="width: 45%"></div>
    </div>
    <p class="text-sm text-gray-500">This may take a few moments</p>
  </div>
</body>
</html>
