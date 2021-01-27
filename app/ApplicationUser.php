<?php
namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;


class ApplicationUser extends Pivot
{
    protected $table = "application_user";


}
