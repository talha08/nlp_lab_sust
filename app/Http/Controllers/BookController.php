<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();
        return view('book.index', compact('books'))->with('title',"All Book List");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create')->with('title',"Add new Book");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->book_details = $request->book_details;
       // $book->book_image = $request->book_image;
        $book->book_link1 = $request->book_link1;
        $book->book_link2 = $request->book_link2;
        $book->book_link3 = $request->book_link3;
        $book->user_id =  \Auth::user()->id;
        $book->book_meta_data =  md5($request->book_name);
        $book->save();

        return redirect()->back()->with('success', 'Book Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('book.edit', compact('book'))->with('title',"Edit Book");
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
        $book = Book::findOrFail($id);
        $book->book_name = $request->book_name;
        $book->book_details = $request->book_details;
        // $book->book_image = $request->book_image;
        $book->book_link1 = $request->book_link1;
        $book->book_link2 = $request->book_link2;
        $book->book_link3 = $request->book_link3;
        $book->user_id =  \Auth::user()->id;
        //$book->book_meta_data =  md5($request->book_name);
        $book->save();

        return redirect()->back()->with('success', 'Book Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('book.index')->with('success',"Book Successfully deleted");
    }



}
