<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Pivot
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}

