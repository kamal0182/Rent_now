<?php
namespace App\Repositories\Concrats ;

use PhpParser\Node\Expr\Cast\String_;
use Ramsey\Uuid\Type\Integer;

interface  CategorieRepositoryInterface {
    public function create (array $data);
    public function update(array $data);
    public function delete  ($id);
    public function findByName(String $name);
    public function findById($id);
    public function allCategories();
}
