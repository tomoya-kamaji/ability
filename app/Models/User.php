<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * IDから一件のデータを取得する
     */
    public function selectUserFindById($id)
    {
        // 「SELECT id, name, email WHERE id = ?」を発行する
        $query = $this->select([
            'id',
            'name',
            'email'
        ])->where([
            'id' => $id
        ]);
        // first()は1件のみ取得する関数
        return $query->first();
    }

}
