<?php

namespace App\Repositories\Eloquent;

use App\Models\Categorie;
use App\Repositories\Concrats\CategorieRepositoryInterface;

class CategorieRepository implements CategorieRepositoryInterface
{
    public Categorie $categorie;
    public  function __construct(Categorie  $categorie)
    {
        $this->categorie = $categorie;
    }
    public function delete($id)
    {
        $categorie = $this->findById($id);
        $categorie->delete();
    }
    public function create($data)
    {
        $this->categorie->name = $data['name'];
        $this->categorie->description = $data['description'];
        $this->categorie->save();
    }

    public function update($data)
    {

        $categorie = $this->findById($data['categorie_id']);
        $categorie->name = $data['name'];
        $categorie->description = $data['description'];
        $categorie->save();
    }
    public function findByName(string $name)
    {
        $categorie  = Categorie::where('name', $name)->first();
        return $categorie;
    }
    public function  findById($id)
    {
        $categorie = Categorie::find($id);
        return $categorie;
    }
    public function allCategories()
    {
        return Categorie::all();
    }
}
