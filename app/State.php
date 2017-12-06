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

    public function events() {
        return $this->hasMany('App\Event');
    }

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

    /**
     *
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */

    public function mostRecentEvent()
    {

        return $this->events()->orderBy('id', 'desc')->first();

    }

    public function popularCategories($limit=5)
    {

        return $this->events()->upcoming()
            ->join('categories', 'events.category_id', '=', 'categories.id')
            ->select([\DB::raw('count(category_id) as total'), 'category_id', 'categories.name', 'categories.slug'])
            ->groupBy('category_id')->get()->take($limit);

    }

}
