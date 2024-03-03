<?php

namespace SAJDEV\belara\controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SAJDEV\belara\model\Blog;

class BlogController extends Controller
{
    public function create()
    {

    }

    public function store(Request $request)
    {

        Blog::query()->create([
            'title'         =>   $request->title,
            'slug'          =>   $request->slug,
            'description'   =>   $request->description,
            'body'          =>   $request->body,
            'is_published'  =>   $request->is_published,
            'metas'          =>  $request->metas,

            'author'        =>   $request->author,
            'category_id'   =>   $request->category_id ,

        ]);

        return back()->status(200);
    }

    public function edit()
    {

    }

    public function update(Request $request,Blog $blog)
    {
        if (empty($blog[0])){
            abort(404);
        }
        $blog->query()->update([
            'title'         =>   $request->title,
            'slug'          =>   $request->slug,
            'description'   =>   $request->description,
            'body'          =>   $request->body,
            'is_published'  =>   $request->is_published,
            'metas'          =>  $request->metas,

            'author'        =>   $request->author,
            'category_id'   =>   $request->category_id ,
        ]);

        return back()->status(200);
    }

    public function delete()
    {

    }
}
