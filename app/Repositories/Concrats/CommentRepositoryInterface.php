<?php
namespace App\Repositories\Concrats;


interface  CommentRepositoryInterface {
    public function createAndAssociate($data , $productid)  ;
    public function update($data)  ;
    public function delete ($id) ;
    public function findById($id);

}
