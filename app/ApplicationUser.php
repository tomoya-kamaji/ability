<?php
namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;


class ApplicationUser extends Pivot
{
    protected $table = "application_user";

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
