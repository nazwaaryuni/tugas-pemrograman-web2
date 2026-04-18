<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book', function () {
    return view('book.index', ['title' => 'Book']);
});

Route::get('/book/create', function () {
    return view('book.create', ['title' => 'Create Books']);
});
