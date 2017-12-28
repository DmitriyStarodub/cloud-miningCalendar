<h1>Create Event</h1>

{!! Form::open(['url' => 'calendar_events']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('venue', 'Venue of the event:') !!}
        {!! Form::text('venue', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('date_of', 'Event date:') !!}
        {!! Form::input('date', 'date_of', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>

<div class="form-group">
    {!! Form::submit('Add Event', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}