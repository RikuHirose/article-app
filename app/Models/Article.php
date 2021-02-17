<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

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

    protected $appends = [
        'is_like',
        'like_id'
    ];

    public function getIsLikeAttribute()
    {
        // 「いいね」したかを判定する + ログインしている
        return \Auth::check() && Like::where('user_id', \Auth::user()->id)->where('article_id', $this->id)->exists();
    }

    public function getLikeIdAttribute()
    {
        return Like::where('user_id', \Auth::user()->id)->where('article_id', $this->id)->pluck('id')->first();
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(\App\Models\Like::class, 'article_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class, 'article_id', 'id');
    }
}
