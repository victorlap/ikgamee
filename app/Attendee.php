<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = ['name', 'attends'];

    protected $casts  = [
        'attends' => 'bool'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
