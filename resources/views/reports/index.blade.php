@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            {{-- <th scope="col"></th> --}}
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)

      <tr>
      <th scope="row">{{$user->id}}</th>
        <td><a href="/reports/{{$user->id}}">{{$user->first_name}}</a></td>
      </tr>
    
            
        @endforeach
  
   {{-- {{ $users }} --}}
@endsection

</tbody>
  </table>