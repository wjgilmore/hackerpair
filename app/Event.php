<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{

    use Sluggable;

    protected $dates = [
        'created_at',
        'updated_at',
        'started_at',
    ];

    protected $fillable = [
        'name',
        'venue',
        'description',
        'city'
    ];

    protected static function boot()
    {

        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
           $builder->where('published', '=', 1);
        });

    }

    /**
     * Relationships
     *
     */

    public function organizer() {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Accessors and Mutators
     *
     */

    public function getNameAttribute($value)
    {

        $ignore = ['a', 'and', 'at', 'but', 'for', 'in', 'the', 'to', 'with'];

        $name = explode(' ', $value);

        $modifiedName = [];

        foreach ($name as $word)
        {

            if (! in_array(strtolower($word), $ignore))
            {
                $modifiedName[] = ucfirst($word);
            } else {
                $modifiedName[] = strtolower($word);
            }

        }

        return join(' ', $modifiedName);

    }

    /**
     * Instance Methods
     *
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * HackerPair uses route model binding for sanity and the
     * eloquent-sluggable package for pretty URLs, therefore we
     * need to override the ID column passed along via the URL.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     *
     * @return Boolean
     */

    public function occurringToday()
    {
        return $this->started_at->isToday();
    }

    /**
     * Local scopes
     */

    public function scopeZip($query, $zip)
    {
        return $query->where('zip', $zip);
    }

}
