<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Carbon\Carbon;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Support\Facades\Auth;

class Event extends Model
{

    use Sluggable;

    protected $dates = [
        'created_at',
        'start_date',
        'updated_at'
    ];

    protected $fillable = [
        'category_id',
        'city',
        'description',
        'max_attendees',
        'name',
        'oneliner',
        'published',
        'slug',
        'state_id',
        'start_date',
        'start_time',
        'street',
        'venue',
        'zip'
    ];

    protected static function boot()
    {

        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
           $builder->where('published', '=', 1);
        });

        static::addGlobalScope('upcoming', function (Builder $builder) {
            $builder->where('start_date', '>=', Carbon::now()->toDateString());
        });

    }

    /**
     * Relationships
     *
     */

    /**
     * Which users have expressed interest in attending this event?
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attendees()
    {
        return $this->belongsToMany('App\User', 'tickets')
            ->using('App\Ticket')
            ->whereNull('tickets.deleted_at');
    }

    /**
     * To what category does this event belong?
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }

    /**
     * Which users have favorited this event?
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoritedBy()
    {
        return $this->belongsToMany('App\User', 'favorite_events');
    }

    /**
     * Which user is organizing this event?
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organizer() {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * In which state will this event be hosted?
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state() {
        return $this->belongsTo('App\State');
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

    public function getAddressAttribute()
    {
        return $this->street . ' ' .
            $this->city . ', ' .
            $this->state->abbreviation . ' ' .
            $this->zip;
    }

    public function getStartDateAttribute($value)
    {
        $timezone = Auth::check() ? Auth::user()->timezone : config('app.timezone');
        return Carbon::createFromFormat('Y-m-d', $value, $timezone)
                    ->timezone(config('app.timezone'))->format("Y-m-d");
    }

    public function getStartTimeAttribute($value)
    {

        $timezone = Auth::check() ? Auth::user()->timezone : config('app.timezone');

        return Carbon::createFromFormat('H:i:s', $value, $timezone)
                ->timezone(config('app.timezone'))->format("H:ia");

    }

    /**
     * Instance Methods
     *
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
     * Has the event organizer made this event public?
     *
     * @return bool
     */
    public function isPublished()
    {
        return $this->published == 1;
    }

    /**
     *
     * @return Boolean
     */

    public function occurringToday()
    {
        return $this->start_date->isToday();
    }

    /**
     * Local scopes
     */

    /**
     * Retrieve events found within a specified radius of a set of coordinates
     *
     * @param $query
     * @param $latitude
     * @param $longitude
     * @param $radius
     *
     * @return mixed
     */
    public function scopeNearby($query, $latitude=NULL, $longitude=NULL, $radius=50)
    {

        if (! is_null($latitude)) {

            $latitude = (double) $latitude;
            $longitude = (double) $longitude;

            // Per https://github.com/laravel/framework/issues/8436
            return $query
                ->selectRaw("events.*,
                 (3959 * acos(cos(radians(?)) * 
                  cos(radians(events.lat)) * 
                  cos(radians(events.lng) - radians(?)) + 
                  sin(radians(?)) * sin(radians(events.lat)))) 
                 AS distance", [$latitude, $longitude, $latitude])
                ->orderBy('distance', 'asc')
                ->whereRaw("(3959 * acos(cos(radians(?)) * cos(radians(events.lat)) * 
                             cos(radians(events.lng) - radians(?)) + sin(radians(?)) * 
                             sin(radians(events.lat)))) < ?", [$latitude, $longitude, $latitude, $radius]
                );

        }

    }

    /**
     * Retrieve events occurring within a specific zip code
     *
     * @param $query
     * @param $startTime
     *
     * @return mixed
     */
    public function scopeZip($query, $zip)
    {
        return $query->where('zip', $zip);
    }

    /**
     * Retrieve events occurring in the future and which are public (published)
     *
     * @param $query
     * @param $startDate
     *
     * @return mixed
     */
    public function scopeUpcoming($query, $startDate=NULL)
    {

        $query->where('published', true);

        if (! is_null($startDate)) {
            $query->whereDate('start_date', '>=', $startDate);
        }

    }

}
