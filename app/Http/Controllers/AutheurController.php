<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;
use App\Models\Book;

class AutheurController extends Controller
{
    public function addAutheur(Request $req ,$id){
        $auth = new Auteur();
        $auth->auteur = $req->auteur;
        $auth->book_id= $id;
        $result = $auth->save();
        if($result){
            return ["auteur added"=> "succssfuly"];
        }
        else{
            return ["auteru added"=>"failed"];
        }
    }
    public function AuteurList(){
        return Auteur::all();
    }
    function DeleteAuteur($id){
        $auteur = Auteur::find($id);
        $reuslt = $auteur->delete();
        if($reuslt){

            return ["Auteur has been"=>"Deleted"];
        }else{
            return ["Auteur has been"=>" Not Deleted"];
        }
    }
 
}
