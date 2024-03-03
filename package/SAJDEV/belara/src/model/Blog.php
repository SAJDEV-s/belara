<?php

namespace SAJDEV\belara\model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'is_published',
        'metas',

        'author',
        'category_id',
    ];


    public function category()
    {
        $this->belongsTo(BlogCategory::class,'category_id');
    }

    public function author()
    {
        if (config('belara.author')){
            $this->belongsTo(User::class,'author','id');

        }
    }

}
