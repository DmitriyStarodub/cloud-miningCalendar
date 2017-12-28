<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CalendarEvents extends Model
{
    protected $fillable = ['title', 'body', 'date_of', 'venue'];

    /**
     * Scope a query to only include users of a given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $add_month
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAfterMonth($query, $add_month = 0)
    {
        $previous_month = Carbon::now()->addMonth($add_month - 1)->endOfMonth();
        $next_month = Carbon::now()->addMonth($add_month + 1)->startOfMonth();

        return $query->where('date_of', '>', $previous_month )
                    ->where('date_of', '<', $next_month);
    }

    public function setDateOfAttribute($date)
    {
        $this->attributes['date_of'] = Carbon::parse($date);
    }

}

