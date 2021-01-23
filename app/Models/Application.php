<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Application extends Model
{
    protected $fillable = [
        'track_id',
        'user_id',
        'content',
        'evaluation'
    ];

    //アプリケーションとユーザの関係性
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }



}
