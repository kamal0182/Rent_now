<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Repositories\Concrats\CategorieRepositoryInterface;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class CategorieController extends Controller
{
    public $categorieRepository ;
    public function __construct(CategorieRepositoryInterface $categorie )
    {
        $this->categorieRepository  = $categorie ;
    }
    public function showdata(Request $request)
    {

        dd($request->session()->get('cart'));
        $title = 'Gestion des utilisateurs';
        $data = Product::all();
        $thead = ['title', 'description', 'price', 'status','categorie'];
        return view('useless.test', compact('data','title','thead'));


    }
    public function index()
    {
        $categories =  $this->categorieRepository->allCategories();
        return view('admin.categories',compact('categories'));

    }
    public function createcategorie(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $this->categorieRepository->create($validatedData);
        return back();
    }


    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'categorie_id' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $categorie = $this->categorieRepository->update($validatedData);
        return back();
    }
    public function delete(Request $request)
    {
        $categorie = $this->categorieRepository->delete($request->categorie_id);
        return back();
    }
}
