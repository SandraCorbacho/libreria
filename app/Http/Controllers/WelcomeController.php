<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\User;
use App\Models\Categorie;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $books = Book::get();
     
        return view('welcome',[
            'books' => $books,
            'categories' => Categorie::get(),
            'authors' => Author::get()
        ]);
    }

    public function admin()
    {
        $books = Book::get();
        $totalUsers = User::get();
        
        return view('admin.home',[
            'books' => $books,
            'users' => $totalUsers,
            'categories' => $books,
            'orders' => $books
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function author($id){
        $books = new Book;
        $books = $books->getByAuthor($id);
        return view('welcome',[
            'books' => $books,
            'categories' => Categorie::get(),
            'authors' => Author::get()
        ]);
     }
}
