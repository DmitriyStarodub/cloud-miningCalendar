<h1>Events</h1>
@foreach($calendar_events as $calendar_event)
    <article>
        <h2>
           <a href="{{ route('calendar_events.show',[$calendar_event->id]) }}">{{$calendar_event->title}}</a>
        </h2>

        <span>{{$calendar_event->date_of}} <b>|</b> {{$calendar_event->venue}}</span>

        <div class="body">{{$calendar_event->body}}</div>

    </article>
@endforeach