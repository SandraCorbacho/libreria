<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function getById($id){
        return $this->where('id',$id)->first(); 
    }
    public function book(){
        return $this->hasMany(Book::class,'id','author_id')->get();
    }
    
}
