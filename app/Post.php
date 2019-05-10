<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $dates = ['date', 'publish_date', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withTrashed();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
