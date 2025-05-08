<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Rental Cart
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
 </head>
 <body class="bg-[#fcf7f1] min-h-screen p-6">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-6">
   <section class="flex-1 bg-white rounded-xl p-6">
    <div class="flex items-center gap-3 mb-6">
     <a href="/home">
     <i class="fas fa-arrow-left text-2xl text-[#2f2f2f]">
     </i>
     </a>
     <h1 class="text-2xl font-normal text-[#4a4a4a]">
      My Rental Cart
     </h1>
    </div>
    <div class="flex items-center gap-4 border-b border-gray-300 pb-4 mb-4">
    </div>
    @foreach($products as $product)
    <div class="flex gap-6 border-b border-gray-300 pb-4 mb-6 relative">
     <img alt="White 2013 Travel Trailer - 23’ Jayco X23F Hybrid parked on grass with trees in background" class="w-36 h-36 object-cover rounded" height="140" src="https://storage.googleapis.com/a1aa/image/2fe60cb3-cf0b-4536-29ce-7e393d6305af.jpg" width="140"/>
     <div class="flex-1 flex flex-col justify-between">
      <div>
       <h3 class="font-semibold text-[#2f2f2f] text-lg leading-tight">
       {{ $product['title']}}
       </h3>
       <p class="text-[#4a4a4a] mt-1 text-base">
        MAD{{$product['price']}}
       </p>
      </div>
      <div class="flex items-center gap-2 mt-3">
       <button onclick="changeQuantity(-1)" aria-label="Decrease quantity" class="text-gray-600 bg-gray-300 rounded px-2 py-1 cursor-pointer select-none">
        <i class="fas fa-minus">
        </i>
       </button>
       <div  class="border border-[#b87e3a] rounded px-4 py-2 text-[#b87e3a] font-semibold select-none">
        Qty: <span  id="quantity" >   {{$product['quantity']}} </span>
       </div>
       <button onclick="changeQuantity(1)" aria-label="Increase quantity" class="text-gray-600 bg-gray-300 rounded px-2 py-1 cursor-pointer select-none">
        <i class="fas fa-plus">
        </i>
       </button>
       <form action="" id="quantity-form" method="post">
       @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{$product['id']}}" id="">
         <input type="hidden" id="updatedQuantity"  name="quantity">
       <button  type="submit" class="bg-[#b87e3a] text-white rounded px-4 py-2 font-semibold mt-2">
    Update Quantity
  </button>
  </form>
      </div>
      <p class="text-[#4a4a4a] text-sm mt-3">

      {{$product['startedate']}}- {{$product['finaledate']}}
      </p>
     </div>
     <form action="" method="post">
        @csrf
        @method('delete')
        <input type="hidden" name="product_id" value="{{$product['id']}}">
         <button type="submit" aria-label="Remove item" class="absolute top-0 right-0 text-2xl text-[#2f2f2f] hover:text-black">
             ×
            </button>
    </form>
    </div>
    @endforeach

    <button class="w-full bg-[#dd7a5a] text-white rounded-xl py-5 text-lg font-normal flex justify-end items-center gap-3 px-8 hover:bg-[#c96a4a] transition">
     <span>
      Sub Total:
      <strong>
      ${{$totalprice}}
      </strong>
     </span>
     <span class="underline font-semibold">
      Request To Rent
     </span>
     <i class="fas fa-arrow-right text-xl">
     </i>
    </button>
   </section>
   <aside class="w-full md:w-[360px] bg-white rounded-xl p-6 shadow-lg flex flex-col justify-between">
    <div>
     <h2 class="text-xl font-normal text-[#2f2f2f] mb-4">
      Estimated Total:
     </h2>
     <hr class="border-gray-300 mb-4"/>


     <div class="flex justify-between text-[#4a4a4a] text-sm mb-1">
      <span>
       Subtotal
      </span>
      <span>
       ${{$totalprice}}
      </span>
     </div>
     <div class="flex justify-between text-[#4a4a4a] text-sm mb-4">
      <span>
       Rent Anything Store free *
      </span>
      <span>
       $0.00
      </span>
     </div>
     <div class="flex justify-between text-[#2f2f2f] font-bold text-lg mb-2">
      <span>
       Total price
      </span>
      <span>
       {{$totalprice}}
      </span>
     </div>
     <p class="text-xs text-[#b0b0b0] mb-6">
      * The fee helps us run this platform and provide the best possible service
          to you!
     </p>
    </div>
    <form action="" method="post">

        <button class="bg-[#2f3941] text-white font-semibold rounded-lg py-4 w-full shadow-[6px_6px_0_0_rgba(221,122,90,0.5)] hover:shadow-[4px_4px_0_0_rgba(221,122,90,0.5)] transition">
            Go to checkout
        </button>
    </form>
   </aside>
  </div>
  <script>
    function changeQuantity(number)
    {
        let newquantity = parseFloat(document.getElementById('quantity').textContent) + number ;
        if(newquantity >= 1)
        document.getElementById('quantity').innerHTML = newquantity ;

    }
    document.getElementById('quantity-form').addEventListener('submit' , function ()
    {
        let quantity = document.getElementById('quantity').textContent ;

        document.getElementById('updatedQuantity').value = quantity;
        console.log(document.getElementById('updatedQuantity').value);
    })
  </script>
 </body>
</html>
