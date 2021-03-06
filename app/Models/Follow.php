<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_user_id',
        'to_user_id',
    ];

    public function fromUser()
    {
        return $this->belongsTo(\App\Models\User::class, 'from_user_id', 'id');
    }

    public function toUser()
    {
        return $this->belongsTo(\App\Models\User::class, 'to_user_id', 'id');
    }
}
