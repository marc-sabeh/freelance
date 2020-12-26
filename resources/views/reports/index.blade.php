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

    <h1>Users</h1>
{{-- {{$logs}} --}}
    {{-- <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">User</th>
            <th scope="col">info</th>
            <th scope="col">calculation</th> --}}


            {{-- <th scope="col">Types of user</th>
            <th scope="col">Number of type</th>
            <th scope="col">Emails</th> --}}


            {{-- <th scope="col"></th> --}}
            
          {{-- </tr>
        </thead>
        <tbody> --}}
        @foreach ($users as $user)
        <br>

      {{-- <tr> --}}
      {{-- <th scope="row">{{$log->id}}</th> --}}
        <h5>{{$user->user_first_name}} {{$user->user_last_name}}</h5>
        @foreach ($logs as $log)
            @if ($user->created_by == $log->created_by)
           {{$log->type_name}}:
           {{$log->count_type}}
            @endif
        @endforeach
        <br>

    {{-- </td> --}}
        {{-- <td>
            @if ($log->type_id == 4)
            {{$log->count_type}}       
            @endif    
        </td> --}}


      {{-- </tr> --}}
    
            
    @endforeach

    @else
    <h1>No data</h1>
@endisset

@endsection
