<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'date', 'hash', 'email'];

    protected $dates = ['date'];

    public function attendees() {
        return $this->hasMany(Attendee::class);
    }

    public function getLinkAttribute() {
        return route('event.show', $this->hash);
    }

    public function getRouteKeyName()
    {
        return 'hash';
    }
}
