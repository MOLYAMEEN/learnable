@extends('index')
@section('content')


<a href="user/create">Create</a>
<a href="user?trashed=yes">with trashed</a>
<a href="user">without trashed</a>

<table width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Content</th>
            <th>created</th>
            <th>Show</th>
            <th>my_soft_delete</th>
            <th>Status</th>
            <th>deleted</th>
            <th>updated</th>
            <th>Action</th>
        </tr>
    </thead>
         <tbody>
             
                @each('user.data',$test, 'data','user.empty_data')
          </tbody>
</table>
@endsection