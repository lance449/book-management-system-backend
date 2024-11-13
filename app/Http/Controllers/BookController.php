<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return response()->json(Book::all(), 200);
    }

    public function show($id) {
        $book = Book::find($id);
        if ($book) {
            return response()->json($book, 200);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'genre' => 'required',
            'description' => 'required',
        ]);
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'genre' => 'required',
            'description' => 'required',
        ]);

        $book = Book::find($id);
        if ($book) {
            $book->update($request->all());
            return response()->json($book, 200);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }

    public function destroy($id) {
        $deleted = Book::destroy($id);
        if ($deleted) {
            return response()->json(['message' => 'Book deleted'], 200);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }
}
