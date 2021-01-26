<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    // /**
    //  * IDから一件のデータを取得する
    //  */
    // public function selectUserFindById($id)
    // {
    //     // 「SELECT id, name, email WHERE id = ?」を発行する
    //     $query = $this->select([
    //         'id',
    //         'name',
    //         'email'
    //     ])->where([
    //         'id' => $id
    //     ]);
    //     // first()は1件のみ取得する関数
    //     return $query->first();
    // }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //フォロワーを取得
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }
}
