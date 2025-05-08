<?php
namespace App\Repositories\Concrats;

use App\Models\Categorie;
use App\Models\Product;

interface   ProductRepositoryInterface {
    public function create($data , $x , $y , $images);
    public function update($data , $langitude , $latitude , $images)  ;
    public function delete( $id);
    public function findById($id);
    public function allProductCategorie(Product $product) : Categorie ;
    public function allProductTags(Product $product) : array ;
    public function allProducts($perPage);
    public function updateStatus($data);
    public function allProductsFilterByStatus($int , $status);
    public function countProductsFilterByStatus($status);
    public function all();

}
