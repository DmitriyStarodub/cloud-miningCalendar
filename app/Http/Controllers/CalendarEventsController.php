<?php

namespace App\Http\Controllers;


use App\CalendarEvents;
use App\Http\Requests\CalendarEventRequest;
use Carbon\Carbon;

class CalendarEventsController extends Controller
{
    public function index()
    {
        $next_month = Carbon::now()->addMonth(1);
        $next_month->day = 1;
        $next_month->hour = 0;
        $calendar_events = CalendarEvents::query()
                ->where('date_of', '>', Carbon::now() )
                ->where('date_of', '<', $next_month)
                ->orderBy('date_of', 'asc')
                ->get();
        return view('calendar_events.index', compact('calendar_events'));
    }

    /**
     *
     *
     * @return
     */
    public function create()
    {

        return view('calendar_events.create');
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function store(CalendarEventRequest $request)
    {
        CalendarEvents::create($request->all());

        return redirect()->route('calendar_events.index');
    }

    public function edit($id)
    {
        $calendar_event = CalendarEvents::findOrFail($id);
        return view('calendar_events.edit', compact('calendar_event'));
    }


    public function update($id, CalendarEventRequest $request)
    {
        $calendar_event = CalendarEvents::findOrFail($id);

        $calendar_event->update($request->all());

        return redirect()->route('calendar_events.index');
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function show($id)
    {
        $calendar_event = CalendarEvents::findOrFail($id);

        return view('calendar_events.show', compact('calendar_event'));
    }


    public function destroy($id)
    {

        return redirect()->back();
    }

}
