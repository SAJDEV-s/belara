<?php

namespace SAJDEV\belara\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'title',
        'slug',

        'category_id'
    ];
    protected $table='blog_categories';

    public function blogs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Blog::class,'category_id','id');
    }


}
