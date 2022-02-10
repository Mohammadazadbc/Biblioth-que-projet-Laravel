<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    use HasFactory;
    protected $table="auteurs";

    public function getBook(){
        return $this->belongsTo(Book::class);
    }
}
