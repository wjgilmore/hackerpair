<div class="form-group">
    {!! Form::label('name', 'Event Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'PHP Hacking and Pizza']) !!}
</div>

<div class="form-group">
    <label class="control-label" for="category_id">Category</label><br />
    {!! Form::select('category_id',
    \App\Category::orderBy('name', 'asc')->pluck('name', 'id'), null, ['class' => 'form-control input-lg']);
    !!}
</div>

<div class="form-group">

    {!! Form::label('max_attendees', 'Maximum Number of Attendees (including you)') !!}
    {!! Form::select('max_attendees', [2,3,4,5], null, ['placeholder' => 'Maximum Number of Attendees', 'class' => 'form-control input-lg']) !!}
</div>

<div class="form-group">
    {!! Form::label('start_date', "Starting Date", ['class' => 'control-label']) !!}
    <date-picker placeholder="Select an event date" defaultvalue="{{old('start_date')}}" name="start_date"></date-picker>
</div>

<div class="form-group">
    {!! Form::label('start_time', "Starting Time (in your time zone)", ['class' => 'control-label']) !!}
    {!! Form::select('start_time', \App\Library\Time::generateHalfHourIntervalArray(), null, ['placeholder' => 'Starting Time', 'class' => 'form-control input-lg']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', "Description", ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control input-lg', 'placeholder' => 'Describe the event']) !!}
</div>

<div class="form-group">
    {!! Form::label('venue', 'Venue', ['class' => 'control-label']) !!}
    {!! Form::text('venue', null, ['class' => 'form-control input-lg', 'placeholder' => 'Starbucks'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('street', "Street", ['class' => 'control-label']) !!}
    {!! Form::text('street', null, ['class' => 'form-control input-lg', 'placeholder' => '21 Jump Street'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('city', "City", ['class' => 'control-label']) !!}
    {!! Form::text('city', null, ['class' => 'form-control input-lg', 'placeholder' => 'City'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('state_id', "State", ['class' => 'control-label']) !!}
    {!! Form::select('state_id',
    \App\State::orderBy('name', 'asc')->pluck('name', 'id'), null, ['class' => 'form-control input-lg']);
    !!}
</div>

<div class="form-group">
    {!! Form::label('zip', "Zip Code", ['class' => 'control-label']) !!}
    {!! Form::text('zip', null, ['class' => 'form-control input-lg'] ) !!}
</div>

<div class="form-group">
    {!! Form::label('published', "Publish this event immediately?", ['class' => 'control-label']) !!}
    {!! Form::checkbox('published', null, ['class' => 'form-control input-lg'] ) !!}
</div>
