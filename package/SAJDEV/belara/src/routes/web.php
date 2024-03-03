<?php
use Illuminate\Support\Facades\Route;
use SAJDEV\belara\controller\BlogController;
use SAJDEV\belara\controller\BlogCategoryController;

#blog
Route::get('blog/{slug}',[BlogController::class,'show'])->name('blog.show');
Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('blog/create',[BlogController::class,'store'])->name('blog.store');
Route::post('blog/{id}/edit',[BlogController::class,'store'])->name('blog.edit');
Route::post('blog/{id}/edit',[BlogController::class,'store'])->name('blog.update');
Route::post('blog/{id}/delete',[BlogController::class,'delete'])->name('blog.delete');

#category
Route::get('blogCategory',[BlogCategoryController::class,'index'])->name('blogCategory.show');
Route::get('blogCategory/create',[BlogCategoryController::class,'create'])->name('blogCategory.create');
Route::post('blogCategory/create',[BlogCategoryController::class,'store'])->name('blogCategory.store');
Route::get('blogCategory/{id}/edit',[BlogCategoryController::class,'store'])->name('blogCategory.edit');
Route::put('blogCategory/{id}/edit',[BlogCategoryController::class,'store'])->name('blogCategory.update');
Route::delete('blogCategory/{id}/delete',[BlogCategoryController::class,'delete'])->name('blogCategory.delete');


// Route::get('/blog', function () {
//     return view('belara::blog');
// });
// Route::get('/createblog', function () {
//     return view('belara::createblog');
// });
// #category
// Route::get('/category', function () {
//     return view('belara::category');
// });
// Route::get('/createcategory', function () {
//     return view('belara::createcategory');
// });