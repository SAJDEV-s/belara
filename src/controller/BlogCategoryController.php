<?php

namespace SAJDEV\belara\controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SAJDEV\belara\model\BlogCategory;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web']);
    }


    public function create()
    {
        $categores = BlogCategory::get();
        return view('belara::createcategory',compact('categores'));
        
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title' => 'required|max:255|min:3',
            'slug' => 'required|max:255|min:1|unique:blog_categories,slug',

            'category_id'=>'nullable|exists:blog_categories,id'
        ])->validate();
        BlogCategory::query()->create([
            'title'         =>   $request->title,
            'slug'          =>   $request->slug,

            'category_id'   =>   $request->category_id !=null ? $request->category_id : null,

        ]);

        // return back()->status(200);
    }

    public function edit($category)
    {

        $category = BlogCategory::query()->where('id',$category)->first();


        if (isset($category)){
            $categories= BlogCategory::query()->get();
            return view('belara::editcategory',compact('category','categories'));
        }
        return  abort(404);

    }

    public function update(Request $request, $blogCategory)
    {
        Validator::make($request->all(),[
            'title' => 'required|max:255|min:3',
            'slug' => 'required|max:255|min:1|unique:blog_categories,slug,'.$blogCategory,

            'category_id'=>'nullable|exists:blog_categories,id'
        ])->validate();
        $blogCategory = BlogCategory::query()->where('id',$blogCategory)->first();

        if (isset($blogCategory)){

            $blogCategory->update([
                'title'         =>   $request->title,
                'slug'          =>   $request->slug,

                'category_id'   =>   $request->category_id !=null ? $request->category_id : null,
            ]);
            return  back();
        }
        return   abort(404);
    }

    public function delete()
    {
dd('delete');
    }
}
