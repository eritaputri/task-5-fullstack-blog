<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "Judul pertama",
            "slug" => "judul-post-pertama",
            "author" => "erita",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit.
             Possimus quibusdam provident ipsa. Illum aperiam eveniet error molestias quasi,
              non autem. Eum natus hic quidem nisi tempore iste voluptate at ratione! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod quas porro incidunt ducimus voluptates debitis eius veritatis, reiciendis temporibus optio ab eligendi mollitia adipisci, et provident necessitatibus expedita minus? Quidem?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit nihil repellendus, id ullam aliquid velit non ipsa minus et magni excepturi quia rem tempore adipisci reiciendis. Tempora fugit nostrum similique!Lorem"
        ],
        [
            "title" => "Judul kedua",
            "slug" => "judul-post-kedua",
            "author" => "erita",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit.
             Possimus quibusdam provident ipsa. Illum aperiam eveniet error molestias quasi,
              non autem. Eum natus hic quidem nisi tempore iste voluptate at ratione! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod quas porro incidunt ducimus voluptates debitis eius veritatis, reiciendis temporibus optio ab eligendi mollitia adipisci, et provident necessitatibus expedita minus? Quidem?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit nihil repellendus, id ullam aliquid velit non ipsa minus et magni excepturi quia rem tempore adipisci reiciendis. Tempora fugit nostrum similique!Lorem"
        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
