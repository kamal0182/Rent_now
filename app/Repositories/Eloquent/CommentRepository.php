<?php
namespace App\Repositories\Eloquent ;
use App\Models\Comment;
use App\Models\Product;
use App\Repositories\Concrats\CommentRepositoryInterface as ConcratsCommentRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements ConcratsCommentRepositoryInterface {
    public Comment $commentModel ;
    public function __construct(Comment $commentModel)
    {
        $this->commentModel = $commentModel ;
    }
    public function createAndAssociate($data , $productid)
    {
        $product = Product::find($productid);
        $this->commentModel->content = $data['content'];
        $this->commentModel->product()->associate($product);
        $user = Auth::user();
        $this->commentModel->user()->associate($user);
        $this->commentModel->save();
    }
    public function update($data)
    {
        $comment = $this->findById($data['comment_id']);
        $comment->content = $data['comment_content'];
        $comment->save();

    }
    public  function findById($id){
        $comment  = Comment::find($id);
        return $comment ;
    }
    public function delete($id)
    {
        $comment = $this->findById($id);
        $comment->delete() ;
    }
}
