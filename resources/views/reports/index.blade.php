@extends('layouts.app')

@section('content')
<form action="/reports/" method="get" name="form1">
    Date Start 
    <input type="date" name="date_start" id="date_start">
    Date end
    <input type="date" name="date_end" id="date_end">
    
    <button type="submit" name="submit_btn">apply</button>
</form>
    <a href="/import/create">Go to import csv file</a>
    @isset(Request::all()['date_start'])
{{-- {{$total_signed}} --}}
{{-- {{$bounds}} --}}
    <h1>Users</h1>

        @foreach ($users as $user)
        <div class="border border-primary p-3 m-3 shadow p-3 mb-5 bg-white rounded">
        <h5>{{$user->user_first_name}} {{$user->user_last_name}}</h5>
        @foreach ($logs as $log)
            @if ($user->created_by == $log->created_by)
           {{$log->type_name}}:
           {{$log->count_type}}
            @endif
        @endforeach
        <br>
        <hr>
        @foreach ($bounds as $bound)
            @if ($user->created_by == $bound->user_id)
           {{$bound->type}}bound:
           {{$bound->bounds_count}}
            @endif
        @endforeach
        <br>
        <hr>
        @foreach ($total_signed as $total_sign)
            @if ($user->created_by == $total_sign->created_by)
           Total signed: {{$total_sign->count_signed_status_per_user}}
            @endif
        @endforeach
    </div>

            
    @endforeach

    @else
    <h1>No data</h1>
@endisset

@endsection
