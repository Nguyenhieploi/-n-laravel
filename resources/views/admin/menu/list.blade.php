@extends('admin.main')


@section('content')
   <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Active</th>
            <th>Update</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        {!! $menuHtml !!}
    </tbody>
    
   </table>
@endsection


