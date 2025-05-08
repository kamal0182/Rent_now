<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;

use App\Models\User;
use App\Notifications\ProductAdded;
use App\Repositories\Concrats\CategorieRepositoryInterface;
use App\Repositories\Concrats\ProductRepositoryInterface;
use App\Repositories\Concrats\RentalWayRepositoryInterface;
use App\Repositories\Concrats\TagRepositoryInterface;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public $productrepository;
    public $categoryRepository;
    public $tagRepository;
    public $rentWayRepository;

    public function __construct(
        ProductRepositoryInterface $product,
        CategorieRepositoryInterface $categorie,
        RentalWayRepositoryInterface $rentalRepository
    ) {
        $this->productrepository = $product;
        $this->categoryRepository = $categorie;
        $this->rentWayRepository = $rentalRepository;
    }
    public function allProductsFilterByStatus()
    {
        $products  = $this->productrepository->allProductsFilterByStatus(7, 'active');
        return view('aaa', compact('products'));
    }



    public function updateStatus(Request $request)
    {
        $data  = $request->validate([
            'product_id' => 'required|integer',
            'status' => 'required|string',
        ]);

        $products  = $this->productrepository->updateStatus($data);
        return redirect('admin/products');
    }
    public function showProductComment(Request $request, $productid)
    {
        $product = $this->findById($productid);
        return view('commentpage', compact('product'));
    }
    public function showEditForm($id)
    {
        $product = $this->productrepository->findById($id);
        $categories = $this->categoryRepository->allCategories();

        $rentways = $this->rentWayRepository->allRentways();
        return view('productForms.editProduct', compact('product', 'rentways', 'categories'));
    }

    public function showAllProducts()
    {
        $products  = $this->productrepository->allProducts(7);
        $totalProducts = count($this->productrepository->all());
        $totalActiveProducts = $this->productrepository->countProductsFilterByStatus(7, 'active');
        $totalNonActiveProducts = $this->productrepository->countProductsFilterByStatus('active');
        $totalNonActiveProducts = $this->productrepository->countProductsFilterByStatus('Inact');


        return view('admin.products', compact('products', 'totalProducts', 'totalNonActiveProducts'));
    }

    public function create(Request $request)
    {
        $validateddata  = $request->validate([
            'titel' => 'required|string|',
            'description' => 'required|string',
            'prix' => 'required|int',
            'categorie' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'rentway' => 'required|string',
            'quantity' => 'required|int',
            // 'avatars.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($request->hasFile('avatars')) {
            $imagePaths = []; // To store the paths of uploaded images
            foreach ($request->file('avatars') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/avatars', $imageName);
                $imagePaths[] = $imagePath;
            }
        }
        $apiKey = '431b251968a44a8773b16d43824dfa69';
        $address = "{$validateddata['country']}, {$validateddata['city']}";
        $response = Http::get("http://api.positionstack.com/v1/forward", [
            'access_key' => $apiKey,
            'query' => $address,
        ]);
        $data = $response->json();
        $product = $this->productrepository->create($validateddata, $data['data'][0]['longitude'], $data['data'][0]['latitude'], $imagePaths);
        $users =  User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        foreach ($users as $admin) {
            $admin->notify(new ProductAdded($product));
        }
        return redirect('home');
    }
    public function showCustomerHomePage()
    {
        $products = $this->productrepository->allProducts(9);
        $categories = $this->categoryRepository->allCategories();
        return view('aaa', compact('products', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $validateddata  = $request->validate([
            'titel' => 'required|string|',
            'description' => 'required|string',
            'prix' => 'required|int',
            'categorie' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'rentway' => 'required|string',
            'quantity' => 'required|int',
            // 'avatars.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);


        if ($request->hasFile('avatars')) {
            $imagePaths = [];
            foreach ($request->file('avatars') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/avatars', $imageName);
                $imagePaths[] = $imagePath;
            }
        }
        $apiKey = '431b251968a44a8773b16d43824dfa69';
        $address = "{$validateddata['country']}, {$validateddata['city']}";
        $response = Http::get("http://api.positionstack.com/v1/forward", [
            'access_key' => $apiKey,
            'query' => $address,
        ]);
        $data = $response->json();

        $product = $this->productrepository->update($validateddata, $data['data'][0]['longitude'], $data['data'][0]['latitude'], $imagePaths);
        return  redirect('home');
    }

    public function findById($id)
    {
        $product = Product::find($id);
        return $product;
    }
    public function delete(Request $request)
    {

        $product = $this->productrepository->delete($request->id);
        return back();
    }
    public function showProductForm()
    {
        $categories = $this->categoryRepository->allCategories();

        $rentways = $this->rentWayRepository->allRentways();
        return view('productForms.product', compact('categories', 'tags', 'rentways'));
    }
    public function showProductDetail($id)
    {
        $categories = $this->categoryRepository->allCategories();
        $product = $this->productrepository->findById($id);

        return view('detailrent', compact('product', 'categories'));
    }
    public function search(Request $request)
    {

        $products = Product::where('title', 'LIKE', "%{$request->query('content')}%")->get();
        return response()->json([
            'products' => $products
        ]);
    }
    public function searchByCatgorie(Request $request)
    {
        $categorieName  =  $request->query('content');
        $categorie =  Categorie::where('name', '=', $categorieName)->first();
        $products = Product::where('categorie_id', $categorie->id)->get();

        return response()->json(
            [
                'products' => $products
            ]
        );
    }
}
