<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name','pvp','pvp_disount','stock','author_id'];

    public function getById($id){
        return $this->where('id',$id)->first();
    }
    public function author(){
        return $this->hasOne(Author::class,'id','author_id')->first();
    }
    
}
