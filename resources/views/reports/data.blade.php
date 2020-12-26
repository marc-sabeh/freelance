@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <div class="container">
        <h3 align="center">Import Excel File in Laravel</h3>
         <br />
        {{-- @if(count($errors) > 0)
         <div class="alert alert-danger">
          Upload Validation Error<br><br>
          <ul>
           @foreach($errors->all() as $error)
           <li>{{ $error }}</li>
           @endforeach
          </ul>
         </div>
        @endif --}}
     
        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
         {{ csrf_field() }}
         <div class="form-group">
          <table class="table">
           <tr>
            <td width="40%" align="right"><label>Select File for Upload</label></td>
            <td width="30">
             <input type="file" name="select_file" />
            </td>
            <td width="30%" align="left">
             <input type="submit" name="upload" class="btn btn-primary" value="Upload">
            </td>
           </tr>
           <tr>
            <td width="40%" align="right"></td>
            <td width="30"><span class="text-muted">.xls, .xslx</span></td>
            <td width="30%" align="left"></td>
           </tr>
          </table>
         </div>
        </form>
        
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