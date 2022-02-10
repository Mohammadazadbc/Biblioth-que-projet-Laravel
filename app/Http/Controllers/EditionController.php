<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;

class EditionController extends Controller
{
    //
    function addEdtition(Request $req, $id){
        $edtion = new Edition();
        $edtion->book_id = $id;
        $edtion->maisonEdition = $req->maisonEdition;
        $edtion->save();
        return ["saved"];  
    }
    function showEditions(){
        return Edition::all();
    }
    function DeleteEdition($id){
        $edition = Edition::find($id);
        $reuslt = $edition->delete();
        if($reuslt){

            return ["Edition has been"=>"Deleted"];
        }else{
            return ["Edition has been"=>" Not Deleted"];
        }
    }

}
