Make it easier by using the belara(laravel-blog)


#### Composer Install (for Laravel 8+)

	composer require sajdev/belara


#### in your config/app.php 
```php
'providers' => [
	...
  \SAJDEV\belara\belaraProvider::class
],
```
#### Publish and Run the migrations

```bash
php artisan vendor:publish --tag=belaraMigarte 

php artisan migrate
```

#### Publish vendor (config,public(*),view)
```bash

php artisan vendor:publish --tag=belara

php artisan vendor:publish --tag=belaraPublic

php artisan vendor:publish --tag=belaraView

```

#### run your app 
```bash

 php  artisan serve

```

#Default routes
#### route('blog.create')
#### /admin/blog/create   

#### route('blog.edit',['id']=> blogId)
#### /admin/blog/{id}/edit

#### route('blog.delete',['id'=>blogId])
#### /admin/blog/{id}/delete

#### route('blogCategory.create')
#### /admin/blogCategory/create   

#### route('blogCategory.edit',['id']=> blogCategoryId)
#### /admin/blogCategory/{id}/edit

#### route('blogCategory.delete',['id'=>blogCategoryId])
#### /admin/blogCategory/{id}/delete







#### models 

```php
  \SAJDEV\belara\model\Blog

  \SAJDEV\belara\model\BlogCategory
```



### if in config/belara.php author in true use this (Models/User.php)
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use SAJDEV\belara\model\Blog;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author', 'id');
    }
}
```




