<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'img_url',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class, 'article_id', 'id');
    }
}
