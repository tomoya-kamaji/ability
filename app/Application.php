<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Application extends Model
{
    protected $fillable = [
        'trackId',
        'trackName',
        'artworkUrl512',
        'artistName'
    ];

    /**
     * アプリを登録しているユーザを取得
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'application_user')->withTimestamps();
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        /*
        コメントが1以上ならtrue
        コメントが0ならfalse
        */
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }


    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }



}
