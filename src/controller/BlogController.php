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
        $blog = Blog::where('slug', $slug)->first();
        return view('belara::blog', compact('blog'));
    }

    public function create()
    {
        $users=[];
        if (config('belara.author')){
            $users = User::query()->get();
        }
        $categores = BlogCategory::query()->get();
        return view('belara::createblog', compact('categores', 'users'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        if (config('belara.author')) {
            Validator::make($request->all(), [
                'title' => 'required|max:255|min:3',
                'slug' => 'required|max:255|min:1|unique:blogs,slug',
                'description' => 'nullable',
                'main_image' => 'image|nullable|size:2000|mimes:png,jpg,gif,jpeg,webp',
                'is_published' => 'required|boolean',
                'metas' => 'required|max:255',
                'author' => 'required|exists:users,id',
                'category_id' => 'exists:blog_categories,id|required'
            ])->validate();
        } else {
            Validator::make($request->all(), [
                'title' => 'required|max:255|min:3',
                'slug' => 'required|max:255|min:1|unique:blogs,slug',
                'description' => 'nullable',
                'main_image' => 'image|nullable|size:2048|mimes:png,jpg,gif,jpeg,webp',
                'is_published' => 'required|boolean',
                'metas' => 'required|max:255',
                'author' => 'required|max:255',
                'category_id' => 'required|exists:blog_categories,id',
            ])->validate();
        }

        $imageName = null;
        $file = $request->file('image');
        if (isset($file)) {
            $imageName = rand(1, 99999999) . $file->getClientOriginalName();
            $file->move(public_path('media'), $imageName);
        }

        Blog::query()->create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'body' => $request->body,
            'main_image' => $imageName,
            'is_published' => $request->is_published,
            'metas' => $request->metas,
            'links_block' => config('belara.blockLinks') ? $request->links : null,

            'author' => $request->author,
            'category_id' => $request->category_id,
        ]);

    }

    public function edit($blog)
    {
        $blog = Blog::query()->where('id', $blog)->first();
        $users=[];
        if (config('belara.author')){
            $users = User::query()->get();
        }
        $categores = BlogCategory::query()->get();
        return view('belara::editblog', compact('blog','users','categores'));
    }

    public function update(Request $request,  $blog)
    {

        $blog = Blog::query()->where('id', $blog)->first();
        if (config('belara.author')) {
            Validator::make($request->all(), [
                'title' => 'required|max:255|min:3',
                'slug' => 'required|max:255|min:1|unique:blogs,slug,'.$blog->id,
                'description' => 'nullable',
                'main_image' => 'image|nullable|size:2000|mimes:png,jpg,gif,jpeg,webp',
                'is_published' => 'required|boolean',
                'metas' => 'required|max:255',
                'author' => 'required|exists:users,id',
                'category_id' => 'exists:blog_categories,id|required'
            ])->validate();
        } else {

            Validator::make($request->all(), [
                'title' => 'required|max:255|min:3',
                'slug' => 'required|max:255|min:1|unique:blogs,slug,'.$blog->id,
                'description' => 'nullable',
                'main_image' => 'image|nullable|size:2048|mimes:png,jpg,gif,jpeg,webp',
                'is_published' => 'required|boolean',
                'metas' => 'required|max:255',
                'author' => 'required|max:255',
                'category_id' => 'required|exists:blog_categories,id',
            ])->validate();
        }
        if (isset($blog)) {

        $blog->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'body' => $request->body,
            'is_published' => $request->is_published,
            'metas' => $request->metas,
            'links_block' => config('belara.blockLinks') ? $request->links : null,


            'author' => $request->author,
            'category_id' => $request->category_id,
        ]);
        return back();
        }

         return abort(404);
    }

    public function delete($blog)
    {
        $blog = Blog::query()->where('id', $blog)->first();
       if (isset($blog)){
           $blog->delete();
       }
       return abort(404);
    }
}
