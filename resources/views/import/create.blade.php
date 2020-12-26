@extends('layouts.app')

@section('content')

 <div class="container">
      
         <br />
        <form method="POST" enctype="multipart/form-data"  action="/import">
         {{ csrf_field() }}
         <div class="form-group">
          <table class="table">
           <tr>
            <td width="40%" align="right"><label>Select File for Upload</label></td>
            <td width="30">
             <input type="file" name="file" />
            </td>
            <td width="30%" align="left">
             <input type="submit" name="upload" class="btn btn-primary" value="Upload">
            </td>
           </tr>
           <tr>
            <td width="40%" align="right"></td>
            <td width="30"><span class="text-muted">.csv</span></td>
            <td width="30%" align="left"></td>
           </tr>
          </table>
         </div>
        </form>
        
@endsection
