<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index')->with('books', $books);
    }
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->with('book', $book);
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|size:13',
            'stock' => 'required|numeric|integer|gte:0',
            'price' => 'required|numeric'
        ];
        $messege = ['stock.gte' => 'The number must be greater than equql to 0 '];
        $request->validate($rules, $messege);

        Book::create($request->all());
        return redirect()->route('books.index');
    }
    
    public function destroy(Request $request, $id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
