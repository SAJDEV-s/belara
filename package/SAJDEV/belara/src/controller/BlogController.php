<?php

namespace SAJDEV\belara\controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SAJDEV\belara\model\Blog;
use SAJDEV\belara\model\BlogCategory;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function show($slug)
    {
        $blog=Blog::where('slug',$slug)->first();
        return view('belara::blog',compact('blog'));
    }
    public function create()
    {
        $users=User::query()->get();
       $categores=BlogCategory::query()->get();
        return view('belara::createblog',compact('categores','users'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        // dd(session()->getOldInput());
        if (config('belara.author')){
            Validator::make($request->all(),[
                'title'=>'required|max:255|min:3',
                'slug'=>'required|max:255|min:1',
                'description'=>'nullable',
                'main_image'=>'image|nullable|size:2000|mimes:png,jpg,gif,jpeg,webp',
                'is_published'=>'required|boolean',
                'metas'=>'required|max:255',
                'author'=>'required|exists:users,id',
                'category_id'=>'exists:blog_categories,id|required'
                ])->validate();
            }else{
            
               $s= Validator::make($request->all(),[
                'title'=>'required|max:255|min:3',
                'slug'=>'required|max:255|min:1',
                'description'=>'nullable',
                'main_image'=>'image|nullable|size:2048|mimes:png,jpg,gif,jpeg,webp',
                'is_published'=>'required',
                'metas'=>'required|max:255',
                'author'=>'required|max:255',
                'category_id'=>'required|exists:blog_categories,id'
            ])->validate();
            

        }


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
