<?php

namespace App\Models;

use App\Http\Traits\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory, Search;

    protected $fillable = ['title', 'content', 'slug', 'image', 'galery', 'published_at', 'user_id', 'category_id','created_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deleteImage()
    {
        Storage::delete('/public/' . $this->image);
    }

}
