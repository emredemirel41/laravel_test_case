<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BookController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();
        return $this->successResponse($data, 'Books List');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
         //Validation
         $validator = Validator::make($input, [
            'title' => 'required|max:255',
            'release_date' => 'required',
            'description' => 'required|max:255',
            'isbn' => 'required',
            'format' => 'required',
            'number_of_pages' => 'required|numeric|min:1',
            'author_id' => 'required'
        ]);

        //Validation Control
        if ($validator->fails()) {
            return $this->errorResponse('Invalid Format', 403, $validator->errors());
        }

        if(!Author::find($request->author_id)){
            return $this->errorResponse('Invalid Format', 403, 'The Author is not exist');
        }


        //Create Book
        $book = Book::create($input);
        return $this->successResponse($book, 'Book Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //This part is not required at the moment
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //This part is not required at the moment
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return $this->successResponse(null, 'Book Deleted');
    }
}
