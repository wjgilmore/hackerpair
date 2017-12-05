<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{


    public function state() {
        return $this->belongsTo('App\State');
    }


}
