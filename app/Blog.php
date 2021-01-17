<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{

    protected $fillable = ['thumnail', 'title', 'slug', 'body', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
