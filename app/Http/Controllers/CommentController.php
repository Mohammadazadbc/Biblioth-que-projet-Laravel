<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comments;
class CommentController extends Controller
{
    //
    function addCommnet(Request $req, $id) {
        $comment = new Comments();
        $comment->comment = $req->comment;
        $comment->book_id = $id;
        $result = $comment->save();
        if($result){
            return ["Commnet "=> "Added"];
        }
        else{
            return ["Commnet "=> "Not added"];
        }
        
    }
    function showCommnet(){
        return Comments::all();
    }
    
}
