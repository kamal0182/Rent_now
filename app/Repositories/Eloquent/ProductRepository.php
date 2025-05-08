<?php
namespace App\Repositories\Eloquent ;

use App\Models\Categorie;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\Concrats\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProductRepository implements ProductRepositoryInterface{
    public Product $productModel ;
    public  $categorieRepository ;
    public $userRepository ;
    public $locationrepository ;
    public $rentwayRepository ;
    public function __construct(Product  $product , CategorieRepository $categorieRepository , LocationRepository $location , RentWayRepository $rentway , UserRepository $userRepository)
    {
        $this->productModel = $product ;
        $this->categorieRepository = $categorieRepository ;
        $this->locationrepository = $location ;
        $this->rentwayRepository =  $rentway ;
        $this->userRepository  = $userRepository ;
    }
    public function create($data , $langitude , $latitude , $images)
    {
        $this->productModel->title  = $data['titel'] ;
        $this->productModel->description  = $data['description'] ;
        $this->productModel->price =  $data['prix'] ;
        $this->productModel->status = "en cours" ;
        $this->productModel->listing_status = "available" ;
        $categorie = $this->categorieRepository->findByName($data['categorie']);
        $this->productModel->quantity = $data['quantity'];
        $this->productModel->categorie()->associate($categorie);
        $location =  $this->locationrepository->create($langitude , $latitude);
        $this->productModel->location()->associate($location);
        $rentway = $this->rentwayRepository->findByName($data['rentway']);
        $this->productModel->rentway()->associate($rentway);
        $user = FacadesAuth::user();
        $this->productModel->renter()->associate(FacadesAuth::user());

        $role = $this->userRepository->findUserRole('Renter');
        $user->roles->attach($role);
        foreach($images as $image1)
        {

            $image = new Image();
            $image->photo =  $image1;
        }
        $this->productModel->save();
        foreach($images as $image1)
        {
            $image = new Image();
            $image->photo =  $image1;
            $this->productModel->images()->save($image);
        }
        return $this->productModel ;
    }
    public function update($data , $langitude , $latitude , $images)
    {
        $this->productModel->title  = $data['titel'] ;
        $this->productModel->description  = $data['description'] ;

        $this->productModel->price =  $data['prix'] ;
        $this->productModel->status = "en cours" ;
        $this->productModel->listing_status = "en cours" ;
        $categorie = $this->categorieRepository->findByName($data['categorie']);
        $this->productModel->quantity = $data['quantity'];
        $this->productModel->categorie()->associate($categorie);
        $location =  $this->locationrepository->create($langitude , $latitude);
        $this->productModel->location()->associate($location);
        $rentway = $this->rentwayRepository->findByName($data['rentway']);
        $this->productModel->rentway()->associate($rentway);
        $user = FacadesAuth::user();
        $this->productModel->renter()->associate(FacadesAuth::user());

    }
    public function delete($id)
    {
        $product = $this->findById($id);
        $product->delete();
    }
    public function countProductsFilterByStatus($status)
    {

    }
    public function  findById($id)
    {
        $product  = Product::find($id);
        return $product ;
    }
    public function allProductCategorie(Product $product) : Categorie
    {
        $categorie =  $product->categorie ;
        return $categorie ;
    }
    public function allProductTags(Product $product) : array
    {
        $tags = $product->tags;
        return $tags ;
    }
    public function allproductsrentals(Product $product)
    {
        $products = $product->rental();
        return $products ;
    }
    public function allProducts($perPage)
    {
        $products = Product::paginate($perPage);
        return $products;
    }
    public function all()
    {
        $products = Product::all();
        return $products ;
    }
    public function allProductsFilterByStatus($perPage , $status)
    {
        $products = Product::where('status',$status)->paginate($perPage);
        return $products ;
    }
    public function updateStatus($data)
    {
        $product = $this->findById($data['product_id']);
        $product->status = $data['status'];

        $product->save();

    }
}
