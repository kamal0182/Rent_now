<?php
namespace App\Repositories\Concrats ;
interface LocationRepositoryInterface
{
    public function  create($x, $y) ;
    public function update($x, $y);
    public function delete($id);
}
