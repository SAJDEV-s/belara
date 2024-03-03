<?php

namespace SAJDEV\belara\controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SAJDEV\belara\model\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('belara::category');
    }
    public function create()
    {
        return view('belara::createcategory');
        
    }

    public function store(Request $request)
    {

        BlogCategory::query()->create([
            'title'         =>   $request->title,
            'slug'          =>   $request->slug,

            'category_id'   =>   $request->category_id !=null ? $request->category_id : null,

        ]);

        return back()->status(200);
    }

    public function edit()
    {

    }

    public function update(Request $request,BlogCategory $blogCategory)
    {
        if (empty($blogCategory[0])){
            abort(404);
        }
        $blogCategory->query()->update([
            'title'         =>   $request->title,
            'slug'          =>   $request->slug,

            'category_id'   =>   $request->category_id !=null ? $request->category_id : null,
        ]);

        return back()->status(200);

    }

    public function delete()
    {
dd('delete');
    }
}
