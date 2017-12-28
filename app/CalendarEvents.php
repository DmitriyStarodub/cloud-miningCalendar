<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CalendarEvents extends Model
{
    protected $fillable = ['title', 'body', 'date_of', 'venue'];

    public function setDateOfAttribute($date)
    {
        $this->attributes['date_of'] = Carbon::parse($date);
    }

}

