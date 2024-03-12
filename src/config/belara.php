<?php

return [
    // if true foreign to users id ;  false just a text
    'author'=>false,
    // if you need
    'blockLinks'=>true,
    // prefix for routes
    'prefix'=>'admin',
    // middlewares
    'middlewares'=>[],
    // redirect when create a new blog (route)
    'redirectCreateBlog'=>null, // example 'redirectCreateBlog'=>'blog.index'
      // redirect when edit a blog (route)
    'redirectEditBlog'=>null,
    // redirect when create a new CategoryBlog (route)
    'redirectCreateCategoryBlog'=>null,
    // redirect when edit a CategoryBlog (route)
    'redirectEditCategoryBlog'=>null,

];
