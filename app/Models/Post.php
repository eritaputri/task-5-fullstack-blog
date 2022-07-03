<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // untuk mengizikan properti yang boleh langsung diisi sekaligus dalam satu fungsi = Post::cretate([])
    //protected $fillable = ['title','excerpt','body'];

    //kolom yang tidak boleh diisi selain id boleh diisi
    protected $guarded = ['id'];
    protected $with = ['category','author'];

    // FUNGSI UNTUK MEMFILTER SEARCHING

    public function scopeFilter($query, array $filters)
    {
        // query versi ero function untuk biasa
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title','like','%' . $search . '%')
                        ->orWhere('body','like','%' . $search . '%');
        });

        // query versi callback function untuk category
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        // query versi ero function untuk author
        $query->when($filters['author'] ?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query)=>
                $query->where('username', $author)
            )
        );
    }

    // buat relasi one to one model ke category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
