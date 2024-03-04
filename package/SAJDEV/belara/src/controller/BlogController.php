<?php

namespace SAJDEV\belara\controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use SAJDEV\belara\model\Blog;
use SAJDEV\belara\model\BlogCategory;

class BlogController extends Controller
{
    public function show($slug)
    {
        $blog=Blog::where('slug',$slug)->first();
        return view('belara::blog',compact('blog'));
    }
    public function create()
    {
        $users=User::get();
       $categores=BlogCategory::get(); 
        return view('belara::createblog',compact('categores','users'));
    }
    
    public function store(Request $request)
    {
        // dd($request);

        $imageName=null;
        $file=$request->file('image');
        if (isset($file)){
            $imageName=rand(1,99999999).$file->getClientOriginalName();
            $file->move(public_path('media'),$imageName);
        }

        Blog::query()->create([
            'title'         =>   $request->title,
            'slug'          =>   $request->slug,
            'description'   =>   $request->description,
            'body'          =>   $request->body,
            'main_image'    =>   $imageName,
            'is_published'  =>   $request->is_published,
            'metas'          =>  $request->metas,

            'author'        =>   $request->author,
            'category_id'   =>   $request->category_id ,

        ]);

        // return back()->status(200);
    }

    public function edit()
    {
// return view('belara::createblog');

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

        // return back()->status(200);
    }

    public function delete()
    {
        dd('delete');
    }
}
