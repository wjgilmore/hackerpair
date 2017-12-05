<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class State extends Model
{

    use Sluggable;

    /**
     * Relations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function users() {
        return $this->hasMany('App\User');
    }

    public function zips() {
        return $this->hasMany('App\ZipCode');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'abbreviation' => [
                'source' => 'abbreviation'
            ]
        ];
    }

    /**
     * Override the route key used in route-model binding
     * @return string
     */

    public function getRouteKeyName()
    {
        return 'abbreviation';
    }

}
