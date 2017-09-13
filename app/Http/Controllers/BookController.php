<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $books = Book::all();
        //echo "<pre>";print_r($books);exit;
        return view('book/bookindex', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('bookadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $book           = new book;
        $book->title    = $request->input('title');
        $book->isbn     = $request->input('isbn');
        $book->author   = $request->input('author');
        $book->category = $request->input('category');
        $book->save();
        return Redirect::route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $book = Book::where('_id', '=', $id)->get();
        return view('bookview', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $book = Book::where('_id', '=', $id)->get();
        return view('bookedit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        Book::where('_id', '=', $id)
                ->update([
                    'title'    => $request->input('title'),
                    'isbn'     => $request->input('isbn'),
                    'author'   => $request->input('author'),
                    'category' => $request->input('category')
        ]);
        return Redirect::route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Book::where('_id', '=', $id)->delete();
        return Redirect::route('books.index');
    }

}
