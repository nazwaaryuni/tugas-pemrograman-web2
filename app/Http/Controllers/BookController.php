<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('book.index', [
            'title' => 'Book',
            'books' => Book::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create', ['title' => 'Create Book']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'publisher' => 'required|max:255',
        'year' => 'required|integer|min:1000|max:9999',
        'isbn' => 'required|integer|unique:books',
        'stock' => 'required|integer|min:0'
    ], [
        'title.required'     => 'Judul buku wajib diisi',
        'title.max'          => 'Judul buku tidak boleh lebih dari :max karakter',
        'author.required'    => 'Penulis wajib diisi',
        'author.max'         => 'Penulis tidak boleh lebih dari :max karakter',
        'publisher.required' => 'Penerbit wajib diisi',
        'publisher.max'      => 'Penerbit tidak boleh lebih dari :max karakter',
        'year.required'      => 'Tahun terbit wajib diisi',
        'year.integer'       => 'Tahun terbit harus berupa angka',
        'year.min'           => 'Tahun terbit minimal :min',
        'year.max'           => 'Tahun terbit maksimal :max',
        'isbn.required'      => 'ISBN wajib diisi',
        'isbn.integer'       => 'ISBN harus berupa angka',
        'isbn.unique'        => 'ISBN sudah terdaftar',
        'stock.required'     => 'Stok wajib diisi',
        'stock.integer'      => 'Stok harus berupa angka',
        'stock.min'          => 'Stok tidak boleh kurang dari :min',
    ]);

    Book::create($validated);
    return to_route('book.index')->withSuccess('Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'title' => 'Edit Book',
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'publisher' => 'required|max:255',
        'year' => 'required|integer|min:1000|max:9999',
        'isbn' => 'required|integer|unique:books,isbn,' . $book->id,
        'stock' => 'required|integer|min:0'
    ], [
        'title.required'     => 'Judul buku wajib diisi',
        'title.max'          => 'Judul buku tidak boleh lebih dari :max karakter',
        'author.required'    => 'Penulis wajib diisi',
        'author.max'         => 'Penulis tidak boleh lebih dari :max karakter',
        'publisher.required' => 'Penerbit wajib diisi',
        'publisher.max'      => 'Penerbit tidak boleh lebih dari :max karakter',
        'year.required'      => 'Tahun terbit wajib diisi',
        'year.integer'       => 'Tahun terbit harus berupa angka',
        'year.min'           => 'Tahun terbit minimal :min',
        'year.max'           => 'Tahun terbit maksimal :max',
        'isbn.required'      => 'ISBN wajib diisi',
        'isbn.integer'       => 'ISBN harus berupa angka',
        'isbn.unique'        => 'ISBN sudah terdaftar',
        'stock.required'     => 'Stok wajib diisi',
        'stock.integer'      => 'Stok harus berupa angka',
        'stock.min'          => 'Stok tidak boleh kurang dari :min',
    ]);

    $book->update($validated);
    return to_route('book.index')->withSuccess('Data Buku Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
