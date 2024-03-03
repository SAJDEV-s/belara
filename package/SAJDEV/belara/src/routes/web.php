<?php
use Illuminate\Support\Facades\Route;

#blog
Route::get('/blog', function () {
    return view('belara::blog');
});
Route::get('/createblog', function () {
    return view('belara::createblog');
});
#category
Route::get('/category', function () {
    return view('belara::category');
});
Route::get('/createcategory', function () {
    return view('belara::createcategory');
});