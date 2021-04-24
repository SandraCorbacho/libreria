<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',[
            'books' => Book::get(),
            'location' => 'Libro',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create',[
            'location' => 'Libro Nuevo',
            'autores' => Author::get(),
            'categorias' => Categorie::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|unique:books',
            'iban' => 'required|unique:books',
            'pvp' => 'required',
            'author' => 'required',
            'stock' => 'required',
            'categoria_id' => 'required'
        ]);
            if($validated){
                $book = new Book;
                $book->name = $request->name;
                $book->iban = $request->iban;
                $book->pvp = $request->pvp;
                $book->pvp_discount = $request->pvp_discount;
                $book->categoria_id = $request->categoria_id;
                $book->author_id = $request->author;
                $book->stock = $request->stock;
                $book->save();
                return redirect()->route('book.index');
            }
        return redirect()->back()->withErrors($validated)->withInput();
           
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book =  $this::where('id',$id)->first();
        dd($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book =  new Book;
        $book = $book->getById($id);

        return view('admin.products.edit',[
            'location' => 'Editar Libro',
            'book' => $book,
            'autores' => Author::get(),
            'categorias' => Categorie::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required',Rule::unique('books')->ignore($id)],
            'iban' => ['required',Rule::unique('books')->ignore($id)],
            'pvp' => ['required'],
            'author' => ['required'],
            'stock' => ['required'],
            'categoria_id' => ['required']
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        };
            $book =  new Book;
            $book = $book->getById($id);   
            $book->name = $request->name;
            $book->author_id = $request->author;
            $book->iban = $request->iban;
            $book->categoria_id = $request->categoria_id;
            $book->pvp = $request->pvp;
            if($request->pvp_discount != null){
                $book->pvp_discount = $request->pvp_discount;
            }
            $book->stock = $request->stock;
            $book->update();
            return redirect()->route('book.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
