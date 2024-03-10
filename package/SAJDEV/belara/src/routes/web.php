<?php
use Illuminate\Support\Facades\Route;
use SAJDEV\belara\controller\BlogController;
use SAJDEV\belara\controller\BlogCategoryController;
use SAJDEV\belara\controller\UploadImageController;

#blog
Route::prefix(config('belara.prefix'))->middleware(config('belara.middlewares'))->group(function (){
    Route::get('blog/show/{slug}',[BlogController::class,'show'])->name('blog.show');
    Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::post('blog/create',[BlogController::class,'store'])->name('blog.store');
    Route::get('blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
    Route::put('blog/{id}/edit',[BlogController::class,'update'])->name('blog.update');
    Route::delete('blog/{id}/delete',[BlogController::class,'delete'])->name('blog.delete');

    Route::get('blogCategory/create',[BlogCategoryController::class,'create'])->name('blogCategory.create');
    Route::post('blogCategory/create',[BlogCategoryController::class,'store'])->name('blogCategory.store');
    Route::get('blogCategory/{id}/edit',[BlogCategoryController::class,'edit'])->name('blogCategory.edit');
    Route::put('blogCategory/{id}/edit',[BlogCategoryController::class,'update'])->name('blogCategory.update');
    Route::delete('blogCategory/{id}/delete',[BlogCategoryController::class,'delete'])->name('blogCategory.delete');

#uploadCKImage

    Route::post('/upload',[UploadImageController::class,'uploadImage'])->name('ckeditor.upload');
});
