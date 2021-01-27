<?php
namespace App;

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




}
