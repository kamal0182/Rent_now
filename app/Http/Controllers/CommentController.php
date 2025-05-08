<?php

namespace App\Http\Controllers;

use App\Models\Comment as ModelsComment;
use App\Repositories\Concrats\CommentRepositoryInterface as ConcratsCommentRepositoryInterface;
use CommentRepository;
use CommentRepositoryInterface;
use Dom\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public $CommentRepository;
    public function __construct(ConcratsCommentRepositoryInterface $comment)
    {
        $this->CommentRepository = $comment ;
    }
    public function addComment(Request  $request , $productid)
    {
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $this->CommentRepository->createAndAssociate($data, $productid);
        return back();

    }
    public function updateComment(Request $request)
    {
        $data = $request->validate([
            'comment_content' => 'required|string',
            'comment_id' => 'required|integer'
        ]);
        $comment = $this->CommentRepository->update($data);
        return back();
    }

    public function delete(Request $request)
    {
        $data = $request->validate([
            'comment_id' => 'required|integer'
        ]);
        $comment = $this->CommentRepository->delete($data['comment_id']);
        return back();
    }
}
