<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table="books";

    public function editions(){
        return $this->hasMany(Edition::class);
    }
    public function getAutheur(){
        return $this->hasMany(Auteur::class);
    }
    public function getComment(){
        return $this->hasMany(Comments::class);
    }
}
