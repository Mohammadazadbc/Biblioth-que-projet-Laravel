<?php

namespace App\Http\Controllers;
use App\Models\Book;


use Illuminate\Http\Request;

class BookController extends Controller
{

    function addMember(Request $req){
        $book = new Book();
        $book->titre = $req->titre;
        $book->publishDate = $req->publishDate;
        $book->coverImg = $req->file('coverImg')->store('books');
        $book->ISBNNumber =  $req->ISBNNumber;
        $result = $book->save();
        if($result){
            return ["message"=> "Data has been saved"];
        }
        else{
            return ["message"=>"Data has been not saved"];
        }
        
    }
    function BookList(){
        return Book::all();
    }
    function DeleteBook($id){
        $book = Book::find($id);
        $reuslt = $book->delete();
        if($reuslt){

            return ["Book has been"=>"Deleted"];
        }else{
            return ["Book has been"=>" Not Deleted"];
        }
    }

    function showBookEdition($id){
        $book = Book::find($id);
        $edtion = $book->editions;
        return $edtion;
    }
    function showBookAuteur($id){
        $book = Book::find($id);
        $auth = $book->getAutheur;
        return $auth;
    }
    function SearchBook($titre){
        return Book::where("titre","like","%".$titre."%")->get();
    }
}
