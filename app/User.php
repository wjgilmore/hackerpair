<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'email',
        'last_name',
        'timezone',
        'title',
        'zip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Accessors and Mutators
     *
     */

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Relationships
     *
     */

    /**
     * Each user resides in a U.S. state
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state() {
        return $this->belongsTo('App\State');
    }


    /**
     * A user can host multiple events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hostedEvents() {
        return $this->hasMany('App\Event');
    }


    /**
     * A user can favorite multiple events
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favoriteEvents()
    {
        return $this->belongsToMany('App\Event', 'favorite_events');
    }

    // ->as('attendedEvents')
    public function tickets() {
        return $this->belongsToMany('App\Event', 'tickets')
            ->withPivot('approved', 'approved_at')
            ->whereNull('tickets.deleted_at')
            ->withTimestamps();
    }

    /**
     * Instance Methods
     *
     *
     */

    /**
     * Has the user favorited a particular event?
     *
     * @param $eventID
     *
     * @return bool
     */
    public function favoritedEvent($eventID) {

        return $this->favoriteEvents()->where('event_id', $eventID)->count() == 1;

    }

    public function isOrganizer($event)
    {
        return $this->id == $event->user_id;
    }

    public function isAttending($event)
    {
        return $this->tickets()->where('event_id', $event->id)->whereNull('tickets.deleted_at')->exists();
    }

}
